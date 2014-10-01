function ebg0(str) {
	var s = [], i, idx;
	for (i = 0; i < str.length; i ++) {
		idx = str.charCodeAt(i);
		if ((idx >= 48) && (idx <= 57)) {
			if (idx <= 52) {
				s[i] = String.fromCharCode(((idx + 5)));
			}
			else {
				s[i] = String.fromCharCode(((idx - 5)));
			}
		}
		else {
			s[i] = String.fromCharCode(idx);
		}
	}
	return s.join('');
}

function ebg68(str) {
	return str.replace(/[a-zA-Z]/g,function(c){return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);});
}