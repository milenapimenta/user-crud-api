<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email', 'milena@teste.com')->first()) {
            User::create([
                'name' => 'Milena',
                'email' => 'milena@teste.com',
                'password' => Hash::make('12345678', ['rounds' => 12])
            ]);
        }
        if(!User::where('email', 'kelly@celke.com.br')->first()){
            User::create([
                'name' => 'Kelly',
                'email' => 'kelly@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'jessica@celke.com.br')->first()){
            User::create([
                'name' => 'Jessica',
                'email' => 'jessica@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'gabrielly@celke.com.br')->first()){
            User::create([
                'name' => 'Gabrielly',
                'email' => 'gabrielly@celke.com.br',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'ana@teste.com')->first()) {
            User::create([
                'name' => 'Ana',
                'email' => 'ana@teste.com',
                'password' => Hash::make('senha123', ['rounds' => 12])
            ]);
        }

        if(!User::where('email', 'maria@celke.com.br')->first()){
            User::create([
                'name' => 'Maria',
                'email' => 'maria@celke.com.br',
                'password' => Hash::make('senha456', ['rounds' => 12]),
            ]);
        }

        if(!User::where('email', 'fernanda@celke.com.br')->first()){
            User::create([
                'name' => 'Fernanda',
                'email' => 'fernanda@celke.com.br',
                'password' => Hash::make('senha789', ['rounds' => 12]),
            ]);
        }

        if(!User::where('email', 'luana@celke.com.br')->first()){
            User::create([
                'name' => 'Luana',
                'email' => 'luana@celke.com.br',
                'password' => Hash::make('senha101112', ['rounds' => 12]),
            ]);
        }
        if(!User::where('email', 'claudia@teste.com')->first()) {
            User::create([
                'name' => 'Claudia',
                'email' => 'claudia@teste.com',
                'password' => Hash::make('senha12345', ['rounds' => 12])
            ]);
        }

        if(!User::where('email', 'isabela@celke.com.br')->first()){
            User::create([
                'name' => 'Isabela',
                'email' => 'isabela@celke.com.br',
                'password' => Hash::make('senha54321', ['rounds' => 12]),
            ]);
        }

        if(!User::where('email', 'roberta@celke.com.br')->first()){
            User::create([
                'name' => 'Roberta',
                'email' => 'roberta@celke.com.br',
                'password' => Hash::make('senhaabcdef', ['rounds' => 12]),
            ]);
        }

        if(!User::where('email', 'daniela@celke.com.br')->first()){
            User::create([
                'name' => 'Daniela',
                'email' => 'daniela@celke.com.br',
                'password' => Hash::make('senha09876', ['rounds' => 12]),
            ]);
        }

    }
}
