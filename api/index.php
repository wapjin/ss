<?php
/**
title:数据库操作

*/
$host="127.0.0.1";
$usert="root";
$passu="root";
$npp="820012";

$conn=mysql_connect($host,$usert,$passu) or die("连接数据库失败");
mysql_select_db($npp,$conn);
mysql_query("set names utf8");
//单项批量查找
 function lookr($a,$curPage) { 
		 $data=array();
		if($curPage>=1){
			  $curPage=$curPage;
		}else{

			  $curPage=0;
		}
		  $i=0;

		$sql=mysql_query("SELECT * FROM $a order by id desc limit $curPage,5");
		while($row = mysql_fetch_array($sql)){
			
			$data [$i]['title'] = htmlspecialchars($row['title']);
			$data [$i]['ly'] = htmlspecialchars($row['ly']);
			$data [$i]['time'] = htmlspecialchars($row['time']);
			$data [$i]['shu'] = htmlspecialchars($row['shu']);
			$data [$i]['lei'] = htmlspecialchars($row['lei']);
			$data [$i]['page'] = htmlspecialchars($curPage);
			$i++;
		   
			}
			
		Header('Content-type:application/json; charset=UTF-8');
		echo json_encode($data,JSON_UNESCAPED_UNICODE);
 }
 
 
function lookrs($a,$b) { 
		  $data=array();
		  $i=0;
			$b = str_replace("'","",$b);
		  $sql=mysql_query("SELECT * FROM ".$a." where title like '%".$b."%'");
			while($row = mysql_fetch_array($sql)){
			
			$data [$i]['title'] = htmlspecialchars($row['title']);
			$data [$i]['ly'] = htmlspecialchars($row['ly']);
			$data [$i]['time'] = htmlspecialchars($row['time']);
			$data [$i]['shu'] = htmlspecialchars($row['shu']);
			$data [$i]['lei'] = htmlspecialchars($row['lei']);
			$i++;
		   
			}
			Header('Content-type:application/json; charset=UTF-8');
			echo json_encode($data,JSON_UNESCAPED_UNICODE);
 }
 
 


if(isset($_GET['look'])){
lookrs("jin",$_GET['look']);
}else{

lookr("jin",$_GET['page']);	
}

?>