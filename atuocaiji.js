 // ==UserScript==
// @name     Unnamed Script 877957
// @version  1
// @grant    none
// ==/UserScript==

//var result = html.split("var data = JSON\.parse"); JSON.parse('
//var result2 = result[1].split("\<\/script\>");
var storeid= 1002;



var html = document.getElementsByTagName('html')[0].innerHTML;
var result = html.split("var data = JSON\.parse\(\'");


var result2 = result[1].split("\]\}\'\)\;");
var result3 = result2[0].split("mainOrders");

//\"guestUser\"
var post;

var result4 = result3[1].split("\\\"guestUser\\\"\:");
for(var i =0;i<result4.length;i++){
  if(i>0){
    	
    var post_str='';
    	var str = result4[i];
    	var b= str.split("\&\_input\_charset\=utf\-8\&orderid\=");
    	var num = b[1].substring(0,18);
    	post_str = num;
    
   	var priceregexp = /Total\\\"\:\\\"(.*)\\\"\}\,\\\"/;
   	var price  = 	str.match(priceregexp);
    price = price[1];
		post_str = post_str+'_____'+price;
    
    var usernameexp = /userID\=(.*)\&sign\=/;
    var username  = 	str.match(usernameexp);
    username = username[1];
    post_str = post_str+'_____'+username;
    console.log(username);
    	if(i==1){
        if(num!='undefined'){
           post = post_str;
           }
      }else{
        post = post+','+post_str;
      }
    	
   }
  
	
}
 console.log(post);

//var json = JSON.parse(result2[0]);


var xhttp = new XMLHttpRequest(); 
xhttp.open("POST", "http://www.wp.com/get.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("data="+post+"&storeid="+storeid);
xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           console.log(this.responseText);
       }
    };
var id=window.setTimeout(reload,4000);
function reload(){
  //	window.location.reload();
}
function strlen(str){
    var len = 0;
    for (var i=0; i<str.length; i++) { 
     var c = str.charCodeAt(i); 
    //单字节加1 
     if ((c >= 0x0001 && c <= 0x007e) || (0xff60<=c && c<=0xff9f)) { 
       len++; 
     } 
     else { 
      len+=2; 
     }
    }
    return len;
}
