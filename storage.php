<?php
require_once "vendor/autoload.php";
include_once "config.php";

use Google\Cloud\Storage\StorageClient;


$storage = new StorageClient([
    'projectId' => PROJECTID
]);

$bucket = $storage->bucket(BUCKET);


//$adapter = new GoogleStorageAdapter($storageClient, $bucket);

//$filesystem = new Filesystem($adapter);

function uploadAudioCloud($audio_file)
{
	global $bucket;
	$bucket->upload(
	    fopen('uploads/'.$audio_file, 'r')
	);
	return "yes";
}

/*function deleteAudioCloud($audio_file)
{
	global $bucket;
	$bucket->deleteFile($audio_file);
}*/



