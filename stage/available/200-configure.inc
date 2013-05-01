# Copyright 2009 - Claudio Mignanti <c.mignanti@gmail.com>
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License as
# published by the Free Software Foundation; either version 2 of
# the License, or (at your option) any later version.

echo Symblink to dl and configuration ...
	#use common dl directory for all bots
	ln -sfv $P/dl $DL/dl;
	#cp -rv $P/conf/files-$step/* $DL/

	#arch and paks
	echo CONFIG_TARGET_"$ARCH"=y > $DL/.config
	if [ $PKG == "ALL" ]; then
		echo CONFIG_ALL=y >> $DL/.config;
	else
		for PK in $PKG; do
				echo CONFIG_PACKAGE_"$PK"=y >> $DL/.config;
		done
	fi

	#external tree support
	if [ $KERNEL_GIT_CLONE_URI ]; then
		echo CONFIG_DEVEL=y >>  $DL/.config
		echo CONFIG_EXTERNAL_KERNEL_TREE=y >>  $DL/.config
		echo CONFIG_KERNEL_GIT_CLONE_URI=$KERNEL_GIT_CLONE_URI >>  $DL/.config
		echo CONFIG_KERNEL_GIT_BRANCH=$KERNEL_GIT_BRANCH >>  $DL/.config
	fi
