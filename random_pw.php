<?php
 
// A quick function to generate a random password
function randomPassword($length) {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < $length-1; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
 
 
// This is the salt that ONLY php will know. That way it's harder for people to get into your db.
$salt = "sdfsfsd24#@$24k0sdfi09skjfpoksd;fk;sdl,fwejt094jt";
 
// Get the email from the form
$email = $_POST['email'];
 
// Split it.
$email_parts = explode('@', $email);
 
 
// Pull out the username.
$username = $email_parts[0];
 
// This will generate a random alphanumeric password with the length of 8;
$password = randomPassword(8);
 
$time = time();
 
// If the password was 'test' this will add the salt AND the time to it.
// salt prevents rainbow table from being used
// time prevents people from seeing a static ending (indicating using a salt)
// md5 hashes words
$password_hash = sha1(md5($password).$salt.md5($time));
 
// This is a function to add the user into the db. I'm to lazy to type it.
create_user($username, $password_hash, $email, $time); //save all of these (including $time) into the db.
 
$message = "Hey $email, Your username is $username and password is $password";
 
mail($email, "Your new account", $message);