<?php
set_time_limit(0);
include "storage.php";


$filename = $_POST['filename'];
$filename_part = explode(".", $filename)[0];

// Converting audio to flac using ffmpeg binary
$cmd = "php audio-converter.php audio.".explode(".", $filename)[1];
exec($cmd, $out1);
        
        
        if(strpos($out1[0], "yes") !== FALSE) // checking if conversion is successfull
        {
        	if(uploadAudioCloud("audio.flac") == "yes")  // uploading to cloud
	        {
	            $cmd = 'php speech.php transcribe gs://proverbial-cathode-5780/audio.flac --encoding FLAC --async';
	            exec($cmd, $out2);
	            $statement = "";
	            foreach ($out2 as $outputed) {
	                if(strpos($outputed, "[transcript]") !== FALSE)
	                {
	                    $statement .= trim(str_replace("[transcript] => ", "", $outputed))."<br>";
	                }
	            }
	            echo $statement;
	        }
        }
        