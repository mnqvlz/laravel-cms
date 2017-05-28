<?php

namespace App\Http\Middleware;
use App\Article;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Closure;

class EditUpdateArticle
{
    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int $id
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $articleId = $request->segments()[1];

        $article = Article::findOrFail($articleId);

        if($article->user_id !== $this->auth->getUser()->id){
            return redirect('auth/logout');
        }

        return $next($request);
    }
}
