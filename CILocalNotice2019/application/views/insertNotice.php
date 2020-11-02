<?php
$this->load->view('header'); 
$this->load->helper('url');
$base = base_url() . index_page();
?>
<br>
<br>
<div class="for-insert-notice">
<h1 class="center-text">Add an Article</h1>
<form id="form1" name="form1" method="post" enctype="multipart/form-data"  action="<?php echo "$base/Notice/insertNotice"; ?>">
  <p>
    <label for="shortDescription">Ttile of article</label><br>
    <input required type="text" name="shortDescription" id="shortDescription" />
  </p>
  <p>
    <label for="subHeading">subHeading</label><br>
    <textarea name="subHeading" id="subHeading" cols="45" rows="5" required></textarea>
  </p>
  <p>
    <label for="longDescription">Full Written Article</label><br>
    <textarea name="longDescription" id="longDescription" cols="45" rows="5" required></textarea>
  </p>
  <p>
    <label for="userfile">Image</label><br>
	<input required name="userfile" type="file" id="userfile" size="45" /><br>
  </p>
  <p>
    <label for="area">Where did the event take place?</label><br>
    <input required type="text" name="area" id="area" /><br>
  </p>
  <p>
    <label for="dateExp">Date Written</label><br>
    <input required type="date" name="dateExp" id="dateExp" />
  </p>
  <p>
    <input required type="submit" name="button" id="button-for-insert-notice" value="Submit" />
  </p>
</form>
</div>
<?php
$this->load->view('footer'); 
?>