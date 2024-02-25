<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

header('Access-Control-Allow-Credentials: true');

header('Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Accept, X-PINGOTHER, Content-Type');

if (isset($_GET['x']) && isset($_GET['y'])){
  $x = $_GET['x'];
  $y = $_GET['y'];
  $points = file_get_contents('points.json');
  $pointsArray = json_decode($points, true);
  $newPoint = [
        'x' => $x,
        'y' => $y,
        'color' => 'black',
    ];
  $pointsArray[] = $newPoint;
  $pointsjson = json_encode($pointsArray);
  file_put_contents('points.json', $pointsjson);
  
}
else{
  error_log("NO X and Y");
}
