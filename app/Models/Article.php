<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'created_at'];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'articles_tags');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function views()
    {
        return $this->hasOne(ArticleViews::class, 'article_id');
    }

    public function likes()
    {
        return $this->hasOne(ArticleLikes::class, 'article_id');
    }
}
