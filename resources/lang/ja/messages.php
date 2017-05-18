<?php

return [
    // 例外メッセージ
    'exceptions' => [
        '400'              => 'Bad Request',
        '401'              => 'Unauthorized',
        '403'              => 'Forbidden',
        '404'              => 'Not Found',
        '408'              => 'Request Timeout',
        '414'              => 'URI Too Long',
        '500'              => 'Internal Server Error',
        '503'              => 'Service Unavailable',
    ],

    // 通常 メッセージ

    // 成功 メッセージ
    'success.created'      => ':name を登録しました。',
    'success.updated'      => ':name を更新しました。',
    'success.deleted'      => ':name を削除しました。',
    'success.uploaded'     => ':name をアップロードしました。(:count件)',

    // 警告 メッセージ
    'warning.already'      => ':name は既に登録済みです。',

    // エラー メッセージ

];
