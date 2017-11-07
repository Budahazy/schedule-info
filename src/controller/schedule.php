<?php
require_once('../model/DummyService.php');
require_once('../model/TextFileService.php');

//1 bemenő adatok, validálni
if (!isset($_GET['stop']) || !preg_match('/^[0-9]*$/', $_GET['stop'])) {
    $stop = 1;
} else {
    $stop = $_GET['stop'];
}

// 2. model-beli osztálynak valami függvényét
$scheduleService = new DummyService();
$departures = $scheduleService->getDepartures($stop);

// 3. meghívunk egy view-t
require('../view/schedule.php');
?>

