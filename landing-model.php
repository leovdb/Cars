<?php
	//$directory = basename(__DIR__);
	
	$servername = "localhost";
	$username = "dkltdnet_leo";
	$password = "daglish";
	
	// Create connection
	$conn = @mysqli_connect($servername, $username, $password);

	$model = "car";
    $years = "six";

    if($conn)
	{
		$SQLCommand = "SELECT * FROM dkltdnet_driven.models WHERE directory=\"".$directory."\"";
		$result = mysqli_query($conn, $SQLCommand); // This line executes the MySQL query that you typed above
					
		$row = mysqli_fetch_assoc($result);			

		$model = $row['model_name'];
        $years = $row['years'];
	}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>The best way to sell your <?php echo $model; ?> | Driven</title>

	<meta property="og:site_name" content="Driven"/>
    <meta property="og:title" content="Get a better deal for your <?php echo $model; ?>." />
    <meta property="og:description" content="We are a new way of selling your <?php echo $model; ?> in London. We get you more money than a dealer, without any of the hassle of selling the car yourself." />
    <meta property="og:url" content="http://www.driven-cars.com/<?php echo $directory; ?>/" />
    <meta property="og:image" content="http://www.driven-cars.com/<?php echo $directory; ?>/hero.jpg">
    <meta property="fb:admins" content="689595042" />
    
	<meta name="description" content="We get you more money than a dealer, without the hassle of selling the car yourself. We're the new way to sell your <?php echo $model; ?> in London.">

	<link href='http://fonts.googleapis.com/css?family=Roboto:300,700,400' rel='stylesheet' type='text/css'>
	
    <link href="../landing-v2.css" rel="stylesheet" type="text/css" />
	
	<!-- Mobile -->
    <link href="../lng-mob-v2.css" rel="stylesheet" type="text/css" media="only screen and (max-width:767px)" />
    
    <!-- Medium -->
	<link href="../lng-med-v2.css" rel="stylesheet" type="text/css" media="only screen and (min-width:1024px) and (max-width:1679px)" />
	
	<!-- Large -->
	<link href="../lng-lrg-v2.css" rel="stylesheet" type="text/css" media="only screen and (min-width:1680px)" />
	
	<script>

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		ga('create', 'UA-58323881-1', 'auto');
		ga('send', 'pageview');

	</script>

    <style>
    
        #banner-1 {
            background-image: url(banner1.jpg);
        }
        #banner-2 {
            background-image: url(banner2.jpg);
        }
        #banner-3 {
            background-image: url(banner3.jpg);
        }
    
    </style>
    
</head>

<body>

	<div id="page-header">
        <img src="../img/Driven-Logo-trans-gs.gif" width="160" height="38" id="logo" alt="Driven Logo"/>
    <!--</div>
    <div class="body-container">-->
        <h1>The best way to sell your <?php echo $model; ?></h1>
    </div>
    <div class="banner-image" id="banner-1"></div>
    <div id="hero-header">
		<div id="hero-header-body">
            <table border="0" cellspacing="0" cellpadding="0" id="intro-table">
                <tr>
                    <td id="intro-text-container" style="max-width:99%" valign="middle">
                        <div id="intro-text-group">
                            <div id="intro-text-backing" class="text-background">
                                <h3>Get more money than a dealer will pay you, without the hassle</h3>



                                <!--<img src="hero-small.jpg" width="80%" height="auto">-->

                                <p class="intro-headings">You’ll get more money for your <?php echo $model; ?> if you sell direct to another driver. But it's a pain to do.</p>
                                <p class="intro-headings">At Driven we’ll take care of all this pain, sell your <?php echo $model; ?> for you and get you more money than a dealer would pay.</p>
                            </div>


                            <?php

                            // Check connection
                            if ($conn) {

                                $SQLCommand = "SELECT * FROM dkltdnet_driven.testamonials WHERE car=\"".$directory."\"";
                                $result = mysqli_query($conn, $SQLCommand); // This line executes the MySQL query that you typed above

                                $resultsArray = array(); // make a new array to hold all your data

                                $index = 0;
                                while($row = mysqli_fetch_assoc($result))
                                {
                                     $resultsArray[$index] = $row;
                                     $index++;
                                }

                                $numEntries = $index;

                                $customerName="";
                                $testamonial="";
                                $imgURL="";
                                $printTestamonials = false;

                                if($numEntries > 0)
                                {
                                    $randomIndex = rand(1,$numEntries) - 1;

                                    $customerName = $resultsArray[$randomIndex]['customer_desc']; 
                                    $testamonial = $resultsArray[$randomIndex]['testamonial'];
                                    $imgURL = "../img/testamonials/".$resultsArray[$randomIndex]['testamonial_id']."gs.gif";
                                    $printTestamonials = true;
                                }
                                else
                                {
                                    $SQLCommand = "SELECT * FROM dkltdnet_driven.testamonials";
                                    $result = mysqli_query($conn, $SQLCommand); // This line executes the MySQL query that you typed above

                                    $genResultsArray = array(); // make a new array to hold all your data

                                    $index = 0;
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                         $genResultsArray[$index] = $row;
                                         $index++;
                                    }

                                    $numEntries = $index;

                                    if($numEntries > 0)
                                    {
                                        $randomIndex = rand(1,$numEntries) - 1;

                                        $customerName = $genResultsArray[$randomIndex]['customer_desc_generic']; 
                                        $testamonial = $genResultsArray[$randomIndex]['testamonial'];
                                        $imgURL = "../img/testamonials/".$genResultsArray[$randomIndex]['testamonial_id']."gs.gif";

                                        $printTestamonials = true;
                                    }
                                }

                                if($printTestamonials)
                                {				

                            ?>	

                            <table class="quote-table text-background" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td valign="middle" width="100%">
                                    <p class="quote large-font">"<?php echo $testamonial;?>"<br/><span id="quote-source"><?php echo $customerName;?></span></p>
                                </td>
                                <td valign="middle" id="testamonial-img-cell"><img src="<?php echo $imgURL;?>" id="testamonial-img"/></td>

                            </tr>
                            </table>

                            <?php
                                }
                            mysqli_close($conn);
                            }

                            ?>

                        </div>
                    </td>
                    
                    <td class="form-width">
                    
                        
                        <div id="form-wrapper">
                            <div id="get-started" class="form-backing" >Get a free valuation</div>

                            <div id="form-body" class="form-backing">

                                    <p class="form-explanation">
                                        Based in London and with a car less than <?php echo $years; ?> years old? Perfect, we'll help you get more money for it. Just tell us about it.
                                    </p>

                                    <form action="../thankyou.php" method="post" name="register-form" data-parsley-validate>

                                        <table border="0" cellspacing="0" cellpadding="0" class="centered-table" id="form-table-single-column">
                                                        
                                                        <tr>
                                                            <td class="form-cell">Your Car's Reg Number*</td>
                                                            <td>
                                                                <input name="reg" type="text" tabindex="1" id="register-form-reg" placeholder="Written on the car. Twice" maxlength="8" data-parsley-required data-parsley-required-message="We need this to tell what car you have" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="form-cell">Your Car's Mileage*</td>
                                                            <td>
                                                                <input name="mileage" type="text" tabindex="2" id="register-form-mileage" placeholder="The miles on the clock" maxlength="9" data-parsley-required data-parsley-type="number" data-parsley-required-message="We need this to know how much it's worth" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="form-cell">Your Car's Condition*</td>
                                                            <td class="condition-popup-wrapper">
                                                                <div id="condition-popup">
                                                                    <span id="condition-popup-header">Your car's condition affects how much cash you'll get. Here's how we work:</span>
                                                                    <p class="condition-popup-p"><strong>Clark Gable: it's a handsome screen idol.</strong> It's got no scrapes or scratches, there are no mechanical problems and you've got a full service history.</p>
                                                                    <p class="condition-popup-p"><strong>Marlon Brando: it's not perfect, but it's pretty close.</strong> It's got the odd scratch or bump, but everything mechanical works well and you've got a full service history to prove it.</p>
                                                                    <p class="condition-popup-p"><strong>Paul Newman: it's lived a little, and you both know it.</strong> It's got a few scratches. It's missing a bit of paint or has one or two mechanical issues, but at least you've got a full service history.</p>
                                                                    <p class="condition-popup-p"><strong>Olly Reed: it's a hellraiser.</strong> It's scratched, there are some mechanical issues you haven't fixed and you're not quite sure where all its service history is. But it gets you from A to B.</p>
                                                                </div>

                                                                <select name="condition" tabindex="3" class="empty" id="register-form-condition" data-parsley-required data-parsley-required-message="If you're not sure, go for Paul Newman">

                                                                    <option value="" disabled selected style='display:none;'>The state it's in</option>
                                                                    <option value="Excellent">Clark Gable</option>
                                                                    <option value="Good">Marlon Brando</option>
                                                                    <option value="Average">Paul Newman</option>
                                                                    <option value="Poor">Olly Reed</option>

                                                                </select>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>

                                                            <td class="form-cell">Your email address*</td>
                                                            <td>
                                                                <input name="email" type="text" tabindex="4" id="register-form-email" placeholder="How we get in touch" data-parsley-required data-parsley-type="email" data-parsley-required-message="We need to be able to contact you" />
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td class="form-cell">Your name*</td>
                                                            <td>
                                                                <input name="name" type="text" tabindex="5" id="register-form-name" class="r2" placeholder="What we should call you" data-parsley-required data-parsley-required-message="We need to know what to call you" />
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td class="form-cell">Your postcode*</td>
                                                            <td>
                                                                <input name="postcode" type="text" tabindex="6" id="register-form-postcode" placeholder="Where the car is" data-parsley-required data-parsley-required-message="We need to know we can come to you" />
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td class="form-cell">Your phone number*</td>
                                                            <td>
                                                                <input name="phone" type="text" tabindex="7" id="register-form-phone" class="r2" placeholder="We won't prank call you"/>
                                                            </td>
                                                        </tr>

                                        </table>

                                        <?php $ref_s="" ; if(isset($_GET[ "ref"])) { $ref_s=$_GET[ "ref"]; } ?>

                                        <input name="ref" type="hidden" value="<?php echo $ref_s; ?>" />
                                        <input name="source" type="hidden" value="<?php echo $directory; ?>" />


                                        <input name="register" type="submit" tabindex="8" id="register-form-button" value="Tell me what my car's worth" class="CTA-appearance" />


                                    </form>
                                
                                    <p class="form-explanation" id="below-button-text">
                                        We hate spam as much as you. We'll use your details to give you your valuation, discuss it with you and that's it. We won't pass your details on to anyone else either.
                                    </p>

                                </div>
                            </div>
                    </td>
                
                
                </tr>
            </table>
    
        
			
		</div>
	</div>
<div class="banner-image" id="banner-2"></div>
<div class="body-container">
		
		<h2 id="what-we-do">What we do</h2>
	
		<table id="what-we-do-table" border="0" cellspacing="0" cellpadding="0" class="centered-table">
			<tr>
				<td class="descriptor-icon-cell descriptor-cell"><img src="../img/Inspection-icon.gif" class="descriptor-icon" /></td>
				<td class="descriptor-text-cell descriptor-cell">
					Get your <?php echo $model; ?> inspected by the AA
					<p class="descriptor-sub">So buyers know what they’re getting</p>
				</td>
				
				<td class="descriptor-icon-cell descriptor-cell"><img src="../img/Camera-icon.gif" class="descriptor-icon" /></td>
				<td class="descriptor-text-cell descriptor-cell">
					Photograph your <?php echo $model; ?> beautifully
					<p class="descriptor-sub">So the advert stands out from the crowd</p>
				</td>
				
				<td class="descriptor-icon-cell descriptor-cell"><img src="../img/Wheel-icon.gif" class="descriptor-icon" /></td>
				<td class="descriptor-text-cell descriptor-cell">
					Manage the test drives
					<p class="descriptor-sub">So buyers are happy with the car</p>
				</td>
			</tr>
			<tr>
				<td class="descriptor-icon-cell descriptor-cell"><img src="../img/Sponge-icon.gif" class="descriptor-icon" /></td>
				<td class="descriptor-text-cell descriptor-cell">
					Clean your <?php echo $model; ?>
					<p class="descriptor-sub">So it looks its best</p>
				</td>
				
				<td class="descriptor-icon-cell descriptor-cell"><img src="../img/Computer-icon.gif" class="descriptor-icon" /></td>
				<td class="descriptor-text-cell descriptor-cell">
					Advertise your <?php echo $model; ?> online (Auto Trader)
					<p class="descriptor-sub">So buyers can find it</p>
				</td>
				
				<td class="descriptor-icon-cell descriptor-cell"><img src="../img/Handshake-icon.gif" class="descriptor-icon" /></td>
				<td class="descriptor-text-cell descriptor-cell">
					Negotiate the price
					<p class="descriptor-sub">So you get a deal you’re happy with</p>
				</td>
			</tr>
			<tr>
				<td class="descriptor-icon-cell descriptor-cell no-mobile">&nbsp;</td>
				<td class="descriptor-text-cell descriptor-cell no-mobile">&nbsp;</td>
				
				<td class="descriptor-icon-cell descriptor-cell"><img src="../img/Phone-icon.gif" class="descriptor-icon" /></td>
				<td class="descriptor-text-cell descriptor-cell">
					Handle all the enquiries
					<p class="descriptor-sub">So you don’t have to deal with scammers</p>
				</td>
				
				<td class="descriptor-icon-cell descriptor-cell no-mobile">&nbsp;</td>
				<td class="descriptor-text-cell descriptor-cell no-mobile">&nbsp;</td>
			</tr>
		</table>
		
		<p class="section-kicker large-font">We do this all at times that are convenient for you, when you’re not using your car.</p>
		<p class="section-kicker large-font">You can keep using it until it’s sold.</p>

    <a href="#get-started" class="internal-link call-to-action-link">
		<table class="CTA-button-table">
			<tr>
				<td class="CTA-appearance CTA-button"><span class="CTA-intro">Sound good?</span><br>Get a free valuation</td>
			</tr>
		</table>
    </a>
    
    </div>
    

    
<div class="banner-image" id="banner-3"></div>
    
<div class="body-container">		
		<h2 id="what-you-do">What you do</h2>
	
		<table id="what-you-do-table" border="0" cellspacing="0" cellpadding="0" class="centered-table">
			<tr>
				<td class="descriptor-icon-cell descriptor-cell"><img src="../img/Calendar-icon.gif" class="descriptor-icon" /></td>
				<td class="descriptor-text-cell descriptor-cell">
					Tell us when your car’s available
					<p class="descriptor-sub">So we can do all the things we do</p>
				</td>
				
				<td class="descriptor-icon-cell descriptor-cell"><img src="../img/Money-icon.gif" class="descriptor-icon" /></td>
				<td class="descriptor-text-cell descriptor-cell">
					Pay us 5% of the final sale price
					<p class="descriptor-sub">Only when the car is sold</p>
				</td>
			</tr>
		</table>
	
		<p class="section-kicker large-font"><strong>That’s it.</strong></p><p class="section-kicker large-font">If we can’t sell your car for a price you’re happy with, you don’t pay us anything</p>
		
    <a href="#get-started" class="internal-link call-to-action-link">
		<table class="CTA-button-table">
			<tr>
				<td class="CTA-appearance CTA-button"><span class="CTA-intro">Interested?</span><br>Get a free valuation</td>
			</tr>
		</table>
    </a>		
	
	<div class="footer">&copy;&nbsp;Driven Cars Limited&nbsp;&nbsp;&nbsp;<a href="/privacy.html" id="privacy-link">Privacy policy</a></div>	
		
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
window.ParsleyConfig = {
  errorsWrapper: '<div></div>',
  errorTemplate: '<div></div>'
};
</script>

<script src="../parsley.min.js"></script>
<script src="../utm.js"></script>
<script src="../landing.js"></script>

</body>
</html>
