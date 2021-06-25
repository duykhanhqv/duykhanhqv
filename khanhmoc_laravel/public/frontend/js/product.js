

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
        /**
     * js get event switch to page and push data to controler
     * author: khanhmoc
     *
     * 
     */
        $(document).on("click", ".listProductAjax", function () {
        var _that = $(this);
        var url = _that.data('href');
        var id = _that.data('id');
        $.post(url, { id: id })
            .done(function (data) {
                if (data.status == 'success') {
                    toastr.success(data.msg);
                    $('#page-load').html(data.htmllisting);
                } else
                    toastr.warning(data.msg);
            })
    })
     /**
     * js get event switch list product and push data to controler
     * author: khanhmoc
     *
     * 
     */
      $(document).on("click", ".productsListAjax", function () {
        var _that = $(this);
        var url = _that.data('href');
        var id = _that.data('id');
        $.post(url, { id: id })
            .done(function (data) {
                if (data.status == 'success') {
                    toastr.success(data.msg);
                    $('#grid').html(data.htmllist);
                } else
                    toastr.warning(data.msg);
            })
    })
         /**
     * js get event switch gird product and push data to controler
     * author: khanhmoc
     *
     * 
     */
          $(document).on("click", ".productsGirdAjax", function () {
            var _that = $(this);
            var url = _that.data('href');
            var id = _that.data('id');
            $.post(url, { id: id })
                .done(function (data) {
                    if (data.status == 'success') {
                        toastr.success(data.msg);
                        $('#list').html(data.htmlgird);
                    } else
                        toastr.warning(data.msg);
                })
        })




})