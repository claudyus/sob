#!/bin/sh
#
# sOB - Simple Open builing Bot
#
# Copyright 2009 - Claudio Mignanti <c.mignanti@gmail.com>
#

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
		. $stage > log/$step-`basename $stage`-`date +%F` 2>&1
		cd $P
	done
	echo "OFFLINE \n`date`\n" > log/STATUS
done

