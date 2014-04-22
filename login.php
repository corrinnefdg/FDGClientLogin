<?php
// That pesky salt again. Really should be in a config file.
$salt = "sdfsfsd24#@$24k0sdfi09skjfpoksd;fk;sdl,fwejt094jt";
 
// Get the username and password;
$username = $_POST['username'];
 
$password = $_POST['password'];
 
// Just get the user out of the database. If no user then $user will be null. Again, too lazy to write this bit.
$user = get_user($username);
 
// If a user was found.
if($user)
{
        // Recreate that crazy hash and see if it matches what's in the db.
        if(sha1(md5($password).$salt.md5($user->time) == $user->password)
        {
                // If they match, log the mother trucker in.
                login_user($username);
                end;
        }
        else
        {
                $error = "Username or password invalid";
        }
}
else
{
        $error = "Username or password invalid";
}
echo $error;