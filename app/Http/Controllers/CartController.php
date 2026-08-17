<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(public ProductRepositoryInterface $productRepository){}

    public function index(Request $request)
    {
        $categories = Category::all();
        return view('cart', compact('categories'));
    }
    public function addToCart(Request $request, $id)
    {
        // 1. پیدا کردن محصول
        $product = $this->productRepository->getProductById($id);
        if (!$product) {
            return redirect()->back()->with('error', 'محصول یافت نشد.');
        }

        // 2. پیدا کردن واریانت انتخاب شده (رنگ و سایز)
        $variantId = $request->input('variant_id');
        $variant = $product->variants()->find($variantId);

        if (!$variant) {
            return redirect()->back()->with('error', 'لطفاً ابتدا تنوع محصول (رنگ و سایز) را انتخاب کنید.');
        }

        $cart = session()->get('cart', []);

        // 3. ایجاد یک کلید منحصر به فرد (ترکیب آیدی محصول و واریانت)
        // این کار باعث می‌شود کاربر بتواند از یک محصول، دو رنگ مختلف بخرد
        $cartKey = $id . '-' . $variantId;

        if (isset($cart[$cartKey])) {
            return redirect()->back()->with('error', 'این ترکیب از محصول قبلاً در سبد خرید شما موجود است.');
        }

        $quantity = (int) $request->input('quantity', 1);

        // 4. ذخیره اطلاعات دقیق واریانت در سشن
        $cart[$cartKey] = [
            'id' => $product->id,
            'variant_id' => $variant->id,
            'name' => $product->name,
            'quantity' => $quantity,
            'price' => $variant->price, // قیمت مخصوص این واریانت
            'discount_price' => $variant->discount_price, // تخفیف مخصوص این واریانت
            'size' => $variant->size,
            'color' => $variant->color, // نام یا کد رنگ
            'image' => $product->images, // یا تصویر مخصوص واریانت اگر دارید
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'محصول با موفقیت به سبد خرید افزوده شد.');
    }

    public function removeFromCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'محصول با موفقیت از سبد خرید حذف شد.');
        }

        return redirect()->back()->with('error', 'محصول مورد نظر در سبد خرید یافت نشد.');
    }



}
