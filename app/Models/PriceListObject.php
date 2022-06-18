<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceListObject extends Model
{
    use HasFactory;

    protected $fillable = [
      'price_list_id',
      'price',
      'vat',
      'category',
      'name',
      'type',
    ];

    public function priceList()
    {
        return $this->belongsTo(PriceList::class);
    }
}
