<?php
$type=$_POST['pageType'];
$frameworkId=$_POST['frameworkId'];
$nowpage = $_POST['nowpage'];
$listviewCode = $_POST['listviewCode'];
$elementId=$_POST['elementId'];
$result=array();

require_once("modules\HAA_ListViews\generateDynamicListHtml.php");
$dynamicListHtml =new generateDynamicListHtml();
$dynamicListHtml->listviewSet=array();
$html=$dynamicListHtml->generateListviewHtml($listviewCode,$type,$frameworkId,$nowpage,$elementId);
$result["html"]=$html;
$result["title"]=$dynamicListHtml->listviewSet["title"];
echo json_encode($result);