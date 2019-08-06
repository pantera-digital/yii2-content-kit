$(document).on('click', '.content-ajax-delete', function () {
    const self = $(this);
    if (confirm('Вы уверены?')) {
        $.post(self.attr('href')).always(function (result) {
            if (result.status) {
                window.location.href = result.url;
            } else {
                Swal({
                    title: 'Ошибка',
                    text: result.message,
                    type: 'warning',
                })
            }
        });
    }
    return false;
});