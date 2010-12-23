#!/bin/sh
#
# sOB - Simple Open builing Bot
#
# Copyright 2009 - Claudio Mignanti <c.mignanti@gmail.com>
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License as
# published by the Free Software Foundation; either version 2 of
# the License, or (at your option) any later version.

#For any target you should define a configuration file
# in conf/$(target_name).conf

####### Don't edit below this line'#######

cd `dirname $_`
P=`pwd`

mkdir -p dl log

if [ -z $1 ]; then
	#for each .conf file inside conf/; use its name as step name!
	TARGET=`ls conf/*.conf | cut -f 2 -d / | cut -f 1 -d .`
else
	#test a specific target
	TARGET=$1
fi

for step in $TARGET; do

	echo "************************"
	echo "* " $step 
	echo "************************"

	#define target variable
	DISABLE=
	. ./conf/$step.conf
	DL=build/"$ARCH"_dir"$NAME"

	if [ $DISABLE ]; then
		echo Skip $step!
		continue;
	fi
	for stage in ./stage/*.inc; do
		echo "`basename $stage` <br>`date`<br>" > log/STATUS
		echo Including $stage
		. $stage `tty -s && echo '| tee ' || echo '>'` log/$step-`date +%F`-`basename $stage` 2>&1
		cd $P
	done
	echo "OFFLINE <br>`date`<br>" > log/STATUS
done

