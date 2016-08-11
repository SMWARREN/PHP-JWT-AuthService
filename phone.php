<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Authentication Server</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="form">
    

      
      
      
        <div id="signup">   
          <h1>Please Verify Your Phone Number</h1>
          
          <form action="" id="formPhone">
          
           
          
<center><h3>Phone Number Format: 123-456-7890</h3></center>
          <div class="field-wrap">
            <label>
              What is your Phone Number?<span class="req">*</span>
            </label>
<input type='tel' pattern='\d{3}[\-]\d{3}[\-]\d{4}' title='Format: 123-456-7890
' required name="PHONE">           </div>
          
           
          
          <div class="feedbackPhone"></div>
          
          <button type="submit" class="button button-block"/>Send Verification Text</button>
          
          </form>

        </div>
        

      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/phone.js"></script>

    
    
    
  </body>
</html>
