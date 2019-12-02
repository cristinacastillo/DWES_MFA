$(document).ready(function () {

    //funcion mediante AJAX para mostrar el listado
    function mostrarPerros() {

        $.ajax({

            method: "GET",
            url: "operaciones.php",
            data: {
                "cod": 1,
                "pag": pag
            },

        }).done(function (data) {

            $('#contenido').append(data); //devuelve una cadena HTML, de texto u objeto jQuery para insertar 
            pag++; //al final de cada elemento en el conjunto de elementos coincidentes

        });

    }

    function aniadirPerro() {
        $("#modal").modal({
            "show": true,
            "backdrop": "static"
        });

    };


    //definimos la variable pagina y la ponemos a 1 que será la primera
    var pag = 1;

    //al hacer evento click sobre el boton mostrar llamamos a la funcion mostrarPerros() creada anteriormente
    $("#mostrar").click(function () {
        mostrarPerros();

    });

    $("#aniadir").click(function () {
        aniadirPerro();

    });

    //llamamos a la funcion para que muestre los primeros registros al cargar la pagina
    mostrarPerros();

});