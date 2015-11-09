$(function(){
    $('#from').datepicker();
});
$(function(){
    $('#to').datepicker();
});
$("#from").mask('99-99-9999');
$("#to").mask('99-99-9999');
$(document).ready(function(){
     $("#hourPrice").maskMoney({precision:0 })
});
/*====================Payment============================*/
(function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#searchPayment").validate({
                rules: {
                    from : "required", 
                    to: "required",
                    hourPrice: "required"
                },      
                messages: {
                     from : "Seleccione fecha Desde", 
                    to: "Seleccione fecha Hasta",
                     hourPrice: "Obligatorio"
                }, 
                submitHandler: function(form) {                 
                    queryPayment();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);

function queryPayment(){
        var formData = new FormData(document.getElementById("searchPayment"));        
       // formData.append("accion", "insertar");
        $.ajax({
        url : "./horario/MonthlyPayment.php",
        type : "post",
        dataType : "html",
        data : formData,
        cache : false,
        contentType : false,
        processData : false
        }).done(function(data) {
            $("#containerPayment").html(data);                   
        });         
    }


    (function($,W,D){
    var JQUERY4U = {};
    JQUERY4U.UTIL ={
        setupFormValidation: function()
        {
            $("#formPay").validate({
                rules: {
                },      
                messages: {
                }, 
                submitHandler: function(form) {                 
                    insertar();
                }
            });
        }
    }    
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });
 
} ) (jQuery, window, document);


function insertar(){
        var formData = new FormData(document.getElementById("formPay"));        
        formData.append("accion", "insertar");
        $.ajax({
        url : "../controladora/horario/ControllerPay.php",
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

