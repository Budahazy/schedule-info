<?php

require_once ('mysql/bkk.php');

class BKKService
{

    public function __construct()
    {

    }

    private function howManyMinutesLeft($time)
    {
        $now = time();
        $time = mktime(
            substr($time, 0, 2),
            substr($time, 3, 2),
            substr($time, 6, 2)
        );
        $diff = floor(($time - $now) / 60);
        return $diff;
    }

    public function getDepartures($stop)
    {
        $time = date("H:i:s");
        $date = date('Ymd');
        $bkk = new Bkk();
        $stop_times = $bkk->getStopTimes($stop, $time, $date);
        $result = array();
        foreach ($stop_times as $stop_time) {
            $result[] = array(
                'line' => $stop_time['route_short_name'],
                'destination' => $stop_time['trip_headsign'],
                'in' => $this->howManyMinutesLeft($stop_time['departure_time'])
            );
        }
        return $result;
    }

    public function getStopName($stop)
    {
        $bkk = new Bkk();
        return $bkk->getStopName($stop)[0]['stop_name'];
    }


}