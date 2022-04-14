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
        email: "There should be @,.,numerics in email id!",
      },
      pw: {
        required: "Please enter Password.",
        minlength: "At least 8 character required!",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
