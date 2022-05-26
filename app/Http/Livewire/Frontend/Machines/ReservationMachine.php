<?php

namespace App\Http\Livewire\Frontend\Machines;

use App\Models\Reservation;
use App\Models\Machine;
use Livewire\Component;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Auth;

class ReservationMachine extends Component
{



    public $id_machine;
    public $nom;
    public $description;
    public $image;
    public $lien_wiki;
    public $notes;

    public $project;
    public $notes_reservation;

    public $week1;
    public $week2;

    public $reservation_array = [];

    protected $rules = [
        'project' => 'required',

    ];

    protected $messages = [
        'project.required' => 'Le projet est Obligatoire.',

    ];

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

        $this->week1 = $this->getBetweenDates($today->format('Y-m-d'), $sunday->format('Y-m-d'));

        $reservations = Reservation::whereBetween('date_seance', [$today, $sunday])->get();
        $times = [10, 11, 12, 13, 14, 15, 16, 17];

        $times_day = [];
        $cell_obj = [];
        foreach ($this->week1 as $day) {
            $times_day['date'] = $day;
            $times_obj = [];
            foreach ($times as $time) {

                $cell_obj = [];
                $cell_obj['disponible'] = true;
                $cell_obj['color'] = 'green';
                $cell_obj['time'] = $time;
                $cell_obj['date'] = $day;

                foreach ($reservations as $reserv) {
                    if ($reserv->date_seance == $day && $reserv->numero_seance == $time) {
                        $cell_obj['disponible'] = false;
                        $cell_obj['color'] = 'red';
                        $cell_obj['time'] = $time;
                        $cell_obj['date'] = $day;
                    }
                }

                array_push($times_obj, $cell_obj);
            }
            $times_day['seances'] = $times_obj;
            array_push($this->reservation_array, $times_day);
            $times_day = [];
        }
    }

    public function reserverSeance($d, $t)
    {
        $this->validate();

        $reservation = new Reservation();
        $this->notes_reservation = $d + $t;

        $reservation->project = $this->project;
        $reservation->machine_id = $this->id_machine;
        $reservation->project_id = 0;
        $reservation->adherent_id = Auth::user()->id;
        $reservation->date_seance = $d;
        $reservation->numero_seance = $t;
        $reservation->notes = $this->notes;



        $reservation->save();

        session()->flash('message', 'Votre réservation a été bien enregistré.');

        //return redirect()->to('/frontend/machines');

    }


    function getBetweenDates($startDate, $endDate)
    {
        $rangArray = [];

        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        for (
            $currentDate = $startDate;
            $currentDate <= $endDate;
            $currentDate += (86400)
        ) {

            $date = date('Y-m-d', $currentDate);
            $rangArray[] = $date;
        }

        return $rangArray;
    }

    public function test($seance)
    {
        $this->notes_reservation = $seance;
    }
}
class cell_obj
{
    public $disponible;
    public  $color;
    public   $time;
    public $date;
}
