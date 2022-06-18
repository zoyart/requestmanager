<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function priceLists()
    {
        return $this->hasMany(PriceList::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
