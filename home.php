<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Member Section</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="form">
      
      <ul class="tab-group">
      
      
      
      <?php
require_once($_SERVER['DOCUMENT_ROOT'].'/new/authService.php');

		$JWT = new JWToken();
		$JWT->validateJWTCookie();
		$validate  = $JWT->authenticated;
	  
	   if($validate) : ?>
       <li class="tab"><a style="width: 100%;" href="#loginOut" id="logOut">Log Out</a></li>      </ul>
<?php else : ?>
           <li class="tab"><a style="width: 100%;" href="./index.php">Login</a></li>      </ul>

<?php endif; ?>
      
      <div class="tab-content">
      
   

        <div id="signup">   
          <h1>Member Section</h1>
          
          
     <div class="feedback">
        <?php

		
		if($validate){echo "You Are Logged IN\n";
				
		}else{echo "Please login to gain access to content";}

        		
?>
    </div>  
    
    <div style="color:white;">
    
    <?php if($validate) :?>
	<Center>Your JWT TOKEN<hr><p>
	<?php echo wordwrap(($_COOKIE[authName]),60,"<br>\n",TRUE);?></Center></div>  </div>
        
        
         <div style="color:white;"><hr>
         <pre>'iat' // Issued at: time when the token was generated
        'jti' // an unique identifier for the token
        'iss' // Issuer
        'nbf' // Not before
        'exp' // Expire
        'userName'  User name</pre><br>
	<Center>Your decoded JWT TOKEN<hr><p> 
	<?php 
	echo "Your IAT: ";
      echo $JWT->decodedJWT->iat;
echo "<br>";
	echo "Your JTI: ";

 echo wordwrap(($JWT->decodedJWT->jti),60,"<br>\n",TRUE);
echo "<br>";
	echo "Your ISS: ";


      echo $JWT->decodedJWT->iss;
echo "<br>";
	echo "Your NBF: ";

      echo $JWT->decodedJWT->nbf;
echo "<br>";
	echo "Your EXP: ";

      echo $JWT->decodedJWT->exp;
echo "<br>";
	echo "Your Username: ";


      echo $JWT->decodedJWT->data->userName; ?>
</Center></div> <?php endif; ?>
        <div id="login"></div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/home.js"></script>

    
    
    
  </body>
</html>
