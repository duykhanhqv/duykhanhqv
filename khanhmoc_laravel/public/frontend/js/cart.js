

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
        var html = "";
        $.post(url, { id: id })
            .done(function (data) {
                if (data.status == 'success') {
                    toastr.success(data.msg);
                    // alert(data.cart);
                    // alert('moc');
                    // html +='<h5>  Mốc mốc </h5>';
                    // $('#cart-mini').html(html);
                    html += "<a href='#'><h5>Mốc</h5></a>";
                    $('#cart-mini').html(html);
                } else
                    toastr.warning(data.msg);
            })
    })

})
{/* <div class='sin-itme clearfix'>
                        < i class='mdi mdi-close' ></i >
                    <a class='cart-img' href='cart.html'><img src='img/cart/1.png' alt='' /></a>
                        <div class='menu-cart-text'>
                            <a href='#'><h5>men’s black t-shirt</h5></a>
                            <span>Color :  Black</span>
                            <span>Size :     SL</span>
                            <strong>$122.00</strong>
                        </div>
                    </div > ; */}
// function AddToCartAjax(id) {
//     $.ajax({
//         url: 'add_to_cart_ajax=' + id,
//         type: 'GET',
//     }).done(function (response) { 
//         console.log(response);
//      })

// }