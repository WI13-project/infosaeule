jQuery(document).ready(function($) {
  if($("#home").length != 0) {
    document.getElementById('a_home').className = 'active';
    document.getElementById('a_upload').className = '';
    document.getElementById('a_inhalt').className = '';
    document.getElementById('a_nutzer').className = '';
  }else if($("#upload").length != 0) {
    document.getElementById('a_home').className = '';
    document.getElementById('a_upload').className = 'active';
    document.getElementById('a_inhalt').className = '';
    document.getElementById('a_nutzer').className = '';
   }else if($("#inhalt").length != 0) {
    document.getElementById('a_home').className = '';
    document.getElementById('a_upload').className = '';
    document.getElementById('a_inhalt').className = 'active';
    document.getElementById('a_nutzer').className = '';
   }else if($("#nutzer").length != 0) {
    document.getElementById('a_home').className = '';
    document.getElementById('a_upload').className = '';
    document.getElementById('a_inhalt').className = '';
    document.getElementById('a_nutzer').className = 'active';
   }
});