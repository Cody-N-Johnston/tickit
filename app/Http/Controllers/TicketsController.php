<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketThread;
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
//        return Inertia::render('Tickets/Index', [
//            'tickets' => TicketThread::with('group')
//                ->paginate(10)
//                ->withQueryString()
//                ->through(function ($ticketThread) {
//                    return [
//                        'id' => $ticketThread->id,
//                        'subject' => $ticketThread->subject,
//                        'status' => $ticketThread->status,
//                        'created_by' => $ticketThread->created_by_user_id,
//                        'assigned_to' => $ticketThread->assigned_to_user_id,
//                        'group' => $ticketThread->group->name,
//                        'created_at' => $ticketThread->created_at,
//                        'updated_at' => $ticketThread->updated_at,
//                    ];
//                })
//        ]);
        return Inertia::render('Tickets/Index');
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
