<?php

namespace App\Http\Livewire\Frontend\Machines;

use App\Models\Machine;
use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithFileUploads;
use DateTime;
use DateTimeZone;


class ReservationMachine extends Component
{


    use WithFileUploads;

    public $id_machine;
    public $nom;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;


    public $week1;
    public $week2;

    public $reservation_array = [];


    public function render()
    {
        return view('livewire.frontend.machines.reservation-machine')->layout('layouts.frontend.site');
    }

    public function mount($id_machine)
    {

        $machine = Machine::where('id',  $id_machine)->first();


        $this->id_machine = $machine->id;
        $this->nom = $machine->nom;
        $this->image = $machine->image;
        $this->description = $machine->description;
        $this->lien_wiki = $machine->lien_wiki;
        $this->notes = $machine->notes;

        $today = new DateTime('now', new DateTimeZone('UTC'));
        $day_of_week = $today->format('w');
        $today->modify('- ' . (($day_of_week - 1 + 7) % 7) . 'days');
        $sunday = clone $today;
        $sunday->modify('+ 6 days');
        
        $this->week1 = $this->getBetweenDates($today->format('Y-m-d') ,$sunday->format('Y-m-d') );

        $reservations = Reservation::whereBetween('date_seance', [$today, $sunday])->get();
        $times = [10,11,12,13,14,15,16,17];
        $deja = false;
        $times_day=[];
        $cell_obj = [];
        foreach($this->week1 as $day){
           $times_day['date'] = $day;
           $times_obj=[];
            foreach($times as $time){
               
                $cell_obj = [];
                $cell_obj['reserve'] = false;
                $cell_obj['color'] = 'green';
                $cell_obj['time'] =$time;
                $cell_obj['date'] = $day;

                foreach($reservations as $reserv){
                    if($reserv->date_seance == $day){
                        $cell_obj['reserve'] = true;
                        $cell_obj['color'] = 'red';
                        $cell_obj['time'] =$time;
                        $cell_obj['date'] = $day;
                       
                       
                    }
                       
                }

                array_push( $times_obj,$cell_obj);
            }
            $times_day['seances']=$times_obj;
            array_push( $this->reservation_array,$times_day);
            $times_day=[];
        }



    }

    function getBetweenDates($startDate, $endDate)
    {
        $rangArray = [];
            
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);
             
        for ($currentDate = $startDate; $currentDate <= $endDate; 
                                        $currentDate += (86400)) {
                                                
            $date = date('Y-m-d', $currentDate);
            $rangArray[] = $date;
        }
  
        return $rangArray;
    }
  
}
