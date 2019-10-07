<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
     protected $table = 'article';
	 protected $primaryKey="id";
	 protected $dateFormat = 'U';
	 protected $fillable=['title','author','content','img'];
}
