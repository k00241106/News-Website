<?php
$this->load->helper('url');
$base = base_url() . index_page();
$this->load->view('header'); 
$this->load->helper('url');
?>
  <h1 class="welcome-register-text">Register</h1>
  <div class="for-registeruser">
  <form id="form1" name="form1" method="post" action="<?php echo "$base/User/RegisterUser"; ?>">
  <p>
    <label for="UserName">User Name</label>
    <input type="text" name="UserName" id="UserName" required>
  </p>
  <p>
    <label for="Password">Password</label>
    <input type="password" name="Password" id="Password" required>
  </p>
  <p>
    <label for="FirstName">First Name</label>
    <input type="text" name="FirstName" id="FirstName" required>
  </p>
  <p>
    <label for="Surname">Surname</label>
    <input type="text" name="Surname" id="Surname" required>
  </p>
  <p>
    <label for="dateOfBirth">Date of Birth</label><br>
    <input required type="date" name="dateOfBirth" id="dateOfBirth" />
  </p>
  <p>
    <label for="Mobile">Mobile</label>
    <input type="number" name="Mobile" id="Mobile" required>
  </p>
  <p>
    <label for="AddressLine1">Address Line 1</label>
    <input type="text" name="AddressLine1" id="AddressLine1" required>
  </p>
  <p>
    <label for="AddressLine2">Address Line 2</label>
    <input type="text" name="AddressLine2" id="AddressLine2" required>
  </p>
  <p>
    <label for="AddressLine3">Address Line 3</label>
    <input type="text" name="AddressLine3" id="AddressLine3" required>
  </p>
  <p>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
  </p>
  <p>
    <label for="userfile">Avatar(Optional)</label><br>
	<input name="userfile" type="file" id="userfile" size="45" /><br>
  </p>
  <p>
    <input type="submit" name="button" id="button-for-register" value="Submit" />
  </p>
</form>
</div>
<?php
$this->load->view('footer'); 
?>