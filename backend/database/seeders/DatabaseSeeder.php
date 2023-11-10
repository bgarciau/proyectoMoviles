<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        DB::table('roles')->insert([
            'name' => 'mesero',
        ]);
        DB::table('roles')->insert([
            'name' => 'cliente',
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
        ]);
        DB::table('users')->insert([
            'role_id' => 3,
            'name' => 'admin',
            'phone' => '3145683456',
            'email' => 'admin@admin.com',
            'password' => '$2y$12$8s7aZVg8V3ht2FdtuzUY8.hywjDvf9lm5DQhJJT9dMHoXtfHPCZOe',
        ]);
        DB::table('plates')->insert([
            'name' => 'Personal Clásica Pepperoni',
            'description' => 'Masa madurada, base de pomodoro artesanal, queso mozzarella, albahaca y pepperoni.',
            'price' => 16500,
            'stock' => 20,
        ]);
        DB::table('plates')->insert([
            'name' => 'Personal Clásica Salami',
            'description' => 'Masa madurada, base de pomodoro artesanal, queso mozzarella, albahaca y salami italiano.',
            'price' => 16500,
            'stock' => 25,
        ]);
        DB::table('plates')->insert([
            'name' => 'Personal Pepperoni Especial',
            'description' => 'Masa madurada, pomodoro artesanal, albahaca, queso mozzarella, pepperoni, aceitunas negras y queso parmesano.',
            'price' => 21500,
            'stock' => 30,
        ]);
        DB::table('plates')->insert([
            'name' => 'Personal Pollo al Pesto',
            'description' => 'Masa madurada, base de pesto artesanal, queso mozzarella, trozos de pechuga de pollo y champiñones.',
            'price' =>  22500,
            'stock' => 40,
        ]);
        DB::table('drinks')->insert([
            'name' => 'Limonada de Coco',
            'description' => '',
            'price' => 10900,
            'stock' => 50,
        ]);
        DB::table('drinks')->insert([
            'name' => 'Limonada Natural',
            'description' => '',
            'price' => 4500,
            'stock' => 60,
        ]);
        DB::table('drinks')->insert([
            'name' => 'Coca Cola Sabor Original',
            'description' => '',
            'price' => 4500,
            'stock' => 60,
        ]);
        DB::table('drinks')->insert([
            'name' => 'Tea Hatsu',
            'description' => '',
            'price' => 7900,
            'stock' => 60,
        ]);
    }
}
