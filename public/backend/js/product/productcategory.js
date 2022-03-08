var categoryId;
function showEditModal(id)
{   
	categoryId = id;
console.log(id);
$.get('product-categories/' + id + '/edit', function (data) {
    
    $('#productcatname').val(data.name);
})
}
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#submit').click(function(e) {
	e.preventDefault();
    var name = $("#productcatname").val();
   
    $.ajax({
      url: 'product-categories/' + categoryId,
      type: "PUT",
      data: {
        name: name,
      },
      dataType: 'json',
        success: function (data) {
	        location.href = '/admin/product-categories';
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