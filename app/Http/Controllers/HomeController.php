<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\News;
use App\Models\Service;
use App\Models\Official;
use App\Models\Statistic;
use App\Models\Download;
use App\Models\GalleryImage;
use App\Models\ImportantLink;
use App\Models\FAQ;
use App\Models\Tariff;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tickerNotices = Notice::ticker()->limit(5)->get();
        $homepageOfficials = Official::homepage()->limit(3)->get();
        $statistics = Statistic::visible()->orderBy('order')->get();
        $services = Service::active()->orderBy('order')->limit(6)->get();
        $latestNotices = Notice::published()->orderBy('priority', 'desc')->orderBy('publish_date', 'desc')->limit(4)->get();
        $latestNews = News::published()->orderBy('publish_date', 'desc')->limit(3)->get();
        $tariffs = Tariff::active()->orderBy('order')->limit(6)->get();
        $downloads = Download::active()->featured()->orderBy('order')->limit(6)->get();
        $galleryImages = GalleryImage::with('album')->featured()->orderBy('order')->limit(6)->get();
        $importantLinks = ImportantLink::active()->orderBy('order')->limit(6)->get();
        $faqs = FAQ::published()->orderBy('order')->limit(6)->get();
        $sliders = Slider::active()->orderBy('order')->get();
        $heroSliders = Slider::active()->where('featured', true)->orderBy('order')->get();

        return view('home', compact(
            'tickerNotices',
            'homepageOfficials',
            'statistics',
            'services',
            'latestNotices',
            'latestNews',
            'tariffs',
            'downloads',
            'galleryImages',
            'importantLinks',
            'faqs',
            'sliders',
            'heroSliders'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $notices = Notice::published()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();
            
        $news = News::published()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get();
            
        $services = Service::active()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();
            
        $downloads = Download::active()
            ->where('title', 'like', "%{$query}%")
            ->get();
            
        $faqs = FAQ::published()
            ->where('question', 'like', "%{$query}%")
            ->orWhere('answer', 'like', "%{$query}%")
            ->get();

        return view('search', compact('query', 'notices', 'news', 'services', 'downloads', 'faqs'));
    }

    public function showNews($slug)
    {
        $news = News::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $latestNews = News::published()->where('id', '!=', $news->id)->orderBy('publish_date', 'desc')->limit(5)->get();
        return view('news.show', compact('news', 'latestNews'));
    }

    public function showNotice($id)
    {
        $notice = Notice::findOrFail($id);
        return view('notices.show', compact('notice'));
    }

    public function showService($id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('pages.show', compact('page'));
    }

    public function indexNotices()
    {
        $notices = Notice::published()->orderBy('priority', 'desc')->orderBy('publish_date', 'desc')->paginate(10);
        return view('notices.index', compact('notices'));
    }

    public function indexServices()
    {
        $services = Service::active()->orderBy('order')->paginate(12);
        return view('services.index', compact('services'));
    }

    // About Routes
    public function about()
    {
        $page = Page::where('slug', 'about')->where('is_published', true)->first();
        return view('pages.about', compact('page'));
    }

    public function boardOfDirectors()
    {
        $officials = Official::active()->orderBy('order')->get();
        return view('pages.board-of-directors', compact('officials'));
    }

    public function organizationalStructure()
    {
        $page = Page::where('slug', 'organizational-structure')->where('is_published', true)->first();
        return view('pages.organizational-structure', compact('page'));
    }

    public function staff()
    {
        $staff = Official::active()->where('show_on_homepage', false)->orderBy('order')->get();
        return view('pages.staff', compact('staff'));
    }

    public function officeHours()
    {
        return view('pages.office-hours');
    }

    public function citizenCharter()
    {
        return view('pages.citizen-charter');
    }

    // Services Sub-routes
    public function servicesNewConnection()
    {
        return view('pages.services.new-connection');
    }

    public function servicesTransfer()
    {
        return view('pages.services.transfer');
    }

    public function servicesMaintenance()
    {
        return view('pages.services.maintenance');
    }

    public function servicesWaterQuality()
    {
        return view('pages.services.water-quality');
    }

    public function servicesInformation()
    {
        return view('pages.services.information');
    }

    // E-Services
    public function eServicesForms()
    {
        $downloads = Download::active()->orderBy('order')->get();
        return view('pages.e-services.forms', compact('downloads'));
    }

    public function complaint()
    {
        return view('pages.complaint');
    }

    // Resources
    public function downloads()
    {
        $downloads = Download::active()->orderBy('order')->paginate(12);
        return view('pages.downloads', compact('downloads'));
    }

    public function forms()
    {
        $downloads = Download::active()->where('category', 'forms')->orderBy('order')->get();
        return view('pages.forms', compact('downloads'));
    }

    public function annualReports()
    {
        return view('pages.annual-reports');
    }

    public function rulesRegulations()
    {
        return view('pages.rules-regulations');
    }

    public function policies()
    {
        return view('pages.policies');
    }

    public function publications()
    {
        return view('pages.publications');
    }

    // Notices
    public function indexNews()
    {
        $news = News::published()->orderBy('publish_date', 'desc')->paginate(12);
        return view('news.index', compact('news'));
    }

    public function pressReleases()
    {
        $news = News::published()->where('is_press_release', true)->orderBy('publish_date', 'desc')->paginate(12);
        return view('news.press-releases', compact('news'));
    }

    public function publicNotices()
    {
        $notices = Notice::published()->where('is_public', true)->orderBy('publish_date', 'desc')->paginate(12);
        return view('notices.public-notices', compact('notices'));
    }

    public function noticeArchive()
    {
        $notices = Notice::published()->orderBy('publish_date', 'desc')->paginate(20);
        return view('notices.archive', compact('notices'));
    }

    // Vacancy
    public function vacancy()
    {
        $notices = Notice::published()->where('category', 'vacancy')->orderBy('publish_date', 'desc')->get();
        return view('pages.vacancy', compact('notices'));
    }

    public function vacancyNotices()
    {
        $notices = Notice::published()->where('category', 'vacancy')->orderBy('publish_date', 'desc')->paginate(12);
        return view('pages.vacancy-notices', compact('notices'));
    }

    public function vacancyExamSchedule()
    {
        return view('pages.vacancy-exam-schedule');
    }

    public function vacancyResults()
    {
        return view('pages.vacancy-results');
    }

    // Contact
    public function contact()
    {
        return view('contact');
    }

    // Additional Routes
    public function faq()
    {
        $faqs = FAQ::published()->orderBy('order')->get();
        return view('pages.faq', compact('faqs'));
    }

    public function gallery()
    {
        $galleryImages = GalleryImage::with('album')->orderBy('order')->paginate(20);
        return view('pages.gallery', compact('galleryImages'));
    }

    public function videos()
    {
        return view('pages.videos');
    }

    public function importantLinks()
    {
        $links = ImportantLink::active()->orderBy('order')->get();
        return view('pages.important-links', compact('links'));
    }

    public function sitemap()
    {
        return view('pages.sitemap');
    }
}
