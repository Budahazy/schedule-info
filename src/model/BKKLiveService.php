<?php

class BKKLiveService
{
    public $_jsonObject;
    private $_stopTimesObject;
    private $_routesObject;
    private $_tripsObject;

    public function __construct($url)
    {
        $file = file_get_contents($url);
        $this->_jsonObject = json_decode($file);
        $this->_stopTimesObject = $this->_jsonObject->data->entry->stopTimes;
        $this->_routesObject = $this->_jsonObject->data->references->routes;
        $this->_tripsObject = $this->_jsonObject->data->references->trips;
    }

    private function getRouteIDs()
    {
        $routeIDs = array();
        foreach ($this->_tripsObject as $trip) {
            array_push($routeIDs, $trip->routeId);
        }
        return $routeIDs;
    }

    function getShortNames()
    {
        $routeIDs = $this->getRouteIDs();
        $shortNames = array();
        foreach ($routeIDs as $id) {
            foreach ($this->_routesObject as $item) {
                if ($id == $item->id) {
                    array_push($shortNames, $item->shortName);
                    break;
                }
            }
        }
        return $shortNames;
    }

    function getTripHeadsigns()
    {
        $result = array();
        foreach ($this->_tripsObject as $item) {
            array_push($result, $item->tripHeadsign);
        }
        return $result;
    }

    function getStopTimes()
    {
        $result = array();
        foreach ($this->_stopTimesObject as $item) {
            if (property_exists($item, 'predictedArrivalTime')) {
                array_push($result, date('i', $item->predictedArrivalTime) - date('i'));
            } else if (property_exists($item, 'arrivalTime')) {
                array_push($result, date('i', $item->arrivalTime) - date('i'));
            }
        }
        return $result;
    }

    static function getSchedule($shortNames, $tripHeadsign, $stopTimes)
    {
        $result = array();
        for ($i = 0; $i < count($stopTimes); $i++) {
            array_push($result, array('line' => $shortNames[$i], 'destination' => $tripHeadsign[$i], 'in' => $stopTimes[$i]));
        }
        return $result;
    }
}