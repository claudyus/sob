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
function loader(){

//FIXME$r = "Explore the <a href=\"?page=explor\">build_dir</a> <br>";
$r = "Check bot stage log <a href=\"?page=bot_log\">here</a> <br>";
$r = "Trig a bot <a href=\"?page=trigger\">here</a> <br>";
$r .= "Here follow the specific logs: <br>";

include ("errors.php");

$r .= errors();

return $r;
}

?>
