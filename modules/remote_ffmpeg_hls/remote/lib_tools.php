<?php

/*
 * EZCAST EZrecorder
 *
 * Copyright (C) 2016 Université libre de Bruxelles
 *
 * Written by Michel Jansens <mjansens@ulb.ac.be>
 * 	      Arnaud Wijns <awijns@ulb.ac.be>
 *            Antoine Dewilde
 * UI Design by Julien Di Pietrantonio
 *
 * This software is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or (at your option) any later version.
 *
 * This software is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this software; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */


/*
 * This library contains usefull tools 
 */

require_once 'config.inc';

// sends an associative array to a server via CURL
function server_request_send($server_url, $post_array) {
    global $remoteffmpeg_basedir;

    $ch = curl_init($server_url);
    curl_setopt($ch, CURLOPT_POST, 1); //activate POST parameters
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_array);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //don't send answer to stdout but in returned string
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_TIMEOUT, 6000); //timeout in seconds
    $res = curl_exec($ch);
    $curlinfo = curl_getinfo($ch);
    curl_close($ch);
    file_put_contents("$remoteffmpeg_basedir/var/curl.log", var_export($curlinfo, true) . PHP_EOL . $res, FILE_APPEND);
    if (!$res) {//error
        if (isset($curlinfo['http_code'])) {
            return "Curl error : " . $curlinfo['http_code'];
        } else
            return "Curl error";
    }
    //All went well send http response in stderr to be logged
    fputs(STDERR, "curl result: $res", 2000);

    return $res;
}


function status_get() {
    global $remoteffmpeg_status_file;

    if (!file_exists($remoteffmpeg_status_file))
        return '';

    return trim(file_get_contents($remoteffmpeg_status_file));
}

function rec_status_get() {
    global $remoteffmpeg_rec_status_file;

    if (!file_exists($remoteffmpeg_rec_status_file))
        return '';

    return trim(file_get_contents($remoteffmpeg_rec_status_file));
}

function rec_status_set($status) {
    global $remoteffmpeg_rec_status_file;

    file_put_contents($remoteffmpeg_rec_status_file, $status);
}

