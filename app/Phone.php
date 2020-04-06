<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $guarded = [];

    public function useR(){
        return $this->belongsTo('App\User');
    }
}
