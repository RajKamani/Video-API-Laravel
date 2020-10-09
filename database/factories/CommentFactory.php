<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'video_id' => function()
            {
                return Video::all()->random();
            },
            'user' => $this->faker->firstNameMale,
            'comment_text' => $this->faker->text($maxNbChars = 30),
        ];
    }
}
