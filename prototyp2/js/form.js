function show_add(){
	if(document.getElementById('tbl_add').style.display == 'none'){
		document.getElementById('tbl_add').style.display = 'block';
		document.getElementById('radio_add').checked = 'true';
  		document.getElementById('tbl_clr').style.display = 'none';
  		document.getElementById('tbl_pwd_change').style.display = 'none';
  		document.getElementById('user_table').style.display = 'none';
  		document.getElementById('a_add').className = 'active';
  		document.getElementById('a_clr').className = '';
  		document.getElementById('a_pwd_change').className = '';
  		document.getElementById('add_name').focus();
  		
  	}
}

function show_clr(){
	if(document.getElementById('tbl_clr').style.display == 'none'){
		document.getElementById('tbl_clr').style.display = 'block';
		document.getElementById('radio_clr').checked ='true';
  		document.getElementById('tbl_add').style.display = 'none';
  		document.getElementById('tbl_pwd_change').style.display = 'none';
  		document.getElementById('user_table').style.display = 'block';
  		document.getElementById('a_clr').className = 'active';
  		document.getElementById('a_pwd_change').className = '';
  		document.getElementById('a_add').className = '';
  		document.getElementById('clr_name').focus();	
  	}
}

function show_pwd_change(){
	if(document.getElementById('tbl_pwd_change').style.display == 'none'){
		document.getElementById('tbl_pwd_change').style.display = 'block';
		document.getElementById('radio_pwd_change').checked ='true';
  		document.getElementById('tbl_add').style.display = 'none';
  		document.getElementById('tbl_clr').style.display = 'none';
  		document.getElementById('user_table').style.display = 'block';
  		document.getElementById('a_pwd_change').className = 'active';
  		document.getElementById('a_clr').className = '';
  		document.getElementById('a_add').className = '';
  		document.getElementById('chg_name').focus();	
  	}
}