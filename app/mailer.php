<?php
/* Set e-mail recipient */
$myemail = "jordansaxe15@gmail.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['contact_name'], "Your Name");
$email = check_input($_POST['contact_email'], "Your E-mail Address");
$message = check_input($_POST['contact_message'], "Your Message");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("Invalid e-mail address");
}
/* Let's prepare the message for the e-mail */

$message = "

Someone has sent you a message using your contact form:

Name: $name
Email: $email

Message:
$message

";

/* Send the message using mail() function */
mail($myemail, $message);

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<body>

<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>
<p>Hit the back button and try again</p>

</body>
</html>
<?php
exit();
}
?>