<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = "USUARIO";
    public $timestamps = false;

    protected $fillable = ["nombre_usuario", "apellido_usuario", "correo_usuario", "contraseña_usuario", "telefono_usuario", "CARGO_ID", "ROL_ID"];
}
