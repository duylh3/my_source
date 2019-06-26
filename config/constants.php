<?php

/**
 * debug tools
 */
define ( 'REQUEST_MICROTIME', microtime ( true ) );

/**
 * pagination
 */
define ( 'PAGE_LIST_COUNT', 15 );
define ( 'PAGE_LIST_RANGE', 3 );

define ('LANGUAGES', json_encode(array(
    'vi' => 'Tiếng Việt',
    'en' => 'Tiếng Anh'
)));

define('LANGUAGE_DEFAULT', 'vi');
define('ERROR_REQUEST', json_encode(array(
        'statusCode' => 16,
        'message'    => "Link không hợp lệ",
        'data'       => null
)));
