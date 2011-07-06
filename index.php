<?php

require "functions.php";

if($_SERVER['QUERY_STRING'] == 'js') {
	
$output = <<<EOD
$(document).ready(function() {
	$("a").click(function(){ 
		var link = $(this).attr("href");
		var text = $(this).text();
		var data = 'link=' + link + '&text=' + text;

		$.ajax({url: "/lzrstat/stats.php", type: "POST", data: data, cache: false, success: function (response) { window.location = link } });
		return false;
	});
});
EOD;
	
echo $output;

} else if($_SERVER['QUERY_STRING'] == 'stats') {
	$content = show_data();
	$rows = explode("\n", $content);
	$total = count($rows) - 1;
	
	echo "<table>\n\t<tr>\n\t\t<th>Clicks</th>\n\t\t<th>Page</th>\n\t</tr>\n";
	for($i = 0; $i < $total; $i++) {
		$row = explode(",", $rows[$i]);
		echo "\t<tr>\n\t\t<td>$row[0]</td>\n\t\t<td><a href=\"$row[2]\">$row[1]</a></td>\n\t</tr>\n";
	}
	echo "</table>";
} else if ($_GET['stats'] == "csv") {
	
	echo show_data();
	
} else if ($_GET['stats'] == "feed") {
	// TODO: feed output
}

?>