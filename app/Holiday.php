<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
protected $fillable = [
 'name','date','duration','typeOfTransport_id','organisator_id','image_id',
];
}
