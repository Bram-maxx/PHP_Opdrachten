<?php
declare(strict_types=1);

echo "<pre>";

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'Film.php';
require_once 'Zaal.php';
require_once 'Voorstelling.php';
require_once 'Ticket.php';

$inception = new Film(
    "Inception",
    "Christopher Nolan",
    148,
    12
);

$deadpool = new Film(
    "Deadpool 3",
    "Shawn Levy",
    127,
    16
);

$zaakIMAX = new Zaal(1, 120, true);
$zaalNormaal = new Zaal(2, 80, false);

$avondfilm = new Voorstelling(
    $inception,
    $zaakIMAX,
    "2025-03-07",
    "20:00",
    14.50
);

$middag = new Voorstelling(
    $deadpool,
    $zaalNormaal,
    "2025-03-07",
    "15:00",
    11.00
);

$t1 = $avondfilm->verkoopTicket("Lisa");
$t2 = $avondfilm->verkoopTicket("Tom");
$t3 = $avondfilm->verkoopTicket("Sara");
$t4 = $middag->verkoopTicket("Mark");

echo "=== FILMS ===" . PHP_EOL;
echo $inception->getSamenvatting() . PHP_EOL;
echo $deadpool->getSamenvatting() . PHP_EOL;

echo PHP_EOL . "=== ZALEN ===" . PHP_EOL;
echo $zaakIMAX->getZaalnaam() . PHP_EOL;
echo $zaalNormaal->getZaalnaam() . PHP_EOL;

echo PHP_EOL . "=== VOORSTELLINGEN ===" . PHP_EOL;
echo $avondfilm->getResterendePlaatsen() . " plaatsen over" . PHP_EOL;
echo "Vol? " . ($avondfilm->isVol() ? "Ja" : "Nee") . PHP_EOL;
echo "Inkomsten: EUR " . $avondfilm->getInkomsten() . PHP_EOL;

echo PHP_EOL . "=== TICKETS ===" . PHP_EOL;
echo $t1->getBevestiging() . PHP_EOL;
echo $t2->getBevestiging() . PHP_EOL;
echo $t3->getBevestiging() . PHP_EOL;

echo PHP_EOL . "=== LEEFTIJDSCHECK ===" . PHP_EOL;
echo $inception->isGeschiktVoor(15)
    ? "Geschikt"
    : "Niet geschikt";

echo PHP_EOL;

echo $deadpool->isGeschiktVoor(14)
    ? "Geschikt"
    : "Niet geschikt";

echo PHP_EOL;

echo PHP_EOL . "=== FILMDUUR ===" . PHP_EOL;
echo $inception->getDuurAlsString() . PHP_EOL;
echo $deadpool->getDuurAlsString() . PHP_EOL;