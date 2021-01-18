<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Models\Article;
use App\Models\ArticleLikes;
use App\Models\ArticleViews;
use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('articles', [
            'articles' => Article::with('tags')->paginate(3)
        ]);
    }

    /**
     * @param $slug
     * @return View
     */
    public function article($slug): View
    {
        return view('article', [
            'article' => Article::with(['comments', 'views'])->whereSlug($slug)->first()
        ]);
    }

    /**
     * @param AddCommentRequest $request
     * @return Response
     */
    public function commentAdd(AddCommentRequest $request): Response
    {
        $comment =  Comment::create([
            'subject' => $request->post('subject'),
            'text' => $request->post('text'),
            'article_id' => $request->post('articleId'),
        ]);
        return $comment ? response('ok') : response('error', 500);
    }

    /**
     * @param $id
     * @return Response
     */
    public function addView($id): Response
    {
        $articleViews = ArticleViews::where('article_id', '=', $id)->first();
        if(!$articleViews) {
            $articleViews = new ArticleViews();
            $articleViews->article_id = $id;
            $articleViews->count = 0;
        }
        $articleViews->count = ++$articleViews->count;
        $articleViews->save();
        return response($articleViews->count);
    }

    /**
     * @param $id
     * @return Response
     */
    public function addLike($id): Response
    {
        $articleLikes = ArticleLikes::where('article_id', '=', $id)->first();
        if(!$articleLikes) {
            $articleLikes = new ArticleLikes();
            $articleLikes->article_id = $id;
            $articleLikes->count = 0;
        }
        $articleLikes->count = ++$articleLikes->count;
        $articleLikes->save();
        return response($articleLikes->count);
    }
}
