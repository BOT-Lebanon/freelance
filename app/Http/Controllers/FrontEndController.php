<?php

namespace App\Http\Controllers;

use Activation;
use App\AllowedUsers;
use App\Http\Requests;
use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\FrontendRequest;
use App\User;
use App\Province;
use App\kadaa;
use App\city;
use App\labelforms;
use App\Resources;
use App\education;
use App\trainings;
use App\libanpost;
use App\File as filemodel;
use DB;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use File;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Redirect;
use Reminder;
use Validator;
use Sentinel;
use URL;
use View;
use App\Mail\Contact;
use App\Mail\ForgotPassword ;
use App\Mail\Register;
use App\Mail\ContactUser;


class FrontEndController extends JoshController
{
    protected $validationRules = array(
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|between:3,32',
        'password_confirm' => 'required|same:password',
        'pic' => 'mimes:jpg,jpeg,bmp,png|max:10000'
    );
    /*
     * $user_activation set to false makes the user activation via user registered email
     * and set to true makes user activated while creation
     */
    private $user_activation = true;

    /**
     * Account sign in.
     *
     * @return View
     */
    public function getLogin()
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('my-account');
        }

        // Show the login page
        return view('login2');
    }

    public function edituser($id){
        $user=User::find($id);

        return response()->json(['success' => 'true', 'user' =>$user]);
    }

    public function getLibanpost()
    {
        $user = Sentinel::getUser();
        $labels= labelforms::all();
        foreach($labels as $la){
            $labelform[$la->labelcode]['labeleng']=$la->labeleng;
            $labelform[$la->labelcode]['labelara']=$la->labelara;
        }

        $userslist = DB::table('users')->join('role_users', 'role_users.user_id','=','users.id')->where('role_id','2')
                    ->where('role_id','2')
                    ->orderBy('first_name','desc')->get();

        $userslist=User::all();
        foreach($userslist as $usr){
            $users[$usr->id]=$usr->first_name.' '.$usr->last_name;
        }

        $userslistall = DB::table('users')->join('role_users', 'role_users.user_id','=','users.id')
                        ->join('libanpost', 'libanpost.id','=','users.libanpostId')
                        ->where('role_id','2')
                        ->where('libanpostId','<>','')
                        ->orderBy('first_name','desc')->get();

        $libanpost=libanpost::all();
        $libanposts=array();
        foreach($libanpost as $post){
            $libanposts[$post->id]=$post->code;
        }


        return view('libanpost', compact('user','labelform','users','libanposts','userslistall'));
        // Show the login page
       // return view('libanpost');
    }

    /**
     * Account sign in form processing.
     *
     * @return Redirect
     */
    public function postLogin(Request $request)
    {

        try {
            // Try to log the user in
            if ($user =  Sentinel::authenticate($request->only('email', 'password'), $request->get('remember-me', 0))) {
                //Activity log for login
                activity($user->full_name)
                    ->performedOn($user)
                    ->causedBy($user)
                    ->log('LoggedIn');

                if ($user->Roles[0]->id == '3') {
                   return Redirect::route('libanpost');
                }
                else
                    return Redirect::route("my-account")->with('success', trans('auth/message.login.success'));

            } else {
                return redirect('login')->with('error', 'Email or password is incorrect.');
                //return Redirect::back()->withInput()->withErrors($validator);
            }

        } catch (UserNotFoundException $e) {
            $this->messageBag->add('email', trans('auth/message.account_not_found'));
        } catch (NotActivatedException $e) {
            $this->messageBag->add('email', trans('auth/message.account_not_activated'));
        } catch (UserSuspendedException $e) {
            $this->messageBag->add('email', trans('auth/message.account_suspended'));
        } catch (UserBannedException $e) {
            $this->messageBag->add('email', trans('auth/message.account_banned'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('email', trans('auth/message.account_suspended', compact('delay')));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * get user details and display
     */
    public function myAccount(User $user)
    {
        $user = Sentinel::getUser();
        $countries = $this->countries;

		$provinces = Province::all();
		foreach($provinces as $pr){
		    $province[$pr->Id]=$pr->Name;
        }
        $kadaas = kadaa::all();
        foreach($kadaas as $ka){
            $kadaa[$ka->Id]=$ka->Name;
        }
        $cities = city::all();
        foreach($cities as $ct){
            $city[$ct->Id]=$ct->Name;
        }

        $labels= labelforms::all();

        foreach($labels as $la){
            $labelform[$la->labelcode]['labeleng']=$la->labeleng;
            $labelform[$la->labelcode]['labelara']=$la->labelara;
        }

        $specialneeds= Resources::getbyCode('specialneeds');

        foreach($specialneeds as $sp){
            $specials[$sp->resourceId]=$sp->resourceValue;
            $specials[$sp->resourceId]=$sp->resourceValue;
        }

        $highesteducation= Resources::getbyCode('highesteducation');
        foreach($highesteducation as $ed){
            $education[$ed->resourceId]=$ed->resourceValue;
            $education[$ed->resourceId]=$ed->resourceValue;
        }

        $userEducation= DB::table('usereducation')->join('resources', 'resources.resourceId','=','usereducation.major')->where('resourceCode','major')->where('userId',$user->id )->orderBy('year','desc')->get();
        $trainingArray = DB::table('usertrainings')->where('userId',$user->id )->orderBy('year','desc')->get();


        $majors= Resources::getbyCode('major');
        foreach($majors as $mj){
            $major[$mj->resourceId]=$mj->resourceValue;
            $major[$mj->resourceId]=$mj->resourceValue;
        }

        $language= Resources::getbyCode('language');
        foreach($language as $la){
            $langs[$la->resourceId]=$la->resourceValue;
            $langs[$la->resourceId]=$la->resourceValue;
        }

        $technologies= Resources::getbyCode('technologyplatform');
        foreach($technologies as $la){
            $technology[$la->resourceId]=$la->resourceValue;
            $technology[$la->resourceId]=$la->resourceValue;
        }


        $functionskills= Resources::getbyCode('functionalskills');
        foreach($functionskills as $la){
            $funcskill[$la->resourceId]=$la->resourceValue;
            $funcskill[$la->resourceId]=$la->resourceValue;
        }

        for($i=2019;$i>=1965;$i--){
            $year[$i]=$i;
        }
        $controller=$this;

        return view('user_account', compact('user',  'countries','province','kadaa','city','labelform','specials','education','major','year','langs','technology','funcskill','userEducation','trainingArray'));
    }

    public function AccountManager(User $user)
    {
        $user = Sentinel::getUser();
        $controller=$this;
        $labels= labelforms::all();

        return view('manager-account', compact('user','labelform'));
    }

    public function myProjects(User $user)
    {
        $user = Sentinel::getUser();
        return view('user_projects',compact('user'));
    }


    /**
     * update user details and display
     * @param Request $request
     * @param User $user
     * @return Return Redirect
     */
    public function update(FrontendRequest $request, User $user)
    {

        $user = Sentinel::getUser();
        //update values
        $user->update($request->except('password','pic','password_confirm'));

        if ($password = $request->get('password')) {
            $user->password = Hash::make($password);
        }
        // is new image uploaded?
        if ($file = $request->file('pic')) {
            $extension = $file->extension()?: 'png';
            $folderName = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $user->pic)) {
                File::delete(public_path() . $folderName . $user->pic);
            }
            //save new file path into db
            $user->pic = $safeName;

        }

        // Was the user updated?
        if ($user->save()) {
            // Prepare the success message
            $success = trans('users/message.success.update');
            //Activity log for update account
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('User Updated successfully');
            // Redirect to the user page
            return Redirect::route('my-account')->with('success', $success);
        }

        // Prepare the error message
        $error = trans('users/message.error.update');


        // Redirect to the user page
        return Redirect::route('my-account')->withInput()->with('error', $error);


    }

    public function updateonRegister(Request $request)
    {
        $user = Sentinel::getUser();


        //update values
        $user->update($request->except('password', 'pic', 'password_confirm', 'email', '_method',
            '_token','skills','dob','specialneeds'));

        if ($password = $request->get('password')) {
            $user->password = Hash::make($password);
        }
        // is new image uploaded?
        if ($file = $request->file('pic')) {
            $extension = $file->extension() ?: 'png';
            $folderName = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $user->pic)) {
                File::delete(public_path() . $folderName . $user->pic);
            }
            //save new file path into db
            $user->pic = $safeName;

        }

        if(isset($request->dob)){
            $date = explode('-', $request->dob);
            $datelast = $date[2].'-'.$date[1].'-'.$date[0];

            $user->dob = $datelast;
        }

        $skills = '';
        if (isset($request->skills)) {
            foreach ($request->skills as $sk) {
                $skills = $skills . "#" . $sk;
            }
            $user->skills = $skills;
        }

       $needs = '';
        if (isset($request->specialneeds)) {
            foreach ($request->specialneeds as $sp) {
                $needs = $needs . "#" . $sp;
            }
            $user->specialneeds =$needs;
        }

        // Was the user updated?
        if ($user->save()) {

            // Prepare the success message
            $success = trans('users/message.success.update');
            //Activity log for update account
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('User Updated successfully');
            // Redirect to the user page
           // return Redirect::route('my-account')->with('success', $success);
            return response()->json(['success' => 'true']);
        }

        // Prepare the error message
        $error = trans('users/message.error.update');


        // Redirect to the user page
        //return Redirect::route('my-account')->withInput()->with('error', $error);

    }

    public function updateuserskills(Request $request){
        $userId=$request->userId;

        $technologies= Resources::getbyCode('technologyplatform');
        DB::table('userskills')->where('userId', $userId)->where('resourceType', 'technologyplatform')->delete();

        foreach($technologies as $tc) {

            $tech = '';
            $tech = 'ratingtech-'.$tc->resourceId;
            $techValue = $request->$tech;

            if ($techValue != '') {

                DB::table('userskills')->insert(
                    array(
                        'userId' => $userId,
                        'resourceId' => $tc->resourceId,
                        'resourceValue' => $techValue,
                        'resourceType' => 'technologyplatform'
                    )
                );
            }
        }


        $functionskills= Resources::getbyCode('functionalskills');
        DB::table('userskills')->where('userId', $userId)->where('resourceType', 'functionalskills')->delete();

        foreach($functionskills as $fu){
            $tech='';
            $tech='ratingfunc-'.$fu->resourceId;
            $techValue=$request->$tech;
            if ($techValue != '') {
                DB::table('userskills')->insert(
                    array(
                        'userId' => $userId,
                        'resourceId' => $fu->resourceId,
                        'resourceValue' => $techValue,
                        'resourceType' => 'functionalskills'
                    )
                );
            }
        }

        $language= Resources::getbyCode('language');
        DB::table('userskills')->where('userId', $userId)->where('resourceType', 'language')->delete();

        foreach($language as $lg ){
            $tech='';
            $tech='read'.$lg->resourceId;
            $techValue=$request->$tech;

            DB::table('userskills')->insert(
                array(
                    'userId'     =>   $userId,
                    'resourceId'   =>   $fu->resourceId,
                    'resourceValue'   =>   $techValue,
                    'resourceType'=>'language',
                    'resourceAttribute'=>'read'
                )
            );

            $tech='';
            $tech='write'.$lg->resourceId;
            $techValue=$request->$tech;
            DB::table('userskills')->insert(
                array(
                    'userId'     =>   $userId,
                    'resourceId'   =>   $fu->resourceId,
                    'resourceValue'   =>   $techValue,
                    'resourceType'=>'language',
                    'resourceAttribute'=>'write'
                )
            );

            $tech='';
            $tech='speak'.$lg->resourceId;
            $techValue=$request->$tech;
            DB::table('userskills')->insert(
                array(
                    'userId'     =>   $userId,
                    'resourceId'   =>   $fu->resourceId,
                    'resourceValue'   =>   $techValue,
                    'resourceType'=>'language',
                    'resourceAttribute'=>'speak'
                )
            );

        }
        return response()->json(['success' => 'true']);
    }

    public function updateonRegister2(Request $request)
    {
        $user = Sentinel::getUser();

        $user->userConfirmed=1;

        //update values
        $user->save();

        /*if ($password = $request->get('password')) {
            $user->password = Hash::make($password);
        }
        // is new image uploaded?
        if ($file = $request->file('pic')) {
            $extension = $file->extension()?: 'png';
            $folderName = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);

            //delete old pic if exists
            if (File::exists(public_path() . $folderName . $user->pic)) {
                File::delete(public_path() . $folderName . $user->pic);
            }
            //save new file path into db
            $user->pic = $safeName;

        }*/

       /* $availableshifts=$request->morning."#".$request->noon."#".$request->night;
        $user->availableshifts=$availableshifts;

        $equipments=$request->laptop."#".$request->phoneequip."#".$request->internet;
        $user->equipments=$equipments;

        $skills='';

        foreach($request->skills as $sk){
            $skills=$skills."#".$sk;
        }
        $user->skills=$skills;

        // Was the user updated?
        if ($user->save()) {
            // Prepare the success message
            $success = trans('users/message.success.update');
            //Activity log for update account
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('User Updated successfully');
            // Redirect to the user page
            return Redirect::route('my-account')->with('success', $success);

           // return response()->json(['success' => 'true']);
        }

        // Prepare the error message
        $error = trans('users/message.error.update');
*/

        // Redirect to the user page
        //return Redirect::route('my-account')->withInput()->with('error', $error);
        return response()->json(['success' => 'true']);
    }

    /**
     * Account Register.
     *
     * @return View
     */

   /* public function getphonenumber(Request $request)
    {
        $phoneNumber=$request->phoneNumber;
       // return view('register', compact('controller','user', 'countries','province','kadaa','city','labelform','specials','education','major','year','langs','technology','funcskill'));
        return redirect()->action(
            'FrontEndController@getRegisterauth', ['phoneNumber' => $phoneNumber]
        );
    }*/

    public function getRegister()
    {

        return view('register');
    }

    public function checkphoneifexist(Request $request)
    {
        $phone=$request->phone;
        $user=AllowedUsers::findbyPhone($phone);

        if($user==''){
            return response()->json(['status' => 'failed','message' => 'Phone not allowed']);
        }
        elseif($user!='') {
            $user2 = User::findbyPhone($phone);
            if($user2==''){
                return response()->json(['status' => 'success','message' => '']);
            }
            else{
                return response()->json(['status' => 'failed','message' => 'Mobile number already in use !']);
            }
        }
    }


    public function getRegisterauth(Request $request)
    {
        $today=date('d-m-Y');

        $phoneNumber=$request->phone;

        if($phoneNumber=='' || $phoneNumber==null){
            //dd('here');
            redirect('register');
        }

        // Show the page
        $countries = $this->countries;
        //dd($countries);
        $provinces = Province::all();
        foreach($provinces as $pr){
            $province[$pr->Id]=$pr->Name;
        }
        $kadaas = kadaa::all();
        foreach($kadaas as $ka){
            $kadaa[$ka->Id]=$ka->Name;
        }
        $cities = city::all();
        foreach($cities as $ct){
            $city[$ct->Id]=$ct->Name;
        }

        $labels= labelforms::all();

        foreach($labels as $la){
            $labelform[$la->labelcode]['labeleng']=$la->labeleng;
            $labelform[$la->labelcode]['labelara']=$la->labelara;
        }

        $specialneeds= Resources::getbyCode('specialneeds');

        foreach($specialneeds as $sp){
            $specials[$sp->resourceId]=$sp->resourceValue;
            $specials[$sp->resourceId]=$sp->resourceValue;
        }

        $highesteducation= Resources::getbyCode('highesteducation');
        foreach($highesteducation as $ed){
            $education[$ed->resourceId]=$ed->resourceValue;
            $education[$ed->resourceId]=$ed->resourceValue;
        }

        $majors= Resources::getbyCode('major');
        foreach($majors as $mj){
            $major[$mj->resourceId]=$mj->resourceValue;
            $major[$mj->resourceId]=$mj->resourceValue;
        }

        $language= Resources::getbyCode('language');
        foreach($language as $la){
            $langs[$la->resourceId]=$la->resourceValue;
            $langs[$la->resourceId]=$la->resourceValue;
        }

        $technologies= Resources::getbyCode('technologyplatform');
        foreach($technologies as $la){
            $technology[$la->resourceId]=$la->resourceValue;
            $technology[$la->resourceId]=$la->resourceValue;
        }


        $functionskills= Resources::getbyCode('functionalskills');
        foreach($functionskills as $la){
            $funcskill[$la->resourceId]=$la->resourceValue;
            $funcskill[$la->resourceId]=$la->resourceValue;
        }

        for($i=2019;$i>=1965;$i--){
            $year[$i]=$i;
        }
        $controller=$this;
        return view('registerauthform', compact('controller','today','user','phoneNumber', 'countries','province','kadaa','city','labelform','specials','education','major','year','langs','technology','funcskill'));
    }

    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */
    public function postRegister(UserRequest $request)
    {
        $activate = $this->user_activation; //make it false if you don't want to activate user automatically it is declared above as global variable
        $file = $request->file('file');

        if ($request->file('file') && $file->extension()!='png' && $file->extension()!='jpg')  {
            return response()->json(['success' => 'false']);

        }
        else{
            try {
                // Register the user
                $user = Sentinel::register($request->only(['first_name', 'last_name', 'email', 'password','phone']), $activate);

                $filemodel=new filemodel();

                $publicPath=$filemodel->getPublicPath();
                if(!File::exists($publicPath))
                    $publicPath=public_path();

                // is new image uploaded?
                if ($file = $request->file('file')) {
                    $extension = $file->extension()?: 'png';
                    $folderName = '/uploads/users/'.$user->id;
                    $destinationPath = $publicPath . $folderName;
                    $safeName =  'profile-pic.' . $extension;

                    $file->move($destinationPath, $safeName);

                    //delete old pic if exists
                    if (File::exists($publicPath . $folderName . $user->pic)) {
                        File::delete($publicPath . $folderName . $user->pic);
                    }
                    //save new file path into db
                    $user->pic = $safeName;

                }

                //add user to 'User' group
                $role = Sentinel::findRoleByName('freelancer');
                $role->users()->attach($user);

                //if you set $activate=false above then user will receive an activation mail
                if (!$activate) {
                    // Data to be used on the email view

                    $data=[
                        'user_name' => $user->first_name .' '. $user->last_name,
                        'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code]),
                    ];
                    // Send the activation code through email
                    Mail::to($user->email)
                        ->send(new Register($data));

                    //Redirect to login page
                    return redirect('login')->with('success', trans('auth/message.signup.success'));
                }
                // login user automatically
                Sentinel::login($user, false);
                //Activity log for new account
                activity($user->full_name)
                    ->performedOn($user)
                    ->causedBy($user)
                    ->log('New Account created');

                return response()->json(['success' => 'true', 'user' =>$user]);
                // Redirect to the home page with success menu
                //return Redirect::route("my-account")->with('success', trans('auth/message.signup.success'));

            } catch (UserExistsException $e) {
                return response()->json(['success' => 'false', 'msg' => trans('auth/message.account_already_exists')]);

               // $this->messageBag->add('email', trans('auth/message.account_already_exists'));
            }
       }
        // Ooops.. something went wrong
       /// return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * User account activation page.
     *
     * @param number $userId
     * @param string $activationCode
     *
     */

    public function checkemail(Request $request){
       $input['email'] = $request->email;

        // Must not already exist in the `email` column of `users` table
        /*$rules = array('email' => 'unique:users,email');

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {

           return response()->json(['success' => 'false']);
        }
        else {
            // Register the new user or whatever.
            return response()->json(['success' => 'true']);
        }*/
        $user=User::findbyMail($request->email);

        if($user=='')
            echo(json_encode(true));
        elseif($user!='') {
            echo(json_encode(false));
        }

    }

    public function checkextension(Request $request){
        $pic = $request->pic;
        $array=explode('.',$pic);
        if($array[1]!='jpg' && $array[1]!='png' && $array[1]!='jpeg')
            echo(json_encode(false));
        else echo(json_encode(true));
      //  dd($array[1]);
    }


    public function checkalloweduser(Request $request){
        $phone = $request->phone;

        $user=AllowedUsers::findbyPhone($phone);

        if($user=='')
            echo(json_encode(true));
        elseif($user!='') {
            echo(json_encode(false));
        }

    }


    public function getActivate($userId, $activationCode)
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('my-account');
        }

        $user = Sentinel::findById($userId);

        if (Activation::complete($user, $activationCode)) {
            // Activation was successfull
            return Redirect::route('login')->with('success', trans('auth/message.activate.success'));
        } else {
            // Activation not found or not completed.
            $error = trans('auth/message.activate.error');
            return Redirect::route('login')->with('error', $error);
        }
    }

    /**
     * Forgot password page.
     *
     * @return View
     */
    public function getForgotPassword()
    {
        // Show the page
        return view('forgotpwd');

    }

    /**
     * Forgot password form processing page.
     * @param Request $request
     * @return Redirect
     */
    public function postForgotPassword(Request $request)
    {
        try {
            // Get the user password recovery code
            //$user = Sentinel::FindByLogin($request->get('email'));
            $user = Sentinel::findByCredentials(['email' => $request->email]);
            if (!$user) {
                return Redirect::route('forgot-password')->with('error', trans('auth/message.account_email_not_found'));
            }

            $activation = Activation::completed($user);
            if (!$activation) {
                return Redirect::route('forgot-password')->with('error', trans('auth/message.account_not_activated'));
            }

            $reminder = Reminder::exists($user) ?: Reminder::create($user);
            // Data to be used on the email view

            $data=[
                'user_name' => $user->first_name .' '. $user->last_name,
                'forgotPasswordUrl' => URL::route('forgot-password-confirm', [$user->id, $reminder->code])
            ];
            // Send the activation code through email
            Mail::to($user->email)
                ->send(new ForgotPassword($data));

        } catch (UserNotFoundException $e) {
            // Even though the email was not found, we will pretend
            // we have sent the password reset code through email,
            // this is a security measure against hackers.
        }

        //  Redirect to the forgot password
        return back()->with('success', trans('auth/message.forgot-password.success'));
    }

    /**
     * Forgot Password Confirmation page.
     *
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm(Request $request, $userId, $passwordResetCode = null)
    {
        if (!$user = Sentinel::findById($userId)) {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with('error', trans('auth/message.account_not_found'));
        }

        if($reminder = Reminder::exists($user))
        {
            if($passwordResetCode == $reminder->code)
            {
                return view('forgotpwd-confirm', compact(['userId', 'passwordResetCode']));
            }
            else{
                return 'code does not match';
            }
        }
        else
        {
            return 'does not exists';
        }

    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param  string $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm(PasswordResetRequest $request, $userId, $passwordResetCode = null)
    {

        $user = Sentinel::findById($userId);
        if (!$reminder = Reminder::complete($user, $passwordResetCode, $request->get('password'))) {
            // Ooops.. something went wrong
            return Redirect::route('login')->with('error', trans('auth/message.forgot-password-confirm.error'));
        }

        // Password successfully reseted
        return Redirect::route('login')->with('success', trans('auth/message.forgot-password-confirm.success'));
    }

    /**
     * Contact form processing.
     * @param Request $request
     * @return Redirect
     */
    public function postContact(Request $request)
    {
        // Data to be used on the email view
        $data = [
            'contact-name' => $request->get('contact-name'),
            'contact-email' => $request->get('contact-email'),
            'contact-msg' => $request->get('contact-msg'),
        ];

        // Send the activation code through email
        // Send Email to admin
        Mail::to('email@domain.com')
            ->send(new Contact($data));

        // Send Email to user
        Mail::to($data['contact-email'])
            ->send(new ContactUser($data));

        //Redirect to contact page
        return redirect('contact')->with('success', trans('auth/message.contact.success'));
    }

    public function showFrontEndView($name=null)
    {
        if(View::exists($name))
        {
            return view($name);
        }
        else
        {
            return view('admin.404');
        }
    }


    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout()
    {
        if (Sentinel::check()) {
            //Activity log
            $user = Sentinel::getuser();
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('LoggedOut');
            // Log the user out
            Sentinel::logout();
        }

        // Redirect to the users page
        return redirect('login')->with('success', 'You have successfully logged out!');
    }

    public function getcaza($provinceId){
        $provinceRow=Province::find($provinceId);

        return $provinceRow->kadaa;
    }

    public function getcity($kadaaId){
        $KadaaRow=kadaa::find($kadaaId);
        return $KadaaRow->city;
    }

    public function updateeducation(Request $request){

        if($request->Id==null || $request->Id==''){
            //dd( $request->all());
            $input = $request->all();
            $eventRow2 = education::create($input);
            $message='Event created successfully !';

        }
        else {
            education::where('Id','=',$request->Id)->update($request->all());
            //$education=education::find($request->Id);
           // $education->update($request->all(),$request->Id);
            $message='Event updated successfully !';
        }

        $educationArray = DB::table('usereducation')->join('resources', 'resources.resourceId','=','usereducation.major')->where('resourceCode','major')->where('userId',$request->userId )->orderBy('year','desc')->get();

        return response()->json(['educationuser' => $educationArray, 'message' => $message]);
    }

    public function geteducation(Request $request){
        $educationRow=education::find($request->educationId);
        return $educationRow;
    }

    public static function deleteeducation(Request $request){
        DB::table('usereducation')
            ->where('id','=',$request->educationId)
            ->delete();
     //  $educationRow=education::findorfail($request->educationId)->delete();
      //  education::destroy($request->educationId);

        $educationArray = DB::table('usereducation')->join('resources', 'resources.resourceId','=','usereducation.major')->where('resourceCode','major')->where('userId',$request->userId )->orderBy('year','desc')->get();
        $message='deleted';
        return response()->json(['educationuser' => $educationArray, 'message' => $message]);
    }

    public static function geteducationuser($userId){
        $educationArray = DB::table('usereducation')->join('resources', 'resources.resourceId','=','usereducation.major')->where('resourceCode','major')->where('userId',$userId )->orderBy('year','desc')->get();
        return response()->json(['educationuser' => $educationArray]);
    }

    public static function gettraininguser($userId){
        $trainingArray = DB::table('usertrainings')->where('userId',$userId )->orderBy('year','desc')->get();
        return response()->json(['traininguser' => $trainingArray]);
    }

    public function updatelibanpost(Request $request){


         $checkCode=DB::table('users')->where('libanpostId',$request->libanpost)->where('id','<>',$request->userId);

         if(count($checkCode)>0){
             $message='Code already used';
             $users=DB::table('users')->join('role_users', 'role_users.user_id','=','users.id')
                 ->join('libanpost', 'libanpost.id','=','users.libanpostId')
                 ->where('role_id','2')
                 ->where('libanpostId','<>','')
                 ->orderBy('first_name','desc')->get();
             return response()->json(['users' => $users,'message' => $message]);
         }
         else{
            DB::update('update users set libanpostId = ?  where id = ?', [$request->libanpost , $request->userId ]);
            $message='libanpost code added successfully !';

            $users=DB::table('users')->join('role_users', 'role_users.user_id','=','users.id')
            ->join('libanpost', 'libanpost.id','=','users.libanpostId')
            ->where('role_id','2')
            ->where('libanpostId','<>','')
            ->orderBy('first_name','desc')->get();
             $message='';
            return response()->json(['users' => $users, 'message' => $message]);
         }
    }

    public function updatetraining(Request $request){

        if($request->Id==null || $request->Id==''){
            //dd( $request->all());
            $input = $request->all();
            $eventRow2 = trainings::create($input);
            $message='training created successfully !';

        }
        else {
            trainings::where('Id','=',$request->Id)->update($request->all());
            //$education=education::find($request->Id);
            // $education->update($request->all(),$request->Id);
            $message='training updated successfully !';
        }

        $trainingArray = DB::table('usertrainings')->where('userId',$request->userId )->orderBy('year','desc')->get();

        return response()->json(['trainings' => $trainingArray, 'message' => $message]);
    }

    public static function deletetraining(Request $request){
        DB::table('usertrainings')
            ->where('Id','=',$request->Id)
            ->delete();
        //  $educationRow=education::findorfail($request->educationId)->delete();
        //  education::destroy($request->educationId);

        $trainingArray = DB::table('usertrainings')->where('userId',$request->userId )->orderBy('year','desc')->get();
        $message='deleted';
        return response()->json(['traininguser' => $trainingArray, 'message' => $message]);
    }

    public function gettraining(Request $request){
        $trainingRow=trainings::find($request->Id);
        return $trainingRow;
    }

    public function autocompleteInstitution(Request $request){

        $insvalue=$request->insvalue;

        $institutions= Resources::getbyCodeLike('institutions',$insvalue);
        foreach($institutions as $inst){
            $institution[$inst->resourceId]=$inst->resourceValue;
        }
        return response()->json($institution);
    }

    public function autocompleteTrainingCourse(Request $request){

        $coursevalue=$request->coursevalue;

        $courses= Resources::getbyCodeLike('trainingcourses',$coursevalue);
        foreach($courses as $inst){
            $course[$inst->resourceId]=$inst->resourceValue;
        }
        return response()->json($course);
    }


}
