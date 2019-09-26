<?php

namespace App\Http\Controllers;

use App\correspondance;
use App\User;
use Illuminate\Http\Request;
use Sentinel;
use Redirect;

class CorrespondanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$emailUser=Sentinel::getUser()->email;
		$inbox = correspondance::where('receiverEmail', $emailUser)->orderBy('created_at', 'desc')->get();

        return view('inbox', compact('inbox'));
    }
	
	public function sent()
    {
        //
		$emailUser=Sentinel::getUser()->email;
		$SenderId=Sentinel::getUser()->id;
		$sent = correspondance::where('senderEmail', $emailUser)
								->where('senderId', $SenderId)
								->orderBy('created_at', 'desc')->get();

        return view('sent', compact('sent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$compose = $request->all();
		
		$compose['receiverId']=User::findbyMail($request->receiverEmail);
		$compose['senderEmail']=Sentinel::getUser()->email;
		$compose['senderId']=Sentinel::getUser()->id;
		$insert=correspondance::create($compose);
		return Redirect::route('inbox.sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\correspondance  $correspondance
     * @return \Illuminate\Http\Response
     */
    public function show(correspondance $correspondance)
    {
		
        $correspondance->isRead = '1';
		$correspondance->save();
		//$row=$correspondance->first();
		
		return view('view_mail',compact('correspondance'));
    }

    public function reply(correspondance $correspondance)
    {
        return view('reply',compact('correspondance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\correspondance  $correspondance
     * @return \Illuminate\Http\Response
     */
    public function edit(correspondance $correspondance)
    {
        //
    }

    public function sendreply(Request $request)
    {
       $compose = $request->all();

        $compose['receiverId']=User::findbyMail($request->receiverEmail);
        $compose['senderEmail']=Sentinel::getUser()->email;
        $compose['senderId']=Sentinel::getUser()->id;
        $insert=correspondance::create($compose);
        return Redirect::route('inbox.sent');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\correspondance  $correspondance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, correspondance $correspondance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\correspondance  $correspondance
     * @return \Illuminate\Http\Response
     */
    public function destroy(correspondance $correspondance)
    {
        //
    }
}
