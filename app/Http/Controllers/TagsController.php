<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class TagsController extends Controller
{
    public function show(Tag $tag){
        $articles =  $tag->articles()->published()->get();
        return view('articles.index', compact('articles'));
    }

    public function index(){
        return view('articles.create_tag');
    }
    public function store(){
        $data = Input::get('categories');
        Tag::create(array('name'=> $data));
        flash('Your category has been created');
        return view('articles.create_tag');
    }
}
