# Copyright 2009 - Claudio Mignanti <c.mignanti@gmail.com>
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License as
# published by the Free Software Foundation; either version 2 of
# the License, or (at your option) any later version.

# At the moment this support only git repositories

case `echo $REPO | cut -b-3` in 
svn) echo "Retrieve sources via svn..."
	if [ -d $DL ]; then
		cd $DL;
		svn up
	else
		svn co $REPO $DL
	fi
	;;
git) echo "Retrieve sources via svn..."
	if [ -d $DL ]; then
		cd $DL;
		git pull origin $BRANCH;
	else
		git clone $REPO $DL;
		cd $DL;
		git checkout $BRANCH;
	fi
	;;
*) echo "none proto"; exit 0;
	;;
esac
