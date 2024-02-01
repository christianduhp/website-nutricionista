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

function nextPage(currentPageId, nextPageId) {
  if (validateFields(currentPageId)) {
    $("#signupMessages").html("");
    document.getElementById(currentPageId).classList.remove("active");
    document.getElementById(nextPageId).classList.add("active");
  }
}

function prevPage(currentPageId, prevPageId) {
  $("#signupMessages").html("");
  document.getElementById(currentPageId).classList.remove("active");
  document.getElementById(prevPageId).classList.add("active");
}

async function searchAdress(cep) {
  var mensagemErro = document.getElementById("signupMessages");
  mensagemErro.innerHTML = "";
  try {
    var verifyCEP = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
    var verifyCEPJson = await verifyCEP.json();
    if (verifyCEPJson.erro) {
      throw Error("Cep não existente!");
    }
    var address = document.getElementById("address");
    var neighborhood = document.getElementById("neighborhood");
    var city = document.getElementById("city");
    var uf = document.getElementById("uf");

    address.value = verifyCEPJson.logradouro;
    neighborhood.value = verifyCEPJson.bairro;
    city.value = verifyCEPJson.localidade;
    uf.value = verifyCEPJson.uf;
    $("#nextButton2").prop("disabled", false);

    return true; // CEP is valid
  } catch (erro) {
    mensagemErro.innerHTML =
      '<div class="alert alert-danger">CEP inválido! Tente novamente</div>';
    $("#nextButton2").prop("disabled", true);

    return false; // CEP is not valid
  }
}

// Update the validateFields function to use isValidCEP
function validateFields(pageId) {
  var isValid = true;
  var errorMessage = "";

  // Check required text inputs
  $("#" + pageId + " input[required]").each(function () {
    if ($(this).val() === "") {
      isValid = false;
      errorMessage = "Por favor, preencha todos os campos obrigatórios.";
      $(this).addClass("is-invalid");
      return false;
    } else {
      $(this).removeClass("is-invalid");
    }
  });

  // Check required select inputs (dropdowns)
  if (pageId === "page1") {
    $("#" + pageId + " input#height").each(function () {
      var heightValue = $(this).val();
      if (!(heightValue == "") & !isValidHeight(heightValue)) {
        isValid = false;
        errorMessage = "Altura inválida. Por favor, insira uma altura válida.";
        $(this).addClass("is-invalid");
        return false;
      } else {
        $(this).removeClass("is-invalid");
      }
    });

    // Check email validation
    if (pageId === "page1") {
      var emailValue = $("#email").val();
      if (!(emailValue == "") & !validateEmail(emailValue)) {
        isValid = false;
        errorMessage = "Por favor, insira um endereço de e-mail válido.";
        $("#email").addClass("is-invalid");
      } else {
        $("#email").removeClass("is-invalid");
      }
    }

    var birthdateValue = $("#birthdate").val();
    if (!(birthdateValue == "") & !isValidAge(birthdateValue)) {
      isValid = false;
      errorMessage = "Você deve ter pelo menos 16 anos para se cadastrar.";
      $("#birthdate").addClass("is-invalid");
    } else {
      $("#birthdate").removeClass("is-invalid");
    }
  }

  if (!isValid) {
    $("#signupMessages").html(
      '<div class="alert alert-warning">' + errorMessage + "</div>"
    );
  }

  return isValid;
}

function isValidHeight(height) {
  return /^[1-9]\d*$/.test(height);
}

function validateEmail(email) {
  // Regular expression for a simple email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  return emailRegex.test(email);
}

function isValidAge(birthdate) {
  const today = new Date();
  const birthdateObj = new Date(birthdate);
  const age = today.getFullYear() - birthdateObj.getFullYear();

  // Check if the birthday has occurred this year
  const hasBirthdayOccurred =
    today.getMonth() > birthdateObj.getMonth() ||
    (today.getMonth() === birthdateObj.getMonth() &&
      today.getDate() >= birthdateObj.getDate());

  return age > 16 || (age === 16 && hasBirthdayOccurred);
}
var cep = document.getElementById("cep");
cep.addEventListener("focusout", () => searchAdress(cep.value));
