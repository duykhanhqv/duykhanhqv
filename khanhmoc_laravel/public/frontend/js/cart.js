

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
                    alert(data.msg);
                    $('#cart-mini').html(data.html);
                } else
                    toastr.warning(data.msg);
            })
    })

})