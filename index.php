<?php

require_once 'TimeTravel.php';



$timeTravel = new TimeTravel(new DateTimeImmutable('1985-12-31'), new DateTime());
$date = $timeTravel->findDate(1000000000);
echo $timeTravel->getTravelInfo();
echo $date->format('d-m-Y');



$results = $timeTravel->backToFutureStepByStep(new DateInterval("P1M1W1D"));
foreach ($results as $result){
    echo  "<br/>". $result;

}