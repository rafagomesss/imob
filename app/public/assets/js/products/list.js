$(document).ready(() => {
    $('.delete-product').on('click', (event) => {
        const productId = $(event.target).attr('data-id');
        $.ajax({
            url: '/products/delete/',
            type: 'POST',
            dataType: 'JSON',
            data: { productId },
        }).done((response) => {
            handleDoneAlerts(response);
        }).fail((response) => {
            console.log(response.responseText);
            triggerAlert(response.responseText, 'error', 'OK');
            return false;
        });
    });
});

function handleDoneAlerts(response) {
    if (response.error) {
        triggerAlert(response.message, 'warning', 'OK');
        return false;
    } else {
        Swal.fire({
            title: 'SUCESSO!',
            text: response.message,
            icon: 'success',
            confirmButtonText: 'OK',
            toast: false,
            allowEscapeKey: false,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                window.location.href = '/products/list';
            }
        });
        return true;
    }
}
