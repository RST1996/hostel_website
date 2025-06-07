var alphabet=/^[a-zA-Z. ]+$/;
var alphanumeric=/^[a-zA-Z0-9]+$/;
var titlechar=/^[a-zA-Z0-9,-.&\/' ]+$/;

function valiname(formname,name){
	var iname=document.forms[formname][name].value;
	if (iname != '') {
		if (!iname.match(alphabet)){
			alert("Only Alphabets are allowed in this field");
			document.forms[formname][name].value="";

		}
	}
}

function validusername(formname,name){
	var iname=document.forms[formname][name].value;
	if (iname != '') {
		if (!iname.match(alphanumeric)){
			alert("Only alphanumeric characters are allowed in this field");
			document.forms[formname][name].value="";

		}
	}
}
				
function validtitle(formname,name){
	var iname=document.forms[formname][name].value;
	if (iname != '') {
		if (!iname.match(titlechar)){
			alert("Only Alphanumeric and symbols like  -,'.&/ are allowed in this field");
			document.forms[formname][name].value="";

		}
	}
}