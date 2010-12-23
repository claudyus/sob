#!/bin/bash

#pacchettizza le versioni di sob

cd ..
git stash
for r in `git tag`; do
	git checkout $r
	tar --exclude="build/*" --exclude="extra/package.sh" \
		--exclude=".git" --exclude="*.tar.gz" \
		-cvzf sob-$r.tar.gz *
done
