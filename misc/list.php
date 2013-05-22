<?php 
$USERS["usuario"] = "0a744893951e0d1706ff74a7afccf561"; 
$USERS["administrador"] = "21232f297a57a5a743894a0e4a801fc3";
  
function check_logged(){ 
     global $_SESSION, $USERS; 
     if (!isset($_SESSION["logged"])) { 
          header("Location: http://ed.site40.net/AdventumSpace/login.php"); 
     } 
}; 

function check_perm(){ 
     global $_SESSION, $USERS; 
     if ($_SESSION["logged"]!="administrador") { 
          header("Location: http://ed.site40.net/AdventumSpace/consultas"); 
     } 
};
?>