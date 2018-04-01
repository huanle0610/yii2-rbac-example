<?php
namespace models;

use app\models\User;
use Yii;

class RbacTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testAuthorRule()
    {
        $post = new \stdClass;
        $post->createdBy = 101;


        expect_that($user = User::findIdentity(100));
        Yii::$app->user->login($user);
        $auth = Yii::$app->authManager;
        $updatePost = $auth->getPermission('updatePost');
        expect('get permission', $updatePost->name)->equals('updatePost');
        expect_that(Yii::$app->user->can('createPost'));
        expect_that(Yii::$app->user->can('updatePost'));
        expect_that(Yii::$app->user->can('updatePost', ['post' => $post]));

        expect_that($user = User::findIdentity(101));
        Yii::$app->user->login($user);
        expect_that(Yii::$app->user->can('createPost'));
        expect_not(Yii::$app->user->can('updatePost'));
        expect_that(Yii::$app->user->can('updatePost', ['post' => $post]));
    }
}