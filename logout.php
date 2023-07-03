<center>
 <h1>	 
				የሆሳዕና ከተማ ትራፊከ አስተዳደር ሪከርድ መቆጣጠሪያ ሲስተም <br> Hossana city administration traffic management system
                </h1>
<hr>
<?php
 session_start();
  session_unset();
  session_destroy();
  $_SESSION = array();

  header("Location:index.php");
?>
</center>