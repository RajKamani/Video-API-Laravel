<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [

        'title','description','likes','comments'
    ];


    public function Comments(){

        return $this->hasMany(Comment::class);
    }
}
