
function cargarListaSintomas() {
	id = $("#idCategoria").val();
	alert("==>"+id);

    $.post("../interfaz/sistemaExperto/SintomaLista.php",
        {
            idCategoria : $("#idCategoria").val()
            
        },
        function (data)
        {
            $('#contenedorSintoma').html(data);
        });
}