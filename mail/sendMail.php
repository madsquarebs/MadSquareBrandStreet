<?php
$message=$_POST['msg'].' | Name: '.$_POST['name'].' | Mail: '.$_POST['mail'];
$subject= 'Customer Enquiry';
$headers="From: mail.sasikumar92@gmail.com";
$to='sasikumaar@hotmail.com';
$mail=mail($to, $subject, $message, $headers);
if($mail){
	echo "Mail sent to $to successfull.";
}else{
	echo "Sending failed.";
}
?>