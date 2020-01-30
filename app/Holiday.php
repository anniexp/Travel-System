<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
protected $fillable = [
 'name','dates','duration','typeOfTransport_id','organisator_id',
];
    //
}
