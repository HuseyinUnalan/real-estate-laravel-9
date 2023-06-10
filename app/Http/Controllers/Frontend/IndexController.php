<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Client;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\HouseMessages;
use App\Models\HousePhoto;
use App\Models\Houses;
use App\Models\Message;
use App\Models\Services;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Subscribers;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class IndexController extends Controller
{


    //Home Page
    public function index()
    {
        $slideractive = Slider::where('status', 1)->limit(1)->orderBy('desk', 'ASC')->get();
        $sliders = Slider::where('status', 1)->whereBetween('desk', [1, 1000])->orderBy('desk', 'ASC')->get();
        $abouts = About::find(1);
        $services = Services::where('status', 1)->limit(4)->orderBy('desk', 'ASC')->get();
        $blogs = Blog::where('status', 1)->limit(3)->orderBy('desk', 'ASC')->get();
        $clients = Client::where('status', 1)->orderBy('desk', 'ASC')->get();
        $teams = Team::where('status', 1)->limit(4)->orderBy('desk', 'ASC')->get();
        $settings = Setting::find(1);
        $testimonialactive = Testimonial::where('status', 1)->limit(1)->orderBy('desk', 'ASC')->get();
        $testimonials = Testimonial::where('status', 1)->whereBetween('desk', [1, 1000])->orderBy('desk', 'ASC')->get();
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        $houses = Houses::where('activity_status', 1)->orderBy('desk', 'ASC')->get();
        $housephotos = HousePhoto::whereIn('house_id', $houses->pluck('id'))->get();
        return view('frontend.index', compact('sliders', 'abouts', 'services', 'houses', 'housephotos', 'blogs', 'clients', 'teams', 'settings', 'slideractive', 'testimonials', 'testimonialactive', 'socials'));
    }

    //About Page
    public function HomeAbout()
    {
        $abouts = About::find(1);
        $clients = Client::where('status', 1)->orderBy('desk', 'ASC')->get();
        $services = Services::where('status', 1)->limit(4)->orderBy('desk', 'ASC')->get();
        $teams = Team::where('status', 1)->orderBy('desk', 'ASC')->get();
        $settings = Setting::find(1);
        $testimonialactive = Testimonial::where('status', 1)->limit(1)->orderBy('desk', 'ASC')->get();
        $testimonials = Testimonial::where('status', 1)->whereBetween('desk', [1, 1000])->orderBy('desk', 'ASC')->get();
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.about_page', compact('abouts', 'services', 'clients', 'teams', 'settings', 'testimonials', 'testimonialactive', 'socials'));
    }

    //Blog Page
    public function BlogDetails($slug)
    {
        $blogs = Blog::where('slug', $slug)->firstOrFail();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.blog_details', compact('blogs', 'settings', 'socials', 'abouts'));
    }

    // All House
    public function AllHouse()
    {
        $houses = Houses::where('activity_status', 1)->orderBy('desk', 'ASC')->Paginate(3);
        $housephotos = HousePhoto::whereIn('house_id', $houses->pluck('id'))->get();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        return view('frontend.all_house', compact('houses', 'housephotos', 'settings', 'abouts'));
    }

    // House Detail Page
    public function HouseDetails($slug)
    {
        $allhouses = Houses::where('activity_status', 1)->orderBy('desk', 'ASC')->get();
        $house = Houses::where('slug', $slug)->firstOrFail();
        $housephotos = HousePhoto::whereIn('house_id', $house->pluck('id'))->get();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.house_detail', compact('house', 'settings', 'socials', 'housephotos', 'allhouses', 'abouts'));
    }

    public function CategoryBlog($id)
    {
        $blogposts = Blog::where('blog_category_id', $id)->where('status', 1)->orderBy('desk', 'ASC')->get();
        $categoryname = BlogCategory::findOrFail($id);
        $clients = Client::where('status', 1)->orderBy('desk', 'ASC')->get();
        $allcategorys = BlogCategory::latest()->get();
        $lastblogs = Blog::where('status', 1)->limit(3)->orderBy('id', 'DESC')->get();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.category_blog', compact('blogposts', 'categoryname', 'clients', 'settings', 'allcategorys', 'lastblogs', 'socials', 'abouts'));
    }


    public function BlogPage()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $allblogs = Blog::where('status', 1)->orderBy('desk', 'ASC')->Paginate(3);
        $lastblogs = Blog::where('status', 1)->limit(3)->orderBy('id', 'DESC')->get();
        $clients = Client::where('status', 1)->orderBy('desk', 'ASC')->get();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.all_blog', compact('allblogs', 'categories', 'clients', 'settings', 'lastblogs', 'socials', 'abouts'));
    }

    //Client Section
    public function Client()
    {
        $clients = Client::where('status', 1)->orderBy('desk', 'ASC')->get();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.body.client_section', compact('clients', 'settings', 'socials', 'abouts'));
    }

    //Service Page
    public function ServicePage()
    {
        $allservices = Services::where('status', 1)->orderBy('desk', 'ASC')->get();
        $clients = Client::where('status', 1)->orderBy('desk', 'ASC')->get();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.all_services', compact('allservices', 'clients', 'settings', 'socials', 'abouts'));
    }

    //Service Details Page
    public function ServiceDetails($id)
    {
        $services = Services::findOrFail($id);
        $allservices = Services::where('status', 1)->orderBy('desk', 'ASC')->get();
        $clients = Client::where('status', 1)->orderBy('desk', 'ASC')->get();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.service_details', compact('services', 'clients', 'settings', 'allservices', 'socials', 'abouts'));
    }

    //Contact Page
    public function ContactPage()
    {
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.contact_page', compact('settings', 'socials', 'abouts'));
    }

    //Contact Page Ask Question Area
    public function StoreMesseage(Request $request)
    {
        Message::insert([

            'name' => $request->name,
            'phone' => $request->phone,
            'mail' => $request->mail,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),

        ]);
        return redirect()->route('home.contact')->with('success', 'Mesaj Başarıyla Gönderildi.');
    }

    //Contact Page Ask Question Area
    public function StoreSubscriber(Request $request)
    {
        Subscribers::insert([

            'email' => $request->email,
            'created_at' => Carbon::now(),

        ]);
        return redirect()->back()->with('success', 'Abone Olundu.');
    }



    public function GalleryPage()
    {
        $gallerys = Gallery::where('status', 1)->orderBy('desk', 'ASC')->get();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.gallery_page', compact('settings', 'socials', 'gallerys', 'abouts'));
    }


    public function FaqPage()
    {
        $allfaqs = Faq::where('status', 1)->orderBy('desk', 'ASC')->get();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.faq_page', compact('settings', 'socials', 'allfaqs', 'abouts'));
    }

    public function StoreHouseMesseage(Request $request)
    {

        HouseMessages::insert([

            'house' => $request->house,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),

        ]);

        return redirect()->back()->with('success', 'Mesajınız Başarı İle Alındı.');
    }

    public function SearchHouse(Request $request)
    {
        $item = $request->serachkeyword;
        $houses = Houses::where('title', 'LIKE', "%$item%")->get();
        $housephotos = HousePhoto::whereIn('house_id', $houses->pluck('id'))->get();
        $abouts = About::find(1);
        $settings = Setting::find(1);
        $socials = Social::where('status', 1)->orderBy('desk', 'ASC')->get();
        return view('frontend.search_house', compact('abouts', 'settings', 'socials', 'houses', 'housephotos', 'item'));
    }
}
