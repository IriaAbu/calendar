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

    $arrayDate = explode('-', $argv[1]);
    $mois = date('F', mktime(0, 0, 0, $arrayDate[1], 1, $arrayDate[0]));
    $annee = " " . date('Y', mktime(0, 0, 0, $arrayDate[1], 1, $arrayDate[0]));
    $nbrJours = date('t', mktime(0, 0, 0, $arrayDate[1], 1, $arrayDate[0]));
    $positionSemaine1Jour1 = date('N', mktime(0, 0, 0, $arrayDate[1], 1, $arrayDate[0]));
    $positionSemaineFinJourFIn = date('N', mktime(0, 0, 0, $arrayDate[1], $nbrJours, $arrayDate[0]));

    $verif1 = strlen($arrayDate[0]);
    $verif2 = strlen($arrayDate[1]);

    if ($verif1 !== 4 || $verif2 !== 2 || $arrayDate[1] > 12) {
        return NULL;
    }

    echo $separation1 . $entreeMois;

    $espaces = 27 - strlen($mois);
    $espaces / 2;

    if ($espaces % 2 == 0) {

        for ($i = 0; $i < $espaces / 2; $i++) {
            echo " ";
        }

        echo $mois . $annee;

        for ($i = 0; $i < $espaces / 2; $i++) {
            echo " ";
        }
    } else {

        for ($i = 0; $i < $espaces / 2; $i++) {
            echo " ";
        }

        echo $mois . $annee;

        for ($i = 0; $i < ($espaces / 2) - 1; $i++) {
            echo " ";
        }
    }

    echo $fermetureMois . $separation1 . $semaineNoms . $separation2;

    for ($i = 0; $i < $positionSemaine1Jour1 - 1; $i++) {

        echo $casseVide;
    }

    for ($z = 1; $z <= $nbrJours; $z++) {

        echo $casseRemplie;

        if (strlen($z) == 1) {
            echo " ";
        }

        echo $z . " ";

        if (($z + $i) == 7 || $z == (14 - $i) || $z == (21 - $i) || $z == (28 - $i) || $z == (35 - $i)) {
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
} elseif ($argc == 3) {

    $mois = date('F', mktime(0, 0, 0, $argv[1], 1, $argv[2]));
    $annee = " " . date('Y', mktime(0, 0, 0, $argv[1], 1, $argv[2]));
    $nbrJours = date('t', mktime(0, 0, 0, $argv[1], 1, $argv[2]));
    $positionSemaine1Jour1 = date('N', mktime(0, 0, 0, $argv[1], 1, $argv[2]));
    $positionSemaineFinJourFIn = date('N', mktime(0, 0, 0, $argv[1], $nbrJours, $argv[2]));

    if (strlen($argv[1]) == 2 && strlen($argv[2]) == 4) {
        echo $separation1 . $entreeMois;

        $espaces = 27 - strlen($mois);
        $espaces / 2;

        if ($espaces % 2 == 0) {

            for ($i = 0; $i < $espaces / 2; $i++) {
                echo " ";
            }

            echo $mois . $annee;

            for ($i = 0; $i < $espaces / 2; $i++) {
                echo " ";
            }
        } else {

            for ($i = 0; $i < $espaces / 2; $i++) {
                echo " ";
            }

            echo $mois . $annee;

            for ($i = 0; $i < ($espaces / 2) - 1; $i++) {
                echo " ";
            }
        }
        echo $fermetureMois . $separation1 . $semaineNoms . $separation2;

        for ($i = 0; $i < $positionSemaine1Jour1 - 1; $i++) {

            echo $casseVide;
        }

        for ($z = 1; $z <= $nbrJours; $z++) {

            echo $casseRemplie;

            if (strlen($z) == 1) {
                echo " ";
            }

            echo $z . " ";

            if (($z + $i) == 7 || $z == (14 - $i) || $z == (21 - $i) || $z == (28 - $i) || $z == (35 - $i)) {
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
    }
}
