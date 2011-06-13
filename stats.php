<?php

if (isset($_POST['text']) && isset($_POST['link'])) {
	require "functions.php";
	
	insert_data($_POST['text'], $_POST['link']);
}
?>