<?php
class FacebookFanPage {
	private $app_redirect_url = "";
	public function __construct($url) {
		$this->app_redirect_url = $url;
	}
	public function RenderPageContent($like) {
		if($like){
			echo '
				<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>BOC</title>

<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/swipe.js"></script>
<script type="text/javascript">
  function NotInFacebookFrame() {
    return top === self;
  }
  function ReferrerIsFacebookApp() {
    if(document.referrer) {
      return document.referrer.indexOf("apps.facebook.com") != -1;
    }
    return false;
  }
  if (NotInFacebookFrame() || ReferrerIsFacebookApp()) {
    top.location.replace("'.$this->app_redirect_url.'");
  }
</script>
<style type="text/css">
	body {
	  margin:0;
	  padding:0;
      width: 810px;
	  overflow: hidden;
	}
</style>
</head>
<body>
<div id="fb-root"></div>
	<script>

    </script>
	<div id=\'mySwipe\' class=\'swipe\'>
      <div class=\'swipe-wrap\'>
        <div class="panel divPage1_bg">
	        <div class="divPage1_btn"><a href="javascript:mySwipe.slide(1);"><img src="images/btn_click.png"></a></div>
	    </div>
	    <div class="panel divPage2_bg">
	        <div class="divPage2_btn"><a href="javascript:mySwipe.slide(0);"><img src="images/btn_back.png"></a></div>
	    </div>
      </div>
    </div>
</body>
<script type="text/javascript">
// pure JS
var elem = document.getElementById(\'mySwipe\');
window.mySwipe = Swipe(elem, {
   startSlide: 0,
   auto: false,
   continuous: true,
   disableScroll: true,
   stopPropagation: true,
   callback: function(index, element) {},
   transitionEnd: function(index, element) {}
});
window.fbAsyncInit = function() {
        FB.init({
          appId: "674051475972603",
          cookie: true,
          xfbml: true,
          oauth: true
        });

        FB.Event.subscribe(\'auth.login\', function(response) {
          top.location.replace("'.$this->app_redirect_url.'");
        });

        FB.Event.subscribe(\'auth.logout\', function(response) {
          top.location.replace("'.$this->app_redirect_url.'");
        });

        FB.Canvas.setSize( { height: 1200 });
};
      (function() {
        var e = document.createElement(\'script\'); e.async = true;
        e.src = document.location.protocol + \'//connect.facebook.net/en_US/all.js\';
        document.getElementById(\'fb-root\').appendChild(e);
      }());


</script>
</html>
			';
		}
		else
		{
			echo '<!DOCTYPE HTML>
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<title>BOC</title>
				<link href="css/style.css" rel="stylesheet" type="text/css">
				<style type="text/css">
					body {
					  margin:0;
					  padding:0;
				    width: 810px;
					  overflow: hidden;
					}
				</style>
				</head>
				<body>
				<div>
					<img src="images/img_like.jpg">
				</div>
				</body>
				</html>';
		}
	}
}
?>