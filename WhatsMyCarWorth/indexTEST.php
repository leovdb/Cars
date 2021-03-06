<?php
	$directory = basename(__DIR__);
	
	$servername = "localhost";
	$username = "dkltdnet_leo";
	$password = "daglish";
	
	// Create connection
	$conn = @mysqli_connect($servername, $username, $password);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1" />
    <title>How much is your car worth | Driven</title>

    <meta property="og:site_name" content="Driven" />
    <meta property="og:title" content="Find out how much your car is worth." />
    <meta property="og:description" content="We are a new way of selling your car in London. We get you more money than a dealer, without any of the hassle of selling the car yourself." />
    <meta property="og:url" content="http://www.driven-cars.com/<?php echo $directory; ?>/" />
    <meta property="og:image" content="http://www.driven-cars.com/<?php echo $directory; ?>/hero.jpg">
    <meta property="fb:admins" content="689595042" />

    <meta name="description" content="We get you more money than a dealer, without the hassle of selling the car yourself. We're the new way to sell your car in London.">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    <link href="../landing.css" rel="stylesheet" type="text/css" />

    <!-- Small -->
    <link href="../lng-small.css" rel="stylesheet" type="text/css" />

    <!-- Mobile -->
    <link href="../lng-mobile.css" rel="stylesheet" type="text/css" media="only screen and (max-width:767px)" />

    <!-- Medium -->
    <link href="../lng-medium.css" rel="stylesheet" type="text/css" media="only screen and (min-width:1024px) and (max-width:1679px)" />

    <!-- Large -->
    <link href="../lng-large.css" rel="stylesheet" type="text/css" media="only screen and (min-width:1680px)" />

    <link href="../gen-landing.css" rel="stylesheet" type="text/css" />

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-58323881-1', 'auto');
        ga('send', 'pageview');
    </script>

    <style>
        #hero-header {
            background-image: url(hero.jpg);
        }
    </style>

</head>

<body>

    <div id="call-to-action" class="CTA-appearance">

        <a class="internal-link call-to-action-link" href="#form-header">Get me a quote</a>

    </div>

    <div id="hero-header">

        <div id="hero-header-body">

            <img src="../img/Driven-Logo-trans.gif" width="160" height="38" id="logo" />
            <h1>Find out how much your car's worth</h1>
            <h3>We can get you more money than selling to a dealer, with none of the hassle of selling the car yourself</h3>

            <div id="form-header">Find out what your car's worth</div>
            <div id="form-body">

                <p id="form-explanation">
                    If you’re based in London and your car is worth more than £10,000, we can help you get more money for it.
                </p>
                <p id="form-explanation">
                    Don't worry if you're not sure how much your car's worth - tell us about it and we'll give you a free quote.
                </p>

                <form action="../thankyou.php" method="post" name="register-form" data-parsley-validate>

                    <table border="0" cellspacing="0" cellpadding="0" class="centered-table" id="form-table">
                        <tr>
                            <td valign="top">

                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td colspan="2" class="form-header-cell"><span class="form-heading-number">1.</span><span class="form-heading-text">Tell us about your car</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-cell">Reg Number*</td>
                                        <td>
                                            <input name="reg" type="text" tabindex="1" id="register-form-reg" placeholder="Written on the car. Twice" maxlength="8" data-parsley-required data-parsley-required-message="We need this to tell what car you have" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-cell">Mileage*</td>
                                        <td>
                                            <input name="mileage" type="text" tabindex="2" id="register-form-mileage" placeholder="The miles on the clock" maxlength="9" data-parsley-required data-parsley-type="number" data-parsley-required-message="We need this to know how much it's worth" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form-cell">Condition*</td>
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
                                </table>

                            </td>
                            <td class="form-table-spacer no-mobile">&nbsp;</td>
                            <td valign="top">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td colspan="2" class="form-header-cell"><span class="form-heading-number">2.</span><span class="form-heading-text">Tell us about you</span>
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

                                        <td class="form-cell">Your phone number</td>
                                        <td>
                                            <input name="phone" type="text" tabindex="7" id="register-form-phone" class="r2" placeholder="We won't prank call you" />
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <?php $ref_s="" ; if(isset($_GET[ "ref"])) { $ref_s=$_GET[ "ref"]; } ?>

                    <input name="ref" type="hidden" value="<?php echo $ref_s; ?>" />
                    <input name="source" type="hidden" value="Generic_Higher_Form" />


                    <input name="register" type="submit" tabindex="8" id="register-form-button" value="What's my car worth?" class="CTA-appearance" />

                    <!--<a href="#" id="find-out-more">
                        Find out more about us
                    </a>-->

                </form>

            </div>

            <?php
            
                $printTestamonials = false;
                
                // Check connection
                if ($conn) 
                {

                    $customerName="";
                    $testamonial="";
                    $imgURL="";
                    
                    
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
                        $imgURL = "../img/testamonials/".$genResultsArray[$randomIndex]['testamonial_id'].".gif";

                        $printTestamonials = true;
                    }
                
                
                if($printTestamonials)
                {				
					
			?>	
			
			<table class="quote-table" width="750" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td valign="middle" width="100%">
					<p class="quote large-font quote-background">"<?php echo $testamonial;?>" - <?php echo $customerName;?></p>
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
    </div>

    <div id="body-container">

        <h2 id="why-use-us">Why you should sell your car with Driven</h2>

        <table border="0" cellspacing="0" cellpadding="0" class="centered-table">
            <tr class="mobile-table-row">
                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Money-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell">
                    Selling to a dealer gets you less money
                    <p class="descriptor-sub">A dealer will pay 10-20% less than another driver</p>
                </td>

                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Hassle-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell">
                    But selling a car yourself is a hassle
                    <p class="descriptor-sub">You have to do everything yourself</p>
                </td>
            </tr>
        </table>
        
        <table border="0" cellspacing="0" cellpadding="0" class="centered-table">
            <tr class="mobile-table-row">
                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Thumbsup-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell" valign="middle">
                    We handle all this hassle for you. You get more money.</p>
                </td>
            </tr>
        </table>
        
        <p class="section-kicker large-font">We'll sell your car for you, taking care of all the hassle, and giving you more money.</p>


        <h2 id="what-we-do">What we do</h2>

        <table id="what-we-do-table" border="0" cellspacing="0" cellpadding="0" class="centered-table">
            <tr class="mobile-table-row">
                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Inspection-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell">
                    Get your car inspected by the AA
                    <p class="descriptor-sub">So buyers know what they’re getting</p>
                </td>

                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Camera-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell">
                    Photograph your car beautifully
                    <p class="descriptor-sub">So the advert stands out from the crowd</p>
                </td>

                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Wheel-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell">
                    Manage the test drives
                    <p class="descriptor-sub">So buyers are happy with the car</p>
                </td>
            </tr>
            <tr>
                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Sponge-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell">
                    Clean your car
                    <p class="descriptor-sub">So it looks its best</p>
                </td>

                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Computer-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell">
                    Advertise your car online (eBay)
                    <p class="descriptor-sub">So buyers can find it</p>
                </td>

                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Handshake-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell">
                    Negotiate the price
                    <p class="descriptor-sub">So you get a deal you’re happy with</p>
                </td>
            </tr>
            <tr>
                <td class="descriptor-icon-cell descriptor-cell no-mobile">&nbsp;</td>
                <td class="descriptor-text-cell descriptor-cell no-mobile">&nbsp;</td>

                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Phone-icon.gif" class="descriptor-icon" />
                </td>
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

        <div class="section-divider"></div>

        <h2 id="what-you-do">What you do</h2>

        <table id="what-you-do-table" border="0" cellspacing="0" cellpadding="0" class="centered-table">
            <tr>
                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Calendar-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell">
                    Tell us when your car’s available
                    <p class="descriptor-sub">So we can do all the things we do</p>
                </td>

                <td class="descriptor-icon-cell descriptor-cell"><img src="../img/Money-icon.gif" class="descriptor-icon" />
                </td>
                <td class="descriptor-text-cell descriptor-cell">
                    Pay us 5% of the final sale price
                    <p class="descriptor-sub">Only when the car is sold</p>
                </td>
            </tr>
        </table>

        <p class="section-kicker large-font"><strong>That’s it.</strong>
        </p>
        <p class="section-kicker large-font">If we can’t sell your car for a price you’re happy with, you don’t pay us anything</p>

        <div class="footer">&copy;&nbsp;Driven Cars Limited&nbsp;&nbsp;&nbsp;<a href="/privacy.html" id="privacy-link">Privacy policy</a>
        </div>

    </div>
    <div id="mobile-indicator"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script>
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<div></div>'
        };
    </script>

    <script src="../parsley.min.js"></script>
    <script src="../utm.js"></script>
    <script src="../gen-landing.js"></script>

</body>

</html>