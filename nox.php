#!/usr/bin/env php
<?php
// nox.php for nox in /home/bertoc_t/PROJ/nox
// 
// Made by Bertocco Thomas-Killian
// Login   <bertoc_t@etna-alternance.net>
// 
// Started on  Mon Nov 10 09:55:30 2014 Bertocco Thomas-Killian
// Last update Mon Nov 10 17:41:23 2014 BENMOUSSA Dan
//

include_once "./art.php";
include_once "./dnox.php";
include_once "./snox.php";

art();
if($argc < 3)
    echo "\nUtilistation: nox.php msg1 [msg2 ...] dico\n\n";
else
    {
        $stdin = fopen('php://stdin', 'r');
        echo "\nBonjour ".get_current_user()."\n\n";
        echo "Veuillez choisir le type de recherche:\n\n";
        echo "[1] Séquentielle\n";
        echo "[2] Dichotomique\n\n";
        while(!isset($d))
            {
	      echo "> ";
	      $input = fgets($stdin);
	      if (preg_match("#1#", $input , $matches))
		{
		  snox($argv, $argc);
		  $d = 0;
		}
	      else if (preg_match("#2#", $input, $matches))
		{
		  dnox($argv, $argc);
		  $d = 0;
		}
	      else
		echo "Veuillez entrer 1 ou 2\n";
            }
        fclose($stdin);
    }
?>