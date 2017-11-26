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


    private function getRouteShorNameFromTripId($tripId)
    {
        $routeId = $this->_tripsObject->$tripId->routeId;
        return $this->_routesObject->$routeId->shortName;
    }

    private function getStopTimes($stopTime)
    {
        if (property_exists($stopTime, 'predictedArrivalTime')) {
            return intval(($stopTime->predictedArrivalTime - time()) / 60) . ":" . ($stopTime->arrivalTime - time()) % 60;
        } else if (property_exists($stopTime, 'arrivalTime')) {
            return intval(($stopTime->arrivalTime - time()) / 60) . ":" . ($stopTime->arrivalTime - time()) % 60;
        }
    }

    public function getDepartures()
    {
        $result = array();
        foreach ($this->_stopTimesObject as $stopTime) {
            $result[] = array(
                'line' => $this->getRouteShorNameFromTripId($stopTime->tripId),
                'destination' => $stopTime->stopHeadsign ,
                'in' => $this->getStopTimes($stopTime)
            );
        }
        return $result;
    }
}