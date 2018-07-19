<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{

    // table name
     protected $table = 'remarks';
	public $timestamps = true;


public function ticket()
{
    return $this->belongsTo('App\Ticket');
}


}
