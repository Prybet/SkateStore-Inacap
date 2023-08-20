

// INPUT CHANGE
$("input").focusout(function () {
    switch ($(this).attr("name")) {
        //VALIDACIÓN DE INPUT 
        case "nombre":
            if ($(this).val() === "") {
                $("#nombreError").css("display", "inline");
            } else {
                $("#nombreError").css("display", "none");
            }
            break;
        case "contra":
            if ($(this).val() === "") {
                $("#contraError").css("display", "inline");
            } else {
                $("#contraError").css("display", "none");
            }
            break;
        case "numero":
            if ($(this).val() === "") {
                $("#numeroError").css("display", "inline");
            } else {
                $("#numeroError").css("display", "none");
            }
            break;
        case "correo":
            if ($(this).val() === "") {
                $("#correoError").css("display", "inline");
            } else {
                $("#correoError").css("display", "none");
            }
            break;
        case "descripcion":
            if ($(this).val() === "") {
                $("#descError").css("display", "inline");
            } else {
                $("#descError").css("display", "none");
            }
            break;
    }
});
$("button").click(function () {
    switch ($(this).attr("name")) {
        case "registrar":
            var correcto = true;
            if ($("input[name=nombre]").val() === "") {
                $("#nombreError").css("display", "inline");
                $("input[name=nombre]").focus();
                correcto = false;
            }
            if ($("input[name=contra]").val() === "") {
                $("#contraError").css("display", "inline");
                $("input[name=contra]").focus();
                correcto = false;
            }
            if ($("input[name=correo]").val() === "") {
                $("#correoError").css("display", "inline");
                $("input[name=correo]").focus();
                correcto = false;
            }
            if ($("input[name=numero]").val() === "") {
                $("#numeroError").css("display", "inline");
                $("input[name=numero]").focus();
                correcto = false;
            }
            if ($("input[name=descripcion]").val() === "") {
                $("#descError").css("display", "inline");
                $("input[name=descripcion]").focus();
                correcto = false;
            }
            if (correcto) {
                var url = "../controller/registroController.php";
                $.ajax({
                    url: url,
                    data: {
                        "nombre": $("input[name=nombre]").val(),
                        "contra": $("input[name=contra]").val(),
                        "correo": $("input[name=correo]").val(),
                        "numero": $("input[name=numero]").val(),
                        "descripcion": $("input[name=descripcion]").val()
                    },
                    type: 'POST',
                    dataType: 'json'
                }).done(function (respuesta) {
                    switch (respuesta) {
                        case "OK":
                            swal("Genial!", "Se ha registrado correctamente.", "success");
                            break;
                        case "ERROR":
                            swal("Ups!", "Error al procesar los datos.", "error");
                            break;
                    }
                }).fail(function (response) {
                    console.log(response);
                });
            } else {
                swal("Ups!", "Por favor, complete todos los campos", "error");
            }
            break;
    }
});