function calculateDiscount(discountParcent) {
	let itemPrice = $("#price").val();
	let discoutedCalc = itemPrice - (( itemPrice/100 ) * discountParcent);
    let afterDiscount = discoutedCalc.toFixed(2);  
    $("#discount_price").val(afterDiscount);
}

function showConvertionFactor() {
	$('#convertion').removeClass('d-none');
}