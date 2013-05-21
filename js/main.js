$(document).ready(function() {
  $('#signup').submit(function(e) {
    e.preventDefault();
    console.log("test");
    $("#message").html("<span class='error'>Adding your email address...</span>");
    $.ajax({
      url: '/ajax/store-address.php',
      data: $('#signup').serialize(),
      success: function(msg) {
        $('#message').html(msg);
      }
    });
  });
});
