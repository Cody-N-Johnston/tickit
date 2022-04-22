<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\TicketThread;
use App\Models\TicketMessage;
use App\Models\TicketMessageAttachment;
use App\Models\TicketStatus;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(TicketThread $ticketThread)
    {
        return Inertia::render('Chat/Index', [
            'thread' => [
                'id' => $ticketThread->id,
                'subject' => $ticketThread->subject,
                'created_at' => $ticketThread->created_at,
                'updated_at' => $ticketThread->updated_at,
                'created_by_user_id' => $ticketThread->createdBy->id,
                'created_by' => $ticketThread->createdBy->name,
                'assigned_to_user_id' => $ticketThread->assignedTo->id,
                'assigned_to' => $ticketThread->assignedTo->name,
            ],
            'messages' => $ticketThread->messages()
                ->with('user')
                ->get()
                ->map(function ($message) use ($ticketThread) {
                    return [
                        'id' => $message->id,
                        'message' => $message->message,
                        'user_id' => $message->user->id,
                        'user_name' => $message->user->name,
                        'created_at' => $message->created_at,
                    ];
                })
                ->all()
        ]);
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
    public function store(Request $request)
    {
        $request->validate([
            'message' => ['required']
        ]);

        $ticketMessage = new TicketMessage();
        $ticketMessage->message = $request->input('message');
        $ticketMessage->user_id = Auth::user()->id;
        $ticketMessage->ticket_thread_id = $request->input('thread_id');

        $ticketMessage->save();
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}