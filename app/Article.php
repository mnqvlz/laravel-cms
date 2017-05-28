<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [

    'title', 
    'body', 
    'published_at', 
    'user_id'

	];

	protected $dates = ['published_at'];


	//scope
	public function scopePublished($query){
		$query->where('published_at', '<=', Carbon::now());
	}

	public function scopeUnpublished($query){
		$query->where('published_at', '>', Carbon::now());
	}

	//mutator
	public function setPublishedAtAttribute($date){
		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
	}

	public function getPublishedAtAttribute($date){
		return Carbon::parse($date)->format('Y-m-d');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function tags(){
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}

	/**
	 * Get a list of tag ids associated with the current article.
	 *
	 * @return array
     */
	public function getTagListAttribute(){
	 return	$this->tags->lists('id')->all();
	}
}
