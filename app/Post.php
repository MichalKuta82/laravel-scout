<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use Searchable;

  protected $fillable = [
      'title', 'content', 'published'
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  //overwritting table name
  // public function searchableAs()
  // {
  // 	return 'post_index';
  // }

  //overwritting which elements are searchable
  // public function toSearchableArray()
  // {
  // 	return [
  // 		'title', 'content',
  // 	];
  // }
}
