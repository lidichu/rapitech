function cc6_readCookie(name){
  var cookieValue = "";
  var search = name + "=";
  if(document.cookie.length > 0){ 
    offset = document.cookie.indexOf(search);
    if (offset != -1){ 
      offset += search.length;
      end = document.cookie.indexOf(";", offset);
      if (end == -1) end = document.cookie.length;
      cookieValue = unescape(document.cookie.substring(offset, end))
    }
  }
  return cookieValue;
}

function cc6_writeCookie(name, value, hours){
  var expire = "";
  if(hours != null){
    expire = new Date((new Date()).getTime() + hours * 60 * 60 * 1000);
    expire = "; expires=" + expire.toGMTString();
  }
  document.cookie = name + "=" + escape(value) + expire;
}


var __cc_visited = 1;
var __cc_cookies_name = 'cc_6_visited_site';
if(cc6_readCookie(__cc_cookies_name).length<1){
	cc6_writeCookie(__cc_cookies_name,__cc_cookies_name,1);
	__cc_visited=0;
    stat_str = "<link rel=\"stylesheet\" href=\"<?php echo($VisualRoot."star/");?>stat.php?referrer=" + escape("<?php echo $_SERVER[HTTP_REFERER] ?>") + "\" type=\"text/css\">";
    document.write(stat_str);    
}