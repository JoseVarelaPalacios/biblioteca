<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    /** @use HasFactory<\Database\Factories\LibrosFactory> */
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['isbn','nombre','genero_id','sinopsis','paginas','fecha_publicacion','image'];
}
