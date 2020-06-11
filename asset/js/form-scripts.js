$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Todos los campos  requeridos");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});

function submitForm() {
    // Initiate Variables With Form Content
    var usuario = $("#usuario").val();
    console.log('usuario: ' + usuario);
    var Password = $("#Password").val();
    console.log('Password: ' + Password);
    $.ajax({
        type: "POST",
        url: host + "/Mfg-Rockjs/",
        data: "action=auth&usuario=" + usuario + "&Password=" + Password,
        success: function (text) {
            //text = JSON.parse(text); 
            console.log(text.message[0].auth);
            if (text.message[0].auth == "success") {
                localStorage.setItem("jwt", text.message[2].JWT);
                var obj = JSON.stringify(text.message[1]);
                console.log(obj);
                localStorage.setItem("Opciones", obj);
                localStorage.setItem("userLog", usuario); //save user

                formSuccess();
            } else {
                formError();
                submitMSG(false, text.message[0].auth);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            alert("No fue posible conectar con el servidor");
            submitMSG(false, "No fue posible conectar con el servidor");
        }
    });
}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Bienvenido!");
    location.href = "menu.php";
}

function formError() {
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}
