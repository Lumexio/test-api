<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rols_tbl';
    protected $primaryKey = 'id';
    use HasFactory;
}
