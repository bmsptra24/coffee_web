<?php // app/Models/PromoModel.php

namespace App\Models;

use CodeIgniter\Model;

class PromoModel extends Model
{
    protected $table = 'promos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'image'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
