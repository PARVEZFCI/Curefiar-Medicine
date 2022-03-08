var manufactureId;
function showEditModal(id)
{   
	manufactureId = id;
    $.get('manufactures/' + id + '/edit', function (data) {
        $('#manufacture_name').val(data.manufacture_name);
        $('#manufacture_email').val(data.email);
        $('#manufacture_phone').val(data.phone);
        $('#manufacture_address').val(data.address);
    })
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#submit').click(function(e) {
	e.preventDefault();
    let form_data = $('#manufacture_edit').serialize();
    $.ajax({
      url: 'manufactures/' + manufactureId,
      type: "PUT",
      data: $('#manufacture_edit').serialize(),
      dataType: 'json',
        success: function (data) {
	        location.href = '/admin/manufactures';
        },
        error: function (errors) {
        	var errors = errors.responseJSON.errors;
        	$.each(errors, function(key,value) {
        		iziToast.warning({
	            title: "Warning"
	            , message: value
	            , position: 'topRight'
	            , });
			});
        } 
    });
})