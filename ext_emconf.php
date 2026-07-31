<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'CE FlippingBooks',
    'description' => 'TYPO3 content element for the integration of documents created with the FlippingBook Publisher (https://flippingbook.com/digital-publishing-software)',
    'category' => 'frontend',
    'state' => 'stable',
    'author' => 'Oliver Thiele',
    'author_email' => 'mail@oliver-thiele.de',
    'author_company' => 'Web Development Oliver Thiele',
    'version' => '3.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '14.3.0-14.99.99',
            'php' => '8.4.0-8.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'OliverThiele\\OtFlippingbook\\' => 'Classes',
        ],
    ],
];
