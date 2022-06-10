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
        'executor_id',
        'title',
        'description',
        'urgency',
    ];

    protected $attributes = [
        'status' => 'Новая',
    ];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

}
