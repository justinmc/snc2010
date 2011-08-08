<?php

include("functions_db.php");

// echoes the subtitle (what page you is on)
function subtitle($address)
{
   echoDB($address, "title");
}

// echoes the main content
function content($address)
{
   echoDB($address, "content");
 
   echo "<br><br><br><br>\n";
}

// Updates the pages and the member's profiles.  Passing a 1 for $what gives pages, a 2 gives profiles
function update($stage, $what)
{
   // Select the profile to edit
   if ($stage == 1)
   {
         echo "<p>Check the page that you want to work on and click the 'Edit' button 
               to start editing that page.</p><p>Clicking the links will actually take
               you to the page!</p><br><br>\n";
      
         echo "<form method = \"post\" action = \"index.php?num=2\">\n";
         echo "<table cellspacing=\"1\" cellpadding=\"2\" width=\"604\" border=\"1\">\n";
         echo "<tr>\n";
         echo "<td>View</td>\n";
         echo "<td>Edit</td>\n";
         echo "</tr>\n";

         $rows = getrows('content');
         $count = 0;
         while ($count < $rows)
         {
            $check = "";
            if (!$count)
               $check = "Checked";
            $DATA = getdb($count, 'content');
            echo "<tr>\n";
            echo "<td><a href = \"" . $DATA['address'] . "\">" . $DATA['address'] . "</a></td>\n";
            echo "<td><input type = \"radio\" value =\"" .  $DATA['address'] . "\" name = \"id\" " . $check . "></td>\n";
            echo "</tr>\n";

            $count++;
         }

      echo "</tbody>\n";
      echo "</table>\n";
      echo "<br><br><br>\n";
      echo "<input type = \"submit\" value = \"Edit\">\n";
      echo "</form>\n";
      echo "<br><br><br><br><br>\n";
   }
   
   // Edit the profile
   elseif ($stage == 2)
   {
      $filename = $_REQUEST["id"];
      
      echo "<p>\n";
      echo "Edit the page here:<br>\n";
      echo "</p>\n";
      echo "<br><br>\n";
      echo "<form method = \"post\" action = \"index.php?num=3\">\n";
      echo "<textarea id=\"editor1\" name=\"editor1\" rows=\"10\" cols=\"80\">";
      echoContent($filename);
      echo "</textarea>\n";
      // Replace that textarea with CKEditor
      echo "<script type=\"text/javascript\">\n";
      echo "var editor = CKEDITOR.replace( 'editor1' );\n";
	   echo "CKFinder.SetupCKEditor( editor, '/ckfinder/' ) ;\n";
	
	//   echo "CKEDITOR.replace( 'editor1' );\n";
	//   echo "CKFinder.SetupCKEditor( editor, '../../ckfinder/' ) ;\n";
	   echo "</script>";
	   
	   echo "<input type = \"hidden\" name = \"Address\" value = \"" . $filename . "\" />\n";
	   echo "<br><br><br>\n";
      echo "<input type = \"submit\" value = \"Submit\">\n";
      echo "</form>\n";
      echo "<br><br><br><br><br>\n";
   }

   // Update the database
   elseif ($stage == 3)
   {
      $html = $_POST["editor1"];
      
//      $apost = "'";
//      $apostcom = "\\'";
//      $html = str_replace($apost,$apostcom,$html);																				// Fixes the murderous apostrophe error by escaping apostrophes
      $address = $_POST["Address"];

      updatePage($address, $html);
            
      echo "<h2> You're web page update was received. </h2><br><br><br><br>";

   }

}

?>
