

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
        $.post(url, { id: id })
            .done(function (data) {
                if (data.status == 'success') {
                    toastr.success(data.msg);
                    $('#cart-mini').html(data.html);
                } else
                    toastr.warning(data.msg);
            })
    })
    /**
     * js get event remove and push data to controler
     * author: khanhmoc
     *
     * 
     */
     $(document).on("click", ".remoteProductInCart", function () {
        var _that = $(this);
        var url = _that.data('href');
        var id = _that.data('id');
        $.post(url, { id: id })
            .done(function (data) {
                if (data.status == 'success') {
                    toastr.success(data.msg);
                    $('#cart').html(data.htmlcart);
                } else
                    toastr.warning(data.msg);
                    $('#cart').html(data.htmlcart);
            })
    })
     /**
     * js get event up and push data to controler
     * author: khanhmoc
     *
     * 
     */
         $(document).on("click", ".upProductInCart", function () {
            var _that = $(this);
            var url = _that.data('href');
            var id = _that.data('id');
            $.post(url, { id: id })
                .done(function (data) {
                    if (data.status == 'success') {
                        toastr.success(data.msg);
                        $('#cart').html(data.htmlcart);
                    } else
                        toastr.warning(data.msg);
                        $('#cart').html(data.htmlcart);
                })
        })
     /**
     * js get event down and push data to controler
     * author: khanhmoc
     *
     * 
     */
      $(document).on("click", ".downProductInCart", function () {
        var _that = $(this);
        var url = _that.data('href');
        var id = _that.data('id');
        $.post(url, { id: id })
            .done(function (data) {
                if (data.status == 'success') {
                    toastr.success(data.msg);
                    $('#cart').html(data.htmlcart);
                } else
                    toastr.warning(data.msg);
                    $('#cart').html(data.htmlcart);
            })
    })


})