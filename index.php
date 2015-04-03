<?php
	
	include "lib/func.php";
	include "config.php";
	
	try
	{
		$obj = new Controller();
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
		
?>