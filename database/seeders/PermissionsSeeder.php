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
        Permission::create(['name' => 'Владелец',
            'app' => 'all'
        ]);

        // Права на заявку
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

        // Права на прайс листы
        Permission::create(['name' => 'Просмотр всех прайс-листов',
            'app' => 'priceList'
        ]);
        Permission::create(['name' => 'Просмотр материалов прайс-листа',
            'app' => 'priceList'
        ]);
        Permission::create(['name' => 'Просмотр работ прайс-листа',
            'app' => 'priceList'
        ]);
        Permission::create(['name' => 'Создание прайс-листов',
            'app' => 'priceList'
        ]);
        Permission::create(['name' => 'Редактирование прайс-листов',
            'app' => 'priceList'
        ]);
        Permission::create(['name' => 'Удаление прайс-листов',
            'app' => 'priceList'
        ]);
        Permission::create(['name' => 'Удаление материалов',
            'app' => 'priceList'
        ]);
        Permission::create(['name' => 'Удаление работ',
            'app' => 'priceList'
        ]);

        // Права на сотрудников
        Permission::create(['name' => 'Просмотр всех сотрудников',
            'app' => 'employee'
        ]);
        Permission::create(['name' => 'Просмотр карточки сотрудника',
            'app' => 'employee'
        ]);
        Permission::create(['name' => 'Создание сотрудника',
            'app' => 'employee'
        ]);
        Permission::create(['name' => 'Редактирование сотрудника',
            'app' => 'employee'
        ]);
        Permission::create(['name' => 'Удаление сотрудника',
            'app' => 'employee'
        ]);

        // Права на клиентов
        Permission::create(['name' => 'Просмотр всех клиентов',
            'app' => 'client'
        ]);
        Permission::create(['name' => 'Просмотр карточки клиента',
            'app' => 'client'
        ]);
        Permission::create(['name' => 'Создание клиента',
            'app' => 'client'
        ]);
        Permission::create(['name' => 'Редактирование клиента',
            'app' => 'client'
        ]);
        Permission::create(['name' => 'Удаление клиента',
            'app' => 'client'
        ]);

        Permission::create(['name' => 'Создание контактного лица',
            'app' => 'contact_person'
        ]);
        Permission::create(['name' => 'Просмотр карточки контактного лица',
            'app' => 'contact_person'
        ]);
        Permission::create(['name' => 'Редактирование контактного лица',
            'app' => 'contact_person'
        ]);
        Permission::create(['name' => 'Удаление контактного лица',
            'app' => 'contact_person'
        ]);
    }
}
