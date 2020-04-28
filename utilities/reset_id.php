<?php

require(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'connection.php');
if (mysqli_query($connection, "Call ResetId()"))
{
	header('Location: ../index.php?success=resetid');
}

?>