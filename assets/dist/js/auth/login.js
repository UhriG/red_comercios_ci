(function ($) {
  $("#frm_login").submit(function (ev) {
    $("#alert").html("");
    $.ajax({
      url: "login/validate",
      type: "POST",
      data: $(this).serialize(),
      success: function (err) {
        var json = JSON.parse(err);
        //console.log(json);
        window.location.replace(json.url);
      },
      statusCode: {
        400: function (xhr) {
          $("#email > input").removeClass("is-invalid");
          $("#password > input").removeClass("is-invalid");
          var json = JSON.parse(xhr.responseText);
          if (json.email.length != 0) {
            $("#email > div:not(.input-group-append)").html(json.email);
            $("#email > input:not(.input-group-append)").addClass("is-invalid");
          }
          if (json.password.length != 0) {
            $("#password > div:not(.input-group-append)").html(json.password);
            $("#password > input:not(.input-group-append)").addClass(
              "is-invalid"
            );
          }
        },
        401: function (xhr) {
          var json = JSON.parse(xhr.responseText);
          console.log(json);
          $("#alert").html(
            `<div class="alert alert-danger" role="alert">${json.msg}</div>`
          );
        },
      },
    });
    ev.preventDefault();
  });
})(jQuery);
