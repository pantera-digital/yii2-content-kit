$(document).on('click', '.content-ajax-delete', function () {
    const self = $(this);
    if (confirm('Вы уверены?')) {
        $.post(self.attr('href')).always(function (result) {
            if (result.status) {
                window.location.href = result.url;
            } else {
                alert('Ошибка. '+ result.message);
            }
        });
    }
    return false;
});
