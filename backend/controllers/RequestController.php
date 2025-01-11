<?php

namespace backend\controllers;

use yii\rest\ActiveController;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\filters\auth\HttpBasicAuth;

/**
 * Request controller
 */
class RequestController extends ActiveController
{
    public $modelClass = 'backend\models\Request';

    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            [
                'class' => HttpBasicAuth::class,
                'except' => ['create'],
                'auth' => function ($username, $password) {
                    $user = \common\models\User::findOne([
                        'username' => $username,
                    ]);

                    return $user && $user->validatePassword($password) ? $user : null;
                },
            ]
        ];
    }
}
