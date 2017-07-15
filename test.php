<?php
include "storage.php";


echo exec  ('php speech.php transcribe gs://proverbial-cathode-5780/audio.flac --encoding FLAC --async');