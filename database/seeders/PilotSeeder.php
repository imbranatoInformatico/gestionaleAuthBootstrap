<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pilot;


class PilotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pilot::factory()->count(50)->create();
    }
}
