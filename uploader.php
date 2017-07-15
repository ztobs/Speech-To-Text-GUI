<?php
include "storage.php";

$target_dir = "uploads/";

// Empty directory before starting
foreach (glob($target_dir."/*.*") as $filename) {
    if (is_file($filename)) {
        unlink($filename);
    }
}
//rmdir($dir);

$target_file = $target_dir . basename($_FILES["kartik-input-700"]["name"][0]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["kartik-input-700"]["tmp_name"][0]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["kartik-input-700"]["size"][0] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "flac" && $imageFileType != "wav" && $imageFileType != "mp3"
&& $imageFileType != "m4a" ) {
    echo "Sorry, only flac, wav, mp3 & m4a files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["kartik-input-700"]["tmp_name"][0], $target_file)) {
        
  

        /*$return = array('initialPreviewConfig'=>
                            array(
                                'caption' => $_FILES["kartik-input-700"]["name"][0],
                                'url' => 'deleter.php'
                                )
                        );
        echo json_encode($return);*/
        if(uploadAudioCloud($_FILES["kartik-input-700"]["name"][0]) == "yes")
        {
            $return = array('initialPreviewConfig'=>
                            array(
                                'caption' => $_FILES["kartik-input-700"]["name"][0],
                                'url' => 'deleter.php'
                                )
                        );
            //echo json_encode($return);
            echo exec  ('php speech.php transcribe gs://proverbial-cathode-5780/'.$_FILES["kartik-input-700"]["name"][0].' --encoding FLAC --async');
        }

        

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>