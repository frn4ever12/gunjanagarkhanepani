<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'नयाँ धारा जडान सम्बन्धी जानकारी',
                'slug' => 'new-tap-connection',
                'description' => 'नयाँ धारा जडानको लागि आवश्यक कागजात र प्रक्रिया',
                'content' => 'नयाँ धारा जडानको लागि नागरिकता, वार्ता पत्र, फोटो र आवेदन फारम आवश्यक पर्दे। आवेदन दिएको ७ दिन भित्र साइट भ्रमण गरिन्छ।',
                'icon' => 'fa-faucet',
                'external_link' => null,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'धारा स्थानान्तरण',
                'slug' => 'tap-transfer',
                'description' => 'धारा स्थानान्तरणको प्रक्रिया र आवश्यक कागजात',
                'content' => 'धारा स्थानान्तरणको लागि आवेदन फारम, वार्ता पत्र र पुरानो बिल आवश्यक पर्दे। स्थानान्तरण शुल्क रु. ५०० लाग्छ।',
                'icon' => 'fa-exchange-alt',
                'external_link' => null,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'धारा मर्मत / पुनर्स्थापना',
                'slug' => 'tap-repair',
                'description' => 'धारा मर्मत र पुनर्स्थापना सेवा',
                'content' => 'धारा मर्मतको लागि कार्यालयमा फोन वा व्यक्तिगत रूपमा आवेदन दिन सकिन्छ। सामान्य मर्मत २४ घण्टाभित्र पूरा हुन्छ।',
                'icon' => 'fa-tools',
                'external_link' => null,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'पानीको गुणस्तर जानकारी',
                'slug' => 'water-quality',
                'description' => 'पानीको गुणस्तर परीक्षण र मापदण्ड',
                'content' => 'हाम्रो पानी WHO मापदण्ड अनुसार गुणस्तरीय छ। प्रत्येक महिना पानीको गुणस्तर परीक्षण गरिन्छ।',
                'icon' => 'fa-vial',
                'external_link' => null,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'महसुल बुझाउने स्थान',
                'slug' => 'payment-locations',
                'description' => 'महसुल बुझाउन सकिने स्थानहरू',
                'content' => 'महसुल कार्यालयमा नगद, बैंक र डिजिटल भुक्तानी माध्यमबाट बुझाउन सकिन्छ। महिनाको १५ गतेसम्म बिल बुझाउनुहोस्।',
                'icon' => 'fa-money-bill-wave',
                'external_link' => null,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'अन्य सेवाहरू',
                'slug' => 'other-services',
                'description' => 'अन्य खानेपानी सम्बन्धी सेवाहरू',
                'content' => 'विशेष कार्यक्रम, जनचेतना, र सर्वेक्षण सेवाहरू पनि प्रदान गरिन्छ।',
                'icon' => 'fa-concierge-bell',
                'external_link' => null,
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
