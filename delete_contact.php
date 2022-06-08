<?php
	include("core/init.php");
	
	//Create DB object
	$db=new Database;
	
	//Run query
	$db->query("delete from contacts where id=:id");
	
	//Bind values
	$db->bind(":id", $_POST["id"]);
	
	if($db->execute())
		echo "Contact was deleted.";
	else
		echo "Could not delete contact.";
?>