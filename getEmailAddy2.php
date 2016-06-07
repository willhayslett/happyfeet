<?php
	// define variables and set to empty values
	$email = "";

	function cleanInput($data) {
	  	$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  	$email = filter_var(cleanInput($_POST["emailaddy"]), FILTER_SANITIZE_EMAIL);

	  	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
	  		// Set a 400 (bad request) response code and exit.
            http_response_code(400);
		    echo "Whoops! There appears to be an issue with your email address. Please try again.";
            exit;
		} 

		// Set the from email address.
		$from = "noreply@hayslettweekly.com";
		// Set the recipient email address.
        $recipient = "willsenge@gmail.com";

        // Set the email subject.
        $subject = "$email Subscribed!";

        // Build the email content.
        $email_content = "Hi WillSenge! You've received a new subscription. Here's the email address below:\n\n";
        $email_content .= "Email: $email\n\n";

        // Build the email headers.
        $email_headers = "From: <$from>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set the from email address.
			$from = "noreply@hayslettweekly.com";
			// Set the recipient email address.
	        $recipient2 = $email;

	        // Set the email subject.
	        $subject2 = "Welcome to the Hayslett Weekly";

	        // Build the email content.
	        $email_content2 = '
								<!doctype html>
								<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraph.org/schema/"> 
								<head>
								        
								<meta property="og:title" content="New Content from the Hayslett Weekly!"/>
								<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />        
								    <!-- NAME: 1 COLUMN -->
								    <!--[if gte mso 15]>
								    <xml>
								      <o:OfficeDocumentSettings>
								      <o:AllowPNG/>
								      <o:PixelsPerInch>96</o:PixelsPerInch>
								      </o:OfficeDocumentSettings>
								    </xml>
								    <![endif]-->
								    <meta charset="UTF-8">
								        <meta http-equiv="X-UA-Compatible" content="IE=edge">
								        <meta name="viewport" content="width=device-width, initial-scale=1">
								    <title>New Content from the Hayslett Weekly!</title>
								        
								    <style type="text/css">
								    p{
								      margin:10px 0;
								      padding:0;
								    }
								    table{
								      border-collapse:collapse;
								    }
								    h1,h2,h3,h4,h5,h6{
								      display:block;
								      margin:0;
								      padding:0;
								    }
								    img,a img{
								      border:0;
								      height:auto;
								      outline:none;
								      text-decoration:none;
								    }
								    body,#bodyTable,#bodyCell{
								      height:100%;
								      margin:0;
								      padding:0;
								      width:100%;
								    }
								    #outlook a{
								      padding:0;
								    }
								    img{
								      -ms-interpolation-mode:bicubic;
								    }
								    table{
								      mso-table-lspace:0pt;
								      mso-table-rspace:0pt;
								    }
								    .ReadMsgBody{
								      width:100%;
								    }
								    .ExternalClass{
								      width:100%;
								    }
								    p,a,li,td,blockquote{
								      mso-line-height-rule:exactly;
								    }
								    a[href^=tel],a[href^=sms]{
								      color:inherit;
								      cursor:default;
								      text-decoration:none;
								    }
								    p,a,li,td,body,table,blockquote{
								      -ms-text-size-adjust:100%;
								      -webkit-text-size-adjust:100%;
								    }
								    .ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
								      line-height:100%;
								    }
								    a[x-apple-data-detectors]{
								      color:inherit !important;
								      text-decoration:none !important;
								      font-size:inherit !important;
								      font-family:inherit !important;
								      font-weight:inherit !important;
								      line-height:inherit !important;
								    }
								    #bodyCell{
								      padding:10px;
								    }
								    .templateContainer{
								      max-width:600px !important;
								    }
								    a.mcnButton{
								      display:block;
								    }
								    .mcnImage{
								      vertical-align:bottom;
								    }
								    .mcnTextContent{
								      word-break:break-word;
								    }
								    .mcnTextContent img{
								      height:auto !important;
								    }
								    .mcnDividerBlock{
								      table-layout:fixed !important;
								    }
								    body,#bodyTable{
								      background-color:#FAFAFA;
								    }
								    #bodyCell{
								      border-top:0;
								    }
								    .templateContainer{
								      border:0;
								    }
								    h1{
								      color:#202020;
								      font-family:Helvetica;
								      font-size:26px;
								      font-style:normal;
								      font-weight:bold;
								      line-height:125%;
								      letter-spacing:normal;
								      text-align:left;
								    }
								    h2{
								      color:#202020;
								      font-family:Helvetica;
								      font-size:22px;
								      font-style:normal;
								      font-weight:bold;
								      line-height:125%;
								      letter-spacing:normal;
								      text-align:left;
								    }
								    h3{
								      color:#202020;
								      font-family:Helvetica;
								      font-size:20px;
								      font-style:normal;
								      font-weight:bold;
								      line-height:125%;
								      letter-spacing:normal;
								      text-align:left;
								    }
								    h4{
								      color:#202020;
								      font-family:Helvetica;
								      font-size:18px;
								      font-style:normal;
								      font-weight:bold;
								      line-height:125%;
								      letter-spacing:normal;
								      text-align:left;
								    }
								    #templatePreheader{
								      background-color:#FAFAFA;
								      border-top:0;
								      border-bottom:0;
								      padding-top:9px;
								      padding-bottom:9px;
								    }
								    #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
								      color:#656565;
								      font-family:Helvetica;
								      font-size:12px;
								      line-height:150%;
								      text-align:left;
								    }
								    #templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
								      color:#656565;
								      font-weight:normal;
								      text-decoration:underline;
								    }
								    #templateHeader{
								      background-color:#eeeeee;
								      border-top:0;
								      border-bottom:0;
								      padding-top:9px;
								      padding-bottom:0;
								    }
								    #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
								      color:#202020;
								      font-family:Helvetica;
								      font-size:16px;
								      line-height:150%;
								      text-align:left;
								    }
								    #templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
								      color:#2BAADF;
								      font-weight:normal;
								      text-decoration:underline;
								    }
								    #templateBody{
								      background-color:#FFFFFF;
								      border-top:0;
								      border-bottom:2px solid #EAEAEA;
								      padding-top:0;
								      padding-bottom:9px;
								    }
								    #templateBody .mcnTextContent,#templateBody .mcnTextContent p{
								      color:#202020;
								      font-family:Helvetica;
								      font-size:16px;
								      line-height:150%;
								      text-align:left;
								    }
								    #templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
								      color:#2BAADF;
								      font-weight:normal;
								      text-decoration:underline;
								    }
								    #templateFooter{
								      background-color:#FAFAFA;
								      border-top:0;
								      border-bottom:0;
								      padding-top:9px;
								      padding-bottom:9px;
								    }
								    #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
								      color:#656565;
								      font-family:Helvetica;
								      font-size:12px;
								      line-height:150%;
								      text-align:center;
								    }
								    #templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
								      color:#656565;
								      font-weight:normal;
								      text-decoration:underline;
								    }
								  @media only screen and (min-width:768px){
								    .templateContainer{
								      width:600px !important;
								    }

								} @media only screen and (max-width: 480px){
								    body,table,td,p,a,li,blockquote{
								      -webkit-text-size-adjust:none !important;
								    }

								} @media only screen and (max-width: 480px){
								    body{
								      width:100% !important;
								      min-width:100% !important;
								    }

								} @media only screen and (max-width: 480px){
								    #bodyCell{
								      padding-top:10px !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnImage{
								      width:100% !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
								      max-width:100% !important;
								      width:100% !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnBoxedTextContentContainer{
								      min-width:100% !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnImageGroupContent{
								      padding:9px !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
								      padding-top:9px !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnImageCardTopImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
								      padding-top:18px !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnImageCardBottomImageContent{
								      padding-bottom:9px !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnImageGroupBlockInner{
								      padding-top:0 !important;
								      padding-bottom:0 !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnImageGroupBlockOuter{
								      padding-top:9px !important;
								      padding-bottom:9px !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnTextContent,.mcnBoxedTextContentColumn{
								      padding-right:18px !important;
								      padding-left:18px !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
								      padding-right:18px !important;
								      padding-bottom:0 !important;
								      padding-left:18px !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcpreview-image-uploader{
								      display:none !important;
								      width:100% !important;
								    }

								} @media only screen and (max-width: 480px){
								    h1{
								      font-size:22px !important;
								      line-height:125% !important;
								    }

								} @media only screen and (max-width: 480px){
								    h2{
								      font-size:20px !important;
								      line-height:125% !important;
								    }

								} @media only screen and (max-width: 480px){
								    h3{
								      font-size:18px !important;
								      line-height:125% !important;
								    }

								} @media only screen and (max-width: 480px){
								    h4{
								      font-size:16px !important;
								      line-height:150% !important;
								    }

								} @media only screen and (max-width: 480px){
								    .mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
								      font-size:14px !important;
								      line-height:150% !important;
								    }

								} @media only screen and (max-width: 480px){
								    #templatePreheader{
								      display:block !important;
								    }

								} @media only screen and (max-width: 480px){
								    #templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
								      font-size:14px !important;
								      line-height:150% !important;
								    }

								} @media only screen and (max-width: 480px){
								    #templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
								      font-size:16px !important;
								      line-height:150% !important;
								    }

								} @media only screen and (max-width: 480px){
								    #templateBody .mcnTextContent,#templateBody .mcnTextContent p{
								      font-size:16px !important;
								      line-height:150% !important;
								    }

								} @media only screen and (max-width: 480px){
								    #templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
								      font-size:14px !important;
								      line-height:150% !important;
								    }

								}</style>        

								<script type="text/javascript">
								            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
								            document.write(unescape("%3Cscript src=" + gaJsHost + google-analytics.com/ga.js type="text/javascript %3E%3C/script%3E"));
								            </script>
								            <script type="text/javascript">
								            try {
								                var _gaq = _gaq || [];
								                _gaq.push(["_setAccount", "UA-329148-88"]);
								                _gaq.push(["_setDomainName", ".campaign-archive.com"]);
								                _gaq.push(["_trackPageview"]);
								                _gaq.push(["_setAllowLinker", true]);
								            } catch(err) {console.log(err);}</script>
								                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> <link rel="stylesheet" href="http://us13.campaign-archive2.com/css/archivebar-desktop.css" mc:nocompile> <script type="text/javascript" src="http://us13.campaign-archive2.com/js/archivebar-desktop-plugins.js" mc:nocompile></script> <script src="http://downloads.mailchimp.com/ZeroClipboard.min.js" mc:nocompile></script> <script type="text/javascript">
								            $(document).ready(function() {
								                ZeroClipboard.setDefaults({ moviePath: "//downloads.mailchimp.com/ZeroClipboard.07.13.swf", trustedDomains: ["us13.campaign-archive2.com"]});
								                var clip = new ZeroClipboard( $("#copyURL") );
								                clip.setHandCursor(true);
								                clip.on("complete", function(client, args) {alert("Copied ""+args.text+"" to your clipboard.");});
								                clip.on("mouseover", function (client) { $("#copyURL").addClass("hover"); });
								                clip.on("mouseout", function (client) { $("#copyURL").removeClass("hover"); });

								                $("li.more > a").click(function(){
								                    var toToggle = $($(this).attr("href"));
								                    if(toToggle.is(":visible")){
								                        toToggle.slideUp("fast");
								                        $(this).removeClass("is-active");
								                        if ($("#awesomebar").find(".is-active").length < 1){
								                            $("#awesomebar").removeClass("sub-active");
								                        }
								                    } else {
								                        toToggle.slideDown("fast");
								                        $(this).addClass("is-active");
								                        $("#awesomebar").addClass("sub-active");
								                    }
								                    return false;
								                });

								            });
								</script> 
								<script src="http://us13.campaign-archive2.com/js/mailchimp/fancyzoom.mc.js"></script>  
								<script type="text/javascript">
								    function incrementFacebookLikeCount() {
								        var current = parseInt($("#campaign-fb-like-btn span").html());
								        $("#campaign-fb-like-btn span").fadeOut().html(++current).fadeIn();
								    }

								    function getUrlParams(str) {
								        var vars = {}, hash;
								        if (!str) return vars;
								        var hashes = str.slice(str.indexOf("?") + 1).split("&");
								        for(var i = 0; i < hashes.length; i++) {
								            hash = hashes[i].split("=");
								            vars[hash[0]] = hash[1];
								        }
								        return vars;
								    }
								    
								    function setupSocialSharingStuffs() {
								        var numSocialElems = $("a[rel=socialproxy]").length;
								        var numSocialInitialized = 0;
								        var urlParams = getUrlParams(window.document.location.href);
								        var paramsToCopy = {"e":true, "eo":true};
								        $("a[rel=socialproxy]").each(function() {
								            var href = $(this).attr("href");
								            var newHref = decodeURIComponent(href.match(/socialproxy=(.*)/)[1]);
								            // for facebook insanity to work well, it needs to all be run against just campaign-archive
								            newHref = newHref.replace(/campaign-archive(\d)/gi, "campaign-archive");
								            var newHrefParams = getUrlParams(newHref);
								            for(var param in urlParams) {
								                if ((param in paramsToCopy) && !(param in newHrefParams)) {
								                    newHref += "&" + param + "=" + urlParams[param];
								                }
								            }
								            $(this).attr("href", newHref);
								            if (href.indexOf("facebook-comment") !== -1) {
								                $(this).fancyZoom({"zoom_id": "social-proxy", "width":620, "height":450, "iframe_height": 450});
								            } else {
								                $(this).fancyZoom({"zoom_id": "social-proxy", "width":500, "height":200, "iframe_height": 500});
								            }
								            numSocialInitialized++;
								                    });
								    }
								  if (window.top!=window.self){
								        $(function() {
								          var iframeOffset = $("#archive", window.parent.document).offset();
								          $("a").each(function () {
								              var link = $(this);
								              var href = link.attr("href");
								              if (href && href[0] == "#") {
								                  var name = href.substring(1);
								                  $(this).click(function () {
								                      var nameElement = $("[name="" + name + ""]");
								                      var idElement = $("#" + name);
								                      var element = null;
								                      if (nameElement.length > 0) {
								                          element = nameElement;
								                      } else if (idElement.length > 0) {
								                          element = idElement;
								                      }
								         
								                      if (element) {
								                          var offset = element.offset();
								                          var height = element.height();
								                          //3 is totally arbitrary, but seems to work best.
								                          window.parent.scrollTo(offset.left, (offset.top + iframeOffset.top - (height*3)) );
								                      }
								         
								                      return false;
								                  });
								              }
								          });
								        });
								    }
								</script>  
								<script type="text/javascript">
								            $(document).ready(function() {
								                setupSocialSharingStuffs();
								            });
								</script> 
								</head> 
								        <body style="height: 100%;margin: 0;padding: 0;width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FAFAFA;">
								        <center>
								            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 0;width: 100%;background-color: #FAFAFA;">
								                <tr>
								                    <td align="center" valign="top" id="bodyCell" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 10px;width: 100%;border-top: 0;">
								                        <!-- BEGIN TEMPLATE // -->
								            <!--[if gte mso 9]>
								            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
								            <tr>
								            <td align="center" valign="top" width="600" style="width:600px;">
								            <![endif]-->
								                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;border: 0;max-width: 600px !important;">
								                            <tr>
								                                <td valign="top" id="templatePreheader" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FAFAFA;border-top: 0;border-bottom: 0;padding-top: 9px;padding-bottom: 9px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								    <tbody class="mcnTextBlockOuter">
								        <tr>
								            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                <!--[if mso]>
								        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
								        <tr>
								        <![endif]-->
								          
								        <!--[if mso]>
								        <td valign="top" width="390" style="width:390px;">
								        <![endif]-->
								                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 390px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
								                    <tbody><tr>
								                        
								                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-left: 18px;padding-bottom: 9px;padding-right: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #656565;font-family: Helvetica;font-size: 12px;line-height: 150%;text-align: left;">
								                        
								                            
								                        </td>
								                    </tr>
								                </tbody></table>
								        <!--[if mso]>
								        </td>
								        <![endif]-->
								                
								        <!--[if mso]>
								        <td valign="top" width="210" style="width:210px;">
								        <![endif]-->
								               <!--  <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 210px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
								                    <tbody><tr>
								                        
								                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-left: 18px;padding-bottom: 9px;padding-right: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #656565;font-family: Helvetica;font-size: 12px;line-height: 150%;text-align: left;">
								                        
								                            <a href="http://us13.campaign-archive2.com/?u=dd094a39bbf6bcb8077ef15de&id=4a43ac4644&e=[UNIQID]" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #656565;font-weight: normal;text-decoration: underline;">View this email in your browser</a>
								                        </td>
								                    </tr>
								                </tbody></table> -->
								        <!--[if mso]>
								        </td>
								        <![endif]-->
								                
								        <!--[if mso]>
								        </tr>
								        </table>
								        <![endif]-->
								            </td>
								        </tr>
								    </tbody>
								</table></td>
								                            </tr>
								                            <tr>
								                                <td valign="top" id="templateHeader" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #eeeeee;border-top: 0;border-bottom: 0;padding-top: 9px;padding-bottom: 0;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								    <tbody class="mcnImageBlockOuter">
								            <tr>
								                <td valign="top" style="padding: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnImageBlockInner">
								                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                        <tbody><tr>
								                            <td class="mcnImageContent" valign="top" style="padding-right: 9px;padding-left: 9px;padding-top: 0;padding-bottom: 0;text-align: center;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                
								                                    <a href="http://www.hayslettweekly.com/" title="" class="" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                        <img align="center" alt="" src="https://gallery.mailchimp.com/dd094a39bbf6bcb8077ef15de/images/e3618f18-899b-4a6d-bb75-54543542a6f2.png" width="411" style="max-width: 411px;padding-bottom: 0;display: inline !important;vertical-align: bottom;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" class="mcnImage">
								                                    </a>
								                                
								                            </td>
								                        </tr>
								                    </tbody></table>
								                </td>
								            </tr>
								    </tbody>
								</table></td>
								                            </tr>
								                            <tr>
								                                <td valign="top" id="templateBody" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;border-top: 0;border-bottom: 2px solid #EAEAEA;padding-top: 0;padding-bottom: 9px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								    <tbody class="mcnTextBlockOuter">
								        <tr>
								            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                <!--[if mso]>
								        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
								        <tr>
								        <![endif]-->
								          
								        <!--[if mso]>
								        <td valign="top" width="600" style="width:600px;">
								        <![endif]-->
								                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
								                    <tbody><tr>
								                        
								                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
								                        
								                            <h1 class="mc-toc-title" style="text-align: center;display: block;margin: 0;padding: 0;color: #202020;font-family: Helvetica;font-size: 26px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: normal;"><span style="color:#FF0000"><span style="font-size:27px"><span style="font-family:georgia,times,times new roman,serif">You"re Subscribed!</span></span></span></h1>

								<hr>
								<p style="margin: 10px 0;padding: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">Welcome! The Hayslett Weekly"s got the inside scoop on all the happenings with the Hayslett baby.&nbsp;</p>

								<p style="margin: 10px 0;padding: 0;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #202020;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">We"re super excited to share our journey with you, so we"ll keep you in the loop when we"ve posted new content. Stay tuned!</p>

								                        </td>
								                    </tr>
								                </tbody></table>
								        <!--[if mso]>
								        </td>
								        <![endif]-->
								                
								        <!--[if mso]>
								        </tr>
								        </table>
								        <![endif]-->
								            </td>
								        </tr>
								    </tbody>
								</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								    <tbody class="mcnButtonBlockOuter">
								        <tr>
								            <td style="padding-top: 0;padding-right: 18px;padding-bottom: 18px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" valign="top" align="center" class="mcnButtonBlockInner">
								                <table border="0" cellpadding="0" cellspacing="0" class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 6px;background-color: #2BAADF;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                    <tbody>
								                        <tr>
								                            <td align="center" valign="middle" class="mcnButtonContent" style="font-family: Arial;font-size: 16px;padding: 15px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                <a class="mcnButton " title="Click Here for the Scoop!" href="http://www.hayslettweekly.com/" target="_blank" style="font-weight: bold;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;display: block;">Click Here for the Scoop!</a>
								                            </td>
								                        </tr>
								                    </tbody>
								                </table>
								            </td>
								        </tr>
								    </tbody>
								</table></td>
								                            </tr>
								                            <tr>
								                                <td valign="top" id="templateFooter" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #FAFAFA;border-top: 0;border-bottom: 0;padding-top: 9px;padding-bottom: 9px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								    <tbody class="mcnFollowBlockOuter">
								        <tr>
								            <td align="center" valign="top" style="padding: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowBlockInner">
								                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentContainer" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								    <tbody><tr>
								        <td align="center" style="padding-left: 9px;padding-right: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowContent">
								                <tbody><tr>
								                    <td align="center" valign="top" style="padding-top: 9px;padding-right: 9px;padding-left: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                            <tbody><tr>
								                                <td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                    <!--[if mso]>
								                                    <table align="center" border="0" cellspacing="0" cellpadding="0">
								                                    <tr>
								                                    <![endif]-->
								                                    
								                                        <!--[if mso]>
								                                        <td align="center" valign="top">
								                                        <![endif]-->
								                                        
								                                        
								                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                <tbody><tr>
								                                                    <td valign="top" style="padding-right: 10px;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowContentItemContainer">
								                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                            <tbody><tr>
								                                                                <td align="left" valign="middle" style="padding-top: 5px;padding-right: 10px;padding-bottom: 5px;padding-left: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                                        <tbody><tr>
								                                                                            
								                                                                                <td align="center" valign="middle" width="24" class="mcnFollowIconContent" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                                                    <a href="https://twitter.com/ill_lumination" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-48.png" style="display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" height="24" width="24" class=""></a>
								                                                                                </td>
								                                                                            
								                                                                            
								                                                                        </tr>
								                                                                    </tbody></table>
								                                                                </td>
								                                                            </tr>
								                                                        </tbody></table>
								                                                    </td>
								                                                </tr>
								                                            </tbody></table>
								                                        
								                                        <!--[if mso]>
								                                        </td>
								                                        <![endif]-->
								                                    
								                                        <!--[if mso]>
								                                        <td align="center" valign="top">
								                                        <![endif]-->
								                                        
								                                        
								                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                <tbody><tr>
								                                                    <td valign="top" style="padding-right: 10px;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowContentItemContainer">
								                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                            <tbody><tr>
								                                                                <td align="left" valign="middle" style="padding-top: 5px;padding-right: 10px;padding-bottom: 5px;padding-left: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                                        <tbody><tr>
								                                                                            
								                                                                                <td align="center" valign="middle" width="24" class="mcnFollowIconContent" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                                                    <a href="https://www.facebook.com/theillativemind" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" style="display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" height="24" width="24" class=""></a>
								                                                                                </td>
								                                                                            
								                                                                            
								                                                                        </tr>
								                                                                    </tbody></table>
								                                                                </td>
								                                                            </tr>
								                                                        </tbody></table>
								                                                    </td>
								                                                </tr>
								                                            </tbody></table>
								                                        
								                                        <!--[if mso]>
								                                        </td>
								                                        <![endif]-->
								                                    
								                                        <!--[if mso]>
								                                        <td align="center" valign="top">
								                                        <![endif]-->
								                                        
								                                        
								                                            <table align="left" border="0" cellpadding="0" cellspacing="0" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                <tbody><tr>
								                                                    <td valign="top" style="padding-right: 0;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowContentItemContainer">
								                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                            <tbody><tr>
								                                                                <td align="left" valign="middle" style="padding-top: 5px;padding-right: 10px;padding-bottom: 5px;padding-left: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                                        <tbody><tr>
								                                                                            
								                                                                                <td align="center" valign="middle" width="24" class="mcnFollowIconContent" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                                                                                    <a href="http://thehayslettweekly.com" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-48.png" style="display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" height="24" width="24" class=""></a>
								                                                                                </td>
								                                                                            
								                                                                            
								                                                                        </tr>
								                                                                    </tbody></table>
								                                                                </td>
								                                                            </tr>
								                                                        </tbody></table>
								                                                    </td>
								                                                </tr>
								                                            </tbody></table>
								                                        
								                                        <!--[if mso]>
								                                        </td>
								                                        <![endif]-->
								                                    
								                                    <!--[if mso]>
								                                    </tr>
								                                    </table>
								                                    <![endif]-->
								                                </td>
								                            </tr>
								                        </tbody></table>
								                    </td>
								                </tr>
								            </tbody></table>
								        </td>
								    </tr>
								</tbody></table>

								            </td>
								        </tr>
								    </tbody>
								</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;table-layout: fixed !important;">
								    <tbody class="mcnDividerBlockOuter">
								        <tr>
								            <td class="mcnDividerBlockInner" style="min-width: 100%;padding: 10px 18px 25px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top-width: 2px;border-top-style: solid;border-top-color: #EEEEEE;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                    <tbody><tr>
								                        <td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                            <span></span>
								                        </td>
								                    </tr>
								                </tbody></table>
								<!--            
								                <td class="mcnDividerBlockInner" style="padding: 18px;">
								                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
								-->
								            </td>
								        </tr>
								    </tbody>
								</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								    <tbody class="mcnTextBlockOuter">
								        <tr>
								            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
								                <!--[if mso]>
								        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
								        <tr>
								        <![endif]-->
								          
								        <!--[if mso]>
								        <td valign="top" width="600" style="width:600px;">
								        <![endif]-->
								                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
								                    <tbody><tr>
								                        
								                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #656565;font-family: Helvetica;font-size: 12px;line-height: 150%;text-align: center;">
								                        
								                            <em>Copyright © 2016 AwakeTruth Productions, All rights reserved.</em><br>
								<br>
								<br>
								Want to change how you receive these emails?<br>
								You can <a href="http://hayslettweekly.us13.list-manage.com/profile?u=dd094a39bbf6bcb8077ef15de&id=930f31c295&e=[UNIQID]" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #656565;font-weight: normal;text-decoration: underline;">update your preferences</a> or <a href="http://hayslettweekly.us13.list-manage.com/unsubscribe?u=dd094a39bbf6bcb8077ef15de&id=930f31c295&e=[UNIQID]&c=4a43ac4644" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #656565;font-weight: normal;text-decoration: underline;">unsubscribe from this list</a>
								                        </td>
								                    </tr>
								                </tbody></table>
								        <!--[if mso]>
								        </td>
								        <![endif]-->
								                
								        <!--[if mso]>
								        </tr>
								        </table>
								        <![endif]-->
								            </td>
								        </tr>
								    </tbody>
								</table></td>
								                            </tr>
								                        </table>
								            <!--[if gte mso 9]>
								            </td>
								            </tr>
								            </table>
								            <![endif]-->
								                        <!-- // END TEMPLATE -->
								                    </td>
								                </tr>
								            </table>
								        </center>
								    </body>    </body> </html>'

	        // Build the email headers.
	        $email_headers2 = "From: " $from . "\r\n" ."BCC: willsenge@gmail.com";
			$email_headers2 .= "MIME-Version: 1.0" . "\r\n";
			$email_headers2 .= "Content-type:text/html;charset=utf-8" . "\r\n";

	        if (mail($recipient2, $subject2, $email_content2, $email_headers2)) {
	            // Set a 200 (okay) response code.
	            http_response_code(200);
            	echo "<h3><strong>Success!</strong> You've been subscribed. Look out for an introduction email soon.</h3>";
            } else {
	            // Set a 500 (internal server error) response code.
	            http_response_code(500);
	            echo "<strong>Whoops!</strong> This is embarrasing. Something went wrong on my end.";
	        }
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "<strong>Whoops!</strong> This is embarrasing. Something went wrong on my end.";
        }
	}
?>