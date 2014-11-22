#!/bin/bash
datetime() {
	date +"%T"
}
SCRIPT=$(readlink -f $0)
APPPATH=$(dirname `dirname $SCRIPT`)
echo [`datetime`]
mogrify -path "$APPPATH/images/gallery/small/" -resize 300x321 "$APPPATH/images/gallery/*.png"
mogrify -path "$APPPATH/images/gallery/thumbs/" -resize 150x161 "$APPPATH/images/gallery/*.png"
