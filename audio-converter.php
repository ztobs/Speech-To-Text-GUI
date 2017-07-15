<?php
//usage: php audio-converter.php john.m4a

require "vendor/autoload.php";



$dir = "uploads/";
$audio_file = $argv[1];
$audio_arr = explode(".", $audio_file);
$name = $audio_arr[0];

//die($dir.$audio_file);

$ffmpeg = FFMpeg\FFMpeg::create(); 
$audio = $ffmpeg->open($dir.$audio_file);

$format = new FFMpeg\Format\Audio\Flac();
$format->on('progress', function ($audio, $format, $percentage) {
    echo "$percentage % transcoded";
});

$format
    ->setAudioChannels(1)
    ->setAudioKiloBitrate(256);

$audio->save($format, $dir.$name.'.flac');
echo "yes";