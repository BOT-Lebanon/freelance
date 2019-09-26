<?php namespace App;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\UserRoles;

class User extends EloquentUser {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes to be fillable from the model.
	 *
	 * A dirty hack to allow fields to be fillable by calling empty fillable array
	 *
	 * @var array
	 */
	protected $fillable = ['pic','email','password','phone','first_name','last_name','dob','gender','country','provinceId','kadaaId','city','address',
        'specialneeds','worktimings','currentwork','graduated','highesteducation','workavailable',
        'worktype','registerstep','equipments','skills','interests','workposition','worktime'];
	protected $guarded = ['id'];
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	* To allow soft deletes
	*/
	use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $appends = ['full_name'];

   // public function Roles() {
    //    return $this->hasOne(UserRoles::class,'user_id','id' );
   // }
    public function RoleName()
    {
        return $this->hasMany( UserRoles::class,'user_id','id' );
    }


    public function getFullNameAttribute()
    {
        return str_limit($this->first_name . ' ' . $this->last_name, 30);
    }
    public function Countries() {
        return $this->belongsTo( Country::class );
    }
	public function provinces() {
        return $this->belongsTo( 'App\Province' ,'provinceId','Id');
    }
	public function kadaa() {
        return $this->belongsTo( 'App\kadaa','kadaaId','Id');
    }
	public function city() {
        return $this->belongsTo( 'App\city','city','Id');
    }
    public function cities() {
        return $this->belongsTo( 'App\city','city','Id');
    }
    public function libanpost() {
        return $this->belongsTo( libanpost::class );
    }
	
	public static function findbyMail($email) {
        $id='';
        $userRow=User::where('email',$email)->first();

		if($userRow)
		    $id=$userRow->id;

		return $id;
	}

    public static function findbyPhone($phone) {
        $id='';
        $userRow=User::where('phone',$phone)->first();

        if($userRow)
            $id=$userRow->id;

        return $id;
    }

}
