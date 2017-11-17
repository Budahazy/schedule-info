<?php
function getBkkLiveUrl($stop) {
    return "http://futar.bkk.hu/bkk-utvonaltervezo-api/ws/otp/api/where/arrivals-and-departures-for-stop.json?includeReferences=agencies,routes,trips,stops&stopId=BKK_$stop&minutesBefore=1&minutesAfter=30&key=bkk-web&version=3&appVersion=2.3.3-20170810153906";
}
?>