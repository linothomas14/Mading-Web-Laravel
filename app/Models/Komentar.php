<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama",
        "email",
        "isi_komentar",
        "artikel_id"	 
    ];
}
