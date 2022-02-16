<?php


namespace App\Others;

use DateTime;
use DateTimeZone;

class CalculDate {

    private $dateFinRecuit;

    public function dateNow(){
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Europe/Paris'));
        $dateTime = $date->format('d-m-Y H:i');

        return $dateTime;
    }

    public function calculDate($dateRecuit, $recuit) {

        $jour = 60 * 60;

        $result = $jour * $recuit;

        $calculFinRecuit = (strtotime($dateRecuit) + $result);

        $format = "d-m-Y H:i";

        $this->dateFinRecuit = date($format, $calculFinRecuit);

        return $this->dateFinRecuit;

    }


}