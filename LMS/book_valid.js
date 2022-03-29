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
      language: {
        required: true,
      },
      bookauthor: {
        required: true,
      },
      coverimg: {
        required: true,
      },
      isbn: {
        required: true,
        maxlength: 13,
      },
      description: {
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
      language: {
        required: "Please Enter Book Language",
      },
      bookauthor: {
        required: "Please select Author Name of Book",
      },
      coverimg: {
        required: "Please Select Cover Image of Book",
      },
      isbn: {
        required: "Please Enter ISBN Number of Book",
        maxlength: "Length of ISBN number should be 13 digit",
      },
      description: {
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
