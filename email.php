<?php

   // define variables and set to null
   $name = NULL;
   $email = NULL;
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
         $to       = "leo.vanderborgh@gmail.com";
         $subject  = "Website registration";
         $message .= "Name: ".$name."\r\n";
         $message .= "Email: ".$email;
         $headers  = "From: leo.vanderborgh@gmail.com"."\r\n"."Reply-To: leo.vanderborgh@gmail.com";

         // For simplicity use PHP's inbuilt mail function, 
         // works with most hosting out the box.
         mail($to, $subject, $message, $headers);

         // Then simply route to a new url - header will return an error 
         // if the page outputs anything to the page before it hence all this
         // PHP happens before the HTML code below.
         header('Location: http://www.dkltd.net/leo/cheers.html');
         exit;
      }

   }
   
?>
<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 
   <style>
      .error {color:red;}
   </style>
   <h2>Form</h2>
   <p><span class="error">* required field.</span></p>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
      <p>Name: <input type="text" name="name" value="<?php echo $name;?>" /><span class="error">* <?php echo $name_error;?></span></p>
      <p>E-mail: <input type="text" name="email" value="<?php echo $email;?>" /><span class="error">* <?php echo $email_error;?></span></p>
      <p><input type="submit" name="submit" value="Submit" /></p>
   </form>
</body>
</html>