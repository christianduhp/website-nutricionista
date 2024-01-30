function goBack() {
  $.ajax({
    type: "GET",
    url: "questionnaire.php",
    success: function (data) {
      $("#questionnaireContent").html(data);
    },
    error: function (xhr, status, error) {
      console.error(xhr.responseText);
    },
  });
}

function loadQuestionnaireAnswers(questionnaireId, questionnaireName) {
  $.ajax({
    type: "GET",
    url: "questionnaire_answer.php",
    data: {
      id: questionnaireId,
      name: questionnaireName,
    },
    success: function (data) {
      $("#questionnaireContent").html(data);
    },
    error: function (xhr, status, error) {
      console.error(xhr.responseText);
    },
  });
}

$(document).ready(function () {
  $("#submitBtn").on("click", function () {
    var formData = new FormData($("#questionnaireForm")[0]);

    // Handle textareas
    $("textarea").each(function () {
      var value = $(this).val().trim();
      if (value !== "") {
        formData.append($(this).attr("name"), value);
      }
    });

    // Handle radio buttons
    $("input[type=radio]:checked").each(function () {
      formData.append($(this).attr("name"), $(this).val());
    });

    // Handle checkboxes
    var checkboxValues = {}; // To store checkbox values and avoid duplicates
    $("input[type=checkbox]:checked").each(function () {
      var name = $(this).attr("name");
      var value = $(this).val();
      if (!checkboxValues[name]) {
        checkboxValues[name] = [];
      }
      checkboxValues[name].push(value);
    });

    // Append unique checkbox values to formData
    for (var name in checkboxValues) {
      if (checkboxValues.hasOwnProperty(name)) {
        var values = checkboxValues[name].join(","); // Convert array to comma-separated string
        formData.append(name, values);
      }
    }

    // Handle dropdowns
    $("select").each(function () {
      var value = $(this).val().trim();
      if (value !== "") {
        formData.append($(this).attr("name"), value);
      }
    });

    $.ajax({
      type: "POST",
      url: "questionnaire_answer.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        $("#anwsersMessages").html("");
        $("#anwsersMessages").prepend(response);
      },
      error: function (xhr, status, error) {
        console.error("Erro ao enviar respostas:", xhr.responseText);
      },
    });
  });
});
