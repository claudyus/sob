echo Install feeds ...
	cd $DL
	./scripts/feeds update -a
	./scripts/feeds install -a

