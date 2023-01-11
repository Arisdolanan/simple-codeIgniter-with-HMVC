<?php
/* 
    php spark make:controller App/Modules/Reports/Controllers/ReportControllers
    php spark make:controller App/Modules/Reports/Controllers/ReportControllers --restful
*/

namespace App\Modules\Reports\Controllers;
use App\Controllers\BaseController;

use App\Modules\Reports\Models\ReportModel;

class ReportController extends BaseController
{
    private $reportModel;

    public function __construct()
    {
        $this->reportModel = new ReportModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Reports Page', 
            'view' => '\App\Modules\Reports\Views\ReportView',
            'data' => $this->reportModel->getReport(),
        ];
        return view('admin_template\layout', $data);
    }
}
