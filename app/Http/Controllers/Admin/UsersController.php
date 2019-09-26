<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\JoshController;
use App\Http\Requests\UserRequest;
use App\User;
use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Yajra\DataTables\DataTables;
use Validator;
Use App\Mail\Restore;
use stdClass;
use App\Province;
use App\kadaa;
use App\city;
use App\Datatable;
use App\Resources;
use App\education;
use App\trainings;
use DB;

class UsersController extends JoshController
{

    /**
     * Show a list of all the users.
     *
     * @return View
     */

    public function index()
    {
        $professions=Datatable::pluck('job','id');
        $professions['all']='Select Alll';

        $max_count =Datatable::all()->count();   // We can pass max count for slider
        $max_id =Datatable::pluck('id')->max();
        $min_id =Datatable::pluck('id')->min();
        // Show the page
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

        return view('admin.users.index',compact('province','professions','max_count','kadaa','city','specials','education','major','year','langs','technology','funcskill','userEducation','trainingArray'));



       // return view('admin.users.index', compact('users','countries','province','kadaa','city'));*/
    }

    public function employees()
    {
        return view('admin.users.employees', compact('users'));
    }


    public function totalData(Request $request)
    {
        $tables = Datatable::where(function ($query) use ($request) {
            if ($request->has('idSlider2') && $request->idSlider2!=null){
                $query->whereBetween('id',$request->idSlider2);
            }
            if ($request->has('ageRadio2') && $request->ageRadio2 != null && $request->ageRadio2 != 'all') {
                if($request->ageRadio2 < 100){
                    $query->where('age', '<=', $request->ageRadio2);
                }
                else {
                    $query->where('age', '>', 50);
                }
                $query->where('age', '<=', $request->ageRadio2);
            }
            if ($request->has('professionSelect2') && $request->professionSelect2 != null && $request->professionSelect2 != "all" ) {
                $query->where('id', $request->professionSelect2);
            }
            if ($request->has('jobButton2') && $request->jobButton2 != null ) {
                $query->where('gender', $request->jobButton2);
            }
            if ($request->has('provinceId') && $request->provinceId != null ) {
                $query->where('provinceId', $request->provinceId);
            }

        })->get(['id', 'first_name','country']);

        return Datatables::of($tables)
            ->make(true);
    }

    /*
     * Pass data through ajax call
     */
    /**
     * @return mixed
     */

    public function getcaza(Request $request){
        $provinces='';
        $provinceId=$request->provinceId;
        $provinceArray=explode(',',$provinceId);

        $kadaa = kadaa::where(function ($query) use ($provinceArray) {
            foreach ($provinceArray as $work) {
                $query->orWhere('provinceId', 'like', $work);
            }
        })->get();
        return $kadaa;
    }

    public function getcity(Request $request){
        $kadaa='';
        $kadaaId=$request->kadaaId;
        $kadaaArray=explode(',',$kadaaId);

        $cities = city::where(function ($query) use ($kadaaArray) {
            foreach ($kadaaArray as $work) {
                $query->orWhere('kadaaId', 'like', $work);
            }
        })->get();
        return $cities;
    }

    public function data(Request $request)
    {

        $users = User::where(function ($query) use ($request) {
            if ($request->has('provinceId') && $request->provinceId!=null){
                foreach ($request->provinceId as $pr) {
                    $query->orWhere('provinceId', 'like', $pr);
                }
                //$query->where('provinceId',$request->provinceId);
            }
            if ($request->has('kadaaId') && $request->kadaaId!=null){
                foreach ($request->kadaaId as $ka) {
                    $query->orWhere('kadaaId', 'like', $ka);
                }
                //$query->where('kadaaId',$request->kadaaId);
            }
            if ($request->has('city') && $request->city!=null){
                foreach ($request->city as $ci) {
                    $query->orWhere('city', 'like', $ci);
                }
               // $query->where('city',$request->city);
            }
            if ($request->has('gender') && $request->gender!=null){
                foreach ($request->gender as $gn) {
                    $query->orWhere('gender', 'like', $gn);
                }
               // $query->where('gender',$request->gender);
            }
            if ($request->has('birthday') && $request->birthday!=null){
                $currentYear=date('Y');
                $arraydob=explode(';',$request->birthday);

                $firstage=(int)$currentYear-$arraydob[0];
                $secage=(int)$currentYear-$arraydob[1];


                //$query->where(DB::raw("DATE_FORMAT(dob, '%Y')",">",'1992'));
                $query->where(DB::raw("(STR_TO_DATE(dob,'%Y'))"),"<=",$firstage)
                    ->where(DB::raw("(STR_TO_DATE(dob,'%Y'))"),">=",$secage);
               // $query->where('1997','>',$firstage);
            }

            if ($request->has('workavailable') && $request->workavailable!=null){
                foreach($request->workavailable as $work){
                    $query->where('workavailable','like','%'.$work.'%');
                }
            }

            if ($request->has('worktype') && $request->worktype!=null){
                foreach($request->worktype as $worktype){
                    $query->where('worktype','like','%'.$worktype.'%');
                }
            }

            if ($request->has('equipments') && $request->equipments!=null){
                foreach($request->equipments as $equip){
                    $query->where('equipments','like','%'.$equip.'%');
                }
            }

            if ($request->has('specialneeds') && $request->specialneeds!=null){
                foreach($request->specialneeds as $spec){
                    $query->where('specialneeds','like','%'.$spec.'%');
                }
            }

            if ($request->has('highesteducation') && $request->highesteducation!=null){
                foreach ($request->highesteducation as $ed) {
                    $query->orWhere('highesteducation', 'like', $ed);
                }
                //$query->where('highesteducation',$request->highesteducation);
            }


        })->join('role_users', 'role_users.user_id','=','users.id')
            ->join('roles', 'roles.id','=','role_users.role_id')
            ->where('slug','freelancer')
            ->get(['users.id', 'first_name', 'last_name', 'email', 'phone','dob','provinceId','kadaaId','city','users.created_at','users.updated_at']);



        return DataTables::of($users)

            ->editColumn('users.updated_at',function(User $user) {
                return $user->updated_at->diffForHumans();
            })
            /*->editColumn('kadaa',function(User $user) {
                return $user->kadaa->Name;
            })*/
            ->addColumn('province',function(User $user) {
                if($user->kadaaId!='' && $user->provinceId!='' && $user->city!='')
                    return $user->provinces->Name.'/'.$user->kadaa->Name.'/'.$user->cities->Name;
                else return '';
            })

           ->editColumn('users.created_at',function(User $user) {
                return $user->created_at->diffForHumans();
            })
            ->addColumn('status',function($user){

                if($activation = Activation::completed($user)){

                    return 'Activated';}
                else
            		return 'Pending';

            })
            ->addColumn('actions',function($user) {
                $actions = '<a href='. route('admin.users.show', $user->id) .'><i class="material-icons">visibility</i></a>
                            <a href='. route('admin.users.edit', $user->id) .'><i class="material-icons">create</i></a>';

                if ((Sentinel::getUser()->id != $user->id) && ($user->id != 1)) {
                    $actions .= '<a href='. route('admin.users.confirm-delete', $user->id) .' data-toggle="modal" data-target="#delete_confirm"><i class="material-icons text-danger">delete</i></a>';
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);

    }

    public function dataemployees(Request $request)
    {

        $users = User::where(function ($query) use ($request) {

        })->join('role_users', 'role_users.user_id','=','users.id')
            ->join('roles', 'roles.id','=','role_users.role_id')
            ->where('slug','<>','freelancer')
            ->get(['users.id', 'first_name', 'last_name', 'email', 'phone','dob','provinceId','kadaaId','city','users.created_at','users.updated_at']);



        return DataTables::of($users)

            ->editColumn('users.updated_at',function(User $user) {
                return $user->updated_at->diffForHumans();
            })
            /*->editColumn('kadaa',function(User $user) {
                return $user->kadaa->Name;
            })*/
            ->addColumn('province',function(User $user) {
                if($user->kadaaId!='' && $user->provinceId!='' && $user->city!='')
                    return $user->provinces->Name.'/'.$user->kadaa->Name.'/'.$user->cities->Name;
                else return '';
            })

            ->editColumn('users.created_at',function(User $user) {
                return $user->created_at->diffForHumans();
            })
            ->addColumn('status',function($user){

                if($activation = Activation::completed($user)){

                    return 'Activated';}
                else
                    return 'Pending';

            })
            ->addColumn('actions',function($user) {
                $actions = '<a href='. route('admin.users.show', $user->id) .'><i class="material-icons">visibility</i></a>
                            <a href='. route('admin.users.edit', $user->id) .'><i class="material-icons">create</i></a>';

                if ((Sentinel::getUser()->id != $user->id) && ($user->id != 1)) {
                    $actions .= '<a href='. route('admin.users.confirm-delete', $user->id) .' data-toggle="modal" data-target="#delete_confirm"><i class="material-icons text-danger">delete</i></a>';
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);

    }


    /**
     * Create new user
     *
     * @return View
     */

    public function sendmailusers(Request $request){
        $userArray=explode(",",$request->users);

        // is new image uploaded?
        if ($file = $request->file('file')) {

            $extension = $file->extension()?: 'png';
            $folderName = '/uploads/email/';
            $destinationPath = public_path() . $folderName;
            //$safeName = str_random(10) . '.' . $extension;
            $safeName=$file->getClientOriginalName();
            $file->move($destinationPath, $safeName);
        }

        foreach($userArray as $us){
            $userRow=User::find($us);
            $emailUser=$userRow->email;
            $subject=$request->subject;



            Mail::send('emails.useremail', ['emailcontent' => $request->emailcontent], function ($m) use ($emailUser,$subject,$safeName) {
                $m->from(env('MAIL_FROM_ADDRESS'), 'B.O.T');

                $m->sender('gilbert@mail.com');
                $m->to($emailUser, $emailUser)->subject($subject);
                $m->attach('uploads/email/'.$safeName);

            });
        }
    }

    public function create()
    {
        // Get all the available groups
        $groups = Sentinel::getRoleRepository()->all();

        $countries = $this->countries;
        // Show the page
        return view('admin.users.create', compact('groups', 'countries'));
    }

    /**
     * User create form processing.
     *
     * @return Redirect
     */
    public function store(UserRequest $request)
    {
        $data = new stdClass();
        //upload image
        if ($file = $request->file('pic_file')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/uploads/users/';
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $request['pic'] = $safeName;
        }
        //check whether use should be activated by default or not
        $activate = $request->get('activate') ? true : false;

        try {
            // Register the user
            $user = Sentinel::register($request->except('_token', 'password_confirm', 'group', 'activate', 'pic_file'), $activate);

            //add user to 'User' group
            $role = Sentinel::findRoleById($request->get('group'));
            if ($role) {
                $role->users()->attach($user);
            }
            //check for activation and send activation mail if not activated by default
            if (!$request->get('activate')) {
                // Data to be used on the email view
                $data =[
                    'user_name' => $user->first_name .' '. $user->last_name,
                    'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code])
                ];
                // Send the activation code through email
                Mail::to($user->email)
                    ->send(new Register($data));
            }
            // Activity log for New user create
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('New User Created by '.Sentinel::getUser()->full_name);
            // Redirect to the home page with success menu
            return Redirect::route('admin.users.index')->with('success', trans('users/message.success.create'));

        } catch (LoginRequiredException $e) {
            $error = trans('admin/users/message.user_login_required');
        } catch (PasswordRequiredException $e) {
            $error = trans('admin/users/message.user_password_required');
        } catch (UserExistsException $e) {
            $error = trans('admin/users/message.user_exists');
        }

        // Redirect to the user creation page
        return Redirect::back()->withInput()->with('error', $error);
    }

    /**
     * User update.
     *
     * @param  int $id
     * @return View
     */
    public function edit(User $user)
    {
        // Get this user groups
        $userRoles = $user->getRoles()->pluck('name', 'id')->all();

        // Get a list of all the available groups
        $roles = Sentinel::getRoleRepository()->all();

        $status = Activation::completed($user);

        $countries = $this->countries;

        // Show the page
        return view('admin.users.edit', compact('user', 'roles', 'userRoles', 'countries', 'status'));
    }

    /**
     * User update form processing page.
     *
     * @param  User $user
     * @param UserRequest $request
     * @return Redirect
     */
    public function update(User $user, UserRequest $request)
    {
        $data = new stdClass();

        try {
            $user->update($request->except('pic_file','password','password_confirm','groups','activate'));

            if (!empty($request->password)) {

                $user->password = Hash::make($request->password);
            }

            // is new image uploaded?
            if ($file = $request->file('pic_file')) {

//                    $extension = $file->getClientOriginalExtension() ?: 'png';
                    $extension = $file->extension()?: 'png';
                    $destinationPath = public_path() . '/uploads/users/';
                    $safeName = str_random(10) . '.' . $extension;

                    $file->move($destinationPath, $safeName);
                    //delete old pic if exists
                    if (File::exists($destinationPath . $user->pic)) {
                        File::delete($destinationPath . $user->pic);
                    }
                    //save new file path into db
                    $user->pic = $safeName;
            }

            //save record
            $user->save();

            // Get the current user groups
            $userRoles = $user->roles()->pluck('id')->all();

            // Get the selected groups

            $selectedRoles = $request->get('groups');

            // Groups comparison between the groups the user currently
            // have and the groups the user wish to have.
            $rolesToAdd = array_diff($selectedRoles, $userRoles);
            $rolesToRemove = array_diff($userRoles, $selectedRoles);

            // Assign the user to groups

            foreach ($rolesToAdd as $roleId) {
                $role = Sentinel::findRoleById($roleId);
                $role->users()->attach($user);
            }

            // Remove the user from groups
            foreach ($rolesToRemove as $roleId) {
                $role = Sentinel::findRoleById($roleId);
                $role->users()->detach($user);
            }

            // Activate / De-activate user

           $status = $activation = Activation::completed($user);

            if ($request->get('activate') != $status) {
                if ($request->get('activate')) {
                    $activation = Activation::exists($user);
                    if ($activation) {
                        Activation::complete($user, $activation->code);
                    }
                } else {
                    //remove existing activation record
                    Activation::remove($user);
                    //add new record
                    Activation::create($user);
                    //send activation mail
                    $data=[
                        'user_name' =>$user->first_name .' '. $user->last_name,
                        'activationUrl' => URL::route('activate', [$user->id, Activation::exists($user)->code])
                    ];
                    // Send the activation code through email
                    Mail::to($user->email)
                        ->send(new Restore($data));

                }
            }

            // Was the user updated?
            if ($user->save()) {
                // Prepare the success message
                $success = trans('users/message.success.update');
                //Activity log for user update
                activity($user->full_name)
                    ->performedOn($user)
                    ->causedBy($user)
                    ->log('User Updated by '.Sentinel::getUser()->full_name);
                // Redirect to the user page
                return Redirect::route('admin.users.edit', $user)->with('success', $success);
            }

            // Prepare the error message
            $error = trans('users/message.error.update');
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        // Redirect to the user page
        return Redirect::route('admin.users.edit', $user)->withInput()->with('error', $error);
    }

    /**
     * Show a list of all the deleted users.
     *
     * @return View
     */
    public function getDeletedUsers()
    {
        // Grab deleted users
        $users = User::onlyTrashed()->get();

        // Show the page
        return view('admin.deleted_users', compact('users'));
    }


    /**
     * Delete Confirm
     *
     * @param   int $id
     * @return  View
     */
    public function getModalDelete($id = null)
    {
        $model = 'users';
        $confirm_route = $error = null;
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = trans('users/message.error.delete');

                return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
            }
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('users/message.user_not_found', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route = route('admin.users.delete', ['id' => $user->id]);
        return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Delete the given user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function destroy($id = null)
    {
        try {
            // Get user information
            $user = Sentinel::findById($id);

            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = trans('admin/users/message.error.delete');

                // Redirect to the user management page
                return Redirect::route('admin.users.index')->with('error', $error);
            }

            // Delete the user
            //to allow soft deleted, we are performing query on users model instead of Sentinel model
            //$user->delete();
            User::destroy($id);
            Activation::where('user_id',$user->id)->delete();
            // Prepare the success message
            $success = trans('users/message.success.delete');
            //Activity log for user delete
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('User deleted by '.Sentinel::getUser()->full_name);

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('admin/users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }
    }

    /**
     * Restore a deleted user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function getRestore($id = null)
    {

        $data = new stdClass();
        try {
            // Get user information
            $user = User::withTrashed()->find($id);

            // Restore the user
            $user->restore();

            // create activation record for user and send mail with activation link
            $data=[
                'user_name' => $user->first_name .' '. $user->last_name,
                'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code])
            ];
            Mail::to($user->email)
                ->send(new Restore($data));
            // Prepare the success message
            $success = trans('users/message.success.restored');
            //activity log
            activity($user->full_name)
                ->performedOn($user)
                ->causedBy($user)
                ->log('User restored by '.Sentinel::getUser()->full_name);
            // Redirect to the user management page
            return Redirect::route('admin.deleted_users')->with('success', $success);
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.deleted_users')->with('error', $error);
        }
    }

    /**
     * Display specified user profile.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            // Get the user information
            $user = Sentinel::findUserById($id);

            //get country name
           /* if ($user->country) {
                $user->country = $this->countries[$user->country];
            }*/

        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('users/message.user_not_found', compact('id'));

            // Redirect to the user management page
            return Redirect::route('admin.users.index')->with('error', $error);
        }

        // Show the page
        return view('admin.users.show', compact('user'));

    }

    public function passwordreset($id, Request $request)
    {
        $user = User::find( $id);
        $user->password = Hash::make($request->password);
        $user->save();
    }

    public function lockscreen($id){
        if (Sentinel::check()) {
            $user = Sentinel::findUserById($id);
            return view('admin.lockscreen', compact('user'));
        }
        return view('admin.login');
    }

    public function postLockscreen(Request $request){
        $password = Sentinel::getUser()->password;
        if(Hash::check($request->password,$password)){
            return 'success';
        }
        else{
            return 'error';
        }
    }



}
