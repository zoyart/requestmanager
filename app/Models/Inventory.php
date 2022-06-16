<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_number',
        'name',
        'comment',
        'price',
        'cost_price',
        'count',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
