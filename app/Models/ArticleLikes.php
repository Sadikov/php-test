<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleLikes extends Model
{
    use HasFactory;

    protected $table = 'articles_likes';
    public $timestamps = false;
}
