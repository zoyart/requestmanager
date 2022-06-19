<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Request;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class TestData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  Права
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

        Permission::create(['name' => 'Просмотр склада',
            'app' => 'inventory'
        ]);
        Permission::create(['name' => 'Добавление предмета на склад',
            'app' => 'inventory'
        ]);
        Permission::create(['name' => 'Редактирование предмета на складе',
            'app' => 'inventory'
        ]);
        Permission::create(['name' => 'Удаление предмета на складе',
            'app' => 'inventory'
        ]);

        //  =====================================================================

        Company::create([
            'name' => 'ExampleCompany',
            'email' => 'xzoyart@gmail.com',
        ]);

        $user = User::create([
            'company_id' => 1,
            'name' => 'Artur',
            'surname' => 'Tsoy',
            'user_status' => 'owner',
            'position' => 'owner',
            'email' => 'xzoyart@gmail.com',
            'password' => Hash::make(123123123),
        ]);
        $user->syncPermissions('Владелец');

        $addresses = array(
            '381283, Орловская область, город Щёлково, ул. Косиора, 21',
            '569219, Омская область, город Шатура, наб. Космонавтов, 84',
            '793921, Оренбургская область, город Красногорск, спуск Гагарина, 11',
            '679799, Челябинская область, город Пушкино, бульвар Гагарина, 33',
            '091374, Магаданская область, город Клин, пл. Гагарина, 50',
        );
        $latitudeArray = array(
            '67.818301',
            '-46.358671',
            '-24.000039',
            '-87.343298',
            '9.901929',
        );
        $longitudeArray = array(
            '4.606935',
            '-178.336774',
            '10.794405',
            '92.325975',
            '179.973353',
        );
        $is_paid = array('Да', 'Нет');
        $urgencyArray = array('Низкая', 'Средняя', 'Высокая');
        $statusArray = array('Новая', 'В работе', 'Завершена');

        for ($i = 0; $i < 20; $i++) {
            $request = Request::create([
                'company_id' => 1,
                'title' => "Lorem ipsum dias lorem {$i}",
                'description' => 'Lorem ipsum dias lorem lorem ipsum dias lorem',
                'urgency' => $urgencyArray[array_rand($urgencyArray)],
                'is_paid' => $is_paid[array_rand($is_paid)],
                'status' => $statusArray[array_rand($statusArray)],
                'object_address' => $addresses[array_rand($addresses)],
                'latitude' => $latitudeArray[array_rand($latitudeArray)],
                'longitude' => $longitudeArray[array_rand($longitudeArray)],
            ]);

            $request->user()->attach(1);
        }
    }
}
