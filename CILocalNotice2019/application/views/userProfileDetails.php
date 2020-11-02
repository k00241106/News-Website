<?php
$this->load->view('header'); 
$this->load->helper('url');
$base = base_url() . index_page();
?>
<br>
<div id="for-current-user-details">
	<center><p> These are your Profile details: </p></center>
</div>
<br>

<div class="for-edituser">
	<p> Username: <?php echo $User['UserName'] ?> </p>
	<p> First Name: <?php echo $User['FirstName'] ?> </p>
	<p> Last Name: <?php echo $User['SurName'] ?> </p>
	<p> Date of Birth: <?php echo $User['dateOfBirth'] ?> </p>
	<p> Mobile: <?php echo $User['Mobile'] ?> </p>
	<p> Address Line 1: <?php echo $User['AddressLine1'] ?> </p>
	<p> Address Line 2: <?php echo $User['AddressLine2'] ?> </p>
	<p> Address Line 3: <?php echo $User['AddressLine3'] ?> </p>
	<p> Address Line 3: <?php echo $User['AddressLine3'] ?> </p>
</div>
<?php
$this->load->view('footer'); 
?>