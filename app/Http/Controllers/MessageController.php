<?php

namespace App\Http\Controllers;

use App\Message;
use App\MessageBody;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //
        if($r->has('sender_id')) {
            $sender_id = $r->input('sender_id');
        } else {
            return;
        }
        if($r->has('recipient_id')) {
            $recipient_id = $r->input('recipient_id');
        } else {
            return;
        }
        if($r->has('body')) {
            $body = $r->input('body');
        } else {
            return;
        }

        $message = Message::updateOrCreate([
            'sender_id' => $sender_id,
            'recipient_id' => $recipient_id,
        ], [
            'sender_id' => $sender_id,
            'recipient_id' => $recipient_id,
        ]);

        $message_body = MessageBody::create([
            'message_id' => $message->id,
            'sender_id' => $message->sender_id,
            'body' => $body,
        ]);
        return response()->json("Message Sent Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    public function getMessages(Request $req)
    {
        $user = auth()->user();

        $messages = Message::where('sender_id', 1)->orWhere('recipient_id', 1)->orderBy('created_at')->with('mb')->with('sender')->with('recipient')->paginate(3);

        return $messages;
    }
}
