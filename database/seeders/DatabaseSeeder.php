<?php

namespace Database\Seeders;
use App\Models\api\v1\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([

            VideoSeeder::class,
            CommentSeeder::class
        ]);

    }
}
