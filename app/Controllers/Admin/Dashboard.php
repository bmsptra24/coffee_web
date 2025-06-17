<?php // app/Controllers/Admin/Dashboard.php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactModel;
use App\Models\ReviewModel;
use App\Models\MenuModel;
use App\Models\PromoModel;

class Dashboard extends BaseController
{
    protected $contactModel;
    protected $reviewModel;
    protected $menuModel;
    protected $promoModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
        $this->reviewModel = new ReviewModel();
        $this->menuModel = new MenuModel();
        $this->promoModel = new PromoModel();
    }

    public function index()
    {
        $data = [
            'title'              => 'Dashboard Admin',
            'total_contacts'     => $this->contactModel->countAllResults(),
            'total_pending_reviews' => $this->reviewModel->where('is_approved', 0)->countAllResults(),
            'total_menus'        => $this->menuModel->countAllResults(),
            'total_promos'       => $this->promoModel->countAllResults(),
        ];
        echo view('admin/dashboard/index', $data);
    }
}
