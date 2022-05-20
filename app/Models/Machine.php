<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $table = "machines";

    protected $fillable = ['nom','description','image','lien_wiki','notes'];

    public function reservations()
    {
    	return $this->hasMany('App\Reservation');
    }

}
