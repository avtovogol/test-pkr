<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // добавляем разрешение "CRUDCompany"
        $crudCompany = $auth->createPermission('crudCompany');
        $crudCompany->description = 'CRUD a company';
        $auth->add($crudCompany);

        // добавляем разрешение "viewCompany"
        $viewCompany = $auth->createPermission('viewCompany');
        $viewCompany->description = 'View Company';
        $auth->add($viewCompany);

        // добавляем роль "guest" и даём роли разрешение "viewCompany"
        $guest = $auth->createRole('guest');
        $auth->add($guest);
        $auth->addChild($guest, $viewCompany);

        // добавляем роль "admin" и даём роли разрешение "crudCompany"
        // а также все разрешения роли "guest"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $crudCompany);
        $auth->addChild($admin, $guest);

        // Назначение ролей пользователям. 101 и 100 это IDs возвращаемые IdentityInterface::getId()
        // обычно реализуемый в модели User.
        $auth->assign($guest, 101);
        $auth->assign($admin, 100);
    }
}