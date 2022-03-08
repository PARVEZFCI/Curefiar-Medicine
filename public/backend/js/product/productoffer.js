function OfferProductSrc(id){
   
    $.ajax({
         url:'/admin/product/productsrc',
         data:{id:id},
         type:"GET",
         dataType:"json",
         success:function(data){
           
            var table = '';
            table += '<tr id="dataremove-'+data.id+'">';
            table += '<td> <img src="/storage/uploads/product/'+data.thumbnail_image+'" alt="avatar-image" width="80"> </td>'
            table += '<td>'+data.name+'</td>';
            table += '<td>'+data.price+'<input type="hidden"  value="'+data.price+'" style="border:none" id="price-'+data.id+'" name="price[]">  </td>';
            table += '<td> <input type="number" onkeyup="calculateDiscount(this.value,'+data.id+')" value="'+(data.discount ? data.discount : "0")+'" id="discount" name="discount[]"> </td>';
            table += '<td><input id="discount_price-'+data.id+'" type="text" name="discount_price[]" readonly="" value="'+(data.discount_price ? data.discount_price : 0)+'"><input type="hidden" name="id[]" value="'+data.id+'"></td>';
            table += '<td> <a onclick="dltRow('+data.id+')" class="btn btn-sm btn-danger"> <em class="icon ni ni-delete text-light" ></em> </a> </td>';
            table +='</tr>';
            
            $("#newrow").append(table);
         }
    })
             
 }

 function calculateDiscount(discountParcent,id) {
  
	let itemPrice = $('#price-'+id).val();
   //let discountParcent = $("#discount").val();
  
	let discoutedCalc = itemPrice - (( itemPrice/100 ) * discountParcent);
    let afterDiscount = discoutedCalc.toFixed(2);  
    $('#discount_price-'+id).val(afterDiscount);
}
function  dltRow(id){
  // $("#dataremove-"+id).remove();
   $("#newrow").find('#dataremove-'+id).remove();
}