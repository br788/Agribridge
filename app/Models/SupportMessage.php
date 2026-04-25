<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

class SupportMessage extends Model
{
    //
    protected $fillable = [
        'user_id', 'subject', 'message', 'response', 'status'
    ];

    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class);
    }
}
