<?php



function getAllPokemon()
{
	global $db;
	$query = "select * from pokemon";

// bad	
	// $statement = $db->query($query);     // 16-Mar, stopped here, still need to fetch and return the result 
	
// good: use a prepared stement 
// 1. prepare
// 2. bindValue & execute
	$statement = $db->prepare($query);
	$statement->execute();

	// fetchAll() returns an array of all rows in the result set
	$results = $statement->fetchAll();   

	$statement->closeCursor();

	return $results;
}

?>