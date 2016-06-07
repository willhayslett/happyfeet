<?php
	// define variables and set to empty values
	$name = $email = $comment = "";

	function cleanInput($data) {
	  	$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = cleanInput($_POST["name"]);
        $comment = cleanInput($_POST["comment"]);
	  	$email = filter_var(cleanInput($_POST["emailaddy"]), FILTER_SANITIZE_EMAIL);

	  	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
	  		// Set a 400 (bad request) response code and exit.
            http_response_code(400);
		    echo "Whoops! There appears to be an issue with your email address. Please try again.";
            exit;
		} 

		// Set the recipient email address.
        $recipient = "willsenge@gmail.com";

        // Set the email subject.
        $subject = "Hayslett Weekly: $name Sent you a Message!";

        // Build the email content.
        $email_content = "Hi WillSenge! You just received a new message from $name. Check the details below:\n\n";
        $email_content .= "Name: $name\n";
        $email_content .= "Email: $email\n";
        $email_content .= "Comment: $comment\n\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "<h3><strong>Success!</strong> We've got your comment and look forward to connecting with you soon.</h3>";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "<strong>Whoops!</strong> This is embarrasing. Something went wrong on my end.";
        }
	}
?>