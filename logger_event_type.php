<?php

// This file is shared between server and recorder and should be kept identical in both projects.

// When adding a new type, add a class member + add it's ID into the $event_type_id array
class EventType {
    // Commons
    const TEST = "test";
    const LOGGER = "logger";
    const ASSET_CREATED = "asset_created";
    
    // Recorder
    const RECORDER_DB               = "recorder_db";
    const UPLOAD_WRONG_METADATA     = "upload_wrong_metadata";
    const CAPTURE_POST_PROCESSING   = "capture_post_processing";
    const UPLOAD_TO_EZCAST          = "upload_to_ezcast";
    const PUSH_STOP                 = "push_stop";
    const REQUEST_TO_MANAGER        = "request_to_manager";
    const FFMPEG_INIT               = "ffmpeg_init";
    const FFMPEG_STOP               = "ffmpeg_stop";
    const MERGE_MOVIES              = "merge_movies";
    const LOG_SYNC                  = "log_sync";
    const RECORDER_PUBLISH          = "recorder_publish";
    
    // EZAdmin
    
    // EZManager
    
    // EZRenderer
    
    // EZPlayer
    
    
    // index by EventType
    public static $event_type_id = array(
       // Commons: 0->999
       EventType::TEST                                       => 0,
       EventType::LOGGER                                     => 1,
       EventType::ASSET_CREATED                              => 2,
        
       // Recorder: 1000->1999
       EventType::RECORDER_DB                                => 1000,
       EventType::UPLOAD_WRONG_METADATA                      => 1001,
       EventType::CAPTURE_POST_PROCESSING                    => 1002,
       EventType::UPLOAD_TO_EZCAST                           => 1003,
       EventType::PUSH_STOP                                  => 1004,
       EventType::REQUEST_TO_MANAGER                         => 1005,
       EventType::FFMPEG_INIT                                => 1006,
       EventType::FFMPEG_STOP                                => 1007,
       EventType::MERGE_MOVIES                               => 1008,
       EventType::LOG_SYNC                                   => 1009,
       
       // EZAdmin: 2000->2999
       
       // EZManager: 3000->3999 
       
       // EZRenderer: 4000->4999
        
       // EZPlayer: 5000->5999
    );
}
