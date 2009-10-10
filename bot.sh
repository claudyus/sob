#!/bin/sh
#
# sOB - Simple Open builing Bot
#
# Copyright 2009 - Claudio Mignanti <c.mignanti@gmail.com>
#

#For any target you should define a configuration file
# in conf/$(target_name).conf

####### Don't edit below this line'#######

cd `dirname $_`
P=`pwd`

mkdir -p dl log
#for each file inside conf/; use its name as step name!
for step in `ls conf/*.conf | cut -f 2 -d / | cut -f 1 -d .`; do

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
		echo "`basename $stage` <br>`date`<br>" > log/STATUS
		echo Including $stage
		. $stage > log/$step-`date +%F`-`basename $stage` 2>&1
		cd $P
	done
	echo "OFFLINE <br>`date`<br>" > log/STATUS
done

