<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class Token extends Model
{
    use HasFactory , HasFactory , Notifiable;

    protected $table = 'tokensha1';


    protected $fillable =[

        'token',
        'email',
        'date_logged',
        'expiracion',

    ];




}
