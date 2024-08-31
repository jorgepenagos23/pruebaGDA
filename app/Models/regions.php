<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regions extends Model
{
    use HasFactory;


    protected   $table = 'regions';

    protected $fillable =[
        'id_reg',
        'description',
        'status',
    ];

}
