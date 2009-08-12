echo Copio file nel repository locale...
	REPO_DIR=repo/$step/`date +%Y`/`date +%m`/
	mkdir -p $REPO_DIR
	rsync -av $DL/bin/* $REPO_DIR

