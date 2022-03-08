var unitId;
function showEditModal(id)
{   
	unitId = id;
    $.get('units/' + id + '/edit', function (data) {
        $('#unit_name').val(data.unit_name);
        $('#unit_symbol').val(data.symbol);
    })
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#submit').click(function(e) {
	e.preventDefault();
   
    $.ajax({
      url: 'units/' + unitId,
      type: "PUT",
      data: $('#unit_edit').serialize(),
      dataType: 'json',
        success: function (data) {
	        location.href = '/admin/units';
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