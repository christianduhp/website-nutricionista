$("#sidebar .ajax-link, #offcanvasNavbar .ajax-link-offcanvas").on("click", function (e) {
  e.preventDefault();
  $("#messages").empty();


  if (!$(this).hasClass("active")) {

    $("#sidebar .nav-item a, #offcanvasNavbar .nav-item a").removeClass("active");
    $(this).addClass("active");

    var pageUrl = $(this).attr("href");


    $("#offcanvasNavbar").offcanvas('hide');

    $.ajax({
      url: pageUrl,
      type: "GET",
      dataType: "html",
      success: function (data) {

        $("#page-content").html(data);

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
});