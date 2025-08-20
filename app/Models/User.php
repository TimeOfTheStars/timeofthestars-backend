<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // Разрешаем массовое присвоение этих полей
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // ... остальные настройки модели
}
