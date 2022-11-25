// increase vals
$(document).ready(function () {
  $(document).on("click", ".increment-btn", function (e) {
    e.preventDefault();
    var qty = $(this).closest(".product-data").find(".qty-input").val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value < 1000) {
      value++;
      $(this).closest(".product-data").find(".qty-input").val(value);
    }
  });

  // decrease vals
  $(document).on("click", ".decrement-btn", function (e) {
    e.preventDefault();
    var qty = $(this).closest(".product-data").find(".qty-input").val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
      value--;
      $(this).closest(".product-data").find(".qty-input").val(value);
    }
  });

  // add to cart
  $(document).on("click", ".addToCartBtn", function (e) {
    e.preventDefault();

    var qty = $(this).closest(".product-data").find(".qty-input").val();
    var size = $(this).closest(".product-data").find(".size").val();
    var prod_id = $(this).val();

    $.ajax({
      method: "POST",
      url: "controller/handleCart.php",
      data: {
        item_id: prod_id,
        item_qty: qty,
        size: size,
        scope: "add",
      },
      success: function (response) {
        if (response == 201) {
          alertify.success("Item added to cart");
          $(".cart").load(location.href + " .cart");
        } else if (response == "existing") {
          alertify.success("Item alredy in cart");
        } else if (response == 402) {
          alertify.success("Login to continue");
        } else if (response == 500) {
          alertify.success("Something went wrong");
        }
      },
    });
  });

  // add to quotation
  $(document).on("click", ".addToQuoteBtn", function (e) {
    e.preventDefault();

    var qty = $(this).closest(".product-data").find(".qty-input").val();
    var prod_id = $(this).val();

    $.ajax({
      method: "POST",
      url: "controller/handleQuotes.php",
      data: {
        item_id: prod_id,
        item_qty: qty,
        scope: "addQ",
      },
      success: function (response) {
        if (response == 203) {
          alertify.success("Item added successfully");
          $(".quote").load(location.href + " .quote");
        } else if (response == "existing") {
          alertify.success("Item alredy added");
        } else if (response == 402) {
          alertify.success("Login to continue");
        } else if (response == 503) {
          alertify.success("Something went wrong");
        }
      },
    });
  });

  // update qty
  $(document).on("click", ".updateQty", function () {
    var qty = $(this).closest(".product-data").find(".qty-input").val();
    var prod_id = $(this).closest(".product-data").find(".prodId").val();

    $.ajax({
      method: "POST",
      url: "controller/handleCart.php",
      data: {
        item_id: prod_id,
        item_qty: qty,
        scope: "update",
      },
      success: function (response) {
        $("#myCart").load(location.href + " #myCart");
        $("#addition").load(location.href + " #addition");
        // if (response == 200) {
        //   alertify.success("Item successfully deleted");
        // } else {
        //   alertify.success(response);
        // }
      },
    });
  });

  // update quotation qty
  $(document).on("click", ".updateSize", function () {
    var size = $(this).closest(".product-data").find(".updateSize").val();
    var prod_id = $(this).closest(".product-data").find(".prodId").val();

    $.ajax({
      method: "POST",
      url: "controller/handleCart.php",
      data: {
        item_id: prod_id,
        size: size,
        scope: "updateSize",
      },
      success: function (response) {
        $(".quote").load(location.href + " .quote");
        // if (response == 200) {
        //   alertify.success("Item successfully deleted");
        // } else {
        //   alertify.success(response);
        // }
      },
    });
  });

  // delete from cart
  $(document).on("click", ".deleteItem", function () {
    var cart_id = $(this).val();
    // alert(cart_id);

    $.ajax({
      method: "POST",
      url: "controller/handleCart.php",
      data: {
        cart_id: cart_id,
        scope: "delete",
      },
      success: function (response) {
        if (response == 200) {
          alertify.success("Item successfully deleted");
          $("#myCart").load(location.href + " #myCart");
          $(".cart").load(location.href + " .cart");
          $("#addition").load(location.href + " #addition");
        } else {
          alertify.success(response);
        }
      },
    });
  });

  // delete from quote
  $(document).on("click", ".deleteQuote", function () {
    var quote_id = $(this).val();
    // alert(cart_id);

    $.ajax({
      method: "POST",
      url: "controller/handleQuotes.php",
      data: {
        quote_id: quote_id,
        scope: "deleteQ",
      },
      success: function (response) {
        if (response == 200) {
          alertify.success("Item successfully deleted");
          $("#myQuote").load(location.href + " #myQuote");
          $(".quote").load(location.href + " .quote");
        } else {
          alertify.success(response);
        }
      },
    });
  });

  // delete from cart
  $(document).on("change", ".address", function () {
    var address = $(this).val();
    // alert(address);

    $.ajax({
      type: "POST",
      url: "checkout.php",
      dataType: "json",
      data: {
        value: address,
      },
      success: function (response) {
        if (response == 200) {
          alertify.success("Delivery Price Updated");
          $("#shipping").load(location.href + " #shipping");
          $(".total").load(location.href + " .total");
        } else {
          alertify.success(response);
        }
      },
    });
  });
});
