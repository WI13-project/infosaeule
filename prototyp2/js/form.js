function show_add(){
	if(document.getElementById('tbl_add').style.display == 'none'){
		document.getElementById('tbl_add').style.display = 'block';
		document.getElementById('radio_add').checked = 'true';
  		document.getElementById('tbl_clr').style.display = 'none';
  		document.getElementById('tbl_pwd_change').style.display = 'none';
  		document.getElementById('tbl_add').style.backgroundColor = "#848484";
		document.getElementById('a_add').style.backgroundColor = "#848484";
		document.getElementById('a_clr').style.backgroundColor = "#D8D8D8";
		document.getElementById('a_pwd_change').style.backgroundColor = "#D8D8D8";
  	}
}

function show_clr(){
	if(document.getElementById('tbl_clr').style.display == 'none'){
		document.getElementById('tbl_clr').style.display = 'block';
		document.getElementById('radio_clr').checked ='true';
  		document.getElementById('tbl_add').style.display = 'none';
  		document.getElementById('tbl_pwd_change').style.display = 'none';
  		document.getElementById('tbl_clr').style.backgroundColor = "#848484";
		document.getElementById('a_clr').style.backgroundColor = "#848484";
		document.getElementById('a_add').style.backgroundColor = "#D8D8D8";
		document.getElementById('a_pwd_change').style.backgroundColor = "#D8D8D8";
  	}
}

function show_pwd_change(){
	if(document.getElementById('tbl_pwd_change').style.display == 'none'){
		document.getElementById('tbl_pwd_change').style.display = 'block';
		document.getElementById('radio_pwd_change').checked ='true';
  		document.getElementById('tbl_add').style.display = 'none';
  		document.getElementById('tbl_clr').style.display = 'none';
  		document.getElementById('tbl_pwd_change').style.backgroundColor = "#848484";
		document.getElementById('a_pwd_change').style.backgroundColor = "#848484";
		document.getElementById('a_add').style.backgroundColor = "#D8D8D8";
		document.getElementById('a_clr').style.backgroundColor = "#D8D8D8";
  	}
}