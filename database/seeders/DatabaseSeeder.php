<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Curso;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Curso::create([
            'nombre_curso' => 'Bienvenida',
            'descripcion_curso' => 'Video de bienvenida',
            'AREA_ID' => 2,
            'ENCARGADO_ID' => 1
        ]);

        // Usuario::create([
        //     'nombre_usuario' => 'Eliana',
        //     'apellido_usuario' => 'Pedraza',
        //     'correo_usuario' => 'elianapedraza@eml.co',
        //     'contraseña_usuario' => 'eliana123',
        //     'telefono_usuario' => '3214495300',
        //     'CARGO_ID' => 1,
        //     'ROL_ID' => 3

        // ]);
    }
}
