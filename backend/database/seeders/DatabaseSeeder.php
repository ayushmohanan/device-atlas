<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DeviceDetailSeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        // Call the DeviceDetailSeeder
        $this->call(DeviceDetailSeeder::class);
    }
}
