<?php

namespace backend\controllers;

use yii\rest\ActiveController;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\Cors;

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
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'PUT', 'POST'],
                    'Access-Control-Request-Headers' => ['Content-Type', 'Authorization'],
                ],
            ],
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
