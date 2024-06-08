<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    // Setting the primary key to 'id_product'
    protected $primaryKey = 'id_product';

    // Specify the table name if different from the default plural form
    protected $table = 'products';

    // Define fillable properties to allow mass assignment
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'harga',
        'nama_penerbit',
        'status',
        'deskripsi'
    ];

    // Define the data types of the fields
    protected $casts = [
        'harga' => 'decimal:2',
    ];
}