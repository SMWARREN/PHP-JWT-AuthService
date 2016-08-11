

$("#logOut").click(function(){
	
	
		 var str = "destroy";
	 $.ajax({
            type        : 'POST',  
            url         : '/new/actions/destroy.php',  
			encode: true
        })
            .success(function() {
$(location).attr('href', '/new/home.php');

            });

        event.preventDefault();
  
});




