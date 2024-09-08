<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'file',
        'file_name',
        'address_from',
        'category',
        'sender_id',
        'sended_date',
        'return_by',
        'return_date',
        'recieved_by',
        'recieved_date',
        'fowarded_by',
        'fowarded_date',
        'fowarded_to',
        'accepted_by',
        'accepted_date',
        'recipient_id',
        'active_years',
        'inactive_years',
        'stage',
        'status',
        'type',
        'outgoing_email',
        'lastcode'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function head(){
        return $this->belongsTo(User::class, 'accepted_by');
    }

    public function recieved()
    {
        return $this->belongsTo(User::class, 'recieved_by');
    }


    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    

    public function history()
    {
        return $this->hasMany(DocumentHistory::class,  'id');
    }

    public function sendedto()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function return()
    {
        return $this->belongsTo(User::class, 'return_by');
    }

    public function forwarded(){
        return $this->belongsTo(User::class, 'fowarded_to');
    }

    public function accepted(){
        return $this->belongsTo(User::class, 'accepted_by');
    }
}
