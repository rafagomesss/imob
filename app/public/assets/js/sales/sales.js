$(document).ready(() => {
    $('#productCode').mask('99999999');
    $('#quantity').mask('999');
    $('#productName').mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
        'translation': {
            A: { pattern: /[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ ]/g },
        }
    });
    $('#productCode, #productName').on('keyup', (event) => {
        if (event.target.value.length) {
            const productCode = $('input[name="code"]').val();
            const productName = $('input[name="name"]').val();
            const body = { productCode, productName };
            $.ajax({
                url: '/sales/getProductByCodeAndName',
                type: 'POST',
                dataType: 'JSON',
                data: body,
            }).done((response) => {
                mountDataOnForm(response);
                if (response.error) {
                    triggerAlert(response.message, 'warning', 'OK');
                    return false;
                }
            }).fail((response) => {
                triggerAlert(response.responseText, 'error', 'OK');
                return false;
            });
        }
    });

    $('#btnAddProduct').on('click', () => {
        const fieldId = $('#productId');
        if (!fieldId.length || !fieldId.val().length) {
            triggerAlert('Selecione um produto!', 'warning', 'OK');
            return false;
        }
        mountDataOnTable();
    });
});

$(document).on('click', '.remove-item', (event) => {
    const tdId = $(event.currentTarget).data('id');
    console.log(tdId, $(`tr#${tdId}`), event);
    $(`#tableListItems tr#${tdId}`).remove();
});

function mountDataOnForm(data) {
    if (data[0] !== undefined) {
        $('#productId').val(data[0].id.length ? encryptDecrypt(data[0].id) : null);
        $('#code').val(data[0].productCode.length ? data[0].productCode : null);
        $('#name').val(data[0].name.length ? data[0].name : null);
        $('#productPrice').val(data[0].price.length ? data[0].price : null);
        $('#productExpiration').val(data[0].dateExpiration.length ? data[0].dateExpiration : null);
        $('#productPriceOff').prop('disabled', false);
        $('#totalValue').prop('disabled', false);
        $('#quantity').prop('disabled', false);
        $('#btnAddProduct').prop('disabled', false);
        return true;
    }
    resetStateValues();
    return false;
}

function resetStateValues() {
    $('#productId').val('');
    $('#code').val('');
    $('#name').val('');
    $('#productPrice').val('');
    $('#productExpiration').val('');
    $('#productPriceOff').prop('disabled', true);
    $('#totalValue').prop('disabled', true);
    $('#quantity').prop('disabled', true);
    $('#btnAddProduct').prop('disabled', true);
}

function mountDataOnTable() {
    const trId = $('#tableListItems tr').length;
    let html = $('#tableListItems tbody').html();
    html += `<tr id="${trId + 1}">
                <td class='text-center'>${$('#code').val()}</td>
                <td class='text-center'>${$('#name').val()}</td>
                <td class='text-center'>${$('#quantity').val()}</td>
                <td class='text-center'>${$('#productPrice').val()}</td>
                <td class='text-center'>UN</td>
                <td class='text-center'>${$('#productPriceOff').val()}</td>
                <td class='text-center'>${$('#totalValue').val()}</td>
                <td class='text-center'>
                    <a class='remove-item pointer' data-id='${trId + 1}'>
                        <i class=" far fa-trash-alt"></i>
                    </a>
                </td>
            </tr>`;
    $('#tableListItems tbody').html(html);
    resetStateValues();
    $('#productCode').val('');
    $('#productCode').focus();
    return false;
}
