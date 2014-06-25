<?php
  require_once('recaptchalib.php');
  $privatekey = "6LdEatYSAAAAAKjKE7dkM9Pjzmr4hBy4aoUssPSZ";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    // Your code here to handle a successful verification
  }
  ?><!DOCTYPE html>
<html>
<head>

</head>

<link rel="stylesheet" href="totes.css" type="text/css"/>
<title>| Totes Amaz Bags | Thanks for contacting us |</title>
<body>



<div id = "page">
 <div class="header">
         	<div class="logo"><img src="images/toteslogo2.jpg" height="110" width="925" alt="Totes Amaz Bags Logo" style="border:none;" ></div>
<div class="header_right">
            	<div class="header_number">
            		
      <!--header_number end--></div>
                
                
            <!--header_right end--></div>
            <div class="clear"></div>
	<div class="navbg">
<div class="navigation">
                    	<ul>
<li><a href="index.php"><img src="images/home.jpg" onmouseover="this.src='images/homerollover.jpg'" onmouseout="this.src='images/home.jpg'" height="39" width="140" alt="Totes Amaz Bags Logo" style="border:none;" ></a></li>
<li><a href="shop.php"><img src="images/shop.jpg" onmouseover="this.src='images/shoprollover.jpg'" onmouseout="this.src='images/shop.jpg'" height="39" width="140" alt="Totes Amaz Bags Logo" style="border:none;" ></a></li>		
<li><a href="gallery.php"><img src="images/gallery.jpg" onmouseover="this.src='images/galleryrollover.jpg'" onmouseout="this.src='images/gallery.jpg'" height="39" width="140" alt="Totes Amaz Bags Logo" style="border:none;" ></a></li>			
<li><a href="news.php"><img src="images/news.jpg" onmouseover="this.src='images/newsrollover.jpg'" onmouseout="this.src='images/news.jpg'" height="39" width="140" alt="Totes Amaz Bags Logo" style="border:none;" ></a></li>
<li><a href="about.php"><img src="images/about.jpg" onmouseover="this.src='images/aboutrollover.jpg'" onmouseout="this.src='images/about.jpg'" height="39" width="140" alt="Totes Amaz Bags Logo" style="border:none;" ></a></li>
<li><a href="contact.php"><img src="images/contact.jpg" onmouseover="this.src='images/contactrollover.jpg'" onmouseout="this.src='images/contact.jpg'" height="39" width="140" alt="Totes Amaz Bags Logo" style="border:none;" ></a></li>
							</ul>
                    <!--navigation end--></div>
					
					<div id = "leftsidebar2">
				
					</div>
				
				<div id = "content">
			<?php
  // Change this to YOUR address
  $recipient = 'totesamazbags@yahoo.ie';
  $email = $_POST['cf_email'];
  $realName = $_POST['cf_name'];
  $body = $_POST['cf_message'];
  $subject='Adult Jute Bag Order';
  # We'll make a list of error messages in an array
  $messages = array();
# Allow only reasonable email addresses
if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
$messages[] = "That is not a valid email address.";
}
# Allow only reasonable real names
if (!preg_match("/^[\w\ \+\-\'\"]+$/", $realName)) {
$messages[] = "The real name field must contain only " .
"alphabetical characters, numbers, spaces, and " .
"reasonable punctuation. We apologize for any inconvenience.";
}

$body = $_POST['cf_message'];
# Make sure the message has a body
if (preg_match('/^\s*$/', $body)) {
$messages[] = "Your message was blank. Did you mean to say " .
"something?"; 
}
  if (count($messages)) {
    # There were problems, so tell the user and
    # don't send the message yet
    foreach ($messages as $message) {
      echo("<p>$message</p>\n");
    }
    echo("<p>Click the retry button and correct the problems. " .
      "Then click Send Your Message again.</p>");
	  ?><form method="POST" action="contact.php" >
<p><input type="submit" value="Retry" /></form></a></p>
</form></b>
<?php
  } else {
    # Send the email - we're done
mail($recipient,
      $subject,
      $body,
      "From: $realName <$email>\r\n" .
      "Reply-To: $realName <$email>\r\n"); 
    echo("<p>Your message has been sent. I will get back to very shortly.
	Thank you for taking the time to contact me!</p>\n");
  }
?>
							
				</div><!--content-->
				
				
				<div id = "sidebar2">
			
							
				</div><!--sidebar-->
				
				
				
			<div id = "footer">			
				
		</div><!--footer-->

	</div><!--page--> 

</body>

</html>





