<?php
$this->load->view('header'); 
$this->load->helper('url');
$img_base = base_url();
$base = base_url() . index_page();
$sd = $notice['shortDescription'];
$sub = $notice['subHeading'];
$ld = $notice['longDescription'];
$area = $notice['area'];
$dateExp = $notice['dateExp'];
$image = $notice['largeImage'];
?>
<br>
<div class="main-insert-notice-content-wrapper">

<h1 class="center-text">Edit your Article</h1>
<form id="form1" name="form1" method="post" enctype="multipart/form-data"  action="<?php echo "$base/Notice/saveNoticeDetails/" . $notice['noticeId']; ?>">
  <p>
    <label for="shortDescription">Title of Article</label><br>
    <input type="text" name="shortDescription" id="shortDescription" value="<?php echo $sd ?>"/>
  </p>
  <p>
    <label for="subHeading">SubHeading</label><br>
    <textarea name="subHeading" id="subHeading"  cols="45" rows="5"><?php echo $sub ?></textarea>
  </p>
  <p>
    <label for="longDescription">Full Written Article</label><br>
    <textarea name="longDescription" id="longDescription"  cols="45" rows="5"><?php echo $ld ?></textarea>
  </p>
  <p>
	<img src="<?php echo $img_base . "/assets/images/notices/$image"?>" id="edit-notice-image">
	<p>
		<label for="userfile">Image</label><br>
		<input name="userfile" type="file" id="userfile" />
	</p>
  </p>
  <p>
    <label for="area">Where did the event take place?</label> <br>
    <input type="text" name="area" id="area" value="<?php echo $area?>"/>
  </p>
  <p>
    <label for="dateExp">Date Written</label><br>
    <input type="text" name="dateExp" id="dateExp" value="<?php echo $dateExp ?>"/>
  </p>
   <input type="submit" name="button" id="button-for-edit-notice" value="Submit" />
</form>
</div>
<?php
$this->load->view('footer'); 
?>