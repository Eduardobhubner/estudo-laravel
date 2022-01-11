<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array' //precisa informar para o laravel que items que chega do front é um array, pa
    ];

    protected $datas = ['date'];


    // O laravel deixa atualizar qualquer campo
    protected $guarded = [];

    public function user()
    {
        // pertence a apenas um usuário   
        return $this->belongsTo('App\Models\User');
    }

    public function users(){
        // pertence a muitos usuários
        return $this->belongsToMany('App\Models\User');
    }
}
