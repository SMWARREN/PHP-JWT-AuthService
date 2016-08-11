

$("#formPhone").submit(function(){
	
	
	    var str = $( "#formPhone" ).serialize();

var newStr = str.replace(/-/g, "");

	 $.ajax({
            type        : 'POST',  
            url         : '/new/actions/sendKey.php',  
            data        : newStr,  
			encode: true
        })
                 .success(function(data) {
			
				if (jQuery.parseJSON(data) != true){

	          $('.feedbackPhone').html("Incorrect Phone Number");
}else{  $('.feedbackPhone').html("Sent Confirmation Number");
					  $(location).attr('href', '/new/verify.php');}

            });
        event.preventDefault();

  
});


