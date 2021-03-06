$(document).ready(() => {
    $('.delete-customer').on('click', (event) => {
        const customerId = $(event.target).data('id');
        Swal.fire({
            title: 'Atenção!',
            html: `<p>Deseja realmente cancelar o cliente: <br/><b>${$(event.target).data('name')} - CPF: ${$(event.target).data('cpf')}</b>?</p>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Excluir',
            cancelButtonText: 'Cancelar',
            toast: false,
            allowEscapeKey: false,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                $.ajax({
                    url: '/customers/delete/',
                    type: 'POST',
                    dataType: 'JSON',
                    data: { customerId },
                }).done((response) => {
                    handleDoneAlerts(response);
                }).fail((response) => {
                    triggerAlert(response.responseText, 'error', 'OK');
                    return false;
                });
            }
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
                window.location.href = '/customers/list';
            }
        });
        return true;
    }
}
