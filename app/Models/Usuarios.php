<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{

    use Notifiable;

    protected $table = 'usuarios';

    protected $fillable=[
        'centro',
        'nombre',
        'departamento',
        'email',
        'password',
        'estatus',
        'verificado'
    ];


    use HasFactory;
}
