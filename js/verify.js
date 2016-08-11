

$("#formPhone").submit(function(){
	
	
	    var str = $( "#formPhone" ).serialize();
		console.log(str);


	 $.ajax({
            type        : 'POST',  
            url         : '/new/actions/Verify.php',  
            data        : str,  
			encode: true
        })
                 .success(function(data) {
			
				if (jQuery.parseJSON(data) != true){

	          $('.feedbackPhone').html("Incorrect Verification Credentials");
}else{  $('.feedbackPhone').html("Successful Verification");
					  $(location).attr('href', '/new/home.php');}

            });
        event.preventDefault();

  
});


