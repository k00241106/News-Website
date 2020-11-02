<?php 
$this->load->helper('url'); 
$cssbase = base_url();
$img_base = base_url();
$base = base_url() . index_page();
$user = $this->session->userdata('user');
?>

<!DOCTYPE>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Limerick Sports News</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?php echo $cssbase . "/assets/css/my.css"?>" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<div id="header">
		<div id="logo"> 
			<h1> Limerick Sports News </h1>
		</div>
	</div>
<div id="wrapper">
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="<?php echo "$base/User"; ?>">Home</a></li>
			<?php if (isset($user['UserID'])) {?>
				<li><a href="<?php echo "$base/User/userHomePage/". $user['UserID']; ?>">My Home Page</a></li>				
				<li><a href="<?php echo "$base/Notice/doArticle"; ?>">Articles</a></li>
				<li><a href="<?php echo "$base/User/getProfileDetails/" . $user['UserID']; ?>">User Profile</a></li>
				<li><a href="<?php echo "$base/User/logout/"?>">Log Out</a></li>
				
			<?php } else { ?>
				<li><a href="<?php echo "$base/Notice/doArticle"; ?>">Articles</a></li>
				<li><a href="<?php echo "$base/User/dologon"; ?>">User Profile</a></li>
				<li><a href="<?php echo "$base/User/dologon"; ?>">Login</a></li>
				<li><a href="<?php echo "$base/User/doRegister"; ?>">Register</a></li>
			<?php }?>
				

		</ul>
	</div>
	