<?

/* sOB - Simple Open builing Bot
 *
 * Copyright 2009 - Claudio Mignanti <c.mignanti@gmail.com>
 *
 *  This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation; either version 2 of
 * the License, or (at your option) any later version.
*/

session_start();

$page = $_GET['page'];

if (! isset($page)) {
	$page = 'default';
}

require ("./inc/$page.php");
require ("./inc/status.php");

#load template, if it doesn't exist load default one
if (file_exists ('tpl.htm')) {
	$tpl = file ('tpl.htm');
} else {
	$tpl = file ('tpl.htm.default');
}

$tpl = str_replace ( "%body" , loader(), $tpl);
$tpl = str_replace ( "%status" , status(), $tpl);

foreach( $tpl as $a){
	echo $a;
}

?>
