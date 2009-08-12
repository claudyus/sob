echo Run make ...
	cd $DL
	make defconfig
	make -j 2 V=99 IGNORE_ERRORS=m BUILD_LOG=1

