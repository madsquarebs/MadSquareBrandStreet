<?php
// Uploads
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$uploadFlag = 0;
$uploadStatusMsg = 0;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// Check if file already exists
if (file_exists($target_file)) {
    $uploadStatusMsg = "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    $uploadStatusMsg = "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "txt") {
    $uploadErr = "Sorry, only PDF, DOCX, TXT, JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $uploadStatusMsg = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	$uploadFlag = 1;
        $uploadStatusMsg = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $uploadStatusMsg = "Sorry, there was an error uploading your file.";
    }
}
// Mail
$message='Name: '.$_POST['name'].' | Mail: '.$_POST['mail'].' | Description: '.$_POST['msg'].' | Mobile: '.$_POST['mobile'].' | Address: '.$_POST['addr'].' | Roll: '.$_POST['roll'].' | Link: '.$_POST['link'].' | Attachment Status: '.$uploadFlag.' | Upload Stauts: '.$uploadStatusMsg;
$subject= 'Career Form Submission';
$headers="From: mail.sasikumar92@gmail.com";
$to='sasikumaar@hotmail.com';
$mail=mail($to, $subject, $message, $headers);
if($mail){
	echo "Mail sent to $to successfull.";
}else{
	echo "Sending failed.";
}
?>