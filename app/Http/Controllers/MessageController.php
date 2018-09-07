<?php

namespace App\Http\Controllers;

use App\Message;
use App\MessageBody;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            if ($sender_id != auth()->id()) {
                return;
            }
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

        $message = Message::where('sender_id', $recipient_id)->where('recipient_id', $sender_id)->first();

        if ($message === null) {
            $message = Message::updateOrCreate([
                'sender_id' => $sender_id,
                'recipient_id' => $recipient_id,
            ], [
                'sender_id' => $sender_id,
                'recipient_id' => $recipient_id,
            ]);
        }


        $message_body = MessageBody::create([
            'message_id' => $message->id,
            'sender_id' => $sender_id,
            'body' => $body,
        ]);

        $message->updated_at = Carbon::now();
        $message->save();

        return response()->json($message_body);
    }

 public function store_with_auth(Request $r)
    {
        //
        if($r->has('sender_id')) {
            $sender_id = $r->input('sender_id');
            if ($sender_id != auth()->id()) {
                return;
            }
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

        $message = Message::where('sender_id', $recipient_id)->where('recipient_id', $sender_id)->first();

        if ($message === null) {
            $message = Message::updateOrCreate([
                'sender_id' => $sender_id,
                'recipient_id' => $recipient_id,
            ], [
                'sender_id' => $sender_id,
                'recipient_id' => $recipient_id,
            ]);
        }


        $message_body = MessageBody::create([
            'message_id' => $message->id,
            'sender_id' => $sender_id,
            'body' => $body,
        ]);

        $message->updated_at = Carbon::now();
        $message->save();

        return redirect()->back();
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

        $messages = Message::where('sender_id', $user->id)->orWhere('recipient_id', $user->id)->orderBy('updated_at', 'desc')->with('mb')->with('sender')->with('recipient')->paginate(3);

        return $messages;
    }

    public function getAllMessages(Request $req)
    {
        $user = auth()->user();

        $messages = Message::where('sender_id', $user->id)->orWhere('recipient_id', $user->id)->orderBy('updated_at', 'desc')->with('mb')->with('sender')->with('recipient')->paginate(10);

        return $messages;
    }

    public function getSingleMessages(Request $r)
    {
        $user = auth()->user();

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

        if($r->has('message_id')) {
            $message_id = $r->input('message_id');  
        } else {
            return;
        }

        if ($sender_id == $user->id || $recipient_id == $user->id) {
            $message = Message::find($message_id);

            if(($message->recipient_id != $recipient_id) || ($message->sender_id != $sender_id))
            {
                return;
            }

            $msg_body = $message->mb;

            foreach ($msg_body as $mb) {
                $mb->read_at = Carbon::now();
                $mb->save();
            }

            return $msg_body;
        }

        return;
    }
}
