<?php

function getAllActive($table)
{
global $conn;
$query = "SELECT * FROM $table WHERE status='0'";
return $query_run = mysqli_query($conn, $query);
}