@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../stanley-cheung/protobuf-php/protoc-gen-php.bat
call "%BIN_TARGET%" %*
