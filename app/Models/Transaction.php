<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\TransactionDetail;

class Transaction extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi (mass assignable)
     * 
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'date',
        'total',
        'pay_total'
    ];

    /**
     * Setiap transaksi dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Satu transaksi memiliki banyak detail transaksi.
     */
    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    /**
     * Menonaktifkan timestamps jika tidak digunakan.
     */
    public $timestamps = false;
}
