$(document).ready(function () {
  // Função para filtrar opções de acordo com o plano selecionado
  function filterOptionsByPlan(selectedPlan) {
    $(".accordion-item").hide();
    $(".accordion-item[data-plan-name='" + selectedPlan + "']").show();

    restoreCollapseStates();
  }

  // Função para obter e armazenar o estado de cada elemento de colapso
  function storeCollapseStates() {
    $(".collapse").each(function () {
      var id = $(this).attr("id");
      collapseStates[id] = $(this).hasClass("show");
    });
  }

  // Função para restaurar o estado de cada elemento de colapso após a atualização
  function restoreCollapseStates() {
    for (var id in collapseStates) {
      if (collapseStates[id]) {
        $("#" + id).addClass("show");
      } else {
        $("#" + id).removeClass("show");
      }
    }
  }

  // Função para aplicar eventos aos elementos após uma atualização via AJAX
  function applyEventListeners() {
    // Botão de Excluir alimento
    $("#mealFoodsContainer").on("click", ".btn-delete-food", function () {
      $(this).prop("disabled", true);

      var selectedPlan = $("#planDropdown").val();
      var foodId = $(this).data("food-id");
      var mealFoodsCount = $(this)
        .closest(".meal_name")
        .find(".btn-delete-food").length;

      if (mealFoodsCount > 1) {
        var confirmDelete = confirm(
          "Tem certeza de que deseja excluir este alimento?"
        );

        if (confirmDelete) {
          $.ajax({
            type: "POST",
            url: "meals_admin.php",
            data: { action: "removeFood", foodId: foodId },
            success: function (data) {
              $(".btn-delete-food").prop("disabled", false);

              $("#mealFoodsContainer").load(
                "meals_admin.php #mealFoodsContainer",
                function () {
                  restoreCollapseStates();
                  filterOptionsByPlan(selectedPlan);
                  $("#planDropdown").val(selectedPlan);
                }
              );
            },
          });
        }
      } else {
        alert(
          "É necessário que cada refeição contenha pelo menos um alimento."
        );
      }
    });

    // Botão de Adicionar Alimento
    $(document).on("click", ".btn-add-food", function () {
      $(this).prop("disabled", true);

      var selectedPlan = $("#planDropdown").val();
      var mealPlan = $(this).data("meal-plan");
      var optionName = $(this).data("option-name");
      var mealName = $(this).data("meal-name");
      var newFoodName = $(this)
        .closest(".input-group")
        .find("[data-food-input]")
        .val();

      storeCollapseStates();

      $.ajax({
        type: "POST",
        url: "meals_admin.php",
        data: {
          action: "addFood",
          planName: mealPlan,
          optionName: optionName,
          mealName: mealName,
          newFoodName: newFoodName,
        },
        success: function (response) {
          $(".btn-add-food").prop("disabled", false);

          var data = JSON.parse(response);

          if (data.status === "success") {
            $("#mealFoodsContainer").load(
              "meals_admin.php #mealFoodsContainer",
              function () {
                restoreCollapseStates();
                filterOptionsByPlan(selectedPlan);
                $("#planDropdown").val(selectedPlan);
              }
            );
          } else {
            alert("Erro: " + data.message);
          }
        },
        error: function (xhr, status, error) {
          console.error("Erro na requisição AJAX:", status, error);
        },
      });
    });

    // Botão de Adicionar Opção
    $(document).on("click", ".btn-add-option", function () {
      $(this).prop("disabled", true);

      var selectedPlan = $("#planDropdown").val();

      $.ajax({
        type: "POST",
        url: "meals_admin.php",
        data: { action: "addOption", selectedPlan: selectedPlan },
        success: function (data) {
          $(".btn-add-option").prop("disabled", false);

          $("#mealFoodsContainer").load(
            "meals_admin.php #mealFoodsContainer",
            function () {
              restoreCollapseStates();
              filterOptionsByPlan(selectedPlan);
              $("#planDropdown").val(selectedPlan);
            }
          );
        },
      });
    });

    // Botão de Remover Opção
    $(document).on("click", ".btn-remove-option", function () {
      $(this).prop("disabled", true);

      var selectedPlan = $("#planDropdown").val();
      var planName = $(this).closest(".accordion-item").data("plan-name");
      var optionName = $(this)
        .closest(".accordion-item")
        .find(".accordion-button")
        .text()
        .trim();
        
      var confirmDelete = confirm(
        "Tem certeza de que deseja excluir esta opção e todos os alimentos associados?"
      );

      if (confirmDelete) {
        $.ajax({
          type: "POST",
          url: "meals_admin.php",
          data: {
            action: "removeOption",
            optionName: optionName,
            planName: planName,
          },
          success: function (data) {
            $(".btn-remove-option").prop("disabled", false);

            $("#mealFoodsContainer").load(
              "meals_admin.php #mealFoodsContainer",
              function () {
                restoreCollapseStates();
                filterOptionsByPlan(selectedPlan);
                $("#planDropdown").val(selectedPlan);
              }
            );
          },
        });
      }
    });

    // Botão de Adicionar Plano
    $(document).on("click", ".btn-add-plan", function () {
      // Desativa o botão para evitar cliques múltiplos
      $(this).prop("disabled", true);

      var newPlanName = $("#newPlanName").val();

      $.ajax({
        type: "POST",
        url: "meals_admin.php",
        data: { action: "addPlan", newPlanName: newPlanName },
        dataType: "json",
        success: function (response) {
          // Ativa o botão novamente após a conclusão da ação
          $(".btn-add-plan").prop("disabled", false);

          if (response.status === "success") {
            // Sucesso: Atualize a interface ou faça o que for necessário
            $("#mealFoodsContainer").load(
              "meals_admin.php #mealFoodsContainer",
              function () {
                restoreCollapseStates();
                filterOptionsByPlan(newPlanName);
                $("#planDropdown").val(newPlanName);
              }
            );
          } else {
            // Erro: Exiba uma mensagem de alerta com a mensagem do erro
            alert(response.message);
          }
        },
      });
    });

    // Botão de Excluir Plano
    $(document).on("click", ".btn-remove-plan", function () {
      var selectedPlan = $("#planDropdown").val();
      if (selectedPlan !== "Plano Padrão") {
        var confirmDelete = confirm(
          "Tem certeza de que deseja excluir este plano e todos os dados associados?"
        );

        if (confirmDelete) {
          $.ajax({
            type: "POST",
            url: "meals_admin.php",
            data: { action: "removePlan", selectedPlan: selectedPlan },
            success: function (data) {
              $("#mealFoodsContainer").load(
                "meals_admin.php #mealFoodsContainer",
                function () {
                  var selectedPlan = $("#planDropdown").val();

                  $("#planDropdown").val(selectedPlan);
                  filterOptionsByPlan(selectedPlan);
                }
              );
            },
          });
        }
      } else {
        alert("Você não pode excluir o plano padrão");
      }
    });
  }

  // Ao alterar a seleção do plano no dropdown
  $(document).on("change", "#planDropdown", function () {
    var selectedPlan = $(this).val();
    filterOptionsByPlan(selectedPlan);
  });

  // Armazenar o estado de cada elemento de colapso
  var collapseStates = {};

  // Chamar a função de eventos após a carga inicial
  applyEventListeners();

  // Disparar o evento de mudança do dropdown ao carregar a página
  $("#planDropdown").trigger("change");
});
