<?php
require 'vendor/autoload.php';

$accessKeyId = "VUFGPITAyRwwi296";
$accessKeySecret = "DQDn3RSYzZ8OgZrUUfcRrnPYJgZ43r";
$endpoint = "oss-cn-hangzhou.aliyuncs.com";
$bucket= "houdunren";
$object = "1.mp4";
$content = "Hi, OSS.";
$filePath = '/www/1.mp4';
try {
	$ossClient = new \OSS\OssClient($accessKeyId, $accessKeySecret, $endpoint);
//	$ossClient->putObject($bucket, $object, $content);
	$ossClient->uploadFile($bucket, $object, $filePath);
} catch (OssException $e) {
	print $e->getMessage();
}
