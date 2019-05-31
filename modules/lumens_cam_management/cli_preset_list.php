<?php

require(__DIR__ . '/lib_cam.php');

//Logger::$print_logs = true;
$presets = cam_lumens_get_presets();
var_dump(json_decode($presets));
