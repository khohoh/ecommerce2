<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        $trending_products = Product::where('trending', '1')->take(15)->get();
        $popular_categories = Category::where('popular', '1')->take(15)->get();
        return view('user.userhome', compact('trending_products', 'popular_categories'));
    }

    public function category()
    {
        $categories = Category::paginate(4);
        return view('user.category', compact('categories'));
    }

    public function viewCategory($slug)
    {
        if (Category::where('slug', $slug)) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->where('status', 0)->paginate(4);
            return view('user.products.index', compact('category', 'products'));
        }
        else {
            return redirect('/category')->with('success', 'The Slug Does Not exist');
        }
    }

    public function viewProduct($category_slug, $product_slug)
    {
        if (Category::where('slug', $category_slug)) {
            if (Product::where('slug', $product_slug)) {
                $selected_product = Product::where('slug', $product_slug)->first();
                return view('user.products.view_product', compact('selected_product'));
            }
            else {
                return redirect('/category')->with('success', 'No Product Found');
            }
        }
        else {
            return redirect('/category')->with('success', 'No Category Found');
        }
    }
}
