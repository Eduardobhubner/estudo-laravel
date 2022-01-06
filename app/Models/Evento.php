<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $casts = [
        'items' =>'array' //precisa informar para o laravel que items que chega do front é um array, pa
    ];

    protected $datas = ['date'];

}
