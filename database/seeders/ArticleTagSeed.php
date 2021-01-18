<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTagSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()->count(10)->create();
        $tagIds = Tag::query()->select('id')->get()->pluck('id')->toArray();
        $articles = Article::all();
        foreach ($articles as $article) {
            $insertData = [];
            $articleTagIdKeys = array_rand($tagIds, rand(2, 7));
            foreach ($articleTagIdKeys as $tagIdKey) {
                $insertData[] = [
                    'article_id' => $article->id,
                    'tag_id' => $tagIds[$tagIdKey]
                ];
            }
            DB::table('articles_tags')->insert($insertData);
        }
    }
}
