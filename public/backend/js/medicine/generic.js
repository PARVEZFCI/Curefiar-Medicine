var genericId;
function showEditModal(id)
{   
	genericId = id;
    $.get('generics/' + id + '/edit', function (data) {
        $('#generic_name').val(data.name);
        $('#id').val(data.id);
    })
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#submit').click(function(e) {
	e.preventDefault();
    var name = $("#generic_name").val();
   
    $.ajax({
      url: 'generics/' + genericId,
      type: "PUT",
      data: {
        name: name,
      },
      dataType: 'json',
        success: function (data) {
	        location.href = '/admin/generics';
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