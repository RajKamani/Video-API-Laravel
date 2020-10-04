<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
             return [
                 'title' => $this->faker->text($maxNbChars = 15),
                 'description'=> $this->faker->text($maxNbChars = 30),
                 'likes' => $this->faker->randomDigit,
                 'comments'=> function()
                 {

                     return Video::class->Comments()->count();
                 }


             ];
    }
}
