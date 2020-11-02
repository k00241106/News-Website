<?php
$this->load->view('header'); 
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url();
?>

<h1 id="center-text-userhome">Your Home Page</h1>
<div id="div-for-user-name">
<p id="user-home-text">Hi <?php
$user = $this->session->userdata('user');
$n = $this->session->userdata('noticeData');
echo $user['FirstName']; ?>!!!</p>
</div>
<div class="div-for-user-home-buttons">
<p class="center-text">
	<a class="user-nav-button" href="<?php echo "$base/User/getUpdateDetails/" . $user['UserID']; ?>">Edit User Details</a>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="user-nav-button" href="<?php echo "$base/Notice/doInsertNotice/"?>">Add Notice</a>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="user-nav-button" href="<?php echo "$base/User/getProfileDetails/" . $user['UserID']; ?>">User Profile</a>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<a class="user-nav-button" href="<?php echo "$base/User/logout/"?>">Log out</a>
	
</p>
</div>
<?php
if(!$n==null){
?>
<div class="for-welcome-text">
		<h2 id="welcome-text"> Check out the articles below </h2>
	</div>
	
	<div class="newsarticles">
<?php
		foreach ($n as $notice){
			echo "<br>";
				echo "<a href=\"$base/Notice/getDrillDownNotice/". 
					$notice['noticeId'] . "\"><img src=\"$img_base/assets/images/thumbs/". 
					$notice['largeImage']. "\" /> </a>";
					echo "<br>";
				echo '<p style="text-transform: uppercase; font-weight:bold;">' . $notice['shortDescription'] . '</p>';
				echo "<br>";
				echo "<br>";
				echo "<button class='user-article-edit-button'><a href=\"$base/Notice/doEditNotice/". $notice['noticeId'] . "\">Edit</button>";
				echo "<br>";
				echo "<br>";
				 echo "<button class='user-article-delete-button'><a href=\"$base/Notice/deleteNotice/". $notice['noticeId'] . "\">Delete</button>" ;
				echo "<br>";
				echo "<br>";
		}
?>
  <?php } ?>              
</div>
<?php
$this->load->view('footer'); 
?>