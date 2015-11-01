function idioma() {
  //id = $("#idioma").val();
 // alert("==>"+id);

    $.post("../controladora/idioma/ControladoraIdioma.php",
        {
            accion : "lenguage",
            idioma : $("#idioma").val()
            
        },
        function (data)
        {
         
         // $('#contenedorIdioma').html(data); 
          location.reload(true);
        });
}


function cargarPagina(direccion){        
/*	 $.post(direccion,
    {},
    function (data)
    {
        $('#contenedor').html(data);
    });*/

	$('#contenedorFormulario').load(direccion);
  $('#contenedorMensaje').html("");
  $('#contenedorLista').html("");
  $('#contenedorHorario').html("");
  
}

function actualizar(){
	 location.reload(true);
}

function cargarLista(direccion){        
  $('#contenedorLista').load(direccion);
  $('#contenedorFormulario').html(""); 
  $('#contenedorMensaje').html("");
  $('#contenedorHorario').html("");     
}

$(function(){   
  $('#contenedorIndicadorBCCR').load("../herramientas/Obtener_Indicadores_BCCR/ejemplo.php");        
});

function cargarHorario(){        
  $('#contenedorHorario').load("../interfaz/horario/Horario.php");
  $('#contenedorFormulario').html("");
  $('#contenedorMensaje').html("");
  $('#contenedorLista').html("");
}

function cargarRegent(){        
  $('#contenedorHorario').load("../interfaz/horario/Regente.php");
  $('#contenedorFormulario').html("");
  $('#contenedorMensaje').html("");
  $('#contenedorLista').html("");
}

/*
function selectOn(trObject)
	{
		for(i = 0; i <= 5; i++)
		{
		trObject.childNodes[i].className = 'txtnavtn';
		}
	}
				
function selectOut(trObject)
	{
		for(i = 0; i <= 5; i++)
				trObject.childNodes[i].className = 'txtnavtn';
	}

// Funcion para las ventanas

function registro (file) {
  date = new Date();
  if (date != null) {
window.open(file,date.getTime(),"width=348,height=505,screenX=1,screenY=1,toolbar=no,scrollbars=no");
                }
            }
			
function vnt(file) {
  date = new Date();
  if (date != null) {
window.open(file,date.getTime(),"width=600,height=400,top=0,left=0,toolbar=no,scrollbars=yes,status=yes,resizable=yes");
                }
            }

function vntNav() {
  date = new Date();
  if (date != null) {
window.open("nav2006.html",date.getTime(),"width=350,height=180,top=0,left=0,toolbar=no,scrollbars=no,status=no,resizable=no");
                }
            }

function vntprint(file) {
  date = new Date();
  if (date != null) {
window.open(file,date.getTime(),"width=425,height=290,top=0,left=0,toolbar=no,scrollbars=no,status=no,resizable=no");
                }
            }
			
// Fin de funcion para las ventanas

// Impedir que copien imágenes
var clickmessage="Banco Nacional de Costa Rica, \nTodos los Derechos Reservados 2013.\n\nProhibida la reproduccion parcial o total de este sitio\nsin previa autorizacion del Banco"

function disableclick(e) {
if (document.all) {
if (event.button==2||event.button==3) {
if (event.srcElement.tagName=="IMG"){
alert(clickmessage);
return false;
}
}
}
else if (document.layers) {
if (e.which == 3) {
alert(clickmessage);
return false;
}
}
else if (document.getElementById){
if (e.which==3&&e.target.tagName=="IMG"){
alert(clickmessage)
return false
}
}
}

function associateimages(){
for(i=0;i<document.images.length;i++)
document.images[i].onmousedown=disableclick;
}

if (document.all)
document.onmousedown=disableclick
else if (document.getElementById)
document.onmouseup=disableclick
else if (document.layers)
associateimages()

// Desactivar el Click Derecho
var message="Banco Nacional de Costa Rica, \nTodos los Derechos Reservados 2013.\n\nProhibida la reproduccion parcial o total de este sitio\nsin previa autorizacion del Banco"

function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false")

// Funcion para links externos al Banco
function vntURL (SitioURL) {
date = new Date();
if (date != null) {
alert("IMPORTANTE: Usted esta saliendo del sitio web del Banco Nacional del Costa Rica\n he ingresando al sitio: " + SitioURL);
window.open(SitioURL,date.getTime());
//window.close(-1);
	}
}


function infobarra(msg){ 
     window.status=msg; return true; 
}

<!--

//User defined variables - change these variables to alter the behaviour of the script
var ImageFolder = "img/"; //Folder name containing the images
var ImageFileNames = new Array('bcinepolisterra.gif', 'bcinemas.gif', 'bmoliere.gif', 'bgimgym1.gif', 'bgimgym2.gif', 'bgimarena.gif', 'bcrmovies.gif', 'bmundiunas.gif', 'binbioparque.gif'); //List of images to use
var ImageURLs = new Array('https://www.bnonline.fi.cr/BNCR.InternetBanking.Web/IB_Personal.aspx', 'https://www.bnonline.fi.cr/BNCR.InternetBanking.Web/IB_Personal.aspx', 'https://www.bnonline.fi.cr/BNCR.InternetBanking.Web/IB_Personal.aspx', 'https://www.bnonline.fi.cr/BNCR.InternetBanking.Web/IB_Personal.aspx', 'https://www.bnonline.fi.cr/BNCR.InternetBanking.Web/IB_Personal.aspx', 'https://www.bnonline.fi.cr/BNCR.InternetBanking.Web/IB_Personal.aspx', 'https://www.bnonline.fi.cr/BNCR.InternetBanking.Web/IB_Personal.aspx', 'http://www.bncr.fi.cr/BN/promociones/proproductos.asp?c=bcaprom', 'https://www.bnonline.fi.cr/BNCR.InternetBanking.Web/IB_Personal.aspx'); //List of hyperlinks associated with the list of images
var DefaultURL = 'https://www.bnonline.fi.cr/BNCR.InternetBanking.Web/IB_Personal.aspx'; //Default hyperlink for the Banner Ad
var DisplayInterval = 7; //Number of seconds to wait before the next image is displayed
var TargetFrame = ""; //Name of the frame to open the hyperlink into

//Internal variables (do not change these unless you know what you are doing)
var IsValidBrowser = false;
var BannerAdCode = 0;
var BannerAdImages = new Array(NumberOfImages);
var DisplayInterval = DisplayInterval * 1000;
var NumberOfImages = ImageFileNames.length;

//A dd a trailing forward slash to the ImageFolder variable if it does not already have one
if (ImageFolder.substr(ImageFolder.length - 1, ImageFolder.length) != "/" && ImageFolder != "") { ImageFolder += "/";
}

if (TargetFrame == '') {
var FramesObject = null;
} else {
var FramesObject = eval('parent.' + TargetFrame);
}

//Function runs when this page has been loaded and does the following:
//1. Determine the browser name and version
// (since the script will only work on Netscape 3+ and Internet Explorer 4+).
//2. Start the timer object that will periodically change the image displayed
// by the Banner Ad.
//3. Preload the images used by the Banner Ad rotator script
function InitialiseBannerAdRotator() {

//Determine the browser name and version
//The script will only work on Netscape 3+ and Internet Explorer 4+
var BrowserType = navigator.appName;
var BrowserVersion = parseInt(navigator.appVersion);

if (BrowserType == "Netscape" && (BrowserVersion >= 3)) {
IsValidBrowser = true;
}

if (BrowserType == "Microsoft Internet Explorer" && (BrowserVersion >= 4)) {
IsValidBrowser = true;
}

if (IsValidBrowser) {
TimerObject = setTimeout("ChangeImage()", DisplayInterval);
BannerAdCode = 0;

for (i = 0; i < NumberOfImages; i++) {
BannerAdImages[i] = new Image();
BannerAdImages[i].src = ' ' + ImageFolder + ImageFileNames[i];
}

}

}

//Function to change the src of the Banner Ad image
function ChangeImage() {

if (IsValidBrowser) {
BannerAdCode = BannerAdCode + 1;

if (BannerAdCode == NumberOfImages) {
BannerAdCode = 0;
}

window.document.bannerad.src = BannerAdImages[BannerAdCode].src;
TimerObject = setTimeout("ChangeImage()", DisplayInterval);
}
}

//Function to redirect the browser window/frame to a new location,
//depending on which image is currently being displayed by the Banner Ad.
//If Banner Ad is being displayed on an old browser then the DefaultURL is displayed
function ChangePage() {

if (IsValidBrowser) {

if (TargetFrame != '' && (FramesObject)) {
FramesObject.location.href = ImageURLs[BannerAdCode];
} else {
document.location = ImageURLs[BannerAdCode];
}

} else if (!IsValidBrowser) {
document.location = DefaultURL;
}

}

//funcion para salir del Banco Nacional
function gotoNS12(url) {
	var confirmar = confirm("Va a abandonar el sitio del Banco Nacional, Desea continuar?");
	if (confirmar) {
		window.open(url,"_blank");
	}
}*/