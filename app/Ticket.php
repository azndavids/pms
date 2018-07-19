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
    // delete all related photos 
    $this->remarks()->delete();
    // as suggested by Dirk in comment,
    // it's an uglier alternative, but faster
    // Photo::where("user_id", $this->id)->delete()

    // delete the user
    return parent::delete();
}

}
