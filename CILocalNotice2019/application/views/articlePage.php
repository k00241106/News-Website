<?php
$this->load->view('header'); 
$this->load->helper('url'); 
$base = base_url() . index_page();
$img_base = base_url();
$n = $this->session->userdata('AllNoticeData');

if(!$n==null){ ?>
<br>
<h2 id="article-head-text"> Click on the image to have a further read on todays stories </h2>
	<div id="newsarticles-Full">
        <?php foreach ($n as $notice){
				echo "<a href=\"$base/Notice/getDrillDownNoticeAndUser/". 
					$notice['noticeId'] . "\"><img src=\"$img_base/assets/images/thumbs/" . 
					$notice['largeImage']. "\" /> </a> ";
					echo "<br>";
				echo '<p style="text-transform: uppercase; color:red; font-weight: bold;">' . $notice['shortDescription'] . '</p>';
				echo "<br>";
				echo '<p style="color: black;">' . $notice['subHeading'] . '</p>';
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
								echo "<hr> . </hr>";

		}?>
<?php } ?>                
	</div>
<?php
$this->load->view('footer'); 
?>
<!--<div class="example=">';
echo '</div>';
 echo  $notice['area'];-->