<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'dni';
    public $incrementing = false; // Si 'dni' no es un campo auto-incremental
    protected $keyType = 'string';
    protected $table = 'customers';

    protected $fillable = [

    'dni',
    'id_reg',
    'id_com',
    'email',
    'name',
    'last_name',
    'address',
    'date_reg',




    ];
}
