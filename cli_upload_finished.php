<?php

/*
 * This is a CLI script that finalizes the recording process 
 * for the enabled modules.
 * Called directly from ezcast sever.
 */

require_once 'global_config.inc';

include_once $cam_lib;
include_once $slide_lib;

Logger::$print_logs = true;

global $service;
$service = true;

$asset = $argv[1];

$logger->log(EventType::RECORDER_UPLOAD_TO_EZCAST, LogLevel::DEBUG, __FILE__ . " called with args: $asset", array("cli_upload_finished"), $asset);

$ok = true;

if ($cam_enabled) {
    $fct = 'capture_' . $cam_module . '_finalize';
    $res_cam = $fct($asset);
    if(!$res_cam) {
        $logger->log(EventType::RECORDER_UPLOAD_TO_EZCAST, LogLevel::ERROR, "Cam finalization for module $cam_module failed", array("cli_upload_finished"), $asset);
        $ok = false;
    }
}

if ($slide_enabled) {
    $fct = 'capture_' . $slide_module . '_finalize';
    $res_slide = $fct($asset);
    if(!$res_slide) {
        $logger->log(EventType::RECORDER_UPLOAD_TO_EZCAST, LogLevel::ERROR, "Slide finalization for module $slide_module failed", array("cli_upload_finished"), $asset);
        $ok = false;
    }
}

if(!$ok)
    exit(1);

exit(0);