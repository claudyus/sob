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

#Define targets here...
TARGET="crux crisos"

#For any target you should use define a configuration file
# in conf/$(target_name).conf

####### Don't edit below this line'#######

cd `dirname $_`
P=`pwd`

mkdir -p dl
for step in $TARGET; do
	echo "************************"
	echo "* " $step 
	echo "************************"

	#define target variable
	# define DL= REPO= BRANCH=
	DISABLE=
	. ./conf/$step.conf

	if [ $DISABLE ]; then
		echo Skip $step!
		continue;
	fi

	for stage in ./stage/*.inc; do
		echo "`basename $stage` \n`date`\n" > log/STATUS
		echo Including $stage
		. $stage > log/$step-`date +%F`-`basename $stage` 2>&1
		cd $P
	done
	echo "OFFLINE \n`date`\n" > log/STATUS
done

