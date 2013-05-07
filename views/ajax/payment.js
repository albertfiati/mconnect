$(document).ready(function(){
	paymentInit();
})

function paymentInit(){
	makePayment();
	listPayment();
}

function makePayment() {
	$("form[name='payment']").on("submit", function() {
		var memberName = $("input[name='memberName']").val();
		var payee = $("input[name='payee']").val();
		var amountPaid = $("input[name='amountPaid']").val();
		var subscriptionType = $("select[name='subscriptionType']").val();

		var paymentJSON = {
			memberName : memberName,
			payee : payee,
			amountPaid : amountPaid,
			subscriptionType : subscriptionType
		};

		$.post('controllers/makepayment.php', paymentJSON, function(data, status) {
			var me = data;
			if(data.trim() == "success"){
				$('#paymentSuccess').html("Payment has been successfully made.");
				$('#paymentSuccess').fadeIn(500).fadeOut(3000);
				resetForm();
			}else{
				$('#paymentError').html("Payment failed.");
				$('#paymentError').fadeIn(500).fadeOut(3000)
			}			
		});

		return false;
	});
}

function resetForm(){
	$("input[name='memberName']").val("");
	$("input[name='payee']").val("");
	$("input[name='amountPaid']").val("");
	$("select[name='subscriptionType']").val("");
}

function listPayment(){
	$.get("controllers/listpayment.php",function(data){	
		$('#paymentList').html(data);	
	 });
	 	
	return false;
}
