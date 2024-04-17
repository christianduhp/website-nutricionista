$("#sidebar .ajax-link, #offcanvasNavbar .ajax-link-offcanvas").on(
  "click",
  function (e) {
    e.preventDefault();
    $("#messages").empty();

    var pageUrl = $(this).attr("href");

    if ($(this).hasClass("active")) {
      return; // Sai da função se o link já estiver ativo
    }

    // Remove a classe 'active' de todos os links no sidebar e offcanvasNavbar
    $("#sidebar .nav-item a, #offcanvasNavbar .nav-item a").removeClass(
      "active"
    );

    // Adiciona a classe 'active' ao link clicado
    $(this).addClass("active");

    // Esconde o offcanvasNavbar
    $("#offcanvasNavbar").offcanvas("hide");

    // Verifica se o conteúdo já está em cache
    var cachedContent = sessionStorage.getItem(pageUrl);

    if (cachedContent) {
      // Se o conteúdo estiver em cache, exibe-o
      $("#page-content").html(cachedContent);
    } else {
      // Se o conteúdo não estiver em cache, exibe o spinner de carregamento
      $("#page-content").html(`
        <div id="loadingSpinner" class="text-center d-flex justify-content-center align-items-center h-100">
          <div class="spinner-border" role="status" style="color: var(--font-color); width: 3em; height: 3em;">
            <span class="visually-hidden">Carregando...</span>
          </div>
        </div>
      `);

      // Faz uma requisição AJAX para obter o conteúdo da página
      $.ajax({
        url: pageUrl,
        type: "GET",
        dataType: "html",
        success: function (data) {
          // Cache do conteúdo
          sessionStorage.setItem(pageUrl, data);

          // Exibe o conteúdo da página
          $("#page-content").html(data);

          // Fecha o sidebar se a tela for pequena
          if (window.matchMedia("(max-width: 769px)").matches) {
            $("#sidebar").toggleClass("active");
          }
        },
        error: function (xhr, status, error) {
          console.error("Status: " + status);
          console.error("Error: " + error);
        },
      });
    }
  }
);
