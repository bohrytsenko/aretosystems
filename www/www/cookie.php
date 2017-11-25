<?php
if (isset($_GET["ref"]))
{
	$ref = $_GET["ref"];
	setcookie("ref", $ref, time()+3600 * 24 * 30, '/', '.aretosystems.com'); 
}
?>