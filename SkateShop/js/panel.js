$(function () {
    // INPUT FOCUSOUT
    $("input").focusout(function () {
        switch ($(this).attr("name")) {
            //GUARDAR
            case "nombre":
                if ($(this).val() === "") {
                    $("#nombreError").css("display", "inline");
                } else {
                    $("#nombreError").css("display", "none");
                }
                break;
            case "precio":
                if ($(this).val() === "" || $(this).val() == 0) {
                    $("#precioError").css("display", "inline");
                } else {
                    $("#precioError").css("display", "none");
                }
                break;
            case "stock":
                if ($(this).val() === "" || $(this).val() == 0) {
                    $("#stockError").css("display", "inline");
                } else {
                    $("#stockError").css("display", "none");
                }
                break;
            //EDITAR
            case "edinombre":
                if ($(this).val() === "") {
                    $("#nombreError").css("display", "inline");
                } else {
                    $("#nombreError").css("display", "none");
                }
                break;
            case "ediprecio":
                if ($(this).val() === "" || $(this).val() == 0) {
                    $("#precioError").css("display", "inline");
                } else {
                    $("#precioError").css("display", "none");
                }
                break;
            case "edistock":
                if ($(this).val() === "" || $(this).val() == 0) {
                    $("#stockError").css("display", "inline");
                } else {
                    $("#stockError").css("display", "none");
                }
                break;
        }
    });
    //INPUT CHANGE
    $("input").change(function () {
        switch ($(this).attr("name")) {
            //VALIDACIÓN DE INPUT CON FILE
            case "imagen[]":
                if (this.files.length > 0) {
                    $("#fotoError").css("display", "none");
                } else {
                    $("#fotoError").css("display", "inline");
                }
                break;
        }
    });
    // VALIDACIÓN TEXTAREA
    $("textarea").focusout(function () {
        switch ($(this).attr("name")) {
            case "descripcion":
                if ($(this).val() === "") {
                    $("#descripcionError").css("display", "inline");
                } else {
                    $("#descripcionError").css("display", "none");
                }
                break;
            case "edidescripcion":
                if ($(this).val() === "") {
                    $("#edidescripcionError").css("display", "inline");
                } else {
                    $("#edidescripcionError").css("display", "none");
                }
                break;
        }
    });
    //VALIDACIÓN DE SELECT
    $("select").change(function () {
        switch ($(this).attr("name")) {
            //GUARDAR
            case "tproducto":
                let opciontp = $("select[name=tproducto] > option:selected").val();
                if (opciontp == -1) {
                    $("#tproductoError").css("display", "inline");
                } else {
                    $("#tproductoError").css("display", "none");
                }
                break;
            case "estado":
                let opcionest = $("select[name=estado] > option:selected").val();
                if (opcionest == -1) {
                    $("#estadoError").css("display", "inline");
                } else {
                    $("#estadoError").css("display", "none");
                }
                break;
            //EDITAR
            case "editproducto":
                let opciontp2 = $("select[name=editproducto] > option:selected").val();
                if (opciontp2 == -1) {
                    $("#editproductoError").css("display", "inline");
                } else {
                    $("#editproductoError").css("display", "none");
                }
                break;
            case "ediestado":
                let opcionest2 = $("select[name=ediestado] > option:selected").val();
                if (opcionest2 == -1) {
                    $("#ediestadoError").css("display", "inline");
                } else {
                    $("#ediestadoError").css("display", "none");
                }
                break;
        }
    });
    $("button").click(function () {
        switch ($(this).attr("name")) {
            case "guardar":
                var correcto = true;
                //VALIDACIÓN DE IMPUTS
                if ($("input[name=nombre]").val() === "") {
                    $("#nombreError").css("display", "inline");
                    $("input[name=nombre]").focus();
                    correcto = false;
                }
                if ($("input[name=precio]").val() === "") {
                    $("#precioError").css("display", "inline");
                    $("input[name=precio]").focus();
                    correcto = false;
                }
                if ($("input[name=stock]").val() === "") {
                    $("#stockError").css("display", "inline");
                    $("input[name=stock]").focus();
                    correcto = false;
                }
                if ($("#imagen").val() === "") {
                    $("#fotoError").css("display", "inline");
                    $("#imagen").focus();
                    correcto = false;
                }
                //VALICACIÓN TEXTAREA
                if ($("textarea[name=descripcion]").val() === "") {
                    $("#descripcionError").css("display", "inline");
                    $("textarea[name=descripcion]").focus();
                    correcto = false;
                }
                //VALICACIÓN DE SELECTS
                if ($("select[name=estado]").val() === "-1") {
                    $("#estadoError").css("display", "inline");
                    $("select[name=estado]").focus();
                    correcto = false;
                }
                if ($("select[name=tproducto]").val() === "-1") {
                    $("#tproductoError").css("display", "inline");
                    $("select[name=tproducto]").focus();
                    correcto = false;
                }
                if (correcto) {
                    //SE ENVIAN LOS DATOS DEL PRODUCTO ADEMÁS DE LA IMAGEN
                    var formData = new FormData($("#formguardar")[0]);
                    var url = "CONTROLADOR QUE PROCESARÁ LOS DATOS";
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function (respuesta) {
                            switch (respuesta) {
                                case "OK":
                                    swal("Genial!", "Creado correctamente.", "success");
                                    break;
                                case "ERROR":
                                    swal("Ups!", "Ocurrió un error al procesar los datos.", "error");
                                    break;
                            }
                        }
                    });
                } else {
                    swal("¡Ups!", "Por favor, complete todos los campos", "error");
                }
                break;
            case "editar":
                var correcto = true;
                //VALIDACIÓN DE IMPUTS EDITAR
                if ($("input[name=edinombre]").val() === "") {
                    $("#edinombreError").css("display", "inline");
                    $("input[name=edinombre]").focus();
                    correcto = false;
                }
                if ($("input[name=ediprecio]").val() === "") {
                    $("#ediprecioError").css("display", "inline");
                    $("input[name=ediprecio]").focus();
                    correcto = false;
                }
                if ($("input[name=edistock]").val() === "") {
                    $("#stockError").css("display", "inline");
                    $("input[name=stock]").focus();
                    correcto = false;
                }
                //VALICACIÓN TEXTAREA
                if ($("textarea[name=edidescripcion]").val() === "") {
                    $("#edidescripcionError").css("display", "inline");
                    $("textarea[name=edidescripcion]").focus();
                    correcto = false;
                }
                //VALICACIÓN DE SELECTS
                if ($("select[name=ediestado]").val() === "-1") {
                    $("#ediestadoError").css("display", "inline");
                    $("select[name=ediestado]").focus();
                    correcto = false;
                }
                if ($("select[name=editproducto]").val() === "-1") {
                    $("#editproductoError").css("display", "inline");
                    $("select[name=editproducto]").focus();
                    correcto = false;
                }
                if (correcto) {
                    //SE ENVIAN LOS DATOS DEL PRODUCTO, LA IMAGEN PUEDE O NO IR, EN CASO DE IR SE REEMPLAZA POR LA ANTERIOR,
                    //CONSIDERAR CAMBIAR DE NOMBRE LA URL DE LA IMAGEN, POR EL CACHÉ DEL NAVEGADOR, SUELE DAR PROBLEMAS.
                    var formData = new FormData($("#formeditar")[0]);
                    var url = "CONTROLADOR QUE PROCESARÁ LOS DATOS";
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function (respuesta) {
                            switch (respuesta) {
                                case "OK":
                                    swal("Genial!", "Creado correctamente.", "success");
                                    break;
                                case "ERROR":
                                    swal("Ups!", "Ocurrió un error al procesar los datos.", "error");
                                    break;
                            }
                        }
                    });
                } else {
                    swal("¡Ups!", "Por favor, complete todos los campos", "error");
                }
                break;
            case "eliminar":
                swal({
                    title: "¿Estás seguro?",
                    text: "¿Deseas eliminar este producto?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            //SE ENVIA LA ID DEL PRODUCTO A ELIMINAR.
                            var idProducto = "ID DEL PRODUCTO A ELIMINAR";
                            var url = "CONTROLADOR QUE PROCESARÁ LOS DATOS";
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: { "idProducto": idProducto },
                                contentType: false,
                                processData: false,
                                cache: false,
                                success: function (respuesta) {
                                    switch (respuesta) {
                                        case "OK":
                                            swal("Hecho!", "Eliminado correctamente.", "success");
                                            break;
                                        case "ERROR":
                                            swal("Ups!", "Ocurrió un error al procesar los datos.", "error");
                                            break;
                                    }
                                }
                            });
                        }
                    });
                break;
        }
    });
});
