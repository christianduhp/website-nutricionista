$(document).ready(function () {
  // Script para exibir informações no modal
  var recipeModal = new bootstrap.Modal(document.getElementById("recipeModal"));

  $("#recipeModal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var title = button.data("recipe-title");
    var imageSrc = button.closest(".card").find(".recipe-img").attr("src");
    var ingredients = button.data("recipe-ingredients").split("\n");
    var instructions = button
      .data("recipe-instructions")
      .split("\n")
      .filter(Boolean);

    var modal = $(this);
    modal.find(".modal-title").text(title);
    modal.find(".recipe-img").attr("src", imageSrc);
    modal.find("#recipeIngredients").empty();
    modal.find("#recipeInstructions").empty();

    ingredients.forEach(function (ingredient) {
      modal.find("#recipeIngredients").append("<li>" + ingredient + "</li>");
    });

    instructions.forEach(function (instruction) {
      modal.find("#recipeInstructions").append("<li>" + instruction + "</li>");
    });
  });

  function filterRecipes() {
    var searchTerm = $("#searchInput").val().toLowerCase();

    $(".recipe-card").each(function () {
      var title = $(this).find(".card-title").text().toLowerCase();
      var description = $(this).find(".card-text").text().toLowerCase();

      // Verifica se o termo de pesquisa está presente no título ou descrição
      if (title.includes(searchTerm) || description.includes(searchTerm)) {
        $(this).show(); // Exibe a receita se corresponder
      } else {
        $(this).hide(); // Oculta a receita se não corresponder
      }
    });
  }

  // Evento de input no campo de pesquisa
  $("#searchInput").on("input", function () {
    filterRecipes();
  });
});

$(document).on("submit", "#addRecipeForm", function (e) {
  e.preventDefault();
  var formData = new FormData(this);

  $.ajax({
    type: "POST",
    url: "recipes_admin.php",
    data: formData,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (response.status === "success") {
        $("#addRecipeMessages").prepend(
          '<div class="alert alert-success" role="alert">' +
            response.message +
            "</div>"
        );

        setTimeout(function () {
          $("#addRecipeModal").modal("hide");

          $("#recipesAdminContainer").load(
            "recipes_admin.php #recipesAdminContainer",
            function () {
              var recipeModal = new bootstrap.Modal(
                document.getElementById("recipeModal")
              );
            }
          );
        }, 1000);
      } else {
        alert(response.message);
      }
    },
    error: function (xhr, status, error) {
      console.log("Erro na requisição Ajax:", xhr.responseText);
      alert("Erro na requisição Ajax. Consulte o console para mais detalhes.");
    },
  });
});

$(document).on("click", "#recipeCardsContainer .delete-recipe", function () {
  var recipeId = $(this).data("recipe-id");

  if (confirm("Tem certeza que deseja excluir esta receita?")) {
    $.ajax({
      type: "POST",
      url: "recipes_admin.php",
      data: {
        recipeId: recipeId,
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          $("#recipesAdminContainer").load(
            "recipes_admin.php #recipesAdminContainer",
            function () {
              var recipeModal = new bootstrap.Modal(
                document.getElementById("recipeModal")
              );
            }
          );
        } else {
          alert(
            "Erro ao excluir receita. Consulte o console para mais detalhes."
          );
          console.log(response.message);
        }
      },
      error: function (xhr, status, error) {
        alert(
          "Erro na requisição Ajax. Consulte o console para mais detalhes."
        );
        console.log(xhr.responseText);
      },
    });
  }
});
