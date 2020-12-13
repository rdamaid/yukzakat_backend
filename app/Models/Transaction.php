<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'user_id',
        'nominal',
        'jenis'
    ];

    /**
     * Relation to user
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
