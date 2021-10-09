<?php

	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])) {

		$name = $_POST['name'];
		$from = $_POST['email'];
		$subject = $_POST['subject'];
		$cmessage = $_POST['message'];

		$to = "baldacchino.arnaud@gmail.com";

		$headers = "From: $from";
		$headers = "From: " . $from . "\r\n";
		$headers .= "Reply-To: ". $from . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$logo = 'https://arnaudbaldacchino.com/img/logo_arnaudbaldacchino.png';
		$link = 'https://arnaudbaldacchino.com/';

		$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
		$body .= "<table style='width: 100%;'>";
		$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
		$body .= "<a href='{$link}'><img src='{$logo}' alt='Logo of Arnaud Baldacchino'></a><br><br>";
		$body .= "</td></tr></thead><tbody><tr>";
		$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
		$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
		$body .= "</tr>";
		$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
		$body .= "<tr><td></td></tr>";
		$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
		$body .= "</tbody></table>";
		$body .= "</body></html>";

		$send = mail($to, $subject, $body, $headers);
		
	} else {
		header('HTTP/1.1 500 Internal Server Error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
	}