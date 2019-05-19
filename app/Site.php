<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //table name
    protected $table = 'sites';
    // primary key 
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true ;
     
    public function client(){
        return $this->belongsTo('App\Client');
    }
}
