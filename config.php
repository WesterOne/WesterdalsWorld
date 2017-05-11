<?php
$host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'westerproject';
$db_port = 8889;

$conn = new PDO('mysql:host=localhost;dbname=westerproject',$db_user,$db_pass);
/*
try {
    $conn = new PDO('mysql:host=localhost;dbname=westerproject',$db_user,$db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    echo 'Not connected'.$ex->getMessage();
}
*/

// Sätter igång databasen vid namn westerproject,
// använder sig av kollonen places.

//Checkar vilken sida du är på.
$serv = $_SERVER['REQUEST_URI'];
if( strpos( $serv,'index') || strpos($serv,'place') !== false ) {
    $stmtplaces = $conn->prepare('SELECT * FROM places');
    $stmtplaces->execute();
    $places = $stmtplaces->fetchAll();
} else if ( strpos($serv, 'event') !== false) {
    $stmtevents = $conn->prepare('SELECT * FROM events');
    $stmtevents->execute();
    $events = $stmtevents->fetchAll();
} else {
    echo "Something went wrong";
}

$stmtmsg = $conn->prepare('SELECT * FROM msg');
$stmtmsg->execute();
$msgs = $stmtmsg->fetchAll();
