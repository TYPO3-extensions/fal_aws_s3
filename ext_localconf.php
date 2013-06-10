<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

// register additional driver
$TYPO3_CONF_VARS['SYS']['fal']['registeredDrivers']['AmazonS3'] = array(
	'class' => 'CORE4\FalAwsS3\Driver\AmazonS3Driver',
	'label' => 'Amazon S3',
	'flexFormDS' => 'FILE:EXT:fal_aws_s3/Configuration/FlexForm/AmazonS3DriverFlexForm.xml'
);