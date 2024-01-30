$(document).ready(function () {
  const UserEditor = {
    selectedUserId: 0,
    selectedUserName: "",
    selectedUserEmail: "",
    selectedUserBirthdate: "",
    selectedUserPhoneNumber: "",
    selectedUserHeight: "",
    selectedUserGender: "",
    selectedUserNationality: "",
    selectedUserCity: "",
    selectedUserAddress: "",
    selectedUserAddressNumber: "",
    selectedUserCreatedAt: "",
    selectedUserOccupation: "",
    selectedCommunicationPreference: "",
    selectedPaymentPreference: "",
    selectedPlanName: "",
    selectedQuestionnaires: "",

    fillEditForm: function () {
      $("#editUserName").val(this.selectedUserName.trim());
      $("#editUserEmail").val(this.selectedUserEmail.trim());
      $("#editUserBirthdate").val(this.selectedUserBirthdate.trim());
      $("#editUserPhoneNumber").val(this.selectedUserPhoneNumber.trim());
      $("#editUserHeight").val(this.selectedUserHeight.trim());
      $("#editUserGender").val(this.selectedUserGender.trim());
      $("#editUserNationality").val(this.selectedUserNationality.trim());
      $("#editUserCity").val(this.selectedUserCity.trim());
      $("#editUserAddress").val(this.selectedUserAddress.trim());
      $("#editUserAddressNumber").val(this.selectedUserAddressNumber.trim());
      $("#editUserCreatedAt").val(this.selectedUserCreatedAt.trim());
      $("#editUserOccupation").val(this.selectedUserOccupation.trim());

      // Preencher a preferência de comunicação
      $("#editCommunicationPreference option").prop("selected", false);
      $(
        "#editCommunicationPreference option[value='" +
          this.selectedCommunicationPreference.trim() +
          "']"
      ).prop("selected", true);

      // Preencher a preferência de pagamento
      $("#editPaymentPreference option").prop("selected", false);
      $(
        "#editPaymentPreference option[value='" +
          this.selectedPaymentPreference.trim() +
          "']"
      ).prop("selected", true);

      // Preencher o plano alimentar
      $("#editPlanName").val(this.selectedPlanName.trim());

      // Desmarcar todos os checkboxes antes de preencher
      $("input[name='selectedQuestionnaires[]']").prop("checked", false);

      if (this.selectedQuestionnaires) {
        // Converter a string de títulos em um array
        const selectedQuestionnairesArray =
          this.selectedQuestionnaires.split(",");

        // Marcar os checkboxes correspondentes aos questionários selecionados
        selectedQuestionnairesArray.forEach((questionnaireTitle) => {
          $(
            "input[name='selectedQuestionnaires[]'][value='" +
              questionnaireTitle +
              "']"
          ).prop("checked", true);
        });
      }
    },

    openEditModal: function (
      userId,
      userName,
      userEmail,
      userBirthdate,
      userPhoneNumber,
      userHeight,
      userGender,
      userNationality,
      userCity,
      userAddress,
      userAddressNumber,
      userCreatedAt,
      userOccupation,
      userCommunicationPreference,
      userPaymentPreference,
      userplanName,
      selectedQuestionnaires
    ) {
      this.selectedUserId = userId;
      this.selectedUserName = userName;
      this.selectedUserEmail = userEmail;
      this.selectedUserBirthdate = userBirthdate;
      this.selectedUserPhoneNumber = userPhoneNumber;
      this.selectedUserHeight = userHeight;
      this.selectedUserGender = userGender;
      this.selectedUserNationality = userNationality;
      this.selectedUserCity = userCity;
      this.selectedUserAddress = userAddress;
      this.selectedUserAddressNumber = userAddressNumber;
      this.selectedUserCreatedAt = userCreatedAt;
      this.selectedUserOccupation = userOccupation;
      this.selectedCommunicationPreference = userCommunicationPreference;
      this.selectedPaymentPreference = userPaymentPreference;
      this.selectedPlanName = userplanName;
      this.selectedQuestionnaires = selectedQuestionnaires;

      // Fill the edit form with the selected values
      this.fillEditForm();

      $("#editUserMessages").empty();
      $("#editUserModal").modal("show");
    },

    handleAjaxSuccess: function (response) {
      $("#editUserMessages").prepend(response);

      setTimeout(() => {
        this.reloadTable();
      }, 1500);
    },

    handleAjaxError: function (error) {
      $("#editUserMessages").prepend(error);
    },

    reloadTable: function () {
      reloadUserTable();
    },
  };

  function getSelectedQuestionnaires() {
    const selectedQuestionnaires = [];

    $(".questionnaire-checkbox:checked").each(function () {
      selectedQuestionnaires.push($(this).val());
    });

    return selectedQuestionnaires;
  }

  // Event Handlers
  function handleEditIconClick() {
    const userId = $(this).data("user-id");
    const $row = $(this).closest("tr");
    const userName = $row.find("td:nth-child(2)").text();
    const userEmail = $row.find("td:nth-child(3)").text();
    const userBirthdate = $row.find("td:nth-child(4)").text();
    const userPhoneNumber = $row.find("td:nth-child(5)").text();
    const userHeight = $row.find("td:nth-child(6)").text();
    const userGender = $row.find("td:nth-child(7)").text();
    const userNationality = $row.find("td:nth-child(8)").text();
    const userCity = $row.find("td:nth-child(9)").text();
    const userAddress = $row.find("td:nth-child(10)").text();
    const userAddressNumber = $row.find("td:nth-child(11)").text();
    const userCreatedAt = $row.find("td:nth-child(12)").text();
    const userOccupation = $row.find("td:nth-child(13)").text();
    const userCommunicationPreference = $row.find("td:nth-child(14)").text();
    const userPaymentPreference = $row.find("td:nth-child(15)").text();
    const userplanName = $row.find("td:nth-child(16)").text();
    const selectedQuestionnaires = $row.find("td:nth-child(17)").text();
    UserEditor.openEditModal(
      userId,
      userName,
      userEmail,
      userBirthdate,
      userPhoneNumber,
      userHeight,
      userGender,
      userNationality,
      userCity,
      userAddress,
      userAddressNumber,
      userCreatedAt,
      userOccupation,
      userCommunicationPreference,
      userPaymentPreference,
      userplanName,
      selectedQuestionnaires
    );
  }

  function handleSubmitUserClick() {
    const editUserName = $("#editUserName").val();
    const editUserEmail = $("#editUserEmail").val();
    const editUserId = UserEditor.selectedUserId;
    const selectedQuestionnaires = getSelectedQuestionnaires();
    $.ajax({
      type: "POST",
      url: "users.php",
      data: {
        editUserId: editUserId,
        editUserName: editUserName,
        editUserEmail: editUserEmail,
        editUserBirthdate: $("#editUserBirthdate").val(),
        editUserPhoneNumber: $("#editUserPhoneNumber").val(),
        editUserHeight: $("#editUserHeight").val(),
        editUserGender: $("#editUserGender").val(),
        editUserNationality: $("#editUserNationality").val(),
        editUserCity: $("#editUserCity").val(),
        editUserAddress: $("#editUserAddress").val(),
        editUserAddressNumber: $("#editUserAddressNumber").val(),
        editUserOccupation: $("#editUserOccupation").val(),
        editCommunicationPreference: $("#editCommunicationPreference").val(),
        editPaymentPreference: $("#editPaymentPreference").val(),
        editPlanName: $("#editPlanName").val(),
        editQuestionnaires: selectedQuestionnaires,
      },
      success: UserEditor.handleAjaxSuccess.bind(UserEditor),
      error: UserEditor.handleAjaxError.bind(UserEditor),
    });
  }

  function handleSearchInput() {
    const searchTerm = $(this).val().toLowerCase();
    filterTable(searchTerm);
  }

  function handleDeleteIconClick() {
    $("#deleteUserMessages").empty();
    $("#deleteUserModal").modal("show");
  }

  function handleConfirmDeleteClick() {
    // Disable the button to prevent multiple clicks
    $("#confirmDelete").prop("disabled", true);

    $.ajax({
      type: "POST",
      url: "users.php",
      data: { userId: UserEditor.selectedUserId },
      success: function (response) {
        $("#deleteUserMessages").prepend(response);

        setTimeout(function () {
          $("#confirmDelete").prop("disabled", false);

          reloadUserTable();
        }, 1000);
      },
      error: function (xhr, status, error) {
        console.error("AJAX Request Failed:", status, error);

        // Enable the button in case of an error
        $("#confirmDelete").prop("disabled", false);
      },
    });
  }

  function handleBookIconClick() {
    const userId = $(this).data("user-id");

    $.ajax({
      type: "GET",
      url: "users.php",
      data: { userId: userId, dataType: "responses" },
      dataType: "json",
      success: function (response) {
        // Handle user responses
        var userResponses = response.user_responses;
        $("#userResponsesTableBody").empty();

        $.each(userResponses, function (index, item) {
          var row =
            "<tr>" +
            "<td>" +
            item.questionnaire_title +
            "</td>" +
            "<td>" +
            item.question +
            "</td>" +
            "<td>" +
            item.response +
            "</td>" +
            "</tr>";

          $("#userResponsesTableBody").append(row);
        });

        $("#userResponsesModal").modal("show");
      },
    });
  }

  function handleMedicalIconClick() {
    const userId = $(this).data("user-id");

    $("#userMeasurementsModal").modal("show");
    $("#deleteMeasurementsMessages").html("");
    $("#addMeasurementsMessages").html("");

    // Unbind previously attached click event handlers from the submit button
    $("#submitMeasurementsBtn").off("click");

    // Event listener for the submit button
    $("#submitMeasurementsBtn").on("click", function () {
      submitMeasurements(userId);
    });

    getMeasurementData(userId);
  }

  function handleDeleteRecordClick() {
    const recordId = $(this).data("record-id");
    const userId = $(this).data("user-id");

    $.ajax({
      type: "POST",
      url: "users.php",
      data: {
        dataType: "deleteRecord",
        recordId: recordId,
      },
      success: function (response) {
        $("#deleteMeasurementsMessages").html("");
        $("#deleteMeasurementsMessages").prepend(response);

        getMeasurementData(userId);
      },
      error: function (error) {
        console.log("Ajax error. Error:", error);
      },
    });
  }

  // Measurement Functions
  function getMeasurementData(userId) {
    // Reset measurementData array
    const measurementData = [];

    $.ajax({
      type: "GET",
      url: "users.php",
      data: { userId: userId, dataType: "measurements" },
      dataType: "json",
      success: function (data) {
        const existingMeasurementsTable = $("#userMeasurementsTableBody");
        const noDataMessage = $("#noDataMessage");

        if (data && data.column_names) {
          const parameterNames = Object.keys(data.column_names);
          const evaluationDates = data.evaluation_dates || []; // Use an empty array if evaluation_dates is undefined

          if (data.data && data.data.length > 0) {
            // If there is data for the user, update measurementData
            measurementData.push(...data.data);

            // Display the data in the table
            displayMeasurementData(userId, measurementData, evaluationDates);

            // Show the table and hide the no data message
            existingMeasurementsTable.show();
            noDataMessage.hide();
          } else {
            // If there is no data for the user, display the no data message and hide the table
            displayMeasurementData(userId, [], evaluationDates);
            existingMeasurementsTable.hide();
            noDataMessage.show();
            console.log("No measurement data available for the user.");
          }
        } else {
          // Handle the case where column_names is missing or invalid
          console.log("Invalid or missing data structure.");
        }
      },
      error: function (xhr, status, error) {
        // Handle the error gracefully without affecting the display
        console.log("Error fetching measurement data. Error:", status, error);
        const existingMeasurementsTable = $("#userMeasurementsTableBody");
        const noDataMessage = $("#noDataMessage");

        // Display the no data message and hide the table
        displayMeasurementData(userId, [], []);
        existingMeasurementsTable.hide();
        noDataMessage.show();
      },
    });
  }

  function submitMeasurements(userId) {
    const form = $("#addMeasurementsForm");
    const submitBtn = $("#submitMeasurementsBtn");

    // Disable the submit button to prevent multiple submissions
    submitBtn.prop("disabled", true);

    $.ajax({
      type: "POST",
      url: "users.php",
      data: {
        userId: userId,
        dataType: "addMeasurements",
        measuredAt: $("#measuredAt").val(),
        bodyMass: $("#bodyMass").val(),
        bodyFat: $("#bodyFat").val(),
        leanBodyMass: $("#leanBodyMass").val(),
        weight: $("#weight").val(),
        bmi: $("#bmi").val(),
        age: $("#age").val(),
        visceralFat: $("#visceralFat").val(),
        basalMetabolism: $("#basalMetabolism").val(),
        waistHipRatio: $("#waistHipRatio").val(),
        trunkMeasurement: $("#trunkMeasurement").val(),
        toracicSkinfold: $("#toracicSkinfold").val(),
        tricepsSkinfold: $("#tricepsSkinfold").val(),
        abdominalSkinfold: $("#abdominalSkinfold").val(),
        thighSkinfold: $("#thighSkinfold").val(),
        axillarySkinfold: $("#axillarySkinfold").val(),
        suprailiacSkinfold: $("#suprailiacSkinfold").val(),
        subscapularSkinfold: $("#subscapularSkinfold").val(),
        chestGirth: $("#chestGirth").val(),
        hipGirth: $("#hipGirth").val(),
        waistGirth: $("#waistGirth").val(),
        abdomenGirth: $("#abdomenGirth").val(),
        leftArm: $("#leftArm").val(),
        rightArm: $("#rightArm").val(),
        leftForearm: $("#leftForearm").val(),
        rightForearm: $("#rightForearm").val(),
        rightThigh: $("#rightThigh").val(),
        leftThigh: $("#leftThigh").val(),
        rightCalf: $("#rightCalf").val(),
        leftCalf: $("#leftCalf").val(),
      },
      success: function (response) {
        $("#addMeasurementsMessages").html("");
        $("#addMeasurementsMessages").prepend(response);

        setTimeout(function () {
          $("#addMeasurementsMessages").html("");
        }, 5000);

        getMeasurementData(userId);

        if (response.includes("success")) {
          // Reset the form only when the request is successful
          form[0].reset();
        }
        // Re-enable the submit button
        submitBtn.prop("disabled", false);
      },
      error: function (error) {
        console.log("Ajax error. Error:", error);

        // Re-enable the submit button in case of an error
        submitBtn.prop("disabled", false);
      },
    });
  }

  function displayMeasurementData(userId, measurementData, evaluationDates) {
    const parameterMapping = {
      body_mass: "Massa Corporal",
      body_fat: "Massa Gorda",
      lean_body_mass: "Massa Magra",
      weight: "Peso",
      bmi: "IMC",
      age: "Idade Corporal",
      visceral_fat: "Gordura Visceral",
      basal_metabolism: "Metabolismo Basal",
      waist_hip_ratio: "Relação Cintura Quadril",
      trunk_measurement: "Medida do Tronco",
      toracic_skinfold: "Dobra Cutânea - Torácica",
      triceps_skinfold: "Dobra Cutânea - Tríceps",
      abdominal_skinfold: "Dobra Cutânea - Abdominal",
      thigh_skinfold: "Dobra Cutânea - Coxa",
      axillary_skinfold: "Dobra Cutânea - Axilar Média",
      suprailiac_skinfold: "Dobra Cutânea - Supra-ilíaca",
      subscapular_skinfold: "Dobra Cutânea - Subescapular",
      chest_girth: "Medida do Tronco - Torácica",
      hip_girth: "Medida do Tronco - Quadril",
      waist_girth: "Medida do Tronco - Cintura",
      abdomen_girth: "Medida do Tronco - Abdome",
      left_arm: "Membros Sup. - Braço Esquerdo",
      right_arm: "Membros Sup. - Braço Direito",
      left_forearm: "Membros Sup. - Antebraço Esquerdo",
      right_forearm: "Membros Sup. - Antebraço Direito",
      right_thigh: "Membros Inf. - Coxa Direita",
      left_thigh: "Membros Inf. - Coxa Esquerda",
      right_calf: "Membros Inf. - Panturrilha Direita",
      left_calf: "Membros Inf. - Panturrilha Esquerda",
    };

    const tableBody = $("#userMeasurementsTableBody");
    tableBody.empty();

    // Create the header row with parameter names and evaluation dates
    const headerRow = $("<tr>");
    headerRow.append($("<th>").text("Parâmetro"));

    evaluationDates.forEach((date) => {
      headerRow.append($("<th>").text(date));
    });

    tableBody.append(headerRow);

    // Iterate over the parameterMapping keys
    for (const columnName in parameterMapping) {
      // Create a row for each parameter
      const row = $("<tr>");
      row.append($("<td>").text(parameterMapping[columnName]));

      // Iterate over the evaluation dates
      evaluationDates.forEach((date) => {
        // Find the corresponding measurement for the parameter and date
        const measurement = measurementData.find(
          (data) => data.measured_at === date
        );

        // If measurement exists, append the value to the row, otherwise, append an empty cell
        if (measurement) {
          row.append($("<td>").text(measurement[columnName]));
        } else {
          row.append($("<td>").text(""));
        }
      });

      // Append the row to the table body
      tableBody.append(row);
    }

    // Create a row at the bottom for "Delete" buttons
    const deleteRow = $("<tr>");
    deleteRow.append($("<td>").text("Ações"));

    evaluationDates.forEach((date) => {
      const measurement = measurementData.find(
        (data) => data.measured_at === date
      );

      if (measurement) {
        const deleteButton = $("<button>")
          .addClass("btn btn-danger btn-sm delete-record")
          .attr("data-record-id", measurement.id)
          .attr("data-user-id", userId)
          .text("Delete");

        deleteRow.append($("<td>").append(deleteButton));
      } else {
        deleteRow.append($("<td>").text(""));
      }
    });

    tableBody.append(deleteRow);
  }

  // Other Utility Functions
  function reloadUserTable() {
    $.ajax({
      url: "users.php",
      type: "GET",
      dataType: "html",
      success: function (data) {
        $(
          "#editUserModal, #deleteUserModal, #userResponsesModal, #userMeasurementsModal"
        ).modal("hide");
        $("#userContent").html(data);
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
      },
      error: function () {
        alert("Error loading the page.");
      },
    });
  }

  function filterTable(searchTerm) {
    // Itera sobre cada linha da tabela
    $("tbody tr").each(function () {
      const userName = $(this).find("td:nth-child(2)").text().toLowerCase();
      const userEmail = $(this).find("td:nth-child(3)").text().toLowerCase();

      // Oculta ou exibe a linha com base no termo de pesquisa
      if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }

  // Register Event Listeners
  $("body").on("click", ".edit-icon", handleEditIconClick);
  $("#submitUser").click(handleSubmitUserClick);
  $("#searchInput").on("input", handleSearchInput);
  $("body").on("click", "#deleteUserBtnInEdit", handleDeleteIconClick);
  $("#confirmDelete").click(handleConfirmDeleteClick);
  $("body").on("click", ".fa-book", handleBookIconClick);
  $("body").on("click", ".fa-notes-medical", handleMedicalIconClick);
  $("#userMeasurementsTableBody").on(
    "click",
    ".delete-record",
    handleDeleteRecordClick
  );
});
