<?php
    require("resources/libraries/phpmailer/PHPMailerAutoload.php");

    $mail = new PHPMailer;
    $mail2 = new PHPMailer;

    // define variables and set to empty values
    $email = "";

	function cleanInput($data) {
	  	$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  	$email = filter_var(cleanInput($_POST["emailaddy"]), FILTER_SANITIZE_EMAIL);

	  	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
	  		// Set a 400 (bad request) response code and exit.
            http_response_code(400);
		    echo "Whoops! There appears to be an issue with your email address. Please try again.";
            exit;
		} 

        // Build the email content.    
        $mail->msgHTML(file_get_contents('email.html'), dirname(__FILE__));

        $mail->addAddress('william.hayslettjr@gmail.com');     // Add a recipient
        $mail->Subject = "Welcome to The Hayslett Weekly";

        // Set options
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        //$mail->Debugoutput = 'html';                      //Ask for HTML-friendly debug output

        $mail->Username = "will.hayslettjr@gmail.com"; // your GMail user name
        $mail->Password = "mnhafdfqjjxnlkqc"; 
        $mail->Host = "ssl://smtp.gmail.com"; // GMail
        $mail->Port = 465;
        $mail->IsSMTP(); // use SMTP
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->setFrom('noreply@thehayslettweekly.com', 'The Hayslett Weekly');

        // Create second email instance
        $email_content = "Hi WillSenge! You've received a new subscription. Here's the email address below:\n\n";
        $email_content .= "Email: $email\n\n";
        $mail2->msgHTML($email_content);
        $mail2->addAddress('willsenge@gmail.com');
        $mail2->Subject = "$email Subscribed!";

        // Set options
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        //$mail->Debugoutput = 'html';                      //Ask for HTML-friendly debug output

        $mail2->Username = "will.hayslettjr@gmail.com"; // your GMail user name
        $mail2->Password = "mnhafdfqjjxnlkqc"; 
        $mail2->Host = "ssl://smtp.gmail.com"; // GMail
        $mail2->Port = 465;
        $mail2->IsSMTP(); // use SMTP
        $mail2->SMTPAuth = true; // turn on SMTP authentication
        $mail2->setFrom('noreply@thehayslettweekly.com', 'The Hayslett Weekly');

        // Send the email.
        if ($mail->Send()){
            // Send the second email.
            if ($mail2->Send()){
                // Set a 200 (okay) response code.
                http_response_code(200);
                echo "<h5><strong>Success!</strong> You've been subscribed. Look out for an introduction email soon.</h5>";
            } else {
                // Set a 500 (internal server error) response code.
                http_response_code(500);
                echo "<strong>Whoops!</strong> This is embarrasing. Something went wrong on my end.";
            }
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "<strong>Whoops!</strong> This is embarrasing. Something went wrong on my end.";
        }

	}
?>