$(document).ready(function () {
  $("#addauthorform").validate({
    rules: {
      fname: {
        required: true,
      },
      lname: {
        required: true,
      },
      dob: {
        required: true,
      },
      gender: {
        required: true,
      },
      address: {
        required: true,
      },
      mno: {
        required: true,
        number: true,
      },
      description: {
        required: true,
      },
    },
    messages: {
      fname: {
        required: "Please Enter First Name",
      },
      lname: {
        required: "Please Enter Authors Last Name",
      },
      dob: {
        required: "Please Select Authors Date of Birth",
      },
      gender: {
        required: "Please Select Gender of Author",
      },
      address: {
        required: "Please Enter Address of Author",
      },
      mno: {
        required: "Please Enter Mobile no of Author",
        number: "Mobile no should be in numbers only",
      },
      description: {
        required: "Please Enter Description about author",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
