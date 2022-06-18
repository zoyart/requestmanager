<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'author',
    ];

    public function priceListObjects()
    {
        return $this->hasMany(PriceListObject::class);
    }
}
