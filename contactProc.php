<!DOCTYPE html>
<html>

<head>
	<title>Contact Processing</title>
        
        <? 
            // Get the variables from index.html
            $name= $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $company = $_POST['company'];
            $requestType = $_POST['requestType'];
            $msg = "Message from a Potential Customer: \n\n";
            $msg .= "Name: " . $name . "\n";
            $msg .= "Email: " . $email . "\n";
            $msg .= "Company: " . $company . "\n";
            $msg .= "Request Type: " . $requestType . "\n";
            $msg .= "Message: \n\n" . $message . " ";
    
            //mail vars
            $to = "jay.price@pragmadox.com";
            $subject = " " . $requestType . " from " . $name . " ";
            $mailheaders = "From: baldeaglejprice@hotmail.com" . "\n";
            $mailheaders .= "Reply-to: " . $email . "\n";
            //send the email!!
            mail($to, $subject, $msg, $mailheaders);
            //redirect page
        ?>
        <script>
            window.location.replace("index.html");
            alert("Thank you so much for your message. I will contact you shortly.");
        </script>
    </head>
<body>
	
</body>
    
</html>






