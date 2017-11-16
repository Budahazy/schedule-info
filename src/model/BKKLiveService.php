<?php

 $url = "http://futar.bkk.hu/bkk-utvonaltervezo-api/ws/otp/api/where/arrivals-and-departures-for-stop.json?includeReferences=agencies,routes,trips,stops&stopId=BKK_F02769&minutesBefore=1&minutesAfter=30&key=bkk-web&version=3&appVersion=2.3.3-20170810153906";

 $file = file_get_contents($url);

 $jsonObject = json_decode($file);

$stopTimes = $jsonObject->data->entry->stopTimes;

$routeIDs = $jsonObject->data->references->stops->BKK_F02769->routeIds;

 var_dump($routeIDs);