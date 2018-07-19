<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{


    // table name
     protected $table = 'tickets';
     public $timestamps = true;
     // tak tahu la guarded ni apa hmm
     protected $guarded = [];

public function remarks()
{
      return $this->hasMany('App\Remark');
}

public function delete()
{
    $this->remarks()->delete();
    return parent::delete();
}

}
