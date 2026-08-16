<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $newsItems = [
            [
                'title' => 'गुन्जनगर खानेपानी आयोजनाले नयाँ पानी ट्यांकीको उद्घाटन गर्यो',
                'slug' => 'new-water-tank-inauguration',
                'excerpt' => 'गुन्जनगर खानेपानी आयोजनाले वार्ड नम्बर ५ मा निर्माण गरिएको नयाँ पानी ट्यांकीको उद्घाटन गरेको छ।',
                'content' => 'गुन्जनगर खानेपानी आयोजनाले वार्ड नम्बर ५ मा निर्माण गरिएको नयाँ पानी ट्यांकीको उद्घाटन गरेको छ। यो ट्यांकीबाट लगभग ५०० घरधुरीलाई पानी आपूर्ति हुनेछ। उद्घाटन समारोहमा स्थानीय जनप्रतिनिधि र अधिकारीहरूले सहभागी भए।',
                'publish_date' => Carbon::now()->subDays(2),
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'पानी गुणस्तर परीक्षण रिपोर्ट: सबै मापदण्ड अनुसार',
                'slug' => 'water-quality-test-report',
                'excerpt' => 'यो महिनाको पानी गुणस्तर परीक्षण रिपोर्ट अनुसार सबै मापदण्ड सन्तुष्ट छ।',
                'content' => 'यो महिनाको पानी गुणस्तर परीक्षण रिपोर्ट अनुसार गुन्जनगर खानेपानी आयोजनाबाट आपूर्ति हुने पानी सबै WHO मापदण्ड अनुसार छ। पानीमा कुनै पनी हानिकारक ब्याक्टेरिया वा रसायन पाइएको छैन।',
                'publish_date' => Carbon::now()->subDays(5),
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'महसुल बुझाउने समय विस्तार',
                'slug' => 'payment-deadline-extended',
                'excerpt' => 'दशैन महिनाको महसुल बुझाउने समय दशैन २० गतेसम्म विस्तार गरिएको छ।',
                'content' => 'दशैन महिनाको महसुल बुझाउने समय दशैन २० गतेसम्म विस्तार गरिएको छ। ग्राहकहरूले यो समयभित्र महसुल बुझाउन अनुरोध गरिन्छ।',
                'publish_date' => Carbon::now()->subDays(7),
                'is_featured' => false,
                'is_published' => true,
            ],
            [
                'title' => 'नयाँ धारा जडानको लागि अनलाइन आवेदन प्रणाली सुरु',
                'slug' => 'online-application-system',
                'excerpt' => 'अब नयाँ धारा जडानको लागि अनलाइनबाट पनि आवेदन दिन सकिन्छ।',
                'content' => 'गुन्जनगर खानेपानी आयोजनाले नयाँ धारा जडानको लागि अनलाइन आवेदन प्रणाली सुरु गरेको छ। अब ग्राहकहरूले आफ्नो घरबाट नै अनलाइनबाट आवेदन दिन सक्छन्।',
                'publish_date' => Carbon::now()->subDays(10),
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'पाइपलाइन मर्मत अभियान सम्पन्न',
                'slug' => 'pipeline-repair-campaign',
                'excerpt' => 'वार्ड नम्बर ३ र ४ मा पाइपलाइन मर्मत अभियान सम्पन्न भयो।',
                'content' => 'वार्ड नम्बर ३ र ४ मा पाइपलाइन मर्मत अभियान सम्पन्न भयो। यस अभियानबाट लगभग २ किलोमिटर पाइपलाइन मर्मत गरियो।',
                'publish_date' => Carbon::now()->subDays(12),
                'is_featured' => false,
                'is_published' => true,
            ],
            [
                'title' => 'वार्षिक साधारण सभाको मिति तोकियो',
                'slug' => 'annual-general-meeting-date',
                'excerpt' => 'आगामी पुस १५ गते वार्षिक साधारण सभा हुने भएको छ।',
                'content' => 'आगामी पुस १५ गते वार्षिक साधारण सभा हुने भएको छ। सभामा आयोजनाको वार्षिक प्रगति र आर्थिक विवरण प्रस्तुत गरिनेछ।',
                'publish_date' => Carbon::now()->subDays(15),
                'is_featured' => false,
                'is_published' => true,
            ],
        ];

        foreach ($newsItems as $news) {
            News::create($news);
        }
    }
}
