<?php

namespace App\wechat;

use Illuminate\Database\Eloquent\Model;

class ResourceModel extends Model
{
    protected $table = 'resource';
	protected $primaryKey="id";
	public $timestamps = false;
	protected $fillable=['type','media_id','addtime','path'];

}
