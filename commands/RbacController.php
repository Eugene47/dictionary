<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        $manageRules = $auth->createPermission('manageRules');
        $manageRules->description = 'Manage rules';
        $auth->add($manageRules);

        $manageDictionary = $auth->createPermission('manageDictionary');
        $manageDictionary->description = 'Manage dictionary';
        $auth->add($manageDictionary);

        $manageCategory = $auth->createPermission('manageCategory');
        $manageCategory->description = 'Manage category';
        $auth->add($manageCategory);

        $manageUser = $auth->createPermission('manageUser');
        $manageUser->description = 'Manage user';
        $auth->add($manageUser);

        $subscriber = $auth->createRole('subscriber');
        $auth->add($subscriber);

        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $manageDictionary);

        $editor = $auth->createRole('editor');
        $auth->add($editor);
        $auth->addChild($editor, $author);
        $auth->addChild($editor, $manageCategory);
        $auth->addChild($editor, $manageRules);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $editor);
        $auth->addChild($admin, $manageUser);
    }
}
