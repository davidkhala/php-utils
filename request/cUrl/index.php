<?php
$curl = curl_init();

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://webtest1.bluecross.com.hk/medservice/api/getinsuredinfo",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "{\n\t\"MedicalGroup\": \"MEDCC\",\n\t\"UserID\": \"webservice\",\n\t\"Password\": \"C8C180CA\",\n\t\"MemberKey\": \"" . $member_key . "\"\n}",
	CURLOPT_HTTPHEADER => array(
		"Content-Type: application/json",
		"Postman-Token: 9e9c2cba-739a-4d09-8be8-ee6c6420dc34,cbd80ef3-6010-4dc5-9d1a-d45e22838c26",
		"cache-control: no-cache",
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
