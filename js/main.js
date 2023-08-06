$('.add_to_cart').click(function () {
  let tid = $(this).attr('tid');
  $.ajax({
    type: "POST",
    url: "/addtocart.php",
    data: { id: tid },
    dataType: 'html',
    cache: false,
    success: function (date) {
    }
  });
});