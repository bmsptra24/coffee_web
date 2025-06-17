<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToReviews extends Migration
{
    public function up()
    {
        $this->forge->addColumn('reviews', [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'approved'],
                'default'    => 'approved',
                'after'      => 'content',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('reviews', 'status');
    }
}
