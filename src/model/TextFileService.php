<?php
class TextFileService {
    public function __construct() {
    }
    public function getDepartures($stop) {
        $content = file_get_contents('data.txt');
        $rows = explode("\n", $content);
        $output = array();
        foreach($rows as $row){
            $explodedRow = explode(',',$row);
            $output[] = array(
                'line' => $explodedRow[0],
                'destination' => $explodedRow[1],
                'in' => $explodedRow[2]
            );
        }
        return $output;
    }
}
?>