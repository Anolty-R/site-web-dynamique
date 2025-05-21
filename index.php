<?php

$bdd = new PDO ("mysql:host=localhost;dbname=site","user1","SAE2.03");

$req=$bdd->query ("SELECT * FROM PAGE");

if ( ($ligne = $req->fetch()) !== false) {
	echo $ligne["MESSAGE"];
}

?>
