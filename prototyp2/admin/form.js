function show_add(id){
	if(document.getElementById(id).style.display == 'none'){
		document.getElementById(id).style.display = 'block';
		document.getElementById('radio_add').checked = 'true';
  		document.getElementById('tbl_clr').style.display = 'none';
  	}else{
  		document.getElementById(id).style.display = 'none';
  		document.getElementById('radio_add').checked = 'false';
  		document.getElementById('tbl_add').style.display = 'block';
  	}
}

function show_clr(id){
	if(document.getElementById(id).style.display == 'none'){
		document.getElementById(id).style.display = 'block';
		document.getElementById('radio_clr').checked ='true';
  		document.getElementById('tbl_add').style.display = 'none';
  	}else{
  		document.getElementById(id).style.display = 'none';
  		document.getElementById('radio_clr').checked ='false';
  		document.getElementById('tbl_clr').style.display = 'block';
  	}
}