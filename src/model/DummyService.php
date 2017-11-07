<?php

class DummyService
{
    public function __construct()
    {

    }

    public function getDepartures($stop)
    {
        return array(
            array('line' => 'M3', 'destination' => 'Újpest-központ M', 'in' => 1),
            array('line' => 'M3A', 'destination' => 'Árpád üzletház M', 'in' => 2),
            array('line' => '8E', 'destination' => 'Újpalota M', 'in' => 3),
            array('line' => '133E', 'destination' => 'Újpalota M', 'in' => 10)
        );
    }
}

?>

