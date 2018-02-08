<?php

require (__DIR__.'/../models/User.php');
require (__DIR__.'/../models/Dictionary.php');

$params = [
    'SiteName' => 'English learning',

    'pageSize' => 25,

    'date_format' => 'Y-m-d',
    'datetime_format' => 'Y-m-d H:i:s',

    'userStatus' => [
        \app\models\User::STATUS_ACTIVE => 'active',
        \app\models\User::STATUS_BLOCKED => 'blocked',
    ],

    'wordTypes' => [
        \app\models\Dictionary::TYPE_NOUN => 'noun',
        \app\models\Dictionary::TYPE_VERB => 'verb',
        \app\models\Dictionary::TYPE_ADJECTIVE => 'adjective',
        \app\models\Dictionary::TYPE_ADVERB => 'adverb',
    ],

];


return $params;