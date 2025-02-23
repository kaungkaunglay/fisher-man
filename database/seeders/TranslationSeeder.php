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
                'key' => 'product_management',
                'en' => 'Product Management',
                'jp' => '商品管理',
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
                'key' => 'manage_faqs',
                'en' => 'Manage FAQs',
                'jp' => 'FAQの管理',
            ],
            [
                'key' => 'rejected_shops',
                'en' => 'Rejected Shops',
                'jp' => '拒否されたショップ',
            ],
            [
                'key' => 'all_products',
                'en' => 'All Products',
                'jp' => 'すべての商品',
            ],
            [
                'key' => 'top_products',
                'en' => 'Top Products',
                'jp' => 'トップ製品',
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
                'key' => 'name',
                'en' => 'Name',
                'jp' => '名前',
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
                'key' => 'order',
                'en' => 'Order',
                'jp' => '注文',
            ],
            [
                'key' => 'order_list',
                'en' => 'Order List',
                'jp' => '注文リスト',
            ],
            [
                'key' => 'login',
                'en' => 'Login',
                'jp' => 'ログイン',
            ],
            [
                'key' => 'logout',
                'en' => 'Logout',
                'jp' => 'ログアウト',
            ],
            [
                'key' => 'search_products',
                'en' => 'Search your Products',
                'jp' => '製品を検索',
            ],
            [
                'key' => 'showing_10_entries',
                'en' => 'Showing 10 entries',
                'jp' => '10件を表示',
            ],
            [
                'key' => 'quantity',
                'en' => 'Quantity',
                'jp' => '数量',
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
                'key' => 'check_mark',
                'en' => 'Please choose Payment',
                'jp' => 'お支払い方法を選択してください',
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
                'jp' => '価格範囲を設定',
            ],
            [
                'key' => 'weight',
                'en' => 'Weight',
                'jp' => '重量',
            ],
            [
                'key' => 'length',
                'en' => 'Length',
                'jp' => '長さ',
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
                'key' => 'phone_number',
                'en' => 'Phone Number',
                'jp' => '電話番号',
            ],
            [
                'key' => 'ecommerce',
                'en' => 'Ecommerce',
                'jp' => '電子商取引',
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
                'key' => 'product',
                'en' => 'Product',
                'jp' => '製品',
            ],
            [
                'key' => 'profile',
                'en' => 'Profile',
                'jp' => 'プロフィール',
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
                'key' => 'added_to_cart',
                'en' => 'Added to Cart',
                'jp' => 'カートに追加されました',
            ],
            [
                'key' => 'offer', 
                'en' => 'Offer', 
                'jp' => 'オファー',
            ],
            [
                'key' => 'cart',
                'en' => 'Cart',
                'jp' => 'カート',
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
                'key' => 'credit_card',
                'en' => 'Credit Card',
                'jp' => 'クレジットカード',
            ],
            [
                'key' => 'day_of_caught',
                'en' => 'Day of Caught',
                'jp' => '捕獲日',
            ],
            [
                'key' => 'uploaded_date',
                'en' => 'Uploaded Date',
                'jp' => 'アップロード日',
            ],
            [
                'key' => 'sale',
                'en' => 'Sale',
                'jp' => 'セール',
            ],
            [
                'key' => 'expire_date',
                'en' => 'Expire Date',
                'jp' => '有効期限',
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
                'key' => 'payment_method_used_card_last_no',
                'en' => 'Payment method & used card last no.',
                'jp' => '支払い方法と使用されたカードの最後の番号',
            ],
            [
                'key' => 'searched_products',
                'en' => 'Searched Products',
                'jp' => '検索された商品',
            ],
            [
                'key' => 'history',
                'en' => 'History',
                'jp' => '履歴',
            ],
            
            [
                'key' => 'select_location',
                'en' => 'Select Your Location',
                'jp' => 'あなたの場所を選択してください',
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
                'jp' => 'パスワードを忘れた場合',
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
                'key' => 'address',
                'en' => 'Address',
                'jp' => '住所',
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
                'jp' => '最初の電話番号',
            ],
            [
                'key' => 'second_ph',
                'en' => 'Second Phone Number',
                'jp' => '次の電話番号',
            ],
            [
                'key' => 'have_account',
                'en' => 'Already have an account?',
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
                'key' => 'user_management',
                'en' => 'User Management',
                'jp' => 'ユーザー管理',
            ],
            [
                'key' => 'contact',
                'en' => 'Contact form',
                'jp' => 'お問い合わせフォーム',
            ],
            [
                'key' => 'contact_us',
                'en' => 'Contact Us',
                'jp' => 'お問い合わせ',
            ],
            [
                'key' => 'useful_links',
                'en' => 'Useful Links',
                'jp' => '便利なリンク',
            ],
            [
                'key' => 'manage_shop',
                'en' => 'Manage Shop',
                'jp' => 'ショップ管理',
            ],
            [
                'key' => 'wishlist',
                'en' => 'Wishlist form',
                'jp' => 'タグ付けされた商品',
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
                'jp' => '販売希望者リスト',
            ],
            [
                'key' => 'faqs',
                'en' => 'FAQs',
                'jp' => 'よくある質問',
            ],
            [
                'key' => 'customer_review',
                'en' => 'Customer Review',
                'jp' => '顧客レビュー',
            ],
            [
                'key' => 'blogs',
                'en' => 'Blogs',
                'jp' => 'ブログ',
            ],
            [
                'key' => 'terms_privacy',
                'en' => 'Terms & Privacy',
                'jp' => '利用規約とプライバシー',
            ],
            [
                'key' => 'manage_system_data',
                'en' => 'Manage System Data',
                'jp' => 'システムデータの管理',
            ],
            
            [
                'key' => 'all_faqs',
                'en' => 'All FAQs',
                'jp' => '全ての質問と回答',
            ],
            [
                'key' => 'add_faq',
                'en' => 'Add FAQ',
                'jp' => '質問と回答を追加',
            ],
            [
                'key' => 'all_system_data',
                'en' => 'All System Data',
                'jp' => 'すべてのシステムデータ',
            ],
            [
                'key' => 'system_data',
                'en' => 'System Data',
                'jp' => 'システムデータ',
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
                'key' => 'drop_image',
                'en' => 'Drop your image here or select',
                'jp' => '画像をここにドロップするか、選択してください',
            ],
            [
                'key' => 'click_browse',
                'en' => 'Click to browse',
                'jp' => '参照するにはクリックしてください',
            ],
            [
                'key' => 'add_product_image',
                'en' => 'Add a product image. The quality and background standards should be maintained.',
                'jp' => '商品画像を追加してください。',
            ],
            [
                'key' => 'limit',
                'en' => 'Do not exceed 255 characters when entering.',
                'jp' => '255文字を超えないでください。',
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
                'key' => 'slogan',
                'en' => 'Slogan',
                'jp' => 'スローガン',
            ],
            [
                'key' => 'logo',
                'en' => 'Logo',
                'jp' => 'ロゴ',
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
                'jp' => 'リセット用リンクを送信',
            ],
            [
                'key' => 'back_to_login',
                'en' => 'Back to Login',
                'jp' => 'ログインページに戻る',
            ],
            [
                'key' => 'add_setting',
                'en' => 'Add Setting',
                'jp' => '設定を追加',
            ],
            [
                'key'=> 'dashboard',
                'en' => 'Dashboard',
                'jp' => 'ダッシュボード',
            ]
        ];
        foreach($translations as $translation) {
            \App\Models\Translations::create($translation);
        }
    }
}
