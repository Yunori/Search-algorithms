<?php
// dnox.php for nox in /home/bertoc_t/PROJ/nox
// 
// Made by Bertocco Thomas-Killian
// Login   <bertoc_t@etna-alternance.net>
// 
// Started on  Mon Nov 10 09:54:38 2014 Bertocco Thomas-Killian
// Last update Mon Nov 10 16:23:10 2014 Bertocco Thomas-Killian
//

include_once "./error.php";
include_once "./dicho.php";
include_once "./qs.php";

function dnox($argv, $argc)
{
    if (error($argv, $argc) != 0)
        exit;
    $dico = file_get_contents($argv[$argc - 1]);
    $wdico = str_word_count($dico, 1);
    $timestart=microtime(true);
    $tdico = qs($wdico);
    $timeend=microtime(true);
    $time=$timeend-$timestart;
    $page_load_time = number_format($time, 4);
    echo "\nTri terminé en " . $page_load_time . " sec\n";
    for ($s = 1; $s < $argc - 1; $s++)
      {
	if ($s > 1)
	  $occur = array();
	$content = file_get_contents($argv[$s]);
	preg_match_all("/[a-zA-Z'-]+/", $content, $words);
	echo "\nMots wesh trouvés : \n\n";
	$timestart=microtime(true);
	for ($i = 0; isset($words[0][$i]); $i++)
	  {
	    if (dicho($tdico, $words[0][$i]) == 1)
	      $occur[] = $words[0][$i];
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