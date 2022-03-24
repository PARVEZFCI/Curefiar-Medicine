function forAddToCart(id,type){
   console.log(type);
    $.ajax({
		
         url:'/cart/product',
         data:{
            id:id,
            type:type
         },
         
         type:"GET",
    
         success:function(data){
            $('#cart-data').html(data);
         }
    })
             
 }
 function deleteCart(id){

    $.ajax({
		
        url:'/cart/product/delete',
        data:{id:id},
        
        type:"GET",
        success:function(data){
           $('#cart-data').html(data);
        }
   })

	 
 }