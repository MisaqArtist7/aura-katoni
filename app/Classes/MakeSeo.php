<?php

namespace App\Classes;

//use Artesaos\SEOTools\SEOMeta;
use App\Models\Product;
use App\Traits\Logger;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\Models\Post;
use App\Models\Category;

class MakeSeo
{
    use Logger;
    private $post;
    public function __construct(Post $post, public Product $product,Category $category)
    {
        $this->post = $post;
    }

    public static function indexPage()
    {
        // عنوان سئو: ترکیبی از نام برند و کلمات کلیدی اصلی (کیف و کفش زنانه)
        SEOMeta::setTitle('نلی گالری | خرید آنلاین کیف و کفش زنانه شیک و جدید');

        // توضیحات سئو: ترغیب‌کننده و شامل مزایای رقابتی (ارسال سریع، کیفیت، قیمت)
        SEOMeta::setDescription('نلی گالری؛ مرجع تخصصی خرید جدیدترین مدل‌های کیف و کفش زنانه. مجموعه‌ای بی‌نظیر از کفش‌های مجلسی، اسپرت، صندل و انواع کیف‌های دستی با بهترین کیفیت و قیمت مناسب.');

        // کلمات کلیدی استراتژیک برای حوزه پوشاک زنانه
        SEOMeta::addKeyword([
            'نلی گالری',
            'خرید کیف زنانه',
            'خرید کفش زنانه',
            'کفش مجلسی زنانه',
            'کتونی دخترانه شیک',
            'کیف دستی چرم',
            'صندل لژدار',
            'قیمت کیف و کفش زنانه',
            'فروشگاه آنلاین کیف و کفش',
            'خرید کفش اسپرت زنانه'
        ]);

        // تنظیمات OpenGraph برای نمایش جذاب در شبکه‌های اجتماعی مثل تلگرام و واتس‌اپ
        OpenGraph::setTitle('نلی گالری | دنیای کیف و کفش زنانه خاص و مدرن')
            ->setDescription('جدیدترین کالکشن‌های فصل را در نلی گالری دنبال کنید. ارسال سریع به سراسر کشور و ضمانت کیفیت.')
            ->setUrl(url()->current())
            ->setType('website')
            ->addImage(asset('img/logo.jpg')); // مطمئن شوید لوگو یا بنر فروشگاه در این مسیر باشد

        // تنظیمات Twitter (X) Card
        TwitterCard::setTitle('نلی گالری | خرید اینترنتی کیف و کفش زنانه')
            ->setDescription('شیک‌ترین مدل‌های کیف و کفش سال را با قیمت استثنایی از نلی گالری بخرید.')
            ->setImage(asset('img/logo.png'))
            ->setType('summary_large_image');
    }

    public function blogDetailsPage($postId)
    {
        try {
            $post = $this->post->where('id', $postId)->first();
        }catch (\Exception $e){
            $this->logError('Fail to find post with id ' , [
                'task'=>'blogDetailsPage',
                'postId'=>$postId,
                'message'=>$e->getMessage()
            ]);
            abort(404);
        }

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->description);
        SEOMeta::addKeyword(explode('-', $post->tags));
        OpenGraph::setTitle($post->title)
            ->setDescription($post->description)
            ->setUrl(url()->current())
            ->setType('website')
            ->addImage(asset('img/logo.png'));
        TwitterCard::setTitle($post->title)
            ->setDescription($post->description)
            ->setImage(asset('images/logo.png'))
            ->setType('summary_large_image');
    }


    public function productDetailPage($productId)
    {
        try {
            $post = $this->product->where('id', $productId)->first();
            $imagesString = $product->images ?? '';
            $images = $imagesString ? explode('-', $imagesString) : ['defaults/no-image.png'];
        }catch (\Exception $e){
            $this->logError('Fail to find post with id ' , [
                'task'=>'blogDetailsPage',
                'postId'=>$productId,
                'message'=>$e->getMessage()
            ]);
            abort(404);
        }

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->description);
//        SEOMeta::addKeyword(explode('-', $post->tags));
        OpenGraph::setTitle($post->title)
            ->setDescription($post->description)
            ->setUrl(url()->current())
            ->setType('website')
            ->addImage(asset('storage/'.$images[0]));
        TwitterCard::setTitle($post->title)
            ->setDescription($post->description)
            ->setImage(asset('storage/'.$images[0]))
            ->setType('summary_large_image');
    }

    public function categoryDetailPage($Id)
    {
        try {

            $category = $this->category->findOrFail($Id);

            $imagesString = $category->images ?? '';
            $images = $imagesString ? explode('-', $imagesString)
                : ['defaults/no-image.png'];

        } catch (\Exception $e) {

            $this->logError('Fail to find category', [
                'task'   => 'categoryDetailPage',
                'categoryId' => $Id,
                'message'=> $e->getMessage()
            ]);

            abort(404);
        }

        // ❌ قبلی اشتباه → $post وجود نداشت
        // SEOMeta::setTitle($post->title);

        // ✅ نسخه صحیح
        SEOMeta::setTitle($category->title);
        SEOMeta::setDescription($category->description);

        OpenGraph::setTitle($category->title)
            ->setDescription($category->description)
            ->setUrl(url()->current())
            ->setType('website')
            ->addImage(asset('storage/'.$images[0]));

        TwitterCard::setTitle($category->title)
            ->setDescription($category->description)
            ->setImage(asset('storage/'.$images[0]))
            ->setType('summary_large_image');
    }



}
