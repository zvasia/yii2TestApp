$(function () {
    $('#modalButton').click(function () {
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    })
});

$(function () {
    $('#updateButton').click(function () {
        $('#update').modal('show')
            .find('#updateContent')
            .load($(this).attr('value'));
    })
});