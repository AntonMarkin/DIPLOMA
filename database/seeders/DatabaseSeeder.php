<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Department;
use App\Models\Equipment;
use App\Models\EquipmentType;
use App\Models\Office;
use App\Models\Post;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $statuses = [
            [
                'name' => 'Новый',
                'style' => 'bg-primary rounded-circle p-2',
            ],
            [
                'name' => 'В обработке',
                'style' => 'bg-warning rounded-circle p-2',
            ],
            [
                'name' => 'Завершён',
                'style' => 'bg-success rounded-circle p-2',
            ],
            [
                'name' => 'Отменён пользователем',
                'style' => 'bg-secondary rounded-circle p-2',
            ],
            [
                'name' => 'Отклонён',
                'style' => 'bg-danger rounded-circle p-2',
            ],
        ];
        $departments = [
            ['name' => 'Отдел 1'],
            ['name' => 'Отдел 2'],
        ];
        $offices = [
            [
                'name' => 'Кабинет 1',
                'department_id' => '1',
            ],
            [
                'name' => 'Кабинет 2',
                'department_id' => '1',
            ],
            [
                'name' => 'Кабинет 3',
                'department_id' => '2',
            ],
        ];
        $posts = [
            ['name' => 'Стажёр'],
            ['name' => 'Бухгалтер'],
            ['name' => 'Директор'],
            ['name' => 'Секретарь'],
            ['name' => 'Технический специалист'],
        ];
        $users = [
            [
                'login' => 'admin',
                'name' => 'Максим',
                'surname' => 'Васильев',
                'patronymic' => 'Олегович',
                'phone_number' => '89123475869',
                'post_id' => '5',
                'office_id' => '1',
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
            ],
            [
                'login' => 'tesTovik',
                'name' => 'Тест',
                'surname' => 'Тестов',
                'patronymic' => 'Тестович',
                'phone_number' => '89325634985',
                'post_id' => '1',
                'office_id' => '2',
                'password' => Hash::make('qwerty123'),
            ],
        ];
        $equipmentTypes = [
            ['name' => 'Компьютеры'],
            ['name' => 'Принтеры'],
            ['name' => 'Мониторы'],
        ];
        $equipment = [
            [
                'name' => 'Компьютер 1',
                'equipment_type_id' => '1',
                'office_id' => '1',
                'description' => '',
            ],
            [
                'name' => 'Компьютер 2',
                'equipment_type_id' => '1',
                'office_id' => '1',
                'description' => '',
            ],
            [
                'name' => 'Компьютер 3',
                'equipment_type_id' => '1',
                'office_id' => '2',
                'description' => '',
            ],
            [
                'name' => 'Принтер 1',
                'equipment_type_id' => '2',
                'office_id' => '1',
                'description' => '',
            ],
            [
                'name' => 'Монитор 1',
                'equipment_type_id' => '3',
                'office_id' => '1',
                'description' => '',
            ],
            [
                'name' => 'Принтер 2',
                'equipment_type_id' => '2',
                'office_id' => '1',
                'description' => '',
            ],
            [
                'name' => 'Принтер 3',
                'equipment_type_id' => '2',
                'office_id' => '2',
                'description' => '',
            ],
            [
                'name' => 'Монитор 2',
                'equipment_type_id' => '3',
                'office_id' => '1',
                'description' => '',
            ],
            [
                'name' => 'Монитор 3',
                'equipment_type_id' => '3',
                'office_id' => '2',
                'description' => '',
            ],
        ];

        foreach ($statuses as $item)
            Status::create($item);

        foreach ($departments as $item)
            Department::create($item);

        foreach ($offices as $item)
            Office::create($item);

        foreach ($posts as $item)
            Post::create($item);

        foreach ($users as $item)
            User::create($item);

        foreach ($equipmentTypes as $item)
            EquipmentType::create($item);

        foreach ($equipment as $item)
            Equipment::create($item);

    }
}
