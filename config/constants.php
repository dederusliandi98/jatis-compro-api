<?php

return [
    'HTTP' => [
        'CODE' => [
            'SUCCESS' => 200,
            'FAILED' => 400,
            'UNAUTHORIZE' => 401,
            'UNPROCESS' => 422,
            'SERVER_FAILED' => 500,
            'NOT_FOUND' => 404,
        ]
    ],
    'STATUS_ITEM' => [
        'CODE' => [
            'ACTIVE' => 1,
            'INACTIVE' => 0,
            'YES' => 1, 
            'NO' => 0,
            'TEXT' => [
                'ACTIVE' => 'Aktif',
                'INACTIVE' => 'Non Aktif',
                'YES' => 'Ya',
                'NO' => 'Tidak'
            ]
        ]
    ],
    'STATUS' => [
        'CODE' => [
            'SUCCESS' => 1,
            'FAILED' => 2,
            'VALIDATION' => 3,
            'NOT_ACTIVE' => 4,
            'EXPIRED' => 5,
            'NOT_FOUND' => 6,
            'UNAUTHORIZE' => 7,
            'NOT_PERMISSION' => 8,
            'NOT_MATCH' => 9,
            'INCOMPLETED' => 10,
            'VERSION_NOT' => 11,
            'VERSION_SAME' => 12,
        ]
    ],
    'FORM_STATUS' => [
        'DRAFT' => 0,
        'SAVED' => 1,
        'BULK' => 2,
    ],
    'PAGINATION' => 10,
    'CACHE_TIME_REDIS' => 3600, //SECOND,
];
