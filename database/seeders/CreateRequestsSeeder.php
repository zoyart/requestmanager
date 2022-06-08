<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Seeder;

class CreateRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
