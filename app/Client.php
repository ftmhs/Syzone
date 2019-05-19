<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //table name
    protected $table ='clients';
    //primary key
    public $primaryKey ='id';
    //time 
    public $timestamps =true ;
public function sites(){
        return $this->hasMany('App\Site');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
