#!/bin/sh
#
# sOB - Simple OpenWrt Bot
#
# Copyright 2009 - Claudio Mignanti <c.mignanti@gmail.com>
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License as
# published by the Free Software Foundation; either version 2 of
# the License, or (at your option) any later version.

#cd `dirname $_`
P=`pwd`

#check if /tmp/sob-planned exist
if [[ ! -e /tmp/sob-planned ]]; then
	exit 0
fi

for target in `sort /tmp/sob-planned | uniq `; do
	#check that $target is a valid target
	if [[ -e ./conf/$target.conf ]]; then
		nohup ./bot.sh $target > /dev/null &
	fi
done

rm /tmp/sob-planned
exit 1


