
(function($,W,D){
    var JQUERY4U = {}; 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#frConsultaCedula").validate({
                rules: {
                    cedula: "required"                 
                },
                messages: {
                    cedula: "obligatoria" 
                },
                submitHandler: function(form) {                 
                    consultaCedula();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    }); 
 
} ) (jQuery, window, document);


    function consultaCedula(){
        $("#registro").html("");
        preshow();
        var formData = new FormData(document.getElementById("frConsultaCedula"));
        $.ajax({
        url : "./registro/fRegistro.php",
        type : "post",
        dataType : "html",
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {
            prehide();
            $("#registro").html(data);
        });         
    }   
$("#cedula").mask('9-9999-9999');

function prehide(){ 
    if (document.getElementById){ 
    document.getElementById('preload').style.visibility='hidden'} 
} 
function preshow(){ 
    if (document.getElementById){ 
    document.getElementById('preload').style.visibility='visible'} 
} 



(function($,W,D){
    var JQUERY4U = {};
 
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formUser").validate({
                rules: {
                    password: "required",
                    password2: {
                        equalTo: "#password", 
                        required: true,
                    }
                },      

                messages: {
                    password: "Obligatoria",
                    password2: {
                        equalTo: "#La contraseña no coincide", 
                        required: "Obligatoria",
                    }

                }, 

                submitHandler: function(form) {                 
                    saveUser();
                }//Cuando ya esta completado el formulario como debe de ser se envia a la BD :-´)
            });
        }
    }
 
    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
       // console.log("Entro 2");
    });//Verifica que los datos ingresados sean validos 
 
} ) (jQuery, window, document);


    function saveUser(){
        var formData = new FormData(document.getElementById("formUser"));        
        formData.append("accion", "insertar");
        $.ajax({
        url : "../controladora/user/ControllerUser.php",
        type : "post",
        dataType : "html",
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {
            $("#contenedorMensaje").html(data);
        });         
    }   