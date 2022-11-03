$(document).ready(function () {
  // onclick product delete button
  $(document).on("click", ".delete_product_button", function (e) {
    e.preventDefault();

    var id = $(this).val();
    // alert(id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "code.php",
          data: {
            product_id: id,
            delete_product_button: true,
          },
          success: function (response) {
            if (response == 200) {
              swal("Success!", "Product succesfully deleted", "success");
              $("#product_table").load(location.href + " #product_table");
            } else if (response == 500) {
              swal("Error!", "Something went wrong", "error");
            }
          },
        });
      }
    });
  });

  // on click category button
  $(document).on("click", ".delete_category_button", function (e) {
    e.preventDefault();

    var id = $(this).val();
    // alert(id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "code.php",
          data: {
            category_id: id,
            delete_category_button: true,
          },
          success: function (response) {
            if (response == 200) {
              swal("Success!", "Category succesfully deleted", "success");
              $("#category_table").load(location.href + " #category_table");
            } else if (response == 500) {
              swal("Error!", "Something went wrong", "error");
            }
          },
        });
      }
    });
  });

  // on click user button
  $(document).on("click", ".delete_user_button", function (e) {
    e.preventDefault();

    var id = $(this).val();
    // alert(id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "code.php",
          data: {
            user_id: id,
            delete_user_button: true,
          },
          success: function (response) {
            if (response == 200) {
              swal("Success!", "User succesfully deleted", "success");
              $("#user_table").load(location.href + " #user_table");
            } else if (response == 500) {
              swal("Error!", "Something went wrong", "error");
            }
          },
        });
      }
    });
  });

  // on click request button
  $(document).on("click", ".delete_request_btn", function (e) {
    e.preventDefault();

    var id = $(this).val();
    // alert(id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "code.php",
          data: {
            id: id,
            delete_request_btn: true,
          },
          success: function (response) {
            if (response == 200) {
              swal("Success!", "Request succesfully deleted", "success");
              $("#request_table").load(location.href + " #request_table");
            } else if (response == 500) {
              swal("Error!", "Something went wrong", "error");
            }
          },
        });
      }
    });
  });

  // delete img
  $(document).on("click", ".delete_image_button", function (e) {
    e.preventDefault();

    var id = $(this).val();
    // alert(id);

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          method: "POST",
          url: "code.php",
          data: {
            id: id,
            delete_image_button: true,
          },
          success: function (response) {
            if (response == 200) {
              swal("Success!", "Image succesfully deleted", "success");
              $("#image_table").load(location.href + " #image_table");
            } else if (response == 500) {
              swal("Error!", "Something went wrong", "error");
            }
          },
        });
      }
    });
  });
});
