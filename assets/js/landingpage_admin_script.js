$(document).ready(function () {
  // Fetch JSON data
  fetch("../../data/landingpage.json")
    .then((response) => response.json())
    .then((data) => {
      // Preencha o formulário com os dados do JSON
      document.getElementById("title").value = data.title;
      document.getElementById("paragraph").value = data.paragraph.replace(
        /<br><br>/g,
        "\n\n"
      );
      document.getElementById("name").value = data.name;
      document.getElementById("instagram").value = data.contact.instagram;
      document.getElementById("whatsapp").value = data.contact.whatsapp;
      document.getElementById("whatsapp_message").value =
        data.contact.whatsapp_message;
      document.getElementById("linkedin").value = data.contact.linkedin;
      document.getElementById("crn").value = data.contact.crn;
    })
    .catch((error) => console.error("Erro ao carregar o JSON:", error));

  // Image preview functionality
  $("#imageInput").change(function () {
    readURL(this);
  });

  $("#submitLandingpage").click(function (event) {
    event.preventDefault();

    // Obter os valores do formulário
    var title = $("#title").val();
    var paragraph = $("#paragraph").val();
    var name = $("#name").val();
    var instagram = $("#instagram").val();
    var whatsapp = $("#whatsapp").val();
    var whatsappMessage = $("#whatsapp_message").val();
    var linkedin = $("#linkedin").val();
    var crn = $("#crn").val();

    var newData = {
      name: name,
      title: title,
      paragraph: paragraph,
      contact: {
        instagram: instagram,
        whatsapp: whatsapp,
        whatsapp_message: whatsappMessage,
        linkedin: linkedin,
        crn: crn,
      },
    };

    var formData = new FormData();

    // Append the file input data to the FormData object
    var fileInput = $("#imageInput")[0].files[0];
    formData.append("imageInput", fileInput);

    // Append the other form data
    formData.append("data", JSON.stringify(newData, null, 2));

    // Perform AJAX request using FormData
    $.ajax({
      type: "POST",
      url: "landingpage.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {

        $("#landingpageMessages").html("");
        $("#landingpageMessages").prepend(response);

        setTimeout(function () {
          $("#landingpageMessages").html("");
        }, 5000);
      },
      error: function (error) {
        console.error(error);
      },
    });
  });
});

// Function to read the selected image file and update the preview
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#imagePreview").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
