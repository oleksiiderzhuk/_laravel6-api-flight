<?php

namespace App\Services\v1;

use App\Flight;

class FlightService{
    public function getFlights(){
        return $this->filterFlights(Flight::all()); 
    }

    public function getFlight($flightNumber){
        return $this->filterFlights(Flight::where('flightNumber', $flightNumber)->get()); 
    }

    protected function filterFlights($flights){
        $data = [];

        foreach ($flights as $flight){
            $entry = [
                'flightNumber' => $flight->flightNumber,
                'href' => route('flights.show', $flight->flightNumber),
                'status' => $flight->status,
            ];

            $data[] = $entry;
        }

        return $data;
    }
}

