var url = "../controller/LoginController.php";
// INPUT CHANGE
$("input").focusout(function () {
    switch ($(this).attr("name")) {
        //VALIDACIÓN DE INPUT 
        case "username":
            if ($(this).val() === "") {
                $("#userError").css("display", "inline");
            } else {
                $("#userError").css("display", "none");
            }
            break;
        case "password":
            if ($(this).val() === "") {
                $("#passError").css("display", "inline");
            } else {
                $("#passError").css("display", "none");
            }
            break;
    }
});
$("button").click(function () {
    switch ($(this).attr("name")) {
        case "login":
            var correcto = true;
            if ($("input[name=username]").val() === "") {
                $("#userError").css("display", "inline");
                $("input[name=username]").focus();
                correcto = false;
            }
            if ($("input[name=password]").val() === "") {
                $("#passError").css("display", "inline");
                $("input[name=password]").focus();
                correcto = false;
            }
            if (correcto) {
                $.ajax({
                    url: url,
                    data: {
                        "username": $("input[name=username]").val(),
                        "password": $("input[name=password]").val(),
                    },
                    type: 'POST',
                    dataType: 'json'
                }).done(function (respuesta) {
                    switch (respuesta) {
                        case "OK":
                            swal("Genial!", "Ha iniciado sesión correctamente.", "success");
                            break;
                        case "ERROR":
                            swal("Ups!", "Usuario y/o contraseña incorrectos.", "error");
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