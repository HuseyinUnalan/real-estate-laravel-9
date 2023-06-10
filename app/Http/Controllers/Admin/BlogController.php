<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class BlogController extends Controller
{

    //Blog Category

    public function AllBlogCategory()
    {
        $blogcategory = BlogCategory::latest()->get();
        return view('admin.blog.all_blog_category', compact('blogcategory'));
    }

    public function AddBlogCategory()
    {
        return view('admin.blog.add_blog_category');
    }

    public function StoreBlogCategory(Request $request)
    {

        BlogCategory::insert([
            'blog_category' => $request->blog_category,

        ]);

        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function EditBlogCategory($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);
        return view('admin.blog.edit_blog_category', compact('blogcategory'));
    }

    public function UpdateBlogCategory(Request $request, $id)
    {

        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,

        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id)
    {

        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    //Blog 

    public function AllBlog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.all_blog', compact('blogs'));
    }

    public function AddBlog()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.add_blog', compact('categories'));
    }

    public function StoreBlog(Request $request)
    {
        $image = $request->file('photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(870, 450)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;

        $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ', '?');
        $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '-', '');

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'title' => $request->title,
            'slug' => strtolower(str_replace($search,$replace, $request->title)),
            'description' => $request->description,
            'author' => $request->author,
            'desk' => $request->desk,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    }


    public function EditBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.edit_blog', compact('blogs', 'categories'));
    }


    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('photo')) {
            unlink($old_img);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(870, 450)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;

            $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ', '?');
            $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '-', '');

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'slug' => strtolower(str_replace($search,$replace, $request->title)),
                'description' => $request->description,
                'author' => $request->author,
                'desk' => $request->desk,
                'photo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Blog Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ', '?');
            $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '-', '');

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'slug' => strtolower(str_replace($search,$replace, $request->title)),
                'description' => $request->description,
                'author' => $request->author,
                'desk' => $request->desk,
            ]);

            $notification = array(
                'message' => 'Blog Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function DeleteBlog($id)
    {
        $blogs = Blog::findorFail($id);
        $img = $blogs->photo;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    
    public function BlogInactive($id)
    {
        Blog::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Blog Inactive Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function BlogActive($id)
    {
        Blog::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Blog Active Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
