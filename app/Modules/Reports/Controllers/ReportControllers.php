<?php

namespace App\Modules\Reports\Controllers;

use App\Controllers\BaseController;
use App\Modules\Reports\Models\ReportModel;

class ReportControllers extends BaseController
{
    private $reportModel;

    public function __construct()
    {
        $this->reportModel = new ReportModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Report Page',
            'view' => 'App\Modules\Reports\Views\ReportView',
            'data' => $this->reportModel->getReport(),
        ];

        return view('App\Views\admin_template\layout', $data);
    }
}
