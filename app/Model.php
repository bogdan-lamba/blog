<?php

namespace App;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    //
    //protected $fillable = ['title','body'];//ok to mass assign these fields
    //protected $guarded = ['user_id'];//dont allow mass assign for this field
    protected $guarded = [];//dont allow mass assign for any field

}