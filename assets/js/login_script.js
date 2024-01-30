$(document).ready(function () {
  $("#loginForm").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "login.php",
      data: formData,
      success: function (response) {
        if (response.status === "success") {
          console.log(response.status);
          window.location.href = response.redirect || ""; // Redirecionar para a página de sucesso ou manter a mesma página
        } else {
          $("#loginMessages").html(
            '<div class="alert alert-danger">' + response.message + "</div>"
          );
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        $("#loginMessages").html(
          '<div class="alert alert-danger">Erro ao enviar requisição AJAX.</div>'
        );
      },
    });
  });
});
