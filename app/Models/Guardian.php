<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Guardian extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'relationship_to_student',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
