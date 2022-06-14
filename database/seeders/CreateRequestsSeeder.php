<?php

namespace Database\Seeders;

use App\Models\Request;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
        for ($i = 0; $i < 20; $i++) {
            Request::create([
                'company_id' => 1,
                'user_id' => 1,
                'title' => 'Lorem ipsum dias lorem',
                'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
                'urgency' => 'Низкая',
            ]);
        }
    }
}
