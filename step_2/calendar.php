<?php

/*
----------------------------
    Variables :
----------------------------
 */
$separation1 = "====================================" . PHP_EOL;
$separation2 = "------------------------------------" . PHP_EOL;
$entreeMois = "||";
$fermetureMois = "||" . PHP_EOL;
$semaineNoms = "| Lu | Ma | Me | Je | Ve | Sa | Di |" . PHP_EOL;
$casseVide = "|    ";
$casseRemplie = "| ";

/**
 * ================================================
 * ALGORITHMIE
 * ================================================
 */

if ($argc == 2) {

    for ($i = 1; $i <= 12; $i++) {

        $mois = date('F', mktime(0, 0, 0, $i, 1, $argv[1]));
        $annee = " " . date('Y', mktime(0, 0, 0, $i, 1, $argv[1]));
        $positionSemaine1Jour1 = date('N', mktime(0, 0, 0, $i, 1, $argv[1]));
        $nbrJours = date('t', mktime(0, 0, 0, $i, 1, $argv[1]));
        $positionSemaineFinJourFIn = date('N', mktime(0, 0, 0, $i, $nbrJours, $argv[1]));

        echo $separation1 . $entreeMois;

        $espaces = 27 - strlen($mois);
        $espaces / 2;

        if ($espaces % 2 == 0) {

            for ($j = 0; $j < $espaces / 2; $j++) {
                echo " ";
            }

            echo $mois . " " . $argv[1];

            for ($j = 0; $j < $espaces / 2; $j++) {
                echo " ";
            }
        } else {

            for ($j = 0; $j < ($espaces / 2) - 1; $j++) {
                echo " ";
            }

            echo $mois . " " . $argv[1];

            for ($j = 0; $j < $espaces / 2; $j++) {
                echo " ";
            }
        }

        echo $fermetureMois . $separation1 . $semaineNoms . $separation2;

        for ($m = 0; $m < $positionSemaine1Jour1 - 1; $m++) {
            echo $casseVide;
        }

        for ($z = 1; $z <= $nbrJours; $z++) {
            echo $casseRemplie;

            if (strlen($z) == 1) {
                echo " ";
            }

            echo $z . " ";

            if (($z + $m) == 7 || $z == (14 - $m) || $z == (21 - $m) || $z == (28 - $m) || $z == (35 - $m)) {
                echo "|" . PHP_EOL;
                echo $separation2;
            }
        }

        if ($positionSemaineFinJourFIn != 7) {

            for ($l = 0; $l < 7 - $positionSemaineFinJourFIn; $l++) {
                echo $casseVide;
            }
            echo "|" . PHP_EOL . $separation2;
        }
        
        echo PHP_EOL;
    }
}
