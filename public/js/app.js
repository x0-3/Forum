$(document).ready(function () {
    $(".message").each(function () {
      if ($(this).text().length > 0) { 
      $(this).slideDown(500, function () { 
        $(this).delay(3000).slideUp(500); 
      }); 
    } 
  }); 
})