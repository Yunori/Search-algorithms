<?php
// snox.php for  in /home/regency/ALGO/Projet_No-X
// 
// Made by IRICANIN Filip
// Login   <irican_f@etna-alternance.net>
// 
// Started on  Thu Nov  6 11:38:43 2014 IRICANIN Filip
// Last update Mon Nov 10 16:30:27 2014 Bertocco Thomas-Killian
//

include_once "./error.php";

function snox($argv, $argc)
{
    if (error($argv, $argc) != 0)
        exit;
    $dico = file_get_contents($argv[$argc - 1]);
    $dic_wesh = str_word_count($dico, 1);
    for ($s = 1; $s < $argc - 1; $s++)
        {
	  if ($s > 1)
	    $occur = array();
	  $content = file_get_contents($argv[$s]);
	  preg_match_all("/[a-zA-Z'-]+/", $content, $words);
	  $timestart=microtime(true);
	  echo "\nMots wesh trouvés : \n\n";
	  for ($i = 0; isset($words[0][$i]); $i++)
	    {
	      for($x = 0; isset($dic_wesh[$x]); $x++)	
		if(strcmp($words[0][$i], $dic_wesh[$x]) == 0)
		  {	
		    $occur[] = $words[0][$i];
		    break;
		  }
	    }
	  $occur = array_count_values($occur);
	  foreach ($occur as $key => $value)
	    echo $key." => ".$value."\n";
	  $timeend=microtime(true);
	  $time=$timeend-$timestart;
	  $page_load_time = number_format($time, 4);
	  echo "\nRecherche terminé en " . $page_load_time . " sec\n";
        }
}
?>