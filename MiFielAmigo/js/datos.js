$(document).ready(function () {

    //funcion mediante AJAX para mostrar el listado
    function borrarPerro(id) {

        //alert(id);

        $.ajax({

            method: "GET",
            url: "operaciones.php",
            data: {
                "cod": 3,
                "id": id
            }

        }).done(function (data) {
            //redirect js
            window.location = "http://localhost/mifielamigo/main.php";
            alert("¡Borrado con exito!");
        });


    };

    function aniadirAdop(idP, idU, nom) {
        /*alert(idU);
        alert(idP);*/
        $.ajax({
            method: "GET",
            url: "operaciones.php",
            data: {
                "cod": 2,
                "id": idP,
                "idU": idU,
                "nom": nom

            }
        }).done(function (data) {
            window.location = "datos.php?id=" + idP;
        });

    };

    function modificar() {
        $("#modal").modal({
            "show": true,
            "backdrop": "static"
        });
    };

    $("#borrar").click(function () {
        var id = $(this).data("id");
        borrarPerro(id);

    });

    $("#editar").click(function () {
        modificar();
    });

    $("#aniadirAdop").click(function () {

        var idP = $(this).data("idp");
        var idU = $(this).data("idu");
        var nom = $(this).data("nom");
        /* alert(idP);
        alert(idU);
         alert(nom);*/
        aniadirAdop(idP, idU, nom);
    });
});