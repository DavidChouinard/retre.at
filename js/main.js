$(document).ready(function() {

  $('#signup').submit(function(e) {
    e.preventDefault();

    var data = $(this).serialize();

    $(this).fadeOut(function() {
      $(this).text("Adding your email address...").fadeIn();
    });

    $.ajax({
      url: '/ajax/store-address.php',
      data: data,
      success: function(msg) {
        $(this).html(msg);
      }
    });
  });

});
