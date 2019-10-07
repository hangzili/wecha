<?php

namespace App\index;

use Illuminate\Database\Eloquent\Model;

class AddressModel extends Model
{
     protected $table = 'index_address';
	 protected $primaryKey="address_id";
	 public $timestamps = false;
	 protected $fillable=['consignee','detailed','tel','is_default','area','user_id'];
}
