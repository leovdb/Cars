<?php

   // define variables and set to null
   $name = NULL;
   $email = NULL;
   $mileage = NULL;
   $postcode = NULL;
   $reg = NULL;
   $condition = NULL;
   $phone = NULL;
   $ref = "";
   $source = "";
   $utm_source = "";
   $utm_medium = "";
   $utm_campaign ="";
   $utm_content="";
   $utm_term="";
   
   $ad_campaign = "";
   
   $email_error = NULL;

   // quick function to strip hacky crap
   function clean_input($data) 
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }
   
   function get_var($varName)
   {
	   	$var = "";
	   	if(isset($_POST[$varName]))
	  	{
			$var = clean_input($_POST[$varName]);
	  	}
		
		return $var;
   }

   // if post then process and route otherwise show form
   if( $_SERVER["REQUEST_METHOD"] == "POST" ) 
   {
      $name = clean_input($_POST["name"]);
      $email = clean_input($_POST["email"]);
	  $postcode = clean_input($_POST["postcode"]);
	  $reg = clean_input($_POST["reg"]);
	  $mileage = clean_input($_POST["mileage"]);
	  $condition = clean_input($_POST["condition"]);
	  $phone = clean_input($_POST["phone"]);
	  
	  $ref = get_var("ref");
	  $source = get_var("source");
	  $utm_source = get_var("utm_source");
      $utm_medium = get_var("utm_medium");
	  $utm_campaign = get_var("utm_campaign");
	  $utm_content= get_var("utm_content");
	  $utm_term = get_var("utm_term");

	  $ad_campaign = get_var("AdCampaign");

      // various rules go here
      // this one reflects that name is required
      if( empty($_POST["name"]) )
      {
         $name_error = "Name is required";
      }
      else 
      {
         $name = clean_input($_POST["name"]);
      }

      // this one checks that email is valid 
      if( ! filter_var($email, FILTER_VALIDATE_EMAIL) ) 
      {
         $email_error = "Invalid email format"; 
      }

      // can set any rules here
      // verify email1 matches email2 for example

      // Then if no errors proceed to email and route 
      // else nothing and proceed to represent form below
      if( $name_error === NULL & $email_error === NULL )
      {
         $to       = "leo@driven-cars.com";
         $subject  = "Website registration";
         
		 $message .= "Name: ".$name."\r\n";
         $message .= "Email: ".$email."\r\n";
		 $message .= "Reg #: ".$reg."\r\n";
		 $message .= "Mileage: ".$mileage."\r\n";
		 $message .= "Condition: ".$condition."\r\n";
		 $message .= "Postcode: ".$postcode."\r\n";
		 $message .= "Phone: ".$phone."\r\n\r\n";
		 $message .= "Referrer: ".$ref."\r\n";
		 $message .= "Source: ".$source."\r\n\r\n";
		 $message .= "utm_source: ".$utm_source."\r\n";
		 $message .= "utm_medium: ".$utm_medium."\r\n";
		 $message .= "utm_campaign: ".$utm_campaign."\r\n";
		 $message .= "utm_content: ".$utm_content."\r\n";
		 $message .= "utm_term: ".$utm_term."\r\n";
		 $message .= "Ad Campaign: ".$ad_campaign."\r\n";
		 
		 
         $headers  = "From: leo@driven-cars.com"."\r\n"."Reply-To: leo@driven-cars.com";

         // For simplicity use PHP's inbuilt mail function, 
         // works with most hosting out the box.
         if(!mail($to, $subject, $message, $headers))
		 {
		
         // Then simply route to an error url - header will return an error 
         // if the page outputs anything to the page before it hence all this
         // PHP happens before the HTML code below.
         	 header('Location: http://www.driven-cars.com/error.php');
		 }
		 		 
      }

   }
   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>Thank you</title>

	<link rel="shortcut icon" href="img/favicon.ico" />
     
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	<!-- Phones -->
	<link href="ty-mob.css" rel="stylesheet" type="text/css" media="only screen and (min-width:0px) and (max-width:767px)" />
	<!-- Tablets and above -->
	<link href="ty.css" rel="stylesheet" type="text/css" media="only screen and (min-width:768px)" />
	
	<!--[if lt IE 9]>
    <link href="ty.css" rel="stylesheet" type="text/css" />
	<![endif]-->
    
	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58323881-1', 'auto');
  ga('send', 'pageview');

</script>
    
<!-- Facebook Conversion Code for CarRegistration -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6022977283824', {'value':'0.00','currency':'GBP'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6022977283824&amp;cd[value]=0.00&amp;cd[currency]=GBP&amp;noscript=1" /></noscript>
	
</head>

<body>

	<div id="text-container">
    
    	<h1>
        	Thank you for registering with Driven
        </h1>
        
        <h2>
        	We will be in touch within 24 hours. If you have any questions in the meantime, please <a href="mailto:hello@driven-cars.com">email us</a>
        </h2>
        
        <p><a href="index.php">Return to our homepage</a></p>
    
	</div>


</body>
</html>
