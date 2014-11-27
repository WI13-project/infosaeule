function show_add(id){
	if(document.getElementById(id).style.display == 'none'){
		document.getElementById(id).style.display = 'block';
		document.getElementById('radio_add').checked = 'true';
  		document.getElementById('tbl_clr').style.display = 'none';
  		document.getElementById('tbl_add').style.backgroundColor = "#848484";
		document.getElementById('a_add').style.backgroundColor = "#848484";
		document.getElementById('a_clr').style.backgroundColor = "#D8D8D8";
  	}
}

function show_clr(id){
	if(document.getElementById(id).style.display == 'none'){
		document.getElementById(id).style.display = 'block';
		document.getElementById('radio_clr').checked ='true';
  		document.getElementById('tbl_add').style.display = 'none';
  		document.getElementById('tbl_clr').style.backgroundColor = "#848484";
		document.getElementById('a_clr').style.backgroundColor = "#848484";
		document.getElementById('a_add').style.backgroundColor = "#D8D8D8";
  	}
}