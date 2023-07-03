<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"><div class="subBarInner"> 
<!-- =============================================== calander===========================================-->
<script language="javascript" src="liveclock.js">
</script>
<body onLoad="Defaults(); show_clock()"><br>
<?php
echo"<div id='hour'>";
echo(strftime(" %B %d, %Y. %A.  ")).date("h:i:s A")."</div>";
echo"</div>";
?> 
<div id=NavBar style="position:relative;width:286px;top:5px;" align="left">
<form name="when"><table>
<tr><td></td>
   <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/bd_prevpage.png" height=20px width=20px onClick="Skip('-')"/></td>
   <td> </td>
   <td><select name="month" onChange="On_Month()">
      </select>
   </td>
   <td><input type="text" name="year" size=4 maxlength=4 onKeyPress="return Check_Nums()" onKeyUp="On_Year()"></td>
   <td> </td>
   <td><img src="images/bd_nextpage.png" height=20px width=20px onClick="Skip('+')"/></td>
</tr></table></form></div>
<div id=Calendar style="position:relative;width:238px;top:-2px;" align="center"></div>
</body>
<?php echo"</div>";
?>