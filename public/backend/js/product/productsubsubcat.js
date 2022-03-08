function forSubCategory(){

    var id = $('#category_id').val();
    $.ajax({
        url:'/admin/product/sub-sub-categories',
        data:{id:id},
        type:"GET",
        dataType:"json",
        success:function(data){              
                var d =$('select[name="sub_category_id"]').empty();
                $('select[name="sub_category_id"]').append('<option value=" " selected disabled>--select sub category--</option>');
                $.each(data, function(key, value){
                   $('select[name="sub_category_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                });

        }
    })
            
}