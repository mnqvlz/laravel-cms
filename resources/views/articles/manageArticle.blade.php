@extends('layout')


@section('content')
    <a href ="{{url('/articles/create')}}" class="btn btn-default" style="float:right"> Create Article </a>
    <h1>Manage Articles</h1>

    <hr>

    @foreach ($articles as $article)

        <article>
            <h2>
                <a href ="{{url('/articles', $article->id)}}">	{{$article->title}} </a>
                {{--<a href="{{url('/articles/' . $article->id)}}" class="btn btn-danger" style="float:right"><span class="glyphicon glyphicon-trash"></span></a>--}}
                <a href="{{url('/articles/' . $article->id .  '/edit')}}" class="btn btn-primary" style="float:right"><span class="glyphicon glyphicon-pencil"></span></a>
            </h2>

            <div class="body">

                    <b>Posted by: {{$article->user->name}}</b><br>{{$article->body}}

            </div>
        </article>
    @endforeach

@stop