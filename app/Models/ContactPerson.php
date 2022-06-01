<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'name',
        'surname',
        'email',
        'description',
        'phone_number',
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
