<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add en and jp translations example
        $translations = [
            [
                'key' => 'welcome',
                'en' => 'Welcome',
                'jp' => 'ようこそ',
            ],
            [
                'key' => 'hello',
                'en' => 'Hello',
                'jp' => 'こんにちは',
            ],
            [
                'key' => 'goodbye',
                'en' => 'Goodbye',
                'jp' => 'さようなら',
            ],
            [
                'key' => 'home',
                'en' => 'Home',
                'jp' => 'ホーム',
            ],
            [
                'key' => 'special_offer',
                'en' => 'Special Offer',
                'jp' => 'セール',
            ],
            [
                'key' => 'support',
                'en' => 'Support',
                'jp' => 'サポート',
            ],
            [
                'key' => 'see_more_product',
                'en' => 'See More Product',
                'jp' => 'もっと商品を見る',
            ],
            [
                'key' => 'recomended_product',
                'en' => 'Recomended Product',
                'jp' => 'おすすめ商品',
            ],
            [
                'key' => 'popular_shop',
                'en' => 'Popular & Top Rating Shop',
                'jp' => '人気 & 高評価のショップ',
            ],
            [
                'key' => 'all_products',
                'en' => 'All Products',
                'jp' => 'すべての商品',
            ],
            [
                'key' => 'seemore',
                'en' => 'See More',
                'jp' => 'さらに見る',
            ],
            [
                'key' => 'sortby',
                'en' => 'Sort by',
                'jp' => '並び替え',
            ],
            [
                'key' => 'price_l_h',
                'en' => 'Price : Low to Height',
                'jp' => '価格: 安い順',
            ],
            [
                'key' => 'price_h_l',
                'en' => 'Price : Height to Low',
                'jp' => '価格: 高い順',
            ],
            [
                'key' => 'name_a_z',
                'en' => 'Name : A to Z',
                'jp' => '名前: 昇順',
            ],
            [
                'key' => 'name_z_a',
                'en' => 'Name : Z to A',
                'jp' => '名前: 降順',
            ],
            [
                'key' => 'latest',
                'en' => 'Latest',
                'jp' => '新着順',
            ],
            [
                'key' => 'order_detail',
                'en' => 'Order Detail',
                'jp' => '注文詳細',
            ],
            [
                'key' => 'login',
                'en' => 'Login',
                'jp' => 'ログイン',
            ],
            [
                'key' => 'shipping_address',
                'en' => 'Shipping Address',
                'jp' => '配送先住所',
            ],
            [
                'key' => 'payment',
                'en' => 'Payment',
                'jp' => '支払い',
            ],
            [
                'key' => 'complete',
                'en' => 'Complete',
                'jp' => '完了',
            ],
            [
                'key' => 'Image',
                'en' => 'image',
                'jp' => '画像',
            ],
            [
                'key' => 'product_name',
                'en' => 'Product Name',
                'jp' => '商品名',
            ],
            [
                'key' => 'price',
                'en' => 'Price',
                'jp' => '価格',
            ],
            [
                'key' => 'price_range',
                'en' => 'Price Range',
                'jp' => '価格範囲',
            ],
            
            [
                'key' => 'quanity',
                'en' => 'Quanity',
                'jp' => '数量', 
            ],
            [
                'key' => 'total',
                'en' => 'Total',
                'jp' => '合計',
            ],
            [
                'key' => 'remove',
                'en' => 'Remove',
                'jp' => '削除',
            ],
            [
                'key' => 'next',
                'en' => 'Next',
                'jp' => '次へ',
            ],
            [
                'key' => 'go_back',
                'en' => 'Go Back',
                'jp' => '戻る',
            ],
            [
                'key' => 'name',
                'en' => 'Name',
                'jp' => '名前',
            ],
            [
                'key' => 'phone_number',
                'en' => 'Phone Number',
                'jp' => '電話番号',
            ],
            [
                'key' => 'line_id',
                'en' => 'Line ID',
                'jp' => 'LINE ID',
            ],
            [
                'key' => 'postal',
                'en' => 'Postal Code',
                'jp' => '郵便番号',
            ],
            [
                'key' => 'country',
                'en' => 'Country',
                'jp' => '国',
            ],
            [
                'key' => 'selet_payment',
                'en' => 'Select Payment',
                'jp' => '支払い方法を選択',
            ],
            [
                'key' => 'check_out',
                'en' => 'Check Out',
                'jp' => 'チェックアウト',
            ],
            [
                'key' => 'paymnet_success_msg',
                'en' => 'Your Payment is Successful. We will send the invoice to your mail and Line ID. Please check.',
                'jp' => 'お支払いが完了いたしました。請求書をメールとLINEに送信しますので、ご確認ください。',
            ],
            [
                'key' => 'no_product',
                'en' => 'No Product is selected',
                'jp' => '商品が選択されていません',
            ],
            [
                'key' => 'select',
                'en' => 'Select',
                'jp' => '選択',
            ],
            [
                'key' => 'shop_more',
                'en' => 'Shop More',
                'jp' => 'さらに購入',
            ],
            [
                'key' => 'add_cart',
                'en' => 'Add to Cart',
                'jp' => 'カートに追加',
            ],
            [
                'key' => 'info',
                'en' => 'Info',
                'jp' => '情報',
            ],
            [
                'key' => 'detail',
                'en' => 'Detail',
                'jp' => '詳細',
            ],
            [
                'key' => 'verify_msg',
                'en' => 'Your account has not been verified. Please complete the verification process.',
                'jp' => 'アカウントが確認できません。再度入力ください。',
            ],
            [
                'key' => 'verify',
                'en' => 'Verify Your Account',
                'jp' => 'アカウントを確認する',
            ],
            [
                'key' => 'upload_img',
                'en' => 'Upload Img',
                'jp' => '画像をアップロード',
            ],
            [
                'key' => 'scan_qr',
                'en' => 'Scan Your QR code',
                'jp' => 'QRコードをスキャンする',
            ],
            [
                'key' => 'request',
                'en' => 'Request',
                'jp' => 'リクエスト',
            ],
            [
                'key' => 'cancle',
                'en' => 'Cancel',
                'jp' => 'キャンセル',
            ],
            [
                'key' => 'upload_product',
                'en' => 'Upload Product',
                'jp' => '商品をアップロード',
            ],
            [
                'key' => 'check_order',
                'en' => 'Check Order Status',
                'jp' => '注文状況を確認',
            ],
            [
                'key' => 'organize',
                'en' => 'Organize',
                'jp' => '整理する',
            ],
            [
                'key' => 'add_product', 
                'en' => 'Add Product',
                'jp' => '商品を追加',
            ],
            [
                'key' => 'username',
                'en' => 'User Name',
                'jp' => 'ユーザー名',
            ],
            [
                'key' => 'password',
                'en' => 'Password',
                'jp' => 'パスワード',
            ],
            [
                'key' => 'remember',
                'en' => 'Remember me',
                'jp' => 'ログイン情報を保存',
            ],
            [
                'key' => 'forget_password',
                'en' => 'Forget Password',
                'jp' => 'パスワードを忘れた',
            ],
            [
                'key' => 'no_have_account_msg',
                'en' => 'Do not have an account?',
                'jp' => 'アカウントをお持ちではありませんか？',
            ],
            [
                'key' => 'register',
                'en' => 'Register',
                'jp' => '登録',
            ],
            [
                'key' => 'login_line',
                'en' => 'Login with Line',
                'jp' => 'LINEでログイン',
            ],
            [
                'key' => 'register_msg',
                'en' => 'Register Account & Buy Our Products',
                'jp' => 'アカウント登録して商品を購入',
            ],
            [
                'key' => 'email',
                'en' => 'Email',
                'jp' => 'メールアドレス',
            ],
            [
                'key' => 'confirm_psw',
                'en' => 'Confirm Password',
                'jp' => 'パスワード確認',
            ],
            [
                'key' => 'first_ph',
                'en' => 'First Phone Number',
                'jp' => '第一電話番号',
            ],
            [
                'key' => 'second_ph',
                'en' => 'Second Phone Number',
                'jp' => '第二電話番号',
            ],
            [
                'key' => 'have_account',
                'en' => 'Already have an account',
                'jp' => 'すでにアカウントをお持ちですか？',
            ],
            [
                'key' => 'admin_login',
                'en' => 'Login to account',
                'jp' => 'アカウントにログイン',
            ],
            [
                'key' => 'admin_login_msg',
                'en' => 'Enter your email & password to login',
                'jp' => 'メールアドレスとパスワードを入力してログイン',
            ],
            [
                'key' => 'user_request',
                'en' => 'User Request',
                'jp' => 'ユーザーリクエスト',
            ],
            [
                'key' => 'contact',
                'en' => 'Contact form',
                'jp' => 'お問い合わせフォーム',
            ],
            [
                'key' => 'wishlist',
                'en' => 'Wishlist form',
                'jp' => 'ウィッシュリスト',
            ],
            [
                'key' => 'shop_list',
                'en' => 'Shop List',
                'jp' => 'ショップリスト',
            ],
            [
                'key' => 'shops',
                'en' => 'Shops',
                'jp' => 'ショップ',
            ],
            [
                'key' => 'request_shops',
                'en' => 'Request Shops',
                'jp' => 'ショップリクエスト',
            ],
            [
                'key' => 'faqs',
                'en' => 'FAQs',
                'jp' => 'よくある質問',
            ],
            [
                'key' => 'all_faqs',
                'en' => 'All FAQs',
                'jp' => 'すべてのFAQ',
            ],
            [
                'key' => 'add_faq',
                'en' => 'Add FAQ',
                'jp' => 'FAQを追加',
            ],
            [
                'key' => 'system_data',
                'en' => 'System Data',
                'jp' => 'システムデータ',
            ],
            [
                'key' => 'all_system_data',
                'en' => 'All System Data',
                'jp' => 'すべてのシステムデータ',
            ],
            [
                'key' => 'description',
                'en' => 'Description',
                'jp' => '説明',
            ],
            [
                'key' => 'status',
                'en' => 'Status',
                'jp' => 'ステータス',
            ],
            [
                'key' => 'action',
                'en' => 'Action',
                'jp' => '操作',
            ],
            [
                'key' => 'shop_name',
                'en' => 'Shop Name',
                'jp' => 'ショップ名',
            ],
            [
                'key' => 'question',
                'en' => 'Question',
                'jp' => '質問',
            ],
            [
                'key' => 'answer',
                'en' => 'Answer',
                'jp' => '回答',
            ],
            [
                'key' => 'policy',
                'en' => 'Policy',
                'jp' => 'ポリシー',
            ],
            [
                'key' => 'category',
                'en' => 'Category',
                'jp' => 'カテゴリー',
            ],
            [
                'key' => 'all_category',
                'en' => 'All Category',
                'jp' => 'すべてのカテゴリー',
            ],
            [
                'key' => 'add_category',
                'en' => 'Add Category',
                'jp' => 'カテゴリーを追加',
            ],
            [
                'key' => 'sub_category',
                'en' => 'Sub Category',
                'jp' => 'サブカテゴリー',
            ],
            [
                'key' => 'all_sub_category',
                'en' => 'All Sub Category',
                'jp' => 'すべてのサブカテゴリー',
            ],
            [
                'key' => 'add_sub_category',
                'en' => 'Add Sub Category',
                'jp' => 'サブカテゴリーを追加',
            ],
            [
                'key' => 'send_link',
                'en' => 'Send Reset a Link',
                'jp' => 'リセットリンクを送信',
            ],
            [
                'key' => 'back_to_login',
                'en' => 'Back to Login',
                'jp' => 'ログインに戻る',
            ],
        ];
        foreach($translations as $translation) {
            \App\Models\Translations::create($translation);
        }
    }
}
