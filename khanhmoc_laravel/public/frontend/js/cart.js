

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
    $('.addToCart').click(function () {

        var _that = $(this);
        var url = _that.data('href');
        var id = _that.data('id');
        alert('mocmoc');
        $.post(url, { id: id })
            .done(function (data) {
                if (data.status == 'success') {
                    toastr.success(data.msg);
                    alert(data.cart);
                    alert('moc');

                } else
                alert('1111111');
            })
    })

})

// function AddToCartAjax(id) {
//     $.ajax({
//         url: 'add_to_cart_ajax=' + id,
//         type: 'GET',
//     }).done(function (response) { 
//         console.log(response);
//      })

// }