<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\TicketThread;
use App\Models\TicketMessage;
use App\Models\TicketMessageAttachment;
use App\Models\TicketStatus;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class TicketMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request, TicketMessage $ticketMessage)
    {
        return Inertia::render('Chat/Index', [
            'tickets' => TicketMessage::with(['ticketThread'])
                ->withQueryString()
                ->through(function ($ticketMessage) {
                    return [
                        'id' => $ticketMessage->id,
                        'message' => $ticketMessage->message,
                        'created_at' => $ticketMessage->created_at,
                        'updated_at' => $ticketMessage->updated_at,
                    ];
                })
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
        //
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
