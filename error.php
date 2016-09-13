<?php
// error.php for nox in /home/bertoc_t/PROJ/nox
// 
// Made by Bertocco Thomas-Killian
// Login   <bertoc_t@etna-alternance.net>
// 
// Started on  Mon Nov 10 09:55:14 2014 Bertocco Thomas-Killian
// Last update Mon Nov 10 09:55:19 2014 Bertocco Thomas-Killian
//

function error($argv, $argc)
{
    $d = 0;
    for ($s = 0; $s < $argc; $s++)
        {
            if (!file_exists($argv[$s]) && !is_dir($argv[$s]))
                {    
                    echo ("$argv[$s] : No such file or directory\n");
                    $d = 1;
                }
            else if (is_dir($argv[$s]))
                {    
                    echo ("$argv[$s] : Is a directory\n");
                    $d = 1;
                }
            else if (file_exists($argv[$s]) && !is_readable($argv[$s]))
                { 
                    echo ("$argv[$s] : Permission denied\n");
                    $d = 1;
                }
            else if (!$fh = fopen($argv[$s], 'r'))
                {    
                    echo ("$argv[$s] : Cannot open file\n");
                    $d = 1;
                }
        }
    return $d;
}
?>