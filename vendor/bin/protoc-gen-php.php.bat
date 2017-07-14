@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../stanley-cheung/protobuf-php/protoc-gen-php.php
php "%BIN_TARGET%" %*
