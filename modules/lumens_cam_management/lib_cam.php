<?php
    include "config.inc";
    include "lumens.php";
    $PRESET_FILE = __DIR__ . '/var/presets';

    function cam_lumens_posnames_get() {
        $presets = cam_lumens_get_presets();
        if($presets)
            return json_decode($presets,true);
        else
            return array();
    }

    function cam_lumens_move($name) {
        global $cam_ip;
        global $cam_port;
    
        $presets = cam_lumens_posnames_get();
        if(!$presets)
            return false;

        $position = array_search($name, $presets);
        if($position === false)
            return false;
        
        $lumens = new Lumens_management($cam_ip,$cam_port);
        $lumens->move($position);
    }

    function cam_lumens_get_presets() {
    global $PRESET_FILE;
    
    if(file_exists($PRESET_FILE)) {
        $string_data = file_get_contents($PRESET_FILE);
        return $string_data;
    }
    return false;
}

?>