<?php
$this->load->view('header'); 
$this->load->helper('url'); 
$base = base_url() . index_page();
$img_base = base_url();
$n = $this->session->userdata('AllNoticeData');

if(!$n==null){ ?>
	<div class="for-welcome-text">
		<h2 id="welcome-text"> Check out the articles below </h2>
	</div>
	<div id="newsarticles">
	<br>
        <?php foreach ($n as $notice){
			    echo " <a href=\"$base/Notice/getDrillDownNoticeAndUser/". 
					$notice['noticeId'] . "\"><img src=\"$img_base/assets/images/thumbs/". 
					$notice['largeImage']. "\" /> </a>";
					echo "<br>";
				echo  '<p style="text-transform: uppercase; font-weight:bold;">' . $notice['shortDescription'] . '</p>';
				
					echo "<br>";
				
				echo "<br>";
		}?>
<?php } ?>                
	</div>
<?php
$this->load->view('footer'); 
?>
<!--<div class="example=">';
echo '</div>';
 echo  $notice['area'];-->