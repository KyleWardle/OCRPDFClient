<?php

$file_id = $_GET['file_id'];
$file_name = $_GET['file_name'];

echo "FILE NAME : " . $file_name . " <br>";

echo "FILE DATA: <br>";
echo file_get_contents( "output/$file_id.txt" );
