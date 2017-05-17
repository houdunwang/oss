<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'tests\\' => array($baseDir . '/tests'),
    'phpDocumentor\\Reflection\\' => array($vendorDir . '/phpdocumentor/reflection-common/src', $vendorDir . '/phpdocumentor/type-resolver/src', $vendorDir . '/phpdocumentor/reflection-docblock/src'),
    'houdunwang\\oss\\' => array($baseDir . '/src'),
    'houdunwang\\config\\' => array($vendorDir . '/houdunwang/config/src'),
    'Webmozart\\Assert\\' => array($vendorDir . '/webmozart/assert/src'),
    'OSS\\' => array($vendorDir . '/aliyuncs/oss-sdk-php/src/OSS'),
    'Dotenv\\' => array($vendorDir . '/vlucas/phpdotenv/src'),
    'Doctrine\\Instantiator\\' => array($vendorDir . '/doctrine/instantiator/src/Doctrine/Instantiator'),
    'DeepCopy\\' => array($vendorDir . '/myclabs/deep-copy/src/DeepCopy'),
);
