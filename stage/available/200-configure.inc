# Copyright 2009 - Claudio Mignanti <c.mignanti@gmail.com>
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License as
# published by the Free Software Foundation; either version 2 of
# the License, or (at your option) any later version.

echo Symblink to dl and configuration ...
	ln -sfv $P/dl $DL/dl;
	cp -rv $P/conf/files-$step/* $DL/

        echo CONFIG_TARGET_"$ARCH"=y > $DL/.config
	for PK in $PKG; do
        	echo CONFIG_"$PK"=y >> $DL/.config
	done
