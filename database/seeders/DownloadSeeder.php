<?php

namespace Database\Seeders;

use App\Models\Download;
use App\Models\DownloadCategory;
use Illuminate\Database\Seeder;

class DownloadSeeder extends Seeder
{
    public function run(): void
    {
        // Create download category
        $category = DownloadCategory::firstOrCreate([
            'name' => 'फारमहरू',
            'slug' => 'forms',
            'description' => 'विभिन्न आवेदन फारमहरू',
            'order' => 1,
            'is_active' => true,
        ]);

        $downloads = [
            [
                'category_id' => $category->id,
                'title' => 'नयाँ धारा जडान फारम',
                'description' => 'नयाँ धारा जडानको लागि आवेदन फारम',
                'file' => 'downloads/new-tap-connection.pdf',
                'file_type' => 'pdf',
                'file_size' => 256000,
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'category_id' => $category->id,
                'title' => 'धारा स्थानान्तरण फारम',
                'description' => 'धारा स्थानान्तरणको लागि आवेदन फारम',
                'file' => 'downloads/tap-transfer.pdf',
                'file_type' => 'pdf',
                'file_size' => 245000,
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'category_id' => $category->id,
                'title' => 'धारा मर्मत निवेदन फारम',
                'description' => 'धारा मर्मतको लागि निवेदन फारम',
                'file' => 'downloads/tap-repair.pdf',
                'file_type' => 'pdf',
                'file_size' => 230000,
                'is_featured' => true,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'category_id' => $category->id,
                'title' => 'गुनासो / सुझाव फारम',
                'description' => 'गुनासो वा सुझाव दिने फारम',
                'file' => 'downloads/complaint.pdf',
                'file_type' => 'pdf',
                'file_size' => 220000,
                'is_featured' => true,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'category_id' => $category->id,
                'title' => 'महसुल छुट आवेदन फारम',
                'description' => 'महसुल छुटको लागि आवेदन फारम',
                'file' => 'downloads/tax-exemption.pdf',
                'file_type' => 'pdf',
                'file_size' => 210000,
                'is_featured' => false,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'category_id' => $category->id,
                'title' => 'नाम सारसफेर फारम',
                'description' => 'बिलमा नाम सारसफेरको लागि आवेदन फारम',
                'file' => 'downloads/name-change.pdf',
                'file_type' => 'pdf',
                'file_size' => 200000,
                'is_featured' => false,
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($downloads as $download) {
            Download::create($download);
        }
    }
}
