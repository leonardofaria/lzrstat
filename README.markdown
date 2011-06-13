# LZRSTAT

This is a clicks counter using PHP, jQuery and MySQL.

## GET READY IN 3 STEPS

### Database

Create database (dump.sql):

	CREATE TABLE `stats` (
	  `link` varchar(255) NOT NULL,
	  `text` varchar(255) NOT NULL,
	  `clicks` int(11) NOT NULL
	);

### Edit functions.php

Edit functions.php and set your database configs.

### Paste in your page

	<script type="text/javascript" src="/lzrstat/?js"></script>

## DISPLAYING STATS

* www.yoursite.com/lzrstat/?stats => simple table
* www.yoursite.com/lzrstat/?stats=csv => csv data
* www.yoursite.com/lzrstat/?stats=feed => feed (not implemented yet)