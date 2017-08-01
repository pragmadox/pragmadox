<!DOCTYPE html>
<html>

<head>
	<title>Contact Processing</title>
        
        <? 
            // Get the variables from index.html
            $name= $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $requestType = $_POST['requestType'];
            $msg = "Message from a Potential Customer: \n\n";
            $msg .= "Name: " . $name . "\n";
            $msg .= "Email: " . $email . "\n";
            $msg .= "Request Type: " . $requestType . "\n";
            $msg .= "Message: " . $message . "\n";
    
            //mail vars
            $to = "jay.price@pragmadox.com, pgrimes1991@gmail.com";
            $subject = " " . $requestType . " from " . $firstName . " " . $lastName . " ";
            $mailheaders = "From: " . $email . "\n";
            $mailheaders .= "Reply-to: " . $email . "\n";
            //send the email!!
            mail($to, $subject, $msg, $mailheaders);
            //redirect page
        ?>
        <script>
            window.location.replace("index.html");
        </script>
    </head>
<body>
	
</body>
    
</html>






