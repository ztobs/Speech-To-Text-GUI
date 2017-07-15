<?php
//usage: php audio-converter.php john.m4a

require "vendor/autoload.php";


var_dump(getenv('PATH'));
var_dump(exec('which ffmpeg'));
var_dump(ini_get('open_basedir'));
var_dump(is_file(exec('which ffmpeg')));
var_dump(is_executable(exec('which ffmpeg')));
die();

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
    ->setAudioChannels(2)
    ->setAudioKiloBitrate(256);

$audio->save($format, $dir.$name.'flac');