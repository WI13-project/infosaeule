jQuery(document).ready(function($) {
  if($("#cms").length != 0) {
    document.getElementById('cms_home').className = 'active';
    document.getElementById('new').className = '';
    document.getElementById('aktive').className = '';
    document.getElementById('inaktive').className = '';
    document.getElementById('pref').className = '';
  }else if($("#cms_neue").length != 0) {
    document.getElementById('cms_home').className = '';
    document.getElementById('new').className = 'active';
    document.getElementById('aktive').className = '';
    document.getElementById('inaktive').className = '';
    document.getElementById('pref').className = '';
   }else if($("#cms_aktiv").length != 0) {
    document.getElementById('cms_home').className = '';
    document.getElementById('new').className = '';
    document.getElementById('aktive').className = 'active';
    document.getElementById('inaktive').className = '';
    document.getElementById('pref').className = '';
   }else if($("#cms_inaktiv").length != 0) {
    document.getElementById('cms_home').className = '';
    document.getElementById('new').className = '';
    document.getElementById('aktive').className = '';
    document.getElementById('inaktive').className = 'active';
    document.getElementById('pref').className = '';
   }else if($("#cms_pref").length != 0) {
    document.getElementById('cms_home').className = '';
    document.getElementById('new').className = '';
    document.getElementById('aktive').className = '';
    document.getElementById('inaktive').className = '';
    document.getElementById('pref').className = 'active';
   }
});