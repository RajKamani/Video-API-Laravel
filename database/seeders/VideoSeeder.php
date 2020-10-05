<?php

namespace Database\Seeders;

use App\Models\Video;
use Database\Factories\VideoFactory;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Video::factory()
            ->times(50)
            ->create();


    }
}
