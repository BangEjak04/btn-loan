<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'developer',
        'location',
        'price_range_start',
        'price_range_end',
        'status',
        'notes',
        'price',
        'address',
        'land_area',
        'building_area',
        'id_card',
        'payment_method',
        'payment_proof',
    ];

    protected $casts = [
        'price_range_start' => 'decimal:2',
        'price_range_end' => 'decimal:2',
        'price' => 'decimal:2',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(ApplicationComment::class)->orderBy('created_at', 'asc');
    }
}
