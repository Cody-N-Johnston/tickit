<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\TicketThread;
use App\Models\TicketMessage;
use App\Models\TicketMessageAttachment;
use App\Models\Group;
use App\Models\TicketStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
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
            'tickets' => TicketThread::with(['group', 'createdBy', 'assignedTo', 'ticketStatus'])
                ->paginate(10)
                ->withQueryString()
                ->through(function ($ticketThread) {
                    return [
                        'id' => $ticketThread->id,
                        'subject' => $ticketThread->subject,
                        'ticket_status_id' => $ticketThread->ticketStatus === null ? null : $ticketThread->ticketStatus->id,
                        'ticket_status' => $ticketThread->ticketStatus === null ? '' : $ticketThread->ticketStatus->status,
                        'ticket_status_description' => $ticketThread->ticketStatus === null ? '' : $ticketThread->ticketStatus->description,
                        'created_by' => $ticketThread->createdBy->name,
                        'created_by_email' => $ticketThread->createdBy->email,
                        'assigned_to_user_id' => $ticketThread->assigned_to_user_id,
                        'assigned_to' => $ticketThread->assignedTo === null ? '' : $ticketThread->assignedTo->name,
                        'group_id' => $ticketThread->group_id === null ? null : $ticketThread->group_id,
                        'group' => $ticketThread->group === null ? '' : $ticketThread->group->name,
                        'created_at' => $ticketThread->created_at,
                        'updated_at' => $ticketThread->updated_at,
                    ];
                }),
            'groups' => Group::all(),
            'ticket_statuses' => TicketStatus::all(),
            'administrators' => User::all()->where('is_admin', 1)->values()
        ]);
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
        $ticketThread->ticket_status_id = 1;
        $ticketThread->save();
        $ticketThread->messages()->create([
            'message' => $request->input('message'),
            'user_id' => $request->user()->id
        ]);

        return Redirect::back()->with('success', 'Ticket created.');
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, TicketThread $ticketThread)
    {
        $ticketThread = $ticketThread::find($request->input('ticket')['id']);
        $ticketThread->subject = $request->input('ticket')['subject'];
        $ticketThread->assigned_to_user_id = $request->input('ticket')['assigned_to_user_id'];
        $ticketThread->group_id = $request->input('ticket')['group_id'];
        $ticketThread->ticket_status_id = $request->input('ticket')['ticket_status_id'];

        $ticketThread->update(
            $request->validate([
                'ticket_status_id' => [
                    'nullable',
                    'exists:ticket_statuses.id'
                ],
                'assigned_to_user_id' => [
                    'nullable',
                    'exists:users.id'
                ],
                'group_id' => [
                    'nullable',
                    'exists:groups,id'
                ],
            ])
        );

        return Redirect::back()->with('success', 'Ticket updated.');
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
