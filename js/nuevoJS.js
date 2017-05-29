var cont=0

function cambia() {

cont = cont % 2;

if (cont==1){

document.getElementById("#fotocambia").src="img/banner/1_728x90.png";
document.getElementById("#fotocambia1").href="https://www.google.com.ar/";
}

if(cont==0){

document.getElementById("#fotocambia").src="img/banner/2_728x90.gif";
document.getElementById("#fotocambia1").href="https://www.facebook.com/";

}


cont++;

}
function inicio() {

setInterval(cambia, 8000);

}

window.onload=inicio;
