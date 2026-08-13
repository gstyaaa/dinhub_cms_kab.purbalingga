<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@dinhub-pbg.news'],
            [
                'name' => 'admin_dinhubpbg',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@purbalinggakab.go.id'],
            [
                'name' => 'Admin Dinhub',
                'password' => Hash::make('password'),
            ]
        );

        $this->call(PublicDocumentSeeder::class);
    }
}