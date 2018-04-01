<?php

use yii\db\Migration;

/**
 * Class m180401_062525_update_rbac
 */
class m180401_062525_update_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $updatePost = $auth->getPermission('updatePost');
        $author = $auth->getRole('author');
// add the rule
        $rule = new \app\rbac\AuthorRule;
        $auth->add($rule);

// add the "updateOwnPost" permission and associate the rule with it.
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);

// "updateOwnPost" will be used from "updatePost"
        $auth->addChild($updateOwnPost, $updatePost);

// allow "author" to update their own posts
        $auth->addChild($author, $updateOwnPost);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180401_062525_update_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180401_062525_update_rbac cannot be reverted.\n";

        return false;
    }
    */
}
