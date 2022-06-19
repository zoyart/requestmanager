<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Model
 * @mixin Builder
 */
class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'title',
        'description',
        'urgency',
        'object_address',
        'latitude',
        'longitude',
        'status',
        'serial_number',
        'inventory_number',
        'request_type',
        'is_paid',
    ];

    protected $attributes = [
        'status' => 'Новая',
    ];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
