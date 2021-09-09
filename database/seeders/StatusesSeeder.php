<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::query()->create(['name' => 'К выполнению']);
        Status::query()->create(['name' => 'В процессе']);
        Status::query()->create(['name' => 'Тестирование']);
        Status::query()->create(['name' => 'Готово']);
    }
}
