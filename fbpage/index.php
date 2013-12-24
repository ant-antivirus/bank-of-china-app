<?php 
ini_set('error_reporting', E_ERROR);
require 'fbsdk/facebook.php';
require 'libs/class/fbfanpage.class.php';
$pagetap_app_url = "https://www.facebook.com/C9testpage/app_674051475972603";
$app_id = "674051475972603";
$app_secret = "2be92c274d16205ca191a6a8e5be31c7";
$facebook = new Facebook(array(
  'appId' => $app_id,
  'secret' => $app_secret,
  'cookie' => true
));

// Get User ID
$user = $facebook->getUser();
$signed_request = $facebook->getSignedRequest();
function parsePageSignedRequest() {
	if (isset($_REQUEST['signed_request'])) {
		$encoded_sig = null;
		$payload = null;
		list($encoded_sig, $payload) = explode('.', $_REQUEST['signed_request'], 2);
		$sig = base64_decode(strtr($encoded_sig, '-_', '+/'));
		$data = json_decode(base64_decode(strtr($payload, '-_', '+/'), true));
		return $data;
	}
	return false;
}

$fanpage = new FacebookFanPage($pagetap_app_url);

if($signed_request = parsePageSignedRequest()) {
  $fanpage->RenderPageContent($signed_request->page->liked);
}else{
  header('Location: '.$pagetap_app_url);
}

?>