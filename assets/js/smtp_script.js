$(document).ready(function () {
  $('[data-bs-toggle="tooltip"]').tooltip();

  $("#submitSmtp").click(function () {
    var formData = $("#smtpForm").serialize();

    $.ajax({
      type: "POST",
      url: "smtp.php",
      data: formData,
      success: function (response) {

        $("#smtpMessages").html("");
        $("#smtpMessages").prepend(response);

        setTimeout(function () {
          $("#smtpMessages").html("");
        }, 5000);
      },
      error: function (error) {
        console.error(error);
      },
    });
  });
});
