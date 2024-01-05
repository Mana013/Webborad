<?php
 $rate = 0.31;

 $y = $_GET['yen'];

 $baht = $y * $rate;
 
 echo "$y Yen = $baht Baht";
?>