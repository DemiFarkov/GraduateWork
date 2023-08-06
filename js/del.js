$('.product_container__del').click(function () {
    let dele = $(this).attr('dele');
    var name_thisprise = document.getElementById('thisp'+ dele);
    var name = document.querySelector('p[name="name"]');
    console.log(name_thisprise);
    var thisprice = name_thisprise.getAttribute('thisprice');
    var button = this;
    js_price = js_price - thisprice;
    
    $.ajax({
      type: "POST",
      url: "/delfromcart.php",
      data: { id: dele},
      dataType: 'html',
      cache: false,
      success: function (date) {
        $(button).closest('div').remove();
        name.innerHTML = new Intl.NumberFormat("ru").format(js_price);
      }
    });
    
  });