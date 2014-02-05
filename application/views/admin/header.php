<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
<link rel="apple-touch-con" href="" />
<title>IUQMS Administrator</title>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">


<!-- The Columnal Grid and mobile stylesheet -->
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>styles/columnal/columnal.css" type="text/css" media="screen" />


<!-- Fixes for IE -->

<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>styles/columnal/ie.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>styles/ie8.css" type="text/css" media="screen" />
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>scripts/flot/excanvas.min.js"></script>
<![endif]-->

<!-- Now that all the grids are loaded, we can move on to the actual styles. -->
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>scripts/jqueryui/jqueryui.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>styles/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>styles/global.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>styles/config.css" type="text/css" media="screen" />

<!-- Use CDN on production server -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<!-- <script src="<?php echo ADMIN_ASSETS; ?>scripts/jquery-1.6.4.min.js"></script> -->
<!-- <script src="<?php echo ADMIN_ASSETS; ?>scripts/jqueryui/jquery-ui-1.8.16.custom.min.js"></script> -->

<!-- Menu -->
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>scripts/superfish/superfish.css" type="text/css" media="screen" />
<script src="<?php echo ADMIN_ASSETS; ?>scripts/superfish/superfish.js"></script>

<!-- Adds HTML5 placeholder element to those lesser browsers -->
<script src="<?php echo ADMIN_ASSETS; ?>scripts/jquery.placeholder.1.2.min.shrink.js"></script>

<!-- Adds charts -->
<script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>scripts/flot/jquery.flot.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>scripts/flot/jquery.flot.pie.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_ASSETS; ?>scripts/flot/jquery.flot.stack.min.js"></script>

<!-- Form Validation Engine -->
<script src="<?php echo ADMIN_ASSETS; ?>scripts/formvalidator/jquery.validationEngine.js"></script>
<script src="<?php echo ADMIN_ASSETS; ?>scripts/formvalidator/jquery.validationEngine-en.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>scripts/formvalidator/validationEngine.jquery.css" type="text/css" media="screen" />

<!-- Sortable, searchable DataTable -->
<script src="<?php echo ADMIN_ASSETS; ?>scripts/jquery.dataTables.min.js"></script>

<!-- Custom Tooltips -->
<script src="<?php echo ADMIN_ASSETS; ?>scripts/twipsy.js"></script>

<!-- WYSIWYG Editor -->
<script src="<?php echo ADMIN_ASSETS; ?>scripts/cleditor/jquery.cleditor.min.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>scripts/cleditor/jquery.cleditor.css" type="text/css" media="screen" />

<!-- Form Validation Engine -->
<script src="<?php echo ADMIN_ASSETS; ?>scripts/formvalidator/jquery.validationEngine.js"></script>
<script src="<?php echo ADMIN_ASSETS; ?>scripts/formvalidator/jquery.validationEngine-en.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>scripts/formvalidator/validationEngine.jquery.css" type="text/css" media="screen" />

<!-- Fullsized calendars -->
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>scripts/fullcalendar/fullcalendar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>scripts/fullcalendar/fullcalendar.print.css" type="text/css" media="print" />
<script src="<?php echo ADMIN_ASSETS; ?>scripts/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo ADMIN_ASSETS; ?>scripts/fullcalendar/gcal.js"></script>

<!-- Colorbox is a lightbox alternative-->
<script src="<?php echo ADMIN_ASSETS; ?>scripts/colorbox/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>scripts/colorbox/colorbox.css" type="text/css" media="screen" />

<!-- Colorpicker -->
<script src="<?php echo ADMIN_ASSETS; ?>scripts/colorpicker/colorpicker.js"></script>
<script src="<?php echo ADMIN_ASSETS; ?>scripts/muse.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>scripts/colorpicker/colorpicker.css" type="text/css" media="screen" />

<!-- All the js used in the demo -->
<script src="<?php echo ADMIN_ASSETS; ?>scripts/demo.js"></script>
<script src="<?php echo ADMIN_JS; ?>core.js"></script>
<script src="<?php echo ADMIN_ASSETS; ?>ckeditor/ckeditor.js"></script>

<script>
$(function(){
	var url = document.URL;
	var aa = $('.container ul.sf-menu li a[href="'+url+/'<?php echo time();?>"]').parent('li').addClass('active');
	<!--var bb = $('.container ul.sf-menu li a[href="'+url2+'"]').parent('li').addClass('active');-->
	
});
</script>
</head>
<body>
<div id="wrap">
<div id="main">
<header class="container">
  <div class="row clearfix">
    <div class="left"> <a href="javascript:;" id="logo">IUQMS Administrator</a> </div>
    <div class="right">
      <ul id="toolbar">
        <li><span>Logged in as</span> <a class="user" href="#">Administrator</a> <a id="loginarrow" href="#"></a></li>
      </ul>
      <div id="logindrop">
        <ul>
          <li id="logoutprofile"><a href="<?php echo SITE_URL.'administrator/logout';?>">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
<nav class="container">
  <ul class="sf-menu mobile-hide row clearfix">
  <div id="nav">

      <li class="iconed" id="main_nav_3">
         	<a href="<?php echo SITE_URL.'administrator/category/'.time();?>"><span> Subject </span></a>
         </li>
      <li class="iconed" id="main_nav_3">
             	<a href="<?php echo SITE_URL.'administrator/quiz/'.time();?>"><span> Quiz </span></a>
             </li>

      <li class="iconed" id="main_nav_3">
                	<a href="<?php echo SITE_URL.'administrator/question/'.time();?>"><span> Question </span></a>
                </li>

      <li class="iconed" id="main_nav_3">
                	<a href="<?php echo SITE_URL.'administrator/teacher/'.time();?>"><span> Teacher </span></a>
                </li>

      <li class="iconed" id="main_nav_3">
                	<a href="<?php echo SITE_URL.'administrator/student/'.time();?>"><span> Student </span></a>
                </li>

      <li class="iconed" id="main_nav_3">
                	<a href="<?php echo SITE_URL.'administrator/stu_quiz/'.time();?>"><span> Student Quiz </span></a>
                </li>

      <li class="iconed" id="main_nav_3">
                	<a href="<?php echo SITE_URL.'administrator/quiz_metadata/'.time();?>"><span> Quiz Meta Data </span></a>
                </li>
    </div>
  </ul>
</nav>
