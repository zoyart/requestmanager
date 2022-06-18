<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'company_id',
        'author',
        'message',
        'status',
        'file',
    ];

    protected $attributes = [
        'status' => 'Новая',
    ];


    public function request()
    {
        return $this->belongsTo(Request::class);
    }
}
