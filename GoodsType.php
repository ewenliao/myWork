<?php

require_once ("../../models/db.class.php");
$DB=new webdb();
$mainType = $_REQUEST['mtype'];
$OP = $_REQUEST['OP'];
$sql = "SELECT Id,TypeName FROM Goods_Type WHERE RecordEstate=1 AND Main_TypeId='$mainType' ORDER BY Id";
$result=$DB->query($sql);
$optionStr="";
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
	if($OP==1){
		if($optionStr==""){
			$optionStr=$row["Id"].":".$row["TypeName"];
		}
		else{
			$optionStr.=";".$row["Id"].":".$row["TypeName"];
		}
	}
	else{
		$optionStr.="<option value='".$row["Id"]."'>".$row["TypeName"]."</option>";
	}
}
echo $optionStr;
?>