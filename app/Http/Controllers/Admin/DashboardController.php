<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\News;
use App\Models\Download;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\Official;
use App\Models\Page;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'notices' => Notice::count(),
            'news' => News::count(),
            'downloads' => Download::count(),
            'gallery_images' => GalleryImage::count(),
            'services' => Service::count(),
            'officials' => Official::count(),
            'pages' => Page::count(),
            'messages' => ContactMessage::where('status', 'new')->count(),
        ];

        $recentNotices = Notice::latest()->take(5)->get();
        $recentNews = News::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentNotices', 'recentNews', 'recentMessages'));
    }
}
