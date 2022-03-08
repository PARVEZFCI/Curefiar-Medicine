var categoryId;
function showEditModal(id)
{   
	categoryId = id;
    $.get('categories/' + id + '/edit', function (data) {
        $('#cate_name').val(data.name);
    })
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#submit').click(function(e) {
	e.preventDefault();
    var name = $("#cate_name").val();
   
    $.ajax({
      url: 'categories/' + categoryId,
      type: "PUT",
      data: {
        name: name,
      },
      dataType: 'json',
        success: function (data) {
	        location.href = '/admin/categories';
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