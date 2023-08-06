$('.delite').click(function () {
    let num = $(this).attr('num');
    var button = this;
    $.ajax({
        type: "POST",
        url: "/admin/delfrombd.php",
        data: { num: num },
        dataType: 'html',
        cache: false,
        success: function (date) {
            $(button).closest('div').remove();
            console.log(num);
        }
    });
});