<?php

if ($argc != 1) {
    return NULL;
}

$line = readline("Choisissez une date : ");
readline_add_history($line);

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

if (preg_match("[\ ]", $line)) {

    $arrayDate = explode(" ", $line);
    $mois = date('F', mktime(0, 0, 0, $arrayDate[0], 1, $arrayDate[1]));
    $annee = " " . date('Y', mktime(0, 0, 0, $arrayDate[0], 1, $arrayDate[1]));
    $nbrJours = date('t', mktime(0, 0, 0, $arrayDate[0], 1, $arrayDate[1]));
    $positionSemaine1Jour1 = date('N', mktime(0, 0, 0, $arrayDate[0], 1, $arrayDate[1]));
    $positionSemaineFinJourFIn = date('N', mktime(0, 0, 0, $arrayDate[0], $nbrJours, $arrayDate[1]));

    if (strlen($arrayDate[0]) != 2 || strlen($arrayDate[1]) != 4 || $arrayDate[0] > 12) {
        $line = readline("Choisissez une date : ");
        readline_add_history($line);
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
} elseif (preg_match("[\-]", $line)) {

    $arrayDate = explode('-', $line);
    $mois = date('F', mktime(0, 0, 0, $arrayDate[1], 1, $arrayDate[0]));
    $annee = " " . date('Y', mktime(0, 0, 0, $arrayDate[1], 1, $arrayDate[0]));
    $nbrJours = date('t', mktime(0, 0, 0, $arrayDate[1], 1, $arrayDate[0]));
    $positionSemaine1Jour1 = date('N', mktime(0, 0, 0, $arrayDate[1], 1, $arrayDate[0]));
    $positionSemaineFinJourFIn = date('N', mktime(0, 0, 0, $arrayDate[1], $nbrJours, $arrayDate[0]));

    $verif1 = strlen($arrayDate[0]);
    $verif2 = strlen($arrayDate[1]);

    if ($verif1 != 4 || $verif2 != 2 || $arrayDate[1] > 12) {
        $line = readline("Choisissez une date : ");
        readline_add_history($line);
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
} else {

    for ($i = 1; $i <= 12; $i++) {

        $mois = date('F', mktime(0, 0, 0, $i, 1, $line));
        $annee = " " . date('Y', mktime(0, 0, 0, $i, 1, $line));
        $positionSemaine1Jour1 = date('N', mktime(0, 0, 0, $i, 1, $line));
        $nbrJours = date('t', mktime(0, 0, 0, $i, 1, $line));
        $positionSemaineFinJourFIn = date('N', mktime(0, 0, 0, $i, $nbrJours, $line));

        echo $separation1 . $entreeMois;

        $espaces = 27 - strlen($mois);
        $espaces / 2;

        if ($espaces % 2 == 0) {

            for ($j = 0; $j < $espaces / 2; $j++) {
                echo " ";
            }

            echo $mois . " " . $line;

            for ($j = 0; $j < $espaces / 2; $j++) {
                echo " ";
            }
        } else {

            for ($j = 0; $j < ($espaces / 2) - 1; $j++) {
                echo " ";
            }

            echo $mois . " " . $line;

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
