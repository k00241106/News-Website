<?php
$this->load->view('header');
$this->load->helper('url');
$img_base = base_url();
$base = base_url() . index_page();
$sd = $notice['shortDescription'];
$ld = $notice['longDescription'];
$area = $notice['area'];
$dateExp = $notice['dateExp'];
$image = $notice['largeImage'];
?>
<br>
<div class="main-notice-content-wrapper">

<h2 class="center-text"> <?php echo $sd ?> </h2>
	
	<div class="main-notice-content-image-container">
		<center><img src="<?php echo $img_base . "assets/images/notices/$image"?>"></center>
    </div><br>
	
	<div class="main-notice-content-article-container">
		<article>
			<p id="long-description-for-article-notice"><?php echo $ld ?></p>
				<br>		
		</article>
    </div><br>
	
</div>

<?php
$this->load->view('footer'); 
?>