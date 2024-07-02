<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario administrador
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'tipo' => 'admin',
            'especialidad' => null,
            'cedula_profesional' => Str::random(10),
            'remember_token' => Str::random(10),
        ]);

        // Crear una secretaria
        User::create([
            'name' => 'Secretary User',
            'email' => 'secretaria@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secretaria'),
            'tipo' => 'secretaria',
            'especialidad' => null,
            'cedula_profesional' => Str::random(10),
            'remember_token' => Str::random(10),
        ]);

        // Crear un medico
        User::create([
            'name' => 'Doctor User',
            'email' => 'doctor@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('doctor'),
            'tipo' => 'doctor',
            'especialidad' => 'medicina_general',
            'cedula_profesional' => Str::random(10),
            'remember_token' => Str::random(10),
        ]);

        // Crear una enfermera
        User::create([
            'name' => 'Nurse User',
            'email' => 'enfermera@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('enfermera'),
            'tipo' => 'enfermero',
            'especialidad' => null,
            'cedula_profesional' => Str::random(10),
            'remember_token' => Str::random(10),
        ]);

        // Crear 10 usuarios aleatorios utilizando el factory
        User::factory()->count(10)->create();
    }
}
