<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos_tbl';
    protected $primaryKey = 'id';
    use HasFactory;
}
