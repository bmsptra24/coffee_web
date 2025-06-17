<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\MenuModel;
use App\Models\PromoModel;
use App\Models\ReviewModel;
use App\Models\SettingModel;

class Home extends BaseController
{
    protected $contactModel;
    protected $menuModel;
    protected $promoModel;
    protected $reviewModel;
    protected $settingModel;

    public function __construct()
    {
        $this->contactModel = new ContactModel();
        $this->menuModel    = new MenuModel();
        $this->promoModel   = new PromoModel();
        $this->reviewModel  = new ReviewModel();
        $this->settingModel = new SettingModel();
    }

    public function index(): string
    {
        $settings = $this->settingModel->findAll();
        $websiteSettings = [];
        foreach ($settings as $setting) {
            $websiteSettings[$setting['key']] = $setting['value'];
        }

        $data = [
            'title'            => 'Beranda',
            'menus'            => $this->menuModel->where('is_featured', 1)->findAll(),
            'promos'           => $this->promoModel->findAll(),
            'reviews'          => $this->reviewModel->where('status', 'approved')->findAll(),

            'about_us'         => $websiteSettings['about_us'] ?? 'Kafe Kopi Mantap adalah tempat yang sempurna untuk menikmati kopi berkualitas tinggi dalam suasana yang nyaman dan ramah. Kami berkomitmen untuk menyajikan minuman dan makanan terbaik yang dibuat dengan penuh passion.',
            'location_address' => $websiteSettings['location_address'] ?? 'Jl. Kenangan No. 10, Kota Bahagia, 12345',
            'opening_hours'    => $websiteSettings['opening_hours'] ?? 'Senin - Jumat: 08:00 - 22:00<br>Sabtu - Minggu: 09:00 - 23:00',
            'location_map_embed' => $websiteSettings['location_map_embed'] ?? '<div class="flex items-center justify-center h-full text-gray-500">Peta lokasi kafe akan ditampilkan di sini.</div>',
            'hero_image'       => $websiteSettings['hero_image'] ?? 'https://placehold.co/1600x900/8B4513/F5F5DC?text=Default+Hero+Image',
        ];

        return view('home/index', $data);
    }

    public function contact()
    {
        helper(['form', 'url']);

        $rules = [
            'name'    => 'required|min_length[3]|max_length[255]',
            'email'   => 'required|valid_email|max_length[255]',
            'message' => 'required|min_length[10]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
        ];

        $this->contactModel->insert($data);

        return redirect()->to(site_url('/#contact'))->with('success', 'Pesan Anda telah berhasil dikirim!');
    }
}
