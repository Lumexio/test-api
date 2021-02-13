<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos_tbl';
    protected $primaryKey = 'id';
    use HasFactory;
}
