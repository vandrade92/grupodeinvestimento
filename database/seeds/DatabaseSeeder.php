<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'cpf'         => '11407014609',
        'name'        => 'Vagner Andrade',
        'phone'       => '31992914510',
        'birth'       => '1992-08-05',
        'gender'      => 'M',
        'email'       => 'vagner.matias@gmail.com',
        'password'    => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
    ]);

        // $this->call(UsersTableSeeder::class);
    }
}
