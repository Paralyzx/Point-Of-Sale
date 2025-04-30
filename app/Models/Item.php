<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->hasMany(Item::class);
    }
/**
 * fillable
 * 
 * @var array
 */
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'stock',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public $timestamps = false;
}

