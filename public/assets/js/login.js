$(document).ready(function () {
    $("#loginForm").submit(function (event) {
        event.preventDefault();

        var email = $("#exampleInputEmail1").val();
        var password = $("#exampleInputPassword1").val();

        // Envie a solicitação AJAX
        $.ajax({
            url: "/loginAct",
            type: "POST",
            data: {
                user: email,
                password: password
            },
            dataType: "json",
            success: function (response) {

                if (response.success) {
                    window.location.href = "/admin";
                } else {

                    var errorCode = response.errorCode;

                    if (errorCode === 1) {
                        $("#loginStatus").html('<div class="alert alert-danger" role="alert">Falha ao conectar! Usuário e/ou senha estão incorretos.</div>')
                    } else if (errorCode === 2) {
                        $("#loginStatus").html('<div class="alert alert-danger" role="alert">Preencha os dados corretamente!</div>');
                    }
                }
            },
            error: function (xhr, status, error) {
                console.log("Erro na consulta ao banco de dados");
            }
        });
    });
});

