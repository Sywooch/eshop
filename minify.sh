#!/bin/bash

#http://en.wikipedia.org/wiki/Shell_script
#clear

datetime() {
	date +"%T"
}

echo [`datetime`] compressing...
yui-compressor -o css/default.min.css css/default.css
yui-compressor -o js/default.min.js js/default.js
yui-compressor -o js/ya-share.min.js js/ya-share.js
yui-compressor -o chunks/crypt.min.js chunks/crypt.js
yui-compressor -o js/rpc.min.js js/rpc.js
