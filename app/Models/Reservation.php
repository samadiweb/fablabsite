<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";

    protected $fillable = ['machine_id','project_id','adherent_id','date_reservation','date_seance','numero_seance','notes'];

    public function adherent()
    {
    	return $this->belongsTo('App\User');
    }

    public function Projet()
    {
    	return $this->belongsTo('App\Project');
    }

    public function Machine()
    {
    	return $this->belongsTo('App\Machine');
    }

}
