<?php 

mb_internal_encoding('UTF-8'); 
mb_http_output('UTF-8'); 
mb_http_input('UTF-8'); 
mb_regex_encoding('UTF-8'); 


$host = 'localhost';
$user ='root';
$pass = '';
$dbname = 'book_sc';

$dns = "mysql:host=$host;dbname=$dbname";


?>