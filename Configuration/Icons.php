<?php

use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;

return [
    ...[
        'tx-lms-routes' => [
            'provider' => BitmapIconProvider::class,
            'source' => 'EXT:routes/Resources/Public/Icons/Extension.svg',
        ],
    ],
];
