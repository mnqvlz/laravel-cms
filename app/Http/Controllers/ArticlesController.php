<?php

namespace App\Http\Controllers;

use App\Article; 

use App\Http\Requests;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Auth;
use App\Tag;

// use Request; 

class ArticlesController extends Controller
{
	protected $article;
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('editArticle', ['only' => 'edit', 'update' ]);
	}

	public function index(){

			$latest = Article::latest()->first();
			$articles = Article::latest('published_at')->published()->get();
			return view('articles.index', compact('articles', 'latest'));
	}

	public function show(Article $article){

		return view('articles.show', compact('article'));
	}

	public function create(){

//			return redirect('articles');
		$tags = Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
	}

	public function store(ArticleRequest $request){
		$this->createArticle($request);

//		$tagIds = $request->input('tags');
//
//		$article->tags()->attach($tagIds);


		flash('Your article has been created');
		return redirect('articles');
	}

	public function edit(Article $article){

        		$tags = Tag::lists('name', 'id');
        		return view('articles.edit', compact('article', 'tags'));


	}


	public function manage(){
		$latest = Article::latest()->first();
		$articles = Article::latest('published_at')->published()->get();
		return view('articles.manageArticle', compact('articles', 'latest'));
	}



	public function update(ArticleRequest $request, Article $article){
		$article->update($request->all());
		$this->syncTags($article, $request->input('tag_list'));
		return redirect('articles');

	}

	/**
	 * Sync up the list of tags
	 * @param Article $article
	 */
	private function syncTags(Article $article, array $tags)
	{
		$article->tags()->sync($tags);
	}


	private function createArticle(ArticleRequest $request){
		$article = Auth::user()->articles()->create($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return $article;
	}

}
