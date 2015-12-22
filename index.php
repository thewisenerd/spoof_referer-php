<?php

	/* author: Vineeth Raj <contact.twn@openmailbox.org>
	 * written to 'exploit' imdb website's poster api
	 * 'exploit': workaround hotlinking blocking by spoofing referer url
	 * options:
	 *     ?url=<base64_encode(url_to_get)>
	 *     ?referer=<base64_encode(url_to_spoof_as_referer)>
	 *     ?content=image/text/json/<valid content type>
	 *     ?type=png/jpeg/html/plain/<valid content encoding>
	 */

	$def_url = "http://www.google.com/intl/mt_ALL/images/logo.gif";
	$def_referer = "https://www.google.co.in/";
	$def_content = "image";
	$def_type = "gif";


	if ($_GET["url"] != '') {
		$def_url = base64_decode($_GET["url"]);
	}
	if ($_GET["referer"] != '') {
		$def_referer = base64_decode($_GET["referer"]);
	}
	if ($_GET["content"] != '') {
		$def_referer = $_GET["content"];
	}
	if ($_GET["type"] != '') {
		$def_type = $_GET["type"];
	}

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $def_url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_REFERER, $def_referer);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
	$return = curl_exec($ch);
	curl_close($ch);

	header('Content-Type: ' . $def_content . '/' . $def_type);
	echo $return;

?>
