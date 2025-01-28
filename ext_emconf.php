<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'CE FlippingBooks',
    'description' => 'TYPOP3 content element for the integration of documents created with the FlippingBook Publisher (https://flippingbook.com/digital-publishing-software)',
    'category' => 'frontend',
    'state' => 'stable',
    'author' => 'Oliver Thiele',
    'author_email' => 'mail@oliver-thiele.de',
    'author_company' => 'Web Development Oliver Thiele',
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
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
