<?php
require_once("cPanelApi.php");
$api = new cPanelApi("domain_url", "cpanel_username", "cpanel_password");
$emails = $api->listEmail("llkll.net");
echo $emails;
