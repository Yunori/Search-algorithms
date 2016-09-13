<?php
// qs.php for nox in /home/bertoc_t/PROJ/nox/nox
// 
// Made by Bertocco Thomas-Killian
// Login   <bertoc_t@etna-alternance.net>
// 
// Started on  Mon Nov 10 15:06:26 2014 Bertocco Thomas-Killian
// Last update Mon Nov 10 15:19:58 2014 Bertocco Thomas-Killian
//

function qs($tab)
{
  if(!count($tab))
    return $tab;
  $pivot= $tab[0];
  $low = $high = array();
  $length = count($tab);
  for($i=1; $i < $length; $i++) {
    if($tab[$i] <= $pivot)
      {
	$low [] = $tab[$i];
      }
    else
      {
	$high[] = $tab[$i];
      }
  }
  return array_merge(qs($low), array($pivot), qs($high));
}