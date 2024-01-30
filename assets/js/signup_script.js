$(document).ready(function () {
  $("#signupForm").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    // Send an AJAX request to signup.php
    $.ajax({
      type: "POST",
      url: "signup.php",
      data: formData,
      success: function (response) {
        if (response.status === "success") {
          window.location.href = response.redirect || ""; // Redirecionar para a página de sucesso ou manter a mesma página
        } else {
          $("#signupMessages").html(
            '<div class="alert alert-danger">' + response.message + "</div>"
          );
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
        $("#signupMessages").html(
          '<div class="alert alert-danger">Erro ao enviar requisição AJAX.</div>'
        );
      },
    });
  });
});
