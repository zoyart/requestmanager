<?php

namespace Database\Seeders;

use App\Models\Request;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Artur',
            'surname' =>'Tsoy',
            'company_id' => 1,
            'user_status' => 'owner',
            'position' => 'owner',
            'email' => 'stistv9@mail.ru',
            'password' => Hash::make(123123123),
        ]);

        Request::create([
            'company_id' => 1,
            'title' => 'Lorem ipsum dias lorem',
            'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
            'urgency' => 'Низкая',
        ]);

        Request::create([
            'company_id' => 1,
            'title' => 'Lorem ipsum dias lorem',
            'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
            'urgency' => 'Средняя',
        ]);

        Request::create([
            'company_id' => 1,
            'title' => 'Lorem ipsum dias lorem',
            'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
            'urgency' => 'Низкая',
        ]);

        Request::create([
            'company_id' => 1,
            'title' => 'Lorem ipsum dias lorem',
            'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
            'urgency' => 'Низкая',
        ]);

        Request::create([
            'company_id' => 1,
            'title' => 'Lorem ipsum dias lorem',
            'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
            'urgency' => 'Высокая',
        ]);

        Request::create([
            'company_id' => 1,
            'title' => 'Lorem ipsum dias lorem',
            'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
            'urgency' => 'Высокая',
        ]);

        Request::create([
            'company_id' => 1,
            'title' => 'Lorem ipsum dias lorem',
            'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
            'urgency' => 'Низкая',
        ]);

        Request::create([
            'company_id' => 1,
            'title' => 'Lorem ipsum dias lorem',
            'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
            'urgency' => 'Средняя',
        ]);

        Request::create([
            'company_id' => 1,
            'title' => 'Lorem ipsum dias lorem',
            'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
            'urgency' => 'Низкая',
        ]);
    }
}
