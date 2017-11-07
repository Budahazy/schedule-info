<?php

    class Dummy {
        public function __construct() {

        }

        public function getDepartures($stop) {
            return array(
                array('line' => 'M3', 'destination' => 'Újpest-központ', 'in' => 1),
                array('line' => 'M3A', 'destination' => 'Árpád üzletház', 'in' => 2),
                                array('line' => 'M3A', 'destination' => 'Árpád üzletház', 'in' => 2),
                                                    array('line' => 'M3A', 'destination' => 'Árpád üzletház', 'in' => 2)
            );
        }
    }

?>

