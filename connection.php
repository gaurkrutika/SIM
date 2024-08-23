<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ims';
$db = new mysqli('localhost', 'root', '', 'ims'); 
if(mysqli_connect_error())
{
    echo "cannot connect";
}

