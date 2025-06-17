<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\Files\UploadedFile;

class Settings extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
        helper(['form', 'url', 'filesystem']);
    }

    public function index(): string
    {
        $settings = $this->settingModel->findAll();
        $data = [
            'title'            => 'Pengaturan Website',
            'about_us'         => '',
            'location_address' => '',
            'opening_hours'    => '',
            'location_map_embed' => '',
            'hero_image'       => '',
            'validation'       => \Config\Services::validation(),
        ];

        foreach ($settings as $setting) {
            if (isset($data[$setting['key']])) {
                $data[$setting['key']] = $setting['value'];
            }
        }

        return view('admin/settings/index', $data);
    }

    public function update()
    {
        $rules = [
            'about_us'           => 'permit_empty|string',
            'location_address'   => 'permit_empty|string|max_length[255]',
            'opening_hours'      => 'permit_empty|string',
            'location_map_embed' => 'permit_empty|string',
            'hero_image_file'    => 'permit_empty|uploaded[hero_image_file]|max_size[hero_image_file,2048]|is_image[hero_image_file]|mime_in[hero_image_file,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dataToUpdate = $this->request->getPost([
            'about_us',
            'location_address',
            'opening_hours',
            'location_map_embed'
        ]);

        /** @var UploadedFile $heroImageFile */
        $heroImageFile = $this->request->getFile('hero_image_file');
        $currentHeroImageSetting = $this->settingModel->where('key', 'hero_image')->first();
        $oldHeroImagePath = $currentHeroImageSetting ? $currentHeroImageSetting['value'] : null;

        if ($heroImageFile && $heroImageFile->isValid() && ! $heroImageFile->hasMoved()) {
            if ($oldHeroImagePath && file_exists(FCPATH . $oldHeroImagePath) && !strpos($oldHeroImagePath, 'placehold.co')) {
                unlink(FCPATH . $oldHeroImagePath);
            }

            $newName = $heroImageFile->getRandomName();
            $uploadPath = 'assets/img/hero';

            if (!is_dir(FCPATH . $uploadPath)) {
                mkdir(FCPATH . $uploadPath, 0777, true);
            }

            $heroImageFile->move(FCPATH . $uploadPath, $newName);
            $dataToUpdate['hero_image'] = $uploadPath . '/' . $newName;
        } else {
            if ($oldHeroImagePath && !$this->request->getPost('hero_image_file')) {
                $dataToUpdate['hero_image'] = $oldHeroImagePath;
            }
        }

        foreach ($dataToUpdate as $key => $value) {
            $setting = $this->settingModel->where('key', $key)->first();
            if ($setting) {
                $this->settingModel->update($setting['id'], ['value' => $value]);
            } else {
                $this->settingModel->insert(['key' => $key, 'value' => $value]);
            }
        }

        return redirect()->to(site_url('admin/settings'))->with('success', 'Pengaturan website berhasil diperbarui!');
    }
}
