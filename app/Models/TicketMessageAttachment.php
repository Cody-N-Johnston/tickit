<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketMessageAttachment extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'location',
        'name',
        'ticket_thread_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticketThread()
    {
        return $this->hasOne(TicketThread::class);
    }
}
