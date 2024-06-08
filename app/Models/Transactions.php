<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    // Specify the primary key
    protected $primaryKey = 'id_transaksi';

    // Define the table name if it's different from the default plural form
    protected $table = 'transactions';

    // Define fillable properties to allow mass assignment
    protected $fillable = [
        'id_client',
        'id_product',
        'tgl_transaksi',
        'jumlah',
        'status'
    ];

    // Define relationships
    public function client()
    {
        return $this->belongsTo(Clients::class, 'id_client', 'id_client');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'id_product', 'id_product');
    }
}