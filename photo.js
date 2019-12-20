let xmlHttp;
// 判断浏览器是IE,还是其它浏览器
function xmlHttpRequest(){
  if(window.ActiveXObject){
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }else if(window.XMLHttpRequest){
    xmlHttp=new XMLHttpRequest();
  }
}

function refresh(){
  xmlHttpRequest();
  xmlHttp.open("GET","db.php",true);
  xmlHttp.onreadystatechange=byphp;
  xmlHttp.send(null);
}

function byphp(){
  if(xmlHttp.readyState==4){
    let data=xmlHttp.responseText;
    document.getElementById('div1').innerHTML=data;
  }
}
