<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Risky Jobs - Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <img src="riskyjobs_title.gif" alt="Risky Jobs" />
  <img src="riskyjobs_fireman.jpg" alt="Risky Jobs" style="float:right" />
  <h3>Risky Jobs - Registration</h3>

<?php
  $regex_phone = "/^\(?[0]\d{4}\)?\s?\d{3}\s?\d{3}$/";

  if (isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];
    $resume = $_POST['resume'];
    $output_form = 'no';

    if (empty($first_name)) {
      // $first_name is blank
      echo '<p class="error">You forgot to enter your first name.</p>';
      $output_form = 'yes';
    }

    if (empty($last_name)) {
      // $last_name is blank
      echo '<p class="error">You forgot to enter your last name.</p>';
      $output_form = 'yes';
    }

    if (empty($email)) {
      // $email is blank
      echo '<p class="error">You forgot to enter your email address.</p>';
      $output_form = 'yes';
    }

    if (preg_match($regex_phone, $phone)) {
      $phone_clean = preg_replace('/[\(\)\s]/', '', $phone);
      echo '<br /><p class="error">Your phone number has been stored as ' . $phone_clean . '.</p><br />';
    } else {
      // $phone is invalid
      echo '<p class="error">You entered an invalid phone number.</p>';
      $output_form = 'yes';
    }
    // if (!preg_match($regex_phone, $phone)) {
    //   // $phone is invalid
    //   echo '<p class="error">You entered an invalid phone number.</p>';
    //   $output_form = 'yes';
    // }

    if (empty($job)) {
      // $job is blank
      echo '<p class="error">You forgot to enter your desired job.</p>';
      $output_form = 'yes';
    }

    if (empty($resume)) {
      // $resume is blank
      echo '<p class="error">You forgot to enter your resume.</p>';
      $output_form = 'yes';
    }
  }
  else {
    $output_form = 'yes';
  }

  if ($output_form == 'yes') {
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <p>Register with Risky Jobs, and post your resume.</p>
  <table>
    <tr>
      <td><label for="firstname">First Name:</label></td>
      <td><input id="firstname" name="firstname" type="text" <?php if (isset($first_name)) {echo "value='$first_name'";} ?>/></td></tr>
    <tr>
      <td><label for="lastname">Last Name:</label></td>
      <td><input id="lastname" name="lastname" type="text" <?php if (isset($last_name)) {echo "value='$last_name'";} ?>/></td></tr>
    <tr>
      <td><label for="email">Email:</label></td>
      <td><input id="email" name="email" type="text" <?php if (isset($email)) {echo "value='$email'";} ?>/></td></tr>
    <tr>
      <td><label for="phone">Phone:</label></td>
      <td><input id="phone" name="phone" type="text" <?php if (isset($phone)) {echo "value='$phone'";} ?>/></td></tr>
    <tr>
      <td><label for="job">Desired Job:</label></td>
      <td><input id="job" name="job" type="text" <?php if (isset($job)) {echo "value='$job'";} ?>/></td>
  </tr>
  </table>
  <p>
    <label for="resume">Paste your resume here:</label><br />
    <textarea id="resume" name="resume" rows="4" cols="40"><?php if (isset($resume)) {echo $resume;} ?></textarea><br />
    <input type="submit" name="submit" value="Submit" />
  </p>
</form>

<?php
  }
  else if ($output_form == 'no') {
    echo '<p>' . $first_name . ' ' . $last_name . ', thanks for registering with Risky Jobs!</p>';

    // code to insert data into the RiskyJobs database...
  }
?>

</body>
</html>