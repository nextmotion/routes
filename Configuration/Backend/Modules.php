<?php

return [
    'lms_Routes' => [
        'parent' => 'site',
        'access' => 'admin',
        'iconIdentifier' => 'tx-lms-routes',
        'labels' => 'LLL:EXT:routes/Resources/Private/Language/locallang_mod.xlf',
        'extensionName' => 'routes',
        'controllerActions' => [
            LMS\Routes\Controller\ManagementController::class => [
                'index',
                'show',
            ],
        ],
    ],
];
