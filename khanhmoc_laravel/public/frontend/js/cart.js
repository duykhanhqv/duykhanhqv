

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    /**
     * js get event add and push data to controler
     * author: khanhmoc
     *
     * 
     */
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
                    alert(data.msg);
                    $('#cart-mini').html(data.html);
                } else
                    toastr.warning(data.msg);
            })
    })
    /**
     * js get event remote and push data to controler
     * author: khanhmoc
     *
     * 
     */
    $('.remoteProductInCart').click(function () {
        var _that = $(this);
        var url = _that.data('href');
        var id = _that.data('id');
        alert('mocmoc');
        $.post(url, { id: id })
            .done(function (data) {
                if (data.status == 'success') {
                    toastr.success(data.msg);
                    $('#cart').html(data.htmlcart);

                    alert(data.msg);
                } else
                    toastr.warning(data.msg);
            })
    })


})