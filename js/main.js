$(document).ready(function() {

  $('#signup').submit(function(e) {
    e.preventDefault();

    var data = $(this).serialize();
    var self = this;

    $.ajax({
      url: '/ajax/store-address.php',
      data: data,
      success: function(msg) {
        $(self).fadeOut(function() {
          $(self).html(msg).fadeIn();;
        });
      }
    });
  });

});
