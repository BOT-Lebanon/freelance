<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class correspondance extends Model
{
    //
	protected $guarded = ['id'];
	protected $fillable = ['receiverEmail', 'subject', 'summernote','senderId','senderEmail','content','receiverId'];
	
	public function sender()
    {
        return $this->belongsto('App\User', 'senderId','id');
    }
	
	public function receiver()
    {
        return $this->belongsto('App\User', 'receiverId','id');
    }

	
	public function receiverMail()
    {
        return $this->belongsto('App\User', 'receiverEmail','email');
    }
}
