<?php
require_once("cPanelApi.php");
$api = new cPanelApi("llkll.net", "llwllnet", "Ras99412522");
$emails = $api->listEmail("llkll.net");
echo $emails;
