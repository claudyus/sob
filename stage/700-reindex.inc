echo Remake pkg index...
	cd $REPO_DIR/packages/target-arm_uClibc-0.9.30.1
	$P/extra/ipkg-make-index.sh . > Packages

