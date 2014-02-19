moji="testだよおあdふぁdsfdsfだdふぁだああああああああああああ";
var No=0;
function mojitype() {
  if (No>moji.length) {
       No=0;
       return;
   } else {
     No++;
     txt = moji.substring(0,No);
     document.getElementById("main").innerText = txt;
   }
     setTimeout("mojitype()",100);
 }
/*
 function test(){
  No=0;
  mojitype();

 }

 */