<?php // app/Models/SettingModel.php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['key', 'value'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get a setting value by its key.
     *
     * @param string $key
     * @return string|null
     */
    public function getSetting(string $key)
    {
        $setting = $this->where('key', $key)->first();
        return $setting ? $setting['value'] : null;
    }

    /**
     * Update or create a setting.
     *
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function updateSetting(string $key, string $value)
    {
        $setting = $this->where('key', $key)->first();
        if ($setting) {
            return $this->update($setting['id'], ['value' => $value]);
        } else {
            return $this->insert(['key' => $key, 'value' => $value]);
        }
    }
}
