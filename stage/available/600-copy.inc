# Copyright 2009 - Claudio Mignanti <c.mignanti@gmail.com>
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License as
# published by the Free Software Foundation; either version 2 of
# the License, or (at your option) any later version.

echo Copio file nel repository locale...
	REPO_DIR=repo/$step/`date +%Y`/`date +%m`/
	mkdir -p $REPO_DIR
	rsync -av $DL/bin/* $REPO_DIR

