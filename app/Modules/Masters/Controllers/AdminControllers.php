<?php

/**
 * php spark make:controller App/Modules/Masters/Controllers/AdminControllers
 * php spark make:controller App/Modules/Masters/Controllers/AdminControllers --restful
 */

namespace App\Modules\Masters\Controllers;

use App\Controllers\BaseController;
use App\Modules\Masters\Models\AdminModel;

class AdminControllers extends BaseController
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
            'view' => 'App\Modules\Masters\Views\AdminView',
            'data' => $this->adminModel->getAdmins(),
        ];

        return view('App\Views\admin_template\layout', $data);
    }
}
