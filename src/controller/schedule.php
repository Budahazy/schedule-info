<?php
require_once ("../config.php");

require_once('../model/DummyService.php');
require_once('../model/TextFileService.php');
require_once('../model/BKKService.php');
require_once ('../model/BKKLiveService.php');


if(!isset($_GET['stop']) || !preg_match('/^[0-9A-Z]*$/',$_GET['stop'])) {
    $stop = 1;
} else {
    $stop = $_GET['stop'];
}

$url = getBkkLiveUrl($stop);
$service = new BKKLiveService($url);
$departures = BKKLiveService::getSchedule($service->getShortNames(), $service->getTripHeadsigns(), $service->getStopTimes());

require('../view/schedule.php');
?>

