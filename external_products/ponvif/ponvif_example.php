<?php
	require 'lib/class.ponvif.php';
	$test=new ponvif();
	$test->setUsername('admin');
	$test->setPassword('Hel0.MOM');
	$test->setIPAddress('164.15.250.67:1018');
	try {
		$test->initialize();
		if ($test->isFault($sources=$test->getSources())) die("Error getting sources");
	        $profileToken=$sources[0][0]['profiletoken'];
	        $ptzNodeToken=$sources[0][0]['ptz']['nodetoken'];
		$mediaUri=$test->media_GetStreamUri($profileToken);
		echo $mediaUri."\n";
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
?>