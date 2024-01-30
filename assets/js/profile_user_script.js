var currentProfilePicture;
$(document).ready(function () {
  $("#messages").empty();

  $("#profileFormContainer").keypress(function (e) {
    if (e.which === 13) {
      e.preventDefault();
      $("#submitForm").click();
    }
  });

  $("#submitForm").click(function (e) {
    e.preventDefault();

    $("#messages").empty();

    var formData = new FormData($("#profileFormContainer")[0]);

    $.ajax({
      type: "POST",
      url: "profile.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.message) {
          $("#messages").prepend(
            '<div class="alert alert-success" role="alert">' +
              response.message +
              "</div>"
          );

          // Atualiza a imagem de perfil na página
          $("#profilePicture1").attr("src", response.newProfilePicture);

          if (response.newProfilePicture === response.defaultProfilePicture) {
            $("#delete_btn").addClass("d-none"); // Esconde o botão de exclusão
          } else {
            $("#delete_btn").removeClass("d-none"); // Mostra o botão de exclusão
          }
        }
      },
      error: function (xhr, status, error) {
        console.error("Erro na requisição Ajax:", error);
      },
    });
  });

  currentProfilePicture = $("#profilePicture1").attr("src");

  $(".btn-delete").click(function (e) {
    e.preventDefault();

    $("#messages").empty();

    if (confirm("Tem certeza de que deseja excluir a foto de perfil?")) {
      $.ajax({
        type: "POST",
        url: "profile.php",
        data: { delete: true },
        success: function (response) {
          if (response.message) {
            $("#messages").prepend(
              '<div class="alert alert-success" role="alert">' +
                response.message +
                "</div>"
            );

            // Atualiza a imagem de perfil na página
            $("#profilePicture1").attr("src", response.newProfilePicture);

            if (response.newProfilePicture === response.defaultProfilePicture) {
              $("#delete_btn").addClass("d-none"); // Esconde o botão de exclusão
            } else {
              $("#delete_btn").removeClass("d-none"); // Mostra o botão de exclusão
            }
          }
        },
        error: function (xhr, status, error) {
          console.error("Erro na requisição Ajax ao deletar:", error);
        },
      });
    }
  });

  // Armazena o valor do campo de arquivo ao carregar a página
  var initialProfilePictureValue = $("#profile_picture").val();

  // Adiciona um ouvinte de evento de alteração ao input de arquivo
  $("#profile_picture").change(function () {
    // Verifica se o valor do campo de arquivo foi alterado
    if ($(this).val() !== initialProfilePictureValue) {
      readURL(this);
    }
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#profilePicture1").attr("src", e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
});
