<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\StatusEnum;
use App\Models\Category;
use App\Models\Country;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::count()) {
            User::factory(1)->create([
                'email' => 'admin@admin.com',
            ]);
        }

        if (!Category::count()) {
            Category::factory(5)->create();
        }

        if (!Country::count()) {
            Country::factory(5)->create();
        }

        if (!Status::count()) {
            foreach (StatusEnum::cases() as $status) {
                Status::create([
                    'name' => $status->value,
                ]);
            }
        }
    }
}
