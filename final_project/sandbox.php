<?php 

$able_time=$_POST['able_time'];
  print_r($able_time) ;
  $sql = '';
  foreach($able_time as $g) {
  	if($sql != '') $sql.= ',';
  	$sql .= '("'.'408530049'.'", "'.$g.'")';
  }
  if($sql != '') {
  	$sql = "INSERT INTO able_time (sid, able_time) VALUES ". $sql;
  }

