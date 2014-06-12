<!DOCTYPE html>
<html lang="en">
<head>
<title>Products</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.6.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/tms-0.3.js"></script>
<script type="text/javascript" src="js/tms_presets.js"></script>
<script type="text/javascript" src="sources281/js/script.js"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="js/html5.js"></script>
	<style type="text/css">
		#menu a, .bg, .bg2, #ContactForm a {behavior:url(js/PIE.htc)}
	</style>
<![endif]-->
<!--[if lt IE 7]>
	<div style='clear:both;text-align:center;position:relative'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" alt="" /></a>
		</div>
<![endif]-->
<?php
// disable warnings
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

require_once('sources281/classes/CMySQL.php'); // include service classes to work with database and comments
require_once('sources281/classes/CMyComments.php');

if ($_POST['action'] == 'accept_comment') {
    echo $GLOBALS['MyComments']->acceptComment();
    exit;
}

// prepare a list with photos
$sPhotos = '';
$aItems = $GLOBALS['MySQL']->getAll("SELECT * FROM `s281_photos` ORDER by `when` ASC"); // get photos info
foreach ($aItems as $i => $aItemInfo) {
    $sPhotos .= '<div class="photo"><img src="sources281/images/thumb_'.$aItemInfo['filename'].'" id="'.$aItemInfo['id'].'" /><p>'.$aItemInfo['title'].' item</p><i>'.$aItemInfo['description'].'</i></div>';
}

?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8" />

    <title>Products</title>
    <div id="logo">
	<h1><a href="index.html" id="logo"></a></h1>
		<nav>
					<ul id="menu">
						<li class="active"><a href="index.html">Home</a></li>
						<li><a href="Research Works.html">Research Works</a></li>
						<li><a href="Information.html">Information</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="Contact.html">Contact</a></li>
						<li><a href="login.html">Login</a></li>
					</ul>
				</nav>
	
    <!-- Link styles -->
    <link href="sources281/css/main.css" rel="stylesheet" type="text/css" />

    <!-- Link scripts -->
    <script src="https://www.google.com/jsapi"></script>
    <script>
        google.load("jquery", "1.7.1");
    </script>
    <script src="sources281/js/script.js"></script>
</head>
<body>
    <!-- <header>
        <h2>Products</h2>
        <a href="http://www.script-tutorials.com/facebook-like-photo-gallery-with-comments/" class="stuts">Back to original tutorial on <span>Script Tutorials</span></a>
    </header>
 -->
    <!-- Container with last photos -->
    <div class="container">
      
        <?= $sPhotos ?>
    </div>

    <!-- Hidden preview block -->
    <div id="photo_preview" style="display:none">
        <div class="photo_wrp">
            <img class="close" src="sources281/images/close.gif" />
            <div style="clear:both"></div>
            <div class="pleft">test1</div>
            <div class="pright">test2</div>
            <div style="clear:both"></div>
        </div>
    </div>
</body></html>
</html>