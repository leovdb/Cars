<?php

   // define variables and set to null
   $name = NULL;
   $email = NULL;
   $mileage = NULL;
   $postcode = NULL;
   $reg = NULL;
   
   $email_error = NULL;

   // quick function to strip hacky crap
   function clean_input($data) 
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   // if post then process and route otherwise show form
   if( $_SERVER["REQUEST_METHOD"] == "POST" ) 
   {
      $name = clean_input($_POST["name"]);
      $email = clean_input($_POST["email"]);
	  $postcode = clean_input($_POST["postcode"]);
	  $reg = clean_input($_POST["reg"]);
	  $mileage = clean_input($_POST["mileage"]);



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
		 $message .= "Postcode: ".$postcode."\r\n";
		 
         $headers  = "From: leo@driven-cars.com"."\r\n"."Reply-To: leo@driven-cars.com";

         // For simplicity use PHP's inbuilt mail function, 
         // works with most hosting out the box.
         if(mail($to, $subject, $message, $headers))
		 {
			 

         // Then simply route to a new url - header will return an error 
         // if the page outputs anything to the page before it hence all this
         // PHP happens before the HTML code below.
         header('Location: http://www.driven-cars.com/thankyou.php');
		 }
		 else
		 {
			 header('Location: http://www.driven-cars.com/error.php');
		 }
		 
		 exit;
      }

   }
   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>Driven</title>
	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
	<meta name="description" content="Get a better deal for your car.
Selling to a dealer won’t get you the best price. You get more money by selling to another driver – but it's a hassle.
We can handle the hassle for you. So you get a fair price, without the fuss."
	
    <link rel="shortcut icon" href="img/favicon.ico" />
       
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href="styles.css" rel="stylesheet" type="text/css" />
	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58323881-1', 'auto');
  ga('send', 'pageview');

</script>
    
</head>

<body>

<div id="call-to-action">

	<a class="internal-link call-to-action-link" href="#register-header">Get me a quote</a>

</div>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" id="top-navbar" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand internal-link" href="#welcome-header"><img src="img/Driven-Logo.gif" width="103" height="25" alt="Logo" /></a>
		</div>
		<div class="navbar-collapse collapse" id="menu-list">
          	<ul class="nav navbar-nav">
				
              <li><a class="internal-link" href="#welcome-header">Welcome</a></li>
				<li><a class="internal-link" href="#whyus-header">Why use us?</a></li>
				<li><a class="internal-link" href="#steps-header">How does it work?</a></li>
                <li><a class="internal-link" href="#FAQ-header">Questions?</a></li>
                <li><a class="internal-link" href="#register-header">Get me a quote</a></li>
            
          	</ul>
		</div><!--/.nav-collapse -->
	</div>
</div>
    
<div class="welcome-container" id="welcome-header">

	<img src="img/welcome-car.jpg" width="3000" height="1175" id="welcome-car-img" alt="Welcome-background" />
    
    <div class="intro-heading-text">
    	
        <h1 class="intro-heading-higher">Get a better deal for your car.</h1>
		<h3 class="intro-heading-lower">Selling to a dealer won’t get you the best price. You get more money by selling to another driver – but it's a hassle.</h3>
        <h3 class="intro-heading-lower">We can handle the hassle for you. So you get a fair price, without the fuss.</h3>
    
    	<div class="intro-findoutmore">
        	<a class="internal-link welcome-links" href="#whyus-header">Tell me more &gt;</a>
      	</div>
        
      <div class="intro-register">
        	<a class="internal-link welcome-links" href="#register-header">Get me a quote &gt;</a>
      	</div>
    
    </div>	
    
</div>

<div class="section-header" id="whyus-header">
 
  <p class="header-sm-text">You want to sell your car. So...</p>
    
  	<H1 class="header-h1">Why use us?</H1>
    
</div>

<div class="line vertical-line">
  <img src="img/Vertical-Line.gif" height="100" width="750" class="line-blue" id="whyus-line0-img" />
</div>

<div class="section-container">

  	<div class="mobile-highlight">
        
        <div class="whyus-summary">
    		Selling to a dealer won't get you the best price.<br /> Selling your car yourself, direct to another driver, will get you more money.
    	</div>
        
	</div>
    
    <div class="line" id="whyus-line1">
    	<img src="img/WhyUs-Line1.gif" width="750" height="100" class="line-blue" id="whyus-line1-img"/>
	</div>
    
    <div class="whyus-block1-example">
        <p>Another driver will typically pay</p>
        <p class="whyus-callout" id="whyus-block1-example-callout1">10-20% more</p>
        <p>than a dealer.</p>
    </div>
    <div class="whyus-block1-example">
        <p>And they'll pay up to</p>
        <p class="whyus-callout" id="whyus-block1-example-callout2">40% more</p>
        <p>than WeBuyAnyCar will.</p>
    </div>
    
    
    <div class="line" id="whyus-line2">
    	<img src="img/WhyUs-Line2.gif" width="750" height="100" class="line-blue" id="whyus-line2-img"/></div>
	</div>

<div class="section-container">

  	<div class="mobile-highlight">
        <div class="whyus-summary">
            But selling your car yourself is a hassle...
        </div>
	</div>
    
   
    <div class="whyus-block2-example">
        <div class="whyus-block2-icons">
          <div class="whyus-block2-icon"><img src="img/Sponge-icon-grey.gif" class="whyus-block2-icon-img" /></div>
          <div class="whyus-block2-icon"><img src="img/Sponge-icon.gif" id="whyus-block2-sponge" class="whyus-block2-icon-img" /></div>            
        </div>        
      <p class="whyus-block2-example-text">You have to clean it</p>
    </div>
    
    <div class="whyus-block2-example">
        
        <div class="whyus-block2-icons">
          <div class="whyus-block2-icon"><img src="img/Camera-icon-grey.gif" class="whyus-block2-icon-img" /></div>
          <div class="whyus-block2-icon"><img src="img/Camera-icon.gif" id="whyus-block2-camera" class="whyus-block2-icon-img" /></div>            
        </div>
        
        <p class="whyus-block2-example-text">You have to photograph it</p>
    </div>
    
    <div class="whyus-block2-example">
        
        <div class="whyus-block2-icons">
          <div class="whyus-block2-icon"><img src="img/Computer-icon-grey.gif" class="whyus-block2-icon-img" /></div>
          <div class="whyus-block2-icon"><img src="img/Computer-icon.gif" id="whyus-block2-computer" class="whyus-block2-icon-img" /></div>            
        </div>
        
        <p class="whyus-block2-example-text">You have to list it online</p>
    </div>
    
    <div class="whyus-block2-example">
        <div class="whyus-block2-icons">
          <div class="whyus-block2-icon"><img src="img/Phone-icon-grey.gif" class="whyus-block2-icon-img" /></div>
          <div class="whyus-block2-icon"><img src="img/Phone-icon.gif" id="whyus-block2-phone" class="whyus-block2-icon-img" /></div>            
        </div>
        
      <p class="whyus-block2-example-text">You have to handle enquiries</p>
    </div>
    
    <div class="whyus-block2-example">
        <div class="whyus-block2-icons">
          <div class="whyus-block2-icon"><img src="img/Wheel-icon-grey.gif" class="whyus-block2-icon-img" /></div>
          <div class="whyus-block2-icon"><img src="img/Wheel-icon.gif" id="whyus-block2-wheel" class="whyus-block2-icon-img" /></div>            
        </div>
        
      <p class="whyus-block2-example-text">You have to manage test drives</p>
    </div>
    
    <div class="whyus-block2-example">
        
        <div class="whyus-block2-icons">
          <div class="whyus-block2-icon"><img src="img/Handshake-icon-grey.gif" class="whyus-block2-icon-img" /></div>
          <div class="whyus-block2-icon"><img src="img/Handshake-icon.gif" id="whyus-block2-handshake" class="whyus-block2-icon-img" /></div>            
        </div>
        
        <p class="whyus-block2-example-text">You have to negotiate a price</p>
    </div>
</div>

<div class="line" id="whyus-line3">
	
	<img src="img/WhyUs-Line3.gif" class="line-blue" id="whyus-line3-img" width="750" height="100" />

</div>

<div class="section-container">
	
    <div class="mobile-highlight">
        <div class="whyus-block3-LHS">
            ...and another driver may be wary of buying from someone they don't know
		</div>
    </div>
    
    <div class="whyus-block3-RHS">
        <p>On average each year in the UK</p>
        <p class="whyus-callout" id="whyus-block3-example-callout">750,000</p>
        <p>people face unresolved problems buying a used car</p>
		<p id="data-source">(Source: The AA)</p>
    </div>
	    
</div>

<div class="line" id="whyus-line4">
	
  <img src="img/WhyUs-Line4.gif" class="line-blue" id="whyus-line4-img" width="750" height="150" /> </div>

<div class="section-container section-end">

	<div class="mobile-highlight">
        <div class="whyus-summary">
            <p>We sell your car to another driver, at a price we agree with you, taking care of all the hassle for you and providing peace of mind for them.</p>
            <p id="enable-cta">You'll get more money and no fuss.</p>
        </div>
	</div>    
    
    <div class="whyus-block4-footer">
      <p>We take a 5% commission on the final sale price.</p>
        <p>So you can expect to get</p>
        <p class="whyus-callout" id="whyus-block4-example-callout">5-25% more</p>
        <p>than selling to a dealer or WeBuyAnyCar</p>
    </div>

</div>

<div class="section-header" id="steps-header">
 
  	<p class="header-sm-text">If you agree that sounds a better way of doing things then...</p>
    
  	<H1 class="header-h1">How does it work?</H1>
    
</div>

<div class="section-container" id="laptop">
 
    <div class="row" id="laptop-background">
    	
      	<div id="laptop-text">
       	  	<p>Register with us</p>
		</div>
    
    </div>
</div>

<div class="line vertical-line">
	<img src="img/Vertical-Line.gif" height="100" width="750" class="line-blue" id="steps-line0-img" />
</div>

<div class="section-container section-padded mobile-only">

	<h3 class="steps-header" id="register-below">Register below, then...</h3>

</div>

<div class="section-container section-padded">

	<div class="steps-text steps-text-left" id="steps-1">
    	<h3 class="steps-header" id="steps-1-header">We contact you to arrange things
      <p class="steps-rollover-text">More details...</p></h3>
        <ul class="steps-detail" id="steps-1-detail">
        	<li>To sell your car, we need it to be available twice:</li>
        	<ul class="steps-detail-subbullets">
            	<li>Firstly, for 3-4 hours on a weekday when we have your car cleaned, inspected and photographed.</li>
                <li>Secondly, for 3-4 hours at a weekend when potential buyers can view and test drive your car.</li>
			</ul>
        	<li>We handle everything, you just need to make sure your car is there.</li>
        	<li>You don't need to be there. We can take a spare key.</li>
        </ul>
    </div>
    
    <div class="steps-img">
    	<img src="img/Calendar-icon.gif" id="calendar-icon" width="150" height="150" />
    </div>

</div>

<div class="line steps-line-LR">
	
	<img src="img/Steps-Line-LR.gif" class="line-blue" id="steps-line1-img" width="750" height="100" />

</div>


<div class="section-container section-padded">

	
    
  <div class="steps-text steps-text-right" id="steps-2">
    	<h3 class="steps-header" id="steps-2-header">We come to inspect, clean and photograph your car
    <p class="steps-rollover-text">More details...</p></h3>
    <ul class="steps-detail" id="steps-2-detail"><li>We come to your car and:</li>
            <ul class="steps-detail-subbullets">
              <li>An AA engineer inspects it, so buyers will know what condition the car is in.</li>
              <li>We clean it, so it looks its best in photos (and you have a clean car!)</li>
              <li>We take photos of it, so buyers can see what it looks like.</li>
            </ul>
            <li>Remember, you don't need to be there, we can take a spare key.</li>
	</ul>
    </div>
    
    <div class="steps-img" id="inspection-sponge-camera">
    	<img src="img/Inspection-icon.gif" id="inspection-icon" width="75" height="75" />
        <img src="img/Sponge-icon.gif" id="sponge-icon" width="75" height="75" />
        <img src="img/Camera-icon.gif" id="camera-icon" width="75" height="75" />
    </div>
            
</div>

<div class="line steps-line-RL">
	
	<img src="img/Steps-Line-RL.gif" class="line-blue" id="steps-line2-img" width="750" height="100" />

</div>

<div class="section-container">

	<div class="steps-text steps-text-left" id="steps-3">
    	<h3 class="steps-header" id="steps-3-header">We find potential buyers
      <p class="steps-rollover-text">More details...</p></h3>
      <ul class="steps-detail" id="steps-3-detail">
        	<li>We use eBay to find potential buyers.</li>
        	<li>We list your car in a way that shows it at its best.</li>
        	<li>We provide potential buyers with additional information that other sellers do not to get a better price (such as the independent AA report).</li>
        </ul>
    </div>
    
    <div class="steps-img">
    	<img src="img/Computer-icon.gif" id="computer-icon" width="150" height="150" />
    </div>

</div>

<div class="line steps-line-LR">
	
	<img src="img/Steps-Line-LR.gif" class="line-blue" id="steps-line3-img" width="750" height="100" />

</div>


<div class="section-container">

	<div class="steps-text steps-text-right" id="steps-4">
    	<h3 class="steps-header" id="steps-4-header">We handle all the enquiries and test drives
      <p class="steps-rollover-text">More details...</p></h3>
        <ul class="steps-detail" id="steps-4-detail">
        	<li>We speak to everyone who enquires about your car, so you don't have to.</li>
        	<li>We arrange for serious potential buyers to see your car and test drive it (providing they can show the necessary insurance).</li>
        	<li>We handle the test drive day. You do not need to be there, all we need is your car.</li>
		</ul>
    </div>
    
    <div class="steps-img" id="phone-wheel">
    	<img src="img/Phone-icon.gif" id="phone-icon" width="100" height="100" />
        <img src="img/Wheel-icon.gif" id="wheel-icon" width="100" height="100" />
    </div>
    
</div>

<div class="line steps-line-RL">
	
	<img src="img/Steps-Line-RL.gif" class="line-blue" id="steps-line4-img" width="750" height="100" />

</div>


<div class="section-container">

	<div class="steps-text steps-text-left" id="steps-5">
    	<h3 class="steps-header" id="steps-5-header">You get paid
      <p class="steps-rollover-text">More details...</p></h3>
        <ul class="steps-detail" id="steps-5-detail">
        	<li>We negotiate with the buyers to get you the best price.</li>
        	<li>We only sell at or above the price we have agreed with you.</li>
        	<li>The buyer will pay you directly and, once this has been received, they will collect the car.</li>
            <ul>
            	<li>We will be there to handover the keys and documents for the car.</li>
			</ul>
        </ul>
    </div>
    
    <div class="steps-img">
    	<img src="img/Money-icon.gif" id="money-icon" width="150" height="150" />
    </div>
    
</div>

<div class="spacer">
</div>

<div class="section-header" id="FAQ-header">
 
  	<p class="header-sm-text">What about if you've got some...</p>
    
  	<H1 class="header-h1">Questions?</H1>
    
</div>

<div class="section-container section-padded">

	<div class="FAQ-LHS">
    
        <p class="FAQ-q" id="FAQ-q1">Will you sell any car?</p>
        <p class="FAQ-a" id="FAQ-q1-a">We typically only sell cars with an asking price of more than £7,500. If you are unsure what your car is worth, contact us and we will give you an honest appraisal.</p>
        
        <p class="FAQ-q" id="FAQ-q2">How much do you cost?</p>
        <p class="FAQ-a" id="FAQ-q2-a">We take a commission of 5% on the final price your car sells for. If we can't sell your car above the price agreed with you, you don't pay us anything.</p>
        
        <p class="FAQ-q" id="FAQ-q3">Are there any hidden fees?</p>
        <p class="FAQ-a" id="FAQ-q3-a">No. The commission includes all the fees associated with cleaning, inspecting and listing your car. If we can't sell your car above the price agreed with you, you don't pay us anything.</p>
        
        <p class="FAQ-q" id="FAQ-q4">Why should I pay you when I could sell my car myself?</p>
        <p class="FAQ-a" id="FAQ-q4-a">You absolutely could sell your car yourself, but it involves a lot of hassle. We take this hassle away and still get you a better price than you would selling to a dealership or something like WeBuyAnyCar.<br />
We also know how to get the best price for your car – taking the right photos, describing the car in an easy to understand way and providing buyers with peace of mind.
</p>

		<p class="FAQ-q" id="FAQ-q5">Can I try to sell my car another way at the same time as using you?</p>
        <p class="FAQ-a" id="FAQ-q5-a">No. We ask that you give us a month to sell your car at the price we agree. We will ask you to sign a contract to this effect before we start.<br />
If we can’t sell your car, then you are welcome to try another way (and we can recommend the best ones to you).<br />
The reason for this is that the services we provide (cleaning, inspecting, checking, photographing etc.) all cost money, and we do this to get you the best price for your car.
</p>
        
        <p class="FAQ-q" id="FAQ-q6">When will you come to inspect my car?</p>
        <p class="FAQ-a" id="FAQ-q6-a">We will arrange a time that is convenient for you. Inspections take 2-3 hours and take place Monday-Friday. If that is not convenient for you, we can collect a spare set of keys to the car at another time and we will handle the inspection. We just need the car to be there!</p>
        
        <p class="FAQ-q" id="FAQ-q7">When will test drives happen?</p>
        <p class="FAQ-a" id="FAQ-q7-a">We conduct a single test drive day where we get all serious potential buyers to view the car. This will be at a weekend, and we allow half a day in total. You don’t have to be around for this, we can take a spare set of keys. We just need the car to be there!
</p>
        
        <p class="FAQ-q" id="FAQ-q8">What if someone damages my car when test driving it?</p>
        <p class="FAQ-a" id="FAQ-q8-a">We will not allow anyone to carry out a test drive without suitable insurance.  Again, we handle all of this, so you don’t have to worry about it.
</p>

		<p class="FAQ-q" id="FAQ-q9">How long will you need access to my car?</p>
        <p class="FAQ-a" id="FAQ-q9-a">2-3 hours for the initial inspection and half a day for the test drives. You don’t have to be around for this, we can take a spare set of keys. We just need the car to be there.</p>
        
        <p class="FAQ-q" id="FAQ-q10">How do you get the best price?</p>
        <p class="FAQ-a" id="FAQ-q10-a">We know how to present your car at its best – we take good photos and we describe it in a way that people can understand.<br />
We also have every car inspected by the AA and give its report, along with a background check, to potential buyers. That means they know exactly what they’re getting, and have confidence that it is a good car.
</p>
        
        <p class="FAQ-q" id="FAQ-q11">Do I have to deal with the buyers at all?</p>
        <p class="FAQ-a" id="FAQ-q11-a">No. We will handle all of that. The only thing you will get from the buyer is the money for your car.
</p>

	</div>
    
    <div class="FAQ-RHS">
    
   	  <div id="FAQ-QM-L">?</div>
      <div id="FAQ-QM-M"></div>
      <div id="FAQ-QM-S"></div>
    
  </div>	

</div>

<div class="section-header">
 
  	<p class="header-sm-text">Like the sound of it? Then...</p>
    
  	<H1 class="header-h1">Let's get started</H1>
    
</div>

<div class="section-container" id="register-header">

	<div class="register-header mobile-highlight">
    	If you’re interested, just fill in this form and we’ll get back to you. We need all the details, so make sure you don’t leave any blanks...
	</div>

</div>

<div class="section-container section-padded">

	<form action="index.php" method="post" name="register-form" class="register-form" data-parsley-validate>
        
	  <div class="register-form-section" id="r1-s">
			<H2 class="register-form-number">1.</H2>
            <p class="register-form-headings">About your car:</p>
                
			<div class="register-form-label">Registration number:</div>
			<input name="reg" type="text" id="register-form-reg" class="r1" placeholder="Written on the car. Twice" maxlength="8" data-parsley-required />
                
			<div class="register-form-label">Current mileage:</div>
			<input name="mileage" type="text" id="register-form-mileage" class="r1" placeholder="The miles on the clock" maxlength="9" data-parsley-required data-parsley-type="number"/>
		</div>
		
      <div class="register-form-section" id="r2-s">
			<H2 class="register-form-number">2.</H2>
			<p class="register-form-headings">About you:</p>
            
			<div class="register-form-label">Your email address:</div>
			<input name="email" type="text" id="register-form-email" class="r2" placeholder="How we get in touch" data-parsley-required data-parsley-type="email"/>
                
			<div class="register-form-label">Your name:</div>
			<input name="name" type="text" id="register-form-name" class="r2" placeholder="What we should call you" data-parsley-required/>
		</div>   
		        
      <div class="register-form-section" id="r3-s">
			<H2 class="register-form-number">3.</H2>
			<p class="register-form-headings">Where your car lives:</p>
            
			<div class="register-form-label">Your postcode:</div>
			<input name="postcode" type="text" id="register-form-postcode" class="r3" placeholder="Where we come to" data-parsley-required />
            			
		</div>   
		<div class="register-form-submit-section">
       	  <input name="register" type="submit" value="Register" />
        </div>
        
	</form>
  
</div>



      
  <hr>

  <footer>
        <p>&copy; Driven Cars Limited 2015</p>
  </footer>
  
<!--
</div>
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.13.2/TweenMax.min.js"></script>
<script src="jquery.superscrollorama.js"></script>
<script src="parsley.min.js"></script>

<script src="cars.js"></script>




</body>
</html>
