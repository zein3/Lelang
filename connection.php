<?php

$connection = mysqli_connect("localhost", "root", "", "zein_lelang");

if (mysqli_connect_errno())
{
	$connection = mysqli_connect("localhost", "root", "", "lelang");
	if (mysqli_connect_errno())
	{
		die();
	}
}

?>