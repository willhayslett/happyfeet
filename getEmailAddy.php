<?php
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

		// Set the from email address.
		$from = "noreply@hayslettweekly.com";
		// Set the recipient email address.
        $recipient = "willsenge@gmail.com";

        // Set the email subject.
        $subject = "$email Subscribed!";

        // Build the email content.
        $email_content = "Hi WillSenge! You've received a new subscription. Here's the email address below:\n\n";
        $email_content .= "Email: $email\n\n";

        // Build the email headers.
        $email_headers = "From: <$from>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "<h5><strong>Success!</strong> You've been subscribed. Look out for an introduction email soon.</h5>";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "<strong>Whoops!</strong> This is embarrasing. Something went wrong on my end.";
        }
	}
?>