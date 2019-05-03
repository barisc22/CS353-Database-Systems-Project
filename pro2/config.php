<?php
session_start();
$host = "dijkstra.ug.bcc.bilkent.edu.tr:3306"; /* Host name */
$user = "merve.kilicarsla"; /* User */
$password = "cMg5Qorn"; /* Password */
$dbname = "merve_kilicarslan"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if($con)
{
	echo " ";
}
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}