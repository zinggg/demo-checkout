<?php

function checkoutRequest() {
	$url = "https://eu-test.oppwa.com/v1/checkouts";
	$data = "entityId=8ac7a4c87fb0f1b6017fb21044a502ca" .
                "&amount=92.00" .
                "&currency=GBP" .
                "&paymentType=DB";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGFjN2E0Yzg3ZmIwZjFiNjAxN2ZiMjBmY2Y0NjAyYzV8eTVxblozaFlmYQ=='));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return ($responseData);
}

