<?php
	session_start();

	// Destruction de toutes les données de session
	session_unset();

	// Destruction de la session
	session_destroy();

	// Redirection vers la page d'accueil
	header("Location: index.html");
	exit();
?>