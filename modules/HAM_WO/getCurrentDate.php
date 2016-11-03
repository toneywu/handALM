<?php


global $timedate;
$timeZome = $timedate->getInstance()->userTimezone();		

echo $timeZome;
echo $timedate->now();



?>