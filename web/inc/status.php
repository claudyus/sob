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
function status(){

	$r = file ("../log/STATUS");
	return $r[0];
}
?>
