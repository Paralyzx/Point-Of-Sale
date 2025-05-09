<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        'name'
    ];
    public $timestamps = false;
}
