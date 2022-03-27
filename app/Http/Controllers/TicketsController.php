<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\TicketThread;
use App\Models\TicketMessage;
use App\Models\TicketMessageAttachment;
use Carbon\Carbon;
use Inertia\Inertia;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Tickets/Index', [
            'tickets' => TicketThread::with(['group', 'createdBy', 'assignedTo'])
                ->paginate(10)
                ->withQueryString()
                ->through(function ($ticketThread) {
                    return [
                        'id' => $ticketThread->id,
                        'subject' => $ticketThread->subject,
                        'status' => $ticketThread->status,
                        'created_by' => $ticketThread->createdBy->name,
                        'created_by_email' => $ticketThread->createdBy->email,
                        'assigned_to' => $ticketThread->assignedTo === null ? '' : $ticketThread->assignedTo->name,
                        'group' => $ticketThread->group === null ? '' : $ticketThread->group->name,
                        'created_at' => $ticketThread->created_at,
                        'updated_at' => $ticketThread->updated_at,
                    ];
                })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'max:80'],
            'message' => ['required']
        ]);

        $ticketThread = new TicketThread();
        $ticketThread->created_by_user_id = $request->user()->id;
        $ticketThread->subject = $request->input('subject');
        $ticketThread->status = 'todo';

        $ticketThread->save();
        $ticketThread->messages()->create([
            'message' => $request->input('message'),
            'user_id' => $request->user()->id
        ]);

        return Redirect::route('tickets')->with('success', 'Ticket created.');
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
