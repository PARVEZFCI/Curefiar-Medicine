function forSubSubCategory(){

    var id = $('#sub_category_id').val();
    $.ajax({
         url:'/admin/product/pro-sub-sub-categories',
         data:{id:id},
         
         type:"GET",
         dataType:"json",
         success:function(data){
            var d =$('select[name="sub_sub_category_id"]').empty();
            $('select[name="sub_sub_category_id"]').append('<option value=" " selected disabled>--select child--</option>');
            $.each(data, function(key, value){
                $('select[name="sub_sub_category_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
            });
         }
    })
             
 }

 function calculateDiscount(discountParcent) {
	let itemPrice = $("#price").val();
	let discoutedCalc = itemPrice - (( itemPrice/100 ) * discountParcent);
    let afterDiscount = discoutedCalc.toFixed(2);  
    $("#discount_price").val(afterDiscount);
}
