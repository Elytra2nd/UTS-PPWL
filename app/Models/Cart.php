<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'obat_id',
        'jumlah',
        'total_harga',
    ];

    /**
     * Relasi ke model User.
     * Setiap cart dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Obat.
     * Setiap cart berisi satu obat.
     */
    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}