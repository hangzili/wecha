<?php
$sta="abcdefg";
ats($sta);
function ats($sta)
{
    $len=strlen($sta); 
    $asd="";  
    for($i=$len-1;$i>=0;$i--){
    	$asd.=$sta[$i];
    }
    echo $asd;
}


$qwe="雕刻可可粉看过恶客";
q($qwe);
function q($qwe)
{
	$len=strlen($qwe);
	$s="";
	for($i=$len-1;$i>=0;$i--){
		$s.=mb_substr($qwe,$i,1);
	}
	echo $s;
}