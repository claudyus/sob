# At the moment this support only git repositories

echo Retrieve sources ...
	if [ -d $DL ]; then
		cd $DL;
		git pull origin $BRANCH;
	else
		git clone $REPO $DL;
		cd $DL;
		git checkout $BRANCH;
	fi;
