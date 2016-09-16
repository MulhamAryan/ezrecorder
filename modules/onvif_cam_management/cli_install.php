<?php

require_once 'config_sample.inc';

echo PHP_EOL . "**********************************************" . PHP_EOL;
echo "* Installation of onvif_cam_management module *" . PHP_EOL;
echo "**********************************************" . PHP_EOL;

echo PHP_EOL . "Creating config.inc" . PHP_EOL;

echo "Please, enter now the requested values :" . PHP_EOL;
$value = read_line("Static IP address for onvif Camera [default: '$onvifcam_ip']: ");
if ($value != "")
    $onvifcam_ip = $value; 
unset($value);
$value = read_line("Username for onvif camera [default: '$onvifcam_username']: ");
if ($value != "")
    $onvifcam_username = $value; 
unset($value);
$value = read_line("Password for onvif Camera [default: '$onvifcam_password']: ");
if ($value != "")
    $onvifcam_password = $value; 


$config = file_get_contents("$modules_basedir/onvif_cam_management/config_sample.inc");

$config = preg_replace('/\$onvifcam_ip = (.+);/', '\$onvifcam_ip = "' . $onvifcam_ip . '";', $config);
$config = preg_replace('/\$onvifcam_username = (.+);/', '\$onvifcam_username = "' . $onvifcam_username . '";', $config);
$config = preg_replace('/\$onvifcam_password = (.+);/', '\$onvifcam_password = "' . $onvifcam_password . '";', $config);
file_put_contents("$modules_basedir/onvif_cam_management/config.inc", $config);

system("mv $web_basedir/ptzposdir $web_basedir/ptzposdir_old");
system("cp -rp $modules_basedir/onvif_cam_management/ptzposdir $web_basedir/ptzposdir");

