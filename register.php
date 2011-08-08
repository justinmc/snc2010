<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"																					
"http://www.w3.org/TR/html4/loose.dtd">																												<!-- Tells browser what type of html this site uses -->

<html>

<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">																			<!-- What type of content -->

<link rel = stylesheet type = "text/css" href = "style.css">																					<!-- CSS link -->
<!--[if IE]>
<link rel = 'stylesheet' type = "text/css" href = "styleie.css">
<![endif]-->

<title> AIESEC Summer Conference 2010 </title>																																	<!-- Text that shows up on tab in browser -->

<?php

   include $_SERVER['DOCUMENT_ROOT'].'/snc2010/scripts/functions_page.php';
   
   $filename = "http://www.aiesecmichigan.com" . $_SERVER["PHP_SELF"];

?>

</head>																									

<body>

<div class = "all">
   <div class = "gradient">
   </div>
   <div class = "topbar">
      <div class = "navbar">
           <ul class = "nav">
            <li class = "home"><a href = "index.php"></a>  
            <li class = "register"><a href = "register.php"></a>
            <li class = "location"><a href = "location.php"></a>
            <li class = "faci"><a href = "ocfacis.php"></a>  
            <li class = "themes"><a href = "themes.php"></a>
            <li class = "study"><a href = "tour.php"></a>
            <li class = "sponsors"><a href = "sponsors.php"></a>
            <li class = "alumni"><a href = "alumni.php"></a>
            <li class = "alcohol"><a href = "apolicy.php"></a>
            <li class = "sex"><a href = "shpolicy.php"></a>
            <li class = "contact"><a href = "contactus.php"></a>
            </ul>         
               
      </div>
   </div>
   
   <div class = "subtitle">
      <?php
      
         echo "<h2>";
         subtitle($filename);
         echo "</h2>\n";
         
      ?>   
   </div>

   <div class = "content">
      <div class = "topBack">
      </div>

      <br><br>
      <?php

         content($filename);
      
      ?>
	   <div class = "botBack">
      </div>
   </div>
   
   <br><br><br><br>
   <div class = "bottombar">
      <br>
      &copy; 2010 AIESEC Michigan
   </div>

</div>

</body>

</html>
