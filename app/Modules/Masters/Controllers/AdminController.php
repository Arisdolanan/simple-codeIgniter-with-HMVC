<?php
/* 
    php spark make:controller App/Modules/Master/Controllers/AdminControllers
    php spark make:controller App/Modules/Master/Controllers/AdminControllers --restful
*/

namespace App\Modules\Masters\Controllers;
use App\Controllers\BaseController;

use App\Modules\Masters\Models\AdminModel;

class AdminController extends BaseController
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Page', 
            'view' => '\App\Modules\Masters\Views\AdminView',
            'data' => $this->adminModel->getAdmins(),
        ];
        return view('admin_template\layout', $data);
    }
}
