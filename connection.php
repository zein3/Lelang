<?php

$connection = mysqli_connect("localhost", "root", "", "zein_lelang");

if (!$connection)
{
	$connection = mysqli_connect("localhost", "root", "", "lelang");
}

?>