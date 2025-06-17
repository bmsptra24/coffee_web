<?php // app/Models/MenuModel.php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price', 'image', 'is_featured'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get all featured menus.
     *
     * @return array
     */
    public function getFeaturedMenus()
    {
        return $this->where('is_featured', 1)->findAll();
    }
}
