<?php // app/Controllers/Admin/Settings.php
// FILE INI SUDAH DIUPDATE UNTUK MENGELOLA PENGATURAN WEBSITE (ABOUT US, LOKASI, JAM BUKA, GAMBAR HERO).

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use CodeIgniter\Files\File; // Pastikan ini di-import
use CodeIgniter\HTTP\Files\UploadedFile; // Pastikan ini di-import

class Settings extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
        helper(['form', 'url', 'filesystem']); // Tambahkan helper filesystem
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
            'hero_image'       => '', // Default kosong
            'validation'       => \Config\Services::validation(), // Untuk menampilkan error validasi
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
            // Aturan untuk upload gambar hero, permit_empty karena opsional
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

        // Penanganan gambar hero
        /** @var UploadedFile $heroImageFile */
        $heroImageFile = $this->request->getFile('hero_image_file');
        $currentHeroImageSetting = $this->settingModel->where('key', 'hero_image')->first();
        $oldHeroImagePath = $currentHeroImageSetting ? $currentHeroImageSetting['value'] : null;

        if ($heroImageFile && $heroImageFile->isValid() && ! $heroImageFile->hasMoved()) {
            // Hapus gambar lama jika ada dan bukan gambar default
            if ($oldHeroImagePath && file_exists(FCPATH . $oldHeroImagePath) && !strpos($oldHeroImagePath, 'placehold.co')) {
                unlink(FCPATH . $oldHeroImagePath);
            }

            $newName = $heroImageFile->getRandomName();
            $uploadPath = 'assets/img/hero'; // Direktori unggah untuk gambar hero

            // Pastikan direktori ada
            if (!is_dir(FCPATH . $uploadPath)) {
                mkdir(FCPATH . $uploadPath, 0777, true);
            }

            $heroImageFile->move(FCPATH . $uploadPath, $newName);
            $dataToUpdate['hero_image'] = $uploadPath . '/' . $newName;
        } else {
            // Jika tidak ada upload gambar baru, tapi ada gambar lama, tetap gunakan yang lama
            // Atau jika ingin hapus gambar tanpa upload baru, tambahkan logika checkbox di view
            if ($oldHeroImagePath && !$this->request->getPost('hero_image_file')) {
                $dataToUpdate['hero_image'] = $oldHeroImagePath;
            }
            // Jika ada keinginan untuk menghapus gambar tanpa mengganti, Anda perlu menambahkan checkbox di form dan logika di sini
            // Misalnya: if ($this->request->getPost('remove_hero_image') && $oldHeroImagePath) { unlink(FCPATH . $oldHeroImagePath); $dataToUpdate['hero_image'] = ''; }
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
