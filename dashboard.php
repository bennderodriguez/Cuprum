<?php include 'headersg.php'; ?>



<div class="card">

 

    <div class="card-body">

<?php
         
$prog = $_GET["p"];

if ($prog == "") { $prog = $_GET["p"];}
if ($prog == "") { echo "no existe programa a ejecutar"; }
else { 
 $DLC_PROG = "/ton/".$prog;
 include "locd.inc";
 $myDLC=new DLC;
 if ($myDLC->Execute("$DLC_PROG") == false){
    print "(" . $myDLC->sysErrNo . ") " . $myDLC->sysErrDesc;
 } else {
    echo $myDLC->dlcData;
   }
}
?>
    </div>

    </div>
</div>

<?php include './footerg.php'; ?>
