<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_client';

    // Specify the table name if different from the default plural form
    protected $table = 'clients';

    // Define fillable properties to allow mass assignment
    protected $fillable = [
        'id_user',
        'nama',
        'tanggal_lahir',
        'no_telp',
        'alamat',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}