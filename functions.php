<?php

require "config.php";

function insert_data($link, $text) {
	$search = "select link from stats where link = '" . $link . "'";
	$result = mysql_query($search);
	
	if (@mysql_num_rows($result) == 0) {
		$sql = "INSERT INTO stats (link, text, clicks) VALUES ('" . $link . "', '" . $text . "', '1')";
	} else {
		$sql = "UPDATE stats set clicks = clicks + 1 where link = '" . $link . "'";
	}
	
	$sql = mysql_query($sql);
}

function show_data($limit = null) {
	$sql = "select * from stats order by clicks desc";
	if ($limit != null) {
		$sql .= " limit $limit";
	}
	$result = mysql_query($sql);
	
	if (@mysql_num_rows($result) == 0) {
		die ("Nothing found");
	}
	
	$output = "";
	while ($row = mysql_fetch_array($result)){
		$output .= $row['clicks'] . "," . $row['link'] . "," . $row['text'] . "\n";
	}
	
	return $output;
}
?>