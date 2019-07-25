<?php
return [
    'crudCompany' => [
        'type' => 2,
        'description' => 'CRUD a company',
    ],
    'viewCompany' => [
        'type' => 2,
        'description' => 'View Company',
    ],
    'guest' => [
        'type' => 1,
        'children' => [
            'viewCompany',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'crudCompany',
            'guest',
        ],
    ],
];
