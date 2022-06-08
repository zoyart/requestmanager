<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Просмотр всех заявок',
                            'app' => 'request'
        ]);
        Permission::create(['name' => 'Просмотр карточки заявки',
                            'app' => 'request'
        ]);
        Permission::create(['name' => 'Создание заявки',
                            'app' => 'request'
        ]);
        Permission::create(['name' => 'Редактирование заявки',
                            'app' => 'request'
        ]);
        Permission::create(['name' => 'Удаление заявки',
                            'app' => 'request'
        ]);

//        Permission::create([]);
//        Permission::create([]);
//        Permission::create([]);
//        Permission::create([]);
//        Permission::create([]);
//        Permission::create([]);

    }
}
