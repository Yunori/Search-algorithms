<?php
// dicho.php for nox in /home/bertoc_t/PROJ/nox
// 
// Made by Bertocco Thomas-Killian
// Login   <bertoc_t@etna-alternance.net>
// 
// Started on  Mon Nov 10 09:54:18 2014 Bertocco Thomas-Killian
// Last update Mon Nov 10 09:54:27 2014 Bertocco Thomas-Killian
//

function dicho($tab = NULL, $find = NULL)
{
    $a = 0;
    $z = sizeof($tab);
    $r = 0;
    while(sizeof($tab) > 1 && $r != 1 && $z - $a >= 1)
        {
            $mid = ($a + $z) / 2;
            if ($tab[$mid] == $find)
                {
                    $r = 1;
                }
            else
                if($tab[$mid] > $find)
                    $z = $mid;
                else
                    $a = $mid;
        }
    if (sizeof($tab) == 1 && $tab[$a] == $find)
        {
            $r = 1;
        }
    return $r;
}
?>