<?php

$EM_CONF['routes'] = [
    'title' => 'Extbase Yaml Routes',
    'description' => 'Provides an ability to bind a route slug to the certain Extbase Action endpoint.',
    'category' => 'fe',
    'author' => 'Borulko Serhii',
    'author_email' => 'borulkosergey@icloud.com',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '4.0.0',
    'constraints' => [
        'depends' => [
            'php' => '8.2.0-8.4.99',
            'typo3' => '13.4.0-13.4.99',
        ],
    ],
];
