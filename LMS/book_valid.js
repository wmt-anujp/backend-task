$(document).ready(function () {
  $("#addbookform").validate({
    rules: {
      title: {
        required: true,
      },
      pages: {
        required: true,
        number: true,
      },
      lang: {
        required: true,
      },
      author: {
        required: true,
      },
      img: {
        required: true,
      },
      isbn: {
        required: true,
        maxlength: 13,
      },
      desc: {
        required: true,
      },
      price: {
        required: true,
        number: true,
      },
    },
    messages: {
      title: {
        required: "Please Enter Book Title",
      },
      pages: {
        required: "Please Enter Number of Pages in Book",
        number: "Pages Should be in numbers only",
      },
      lang: {
        required: "Please Enter Book Language",
      },
      author: {
        required: "Please select Author Name of Book",
      },
      img: {
        required: "Please Select Cover Image of Book",
      },
      isbn: {
        required: "Please Enter ISBN Number of Book",
        maxlength: "Length of ISBN number should be 13 digit",
      },
      desc: {
        required: "Please Enter Description of Book",
      },
      price: {
        required: "Please Enter Book Price",
        number: "Book Price Should be in number only",
      },
    },

    submitHandler: function (form) {
      form.submit();
    },
  });
});
