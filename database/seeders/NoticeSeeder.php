<?php

namespace Database\Seeders;

use App\Models\Notice;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NoticeSeeder extends Seeder
{
    public function run(): void
    {
        $notices = [
            [
                'title' => 'असार महिनाको पानीको महसुल अब असार १५ गतेसम्म बुझाउन सकिनेछ।',
                'description' => 'सबै ग्राहकहरूलाई सूचना गरिन्छ कि असार महिनाको पानीको महसुल असार १५ गतेसम्म बुझाउन सकिनेछ।',
                'publish_date' => Carbon::now()->subDays(5),
                'expiry_date' => Carbon::now()->addDays(10),
                'priority' => 5,
                'is_pinned' => true,
                'show_in_ticker' => true,
                'is_published' => true,
            ],
            [
                'title' => 'नयाँ धारा जडानको लागि आवश्यक फारम उपलब्ध छ।',
                'description' => 'नयाँ धारा जडान गर्न चाहने ग्राहकहरूले कार्यालयबाट आवेदन फारम प्राप्त गर्न सक्नुहुन्छ।',
                'publish_date' => Carbon::now()->subDays(3),
                'expiry_date' => Carbon::now()->addDays(30),
                'priority' => 3,
                'is_pinned' => false,
                'show_in_ticker' => true,
                'is_published' => true,
            ],
            [
                'title' => 'योजना क्षेत्रभित्र पानी आपूर्ति सम्बन्धी महत्वपूर्ण सूचना।',
                'description' => 'पाइपलाइन मर्मतको कारणले गर्दा केही क्षेत्रमा अस्थायी रूपमा पानी आपूर्ति प्रभावित हुन सक्छ।',
                'publish_date' => Carbon::now()->subDays(1),
                'expiry_date' => Carbon::now()->addDays(7),
                'priority' => 4,
                'is_pinned' => true,
                'show_in_ticker' => true,
                'is_published' => true,
            ],
            [
                'title' => 'महसुल बुझाउने समय विस्तार गरिएको सूचना।',
                'description' => 'दशैन महिनाको महसुल बुझाउने समय दशैन २० गतेसम्म विस्तार गरिएको छ।',
                'publish_date' => Carbon::now()->subDays(10),
                'expiry_date' => Carbon::now()->subDays(5),
                'priority' => 2,
                'is_pinned' => false,
                'show_in_ticker' => false,
                'is_published' => true,
            ],
            [
                'title' => 'वार्षिक साधारण सभा आह्वान।',
                'description' => 'आगामी पुस १५ गते वार्षिक साधारण सभा हुने भएकोले सबै ग्राहकहरूलाई उपस्थिति हुन अनुरोध गरिन्छ।',
                'publish_date' => Carbon::now()->subDays(15),
                'expiry_date' => Carbon::now()->addDays(45),
                'priority' => 3,
                'is_pinned' => false,
                'show_in_ticker' => true,
                'is_published' => true,
            ],
            [
                'title' => 'पानी गुणस्तर परीक्षण रिपोर्ट प्रकाशित।',
                'description' => 'यो महिनाको पानी गुणस्तर परीक्षण रिपोर्ट प्रकाशित भएको छ।',
                'publish_date' => Carbon::now()->subDays(7),
                'expiry_date' => Carbon::now()->addDays(60),
                'priority' => 2,
                'is_pinned' => false,
                'show_in_ticker' => false,
                'is_published' => true,
            ],
            [
                'title' => 'नयाँ पानी ट्यांकी निर्माण सम्पन्न।',
                'description' => 'वार्ड नम्बर ५ मा नयाँ पानी ट्यांकीको निर्माण कार्य सम्पन्न भएको छ।',
                'publish_date' => Carbon::now()->subDays(20),
                'expiry_date' => Carbon::now()->addDays(90),
                'priority' => 2,
                'is_pinned' => false,
                'show_in_ticker' => false,
                'is_published' => true,
            ],
            [
                'title' => 'कार्यालय समय परिवर्तन सूचना।',
                'description' => 'शीत ऋतु हुँदा कार्यालय समय सकाळ १० बजेदेखि साँझ ४ बजेसम्म हुनेछ।',
                'publish_date' => Carbon::now()->subDays(25),
                'expiry_date' => Carbon::now()->addDays(120),
                'priority' => 1,
                'is_pinned' => false,
                'show_in_ticker' => false,
                'is_published' => true,
            ],
        ];

        foreach ($notices as $notice) {
            Notice::create($notice);
        }
    }
}
