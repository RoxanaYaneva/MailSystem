function validateAdd() {
	var boxID = document.forms["add_box"]["box_id"].value;
	var isValid = true;
	if (boxID.length <= 1) {
		document.getElementById("invalid_box_id").style.display = "block";
		document.getElementById("invalid_box_id").innerHTML = "* Box ID should be 2 to 16 symbols long."
		isValid = false;
	} else {
		document.getElementById("invalid_box_id").style.display = "none";
	}
	return isValid;
}