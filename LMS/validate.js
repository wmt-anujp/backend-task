$(document).ready(function () {
  $("#form").validate({
    rules: {
      Email: {
        required: true,
        email: true,
      },
      pw: {
        required: true,
        minlength: 8,
      },
    },
    messages: {
      Email: {
        required: "Please Enter Email ID.",
        email: "There should be @,.,numerics in the email id!",
      },
      pw: {
        required: "Please enter Password.",
        minlength: "Password must be at least 8 characters long.",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
