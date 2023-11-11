<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\attachment;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'ticket_code',
        'user_code',
        'user_name',
        'status',
        'type',
        'importance_level',
        'customer_name',
        'phone_number',
        'email',
        'directed_to',
        'complaint_subject',
        'complaint_description',
        'attachment',
        'created_at',
        'updated_at',

    ];

    public function attachments()
{
    return $this->hasMany(attachment::class);
}
}