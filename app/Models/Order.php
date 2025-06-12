<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_date',
        'status',
        'customer_name',
    ];

    protected $casts = [
        'order_date' => 'datetime',
    ];

    // Many-to-many relationship with products
    public function products()
    {
        return $this->belongsToMany(Products::class, 'order_product', 'order_id', 'product_id');
    }

    // Relation with user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relation with order items
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Note: the create() method belongs in the Controller, not the Model.
}
