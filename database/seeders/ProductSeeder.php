<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Users;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all users
        $users = Users::select('users.*')
                    ->join('user_roles', 'users.id', '=','user_roles.user_id')
                    ->where('user_roles.role_id', 2)
                    ->get();

        // Ensure there are users to assign
        if ($users->isEmpty()) {
            $this->command->info('No users found. Please create users before seeding products.');
            return;
        }

        // Create 50 products with a random user_id
        $products = [
            ['id' => 51, 'name' => '本マグロ', 'product_price' => 8000, 'product_image' => '本マグロ.jpg', 'stock' => 20, 'weight' => 3.00, 'size' => 100.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => '本マグロは最高級のマグロとして知られ、濃厚な旨味ととろける食感が特徴です。寿司や刺身で食べるのが一般的で、日本料理の中でも特に人気のある魚です', 'user_id' => 2, 'created_at' => '2025-02-23 01:21:43', 'updated_at' => '2025-02-23 01:21:43'],
            ['id' => 52, 'name' => '真鯛', 'product_price' => 4500, 'product_image' => '真鯛.jpg', 'stock' => 20, 'weight' => 3.00, 'size' => 60.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => '真鯛は「祝い魚」としても知られ、上品な甘みと引き締まった身が特徴です。刺身や塩焼き、煮付けに最適で、日本の伝統的な料理にもよく使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:24:09', 'updated_at' => '2025-02-23 01:24:09'],
            ['id' => 53, 'name' => 'ブリ', 'product_price' => 3800, 'product_image' => 'ブリ.jpg', 'stock' => 20, 'weight' => 10.00, 'size' => 100.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-27', 'discount' => 800.00, 'sub_category_id' => 11, 'description' => 'ブリは冬に脂がのり、特に「寒ブリ」として人気があります。刺身、照り焼き、しゃぶしゃぶなどさまざまな調理法で楽しめます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:27:11', 'updated_at' => '2025-02-23 01:27:11'],
            ['id' => 54, 'name' => 'イサキ', 'product_price' => 3800, 'product_image' => 'イサキ.jpg', 'stock' => 30, 'weight' => 3.00, 'size' => 50.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'イサキは柔らかく、ほのかな甘みが特徴の白身魚です。煮付けや塩焼きでよく食べられ、人気の魚です。', 'user_id' => 2, 'created_at' => '2025-02-23 01:29:37', 'updated_at' => '2025-02-23 01:29:37'],
            ['id' => 55, 'name' => 'アジ', 'product_price' => 2800, 'product_image' => 'アジ.jpg', 'stock' => 30, 'weight' => 1.00, 'size' => 30.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'アジは日本でよく食べられる魚で、焼き物やフライ、刺身などで楽しめます。脂ののり具合が程よく、さっぱりした味わいが特徴です。', 'user_id' => 2, 'created_at' => '2025-02-23 01:32:03', 'updated_at' => '2025-02-23 01:32:03'],
            ['id' => 56, 'name' => 'サンマ', 'product_price' => 3200, 'product_image' => 'サンマ.jpeg', 'stock' => 30, 'weight' => 2.00, 'size' => 70.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'サンマは秋の代表的な魚で、脂がのった美味しさが特徴です。焼きサンマとして食べるのが一般的で、秋の味覚として大変人気があります。', 'user_id' => 2, 'created_at' => '2025-02-23 01:35:27', 'updated_at' => '2025-02-23 01:35:27'],
            ['id' => 57, 'name' => 'イカ', 'product_price' => 2800, 'product_image' => 'イカ.jpg', 'stock' => 40, 'weight' => 2.00, 'size' => 80.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 12, 'description' => 'イカはその柔らかな食感と風味が特徴です。刺身や焼き物、天ぷらなどさまざまな料理に使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:38:03', 'updated_at' => '2025-02-23 01:38:03'],
            ['id' => 58, 'name' => 'タコ', 'product_price' => 2800, 'product_image' => 'タコ.jpg', 'stock' => 50, 'weight' => 2.00, 'size' => 100.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 12, 'description' => 'タコはプリプリした食感が特徴で、酢の物、たこ焼き、刺身などさまざまな料理に使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:40:11', 'updated_at' => '2025-02-23 01:40:11'],
            ['id' => 59, 'name' => 'マダコ', 'product_price' => 3800, 'product_image' => 'マダコ.jpg', 'stock' => 2, 'weight' => 3.00, 'size' => 100.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => '日本で最もポピュラーなタコで、プリプリした食感と甘みのある味が特徴。たこ焼き、酢の物、刺身、煮物など様々な料理に使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:21:43', 'updated_at' => '2025-02-23 02:21:43'],
            ['id' => 60, 'name' => 'アオリイカ', 'product_price' => 5000, 'product_image' => 'アオリイカ.jpg', 'stock' => 10, 'weight' => 2.00, 'size' => 70.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 12, 'description' => 'アオリイカはその肉厚で甘みのある身が特徴です。刺身やイカ焼き、天ぷらなどさまざまな料理に最適です。', 'user_id' => 2, 'created_at' => '2025-02-23 02:24:14', 'updated_at' => '2025-02-23 02:24:14'],
            ['id' => 61, 'name' => 'カレイ', 'product_price' => 3000, 'product_image' => 'カレイ.jpg', 'stock' => 30, 'weight' => 2.00, 'size' => 60.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'カレイは淡泊な味わいと繊細な身質が特徴の魚で、煮付けや焼き物、唐揚げなどで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:27:56', 'updated_at' => '2025-02-23 02:27:56'],
            ['id' => 62, 'name' => 'ハマチ', 'product_price' => 3200, 'product_image' => 'ハマチ.jpg', 'stock' => 25, 'weight' => 3.00, 'size' => 70.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'ハマチは養殖で育てられることが多く、肉質は柔らかく脂がのっており、刺身や照り焼き、寿司などで人気です。', 'user_id' => 2, 'created_at' => '2025-02-23 02:30:17', 'updated_at' => '2025-02-23 02:30:17'],
            ['id' => 63, 'name' => 'タラ', 'product_price' => 2500, 'product_image' => 'タラ.jpg', 'stock' => 30, 'weight' => 4.00, 'size' => 80.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'タラは白身魚で、淡白でクセのない味が特徴です。鍋物やフライ、シチューなどで使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:33:02', 'updated_at' => '2025-02-23 02:33:02'],
            ['id' => 64, 'name' => 'マグロ', 'product_price' => 5200, 'product_image' => 'マグロ.jpg', 'stock' => 10, 'weight' => 5.00, 'size' => 120.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'マグロは世界中で愛されている魚で、その身はしっとりとした食感が特徴です。寿司や刺身でよく食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:35:35', 'updated_at' => '2025-02-23 02:35:35'],
            ['id' => 65, 'name' => 'キンメダイ', 'product_price' => 4000, 'product_image' => 'キンメダイ.jpg', 'stock' => 15, 'weight' => 3.00, 'size' => 100.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'キンメダイは脂がのり、非常に美味しい魚です。刺身や焼き物、煮付けなどで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:37:57', 'updated_at' => '2025-02-23 02:37:57'],
            ['id' => 66, 'name' => 'サーモン', 'product_price' => 2800, 'product_image' => 'サーモン.jpg', 'stock' => 40, 'weight' => 2.00, 'size' => 60.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'サーモンはその脂ののった身が特徴で、刺身や寿司、焼き物などで非常に人気があります。', 'user_id' => 2, 'created_at' => '2025-02-23 02:40:00', 'updated_at' => '2025-02-23 02:40:00'],
            ['id' => 67, 'name' => 'カンパチ', 'product_price' => 3500, 'product_image' => 'カンパチ.jpg', 'stock' => 25, 'weight' => 3.00, 'size' => 70.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'カンパチはその引き締まった身と美味しい脂が特徴で、刺身や寿司、焼き物などで好まれます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:42:04', 'updated_at' => '2025-02-23 02:42:04'],
            ['id' => 68, 'name' => 'カツオ', 'product_price' => 2200, 'product_image' => 'カツオ.jpg', 'stock' => 35, 'weight' => 1.50, 'size' => 40.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'カツオは「初鰹」として春に漁獲されることが多く、風味豊かな肉質とさっぱりした味わいが特徴です。刺身やタタキで楽しめます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:44:20', 'updated_at' => '2025-02-23 02:44:20'],
            // ['id' => 69, 'name' => 'アナゴ', 'product_price' => 3000, 'product_image' => 'アナゴ.jpg', 'stock' => 20, 'weight' => 1.50, 'size' => 50.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'アナゴは柔らかく甘みのある身が特徴で、寿司や天ぷら、煮物などでよく食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:46:30', 'updated_at' => '2025-02-23 02:46:30'],
            //added products later will delete
    // ['id' => 70, 'name' => 'ホッケ', 'product_price' => 2800, 'product_image' => 'ホッケ.jpg', 'stock' => 30, 'weight' => 2.00, 'size' => 60.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'ホッケは脂がのっており、焼き物や煮付けで食べられることが多い魚です。', 'user_id' => 2, 'created_at' => '2025-02-23 02:48:45', 'updated_at' => '2025-02-23 02:48:45'],
    // ['id' => 71, 'name' => 'シマアジ', 'product_price' => 4500, 'product_image' => 'シマアジ.jpg', 'stock' => 15, 'weight' => 2.50, 'size' => 70.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'シマアジは高級魚として知られ、その身は引き締まり、甘みがあります。刺身や寿司で食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:51:10', 'updated_at' => '2025-02-23 02:51:10'],
    // ['id' => 72, 'name' => 'メバル', 'product_price' => 3200, 'product_image' => 'メバル.jpg', 'stock' => 25, 'weight' => 1.50, 'size' => 40.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'メバルは白身魚で、淡白な味わいが特徴です。煮付けや塩焼きで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:53:25', 'updated_at' => '2025-02-23 02:53:25'],
    // ['id' => 73, 'name' => 'カワハギ', 'product_price' => 3800, 'product_image' => 'カワハギ.jpg', 'stock' => 20, 'weight' => 1.00, 'size' => 30.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'カワハギはその肝が美味しいことで知られ、刺身や鍋物で食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:55:40', 'updated_at' => '2025-02-23 02:55:40'],
    // ['id' => 74, 'name' => 'アワビ', 'product_price' => 8000, 'product_image' => 'アワビ.jpg', 'stock' => 10, 'weight' => 1.00, 'size' => 15.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'アワビは高級食材として知られ、その身は柔らかく、甘みがあります。刺身や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:58:00', 'updated_at' => '2025-02-23 02:58:00'],
    // ['id' => 75, 'name' => 'サザエ', 'product_price' => 3500, 'product_image' => 'サザエ.jpg', 'stock' => 15, 'weight' => 1.00, 'size' => 10.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'サザエはその独特の食感と風味が特徴で、刺身や壺焼きで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:00:15', 'updated_at' => '2025-02-23 03:00:15'],
    // ['id' => 76, 'name' => 'ホタテ', 'product_price' => 3000, 'product_image' => 'ホタテ.jpg', 'stock' => 20, 'weight' => 1.50, 'size' => 15.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'ホタテはその甘みと柔らかい身が特徴で、刺身やバター焼きで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:02:30', 'updated_at' => '2025-02-23 03:02:30'],
    // ['id' => 77, 'name' => 'ウニ', 'product_price' => 6000, 'product_image' => 'ウニ.jpg', 'stock' => 10, 'weight' => 0.50, 'size' => 5.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'ウニは濃厚な味わいが特徴で、寿司や刺身で食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:04:45', 'updated_at' => '2025-02-23 03:04:45'],
    // ['id' => 78, 'name' => 'イクラ', 'product_price' => 4000, 'product_image' => 'イクラ.jpg', 'stock' => 30, 'weight' => 0.20, 'size' => 2.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'イクラはサケの卵で、そのプチプチとした食感と甘みが特徴です。寿司や丼物で食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:07:00', 'updated_at' => '2025-02-23 03:07:00'],
    // ['id' => 79, 'name' => 'タラコ', 'product_price' => 3500, 'product_image' => 'タラコ.jpg', 'stock' => 25, 'weight' => 0.30, 'size' => 3.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'タラコはスケトウダラの卵で、その濃厚な味わいが特徴です。寿司やパスタで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:09:15', 'updated_at' => '2025-02-23 03:09:15'],
    // ['id' => 80, 'name' => 'カキ', 'product_price' => 2800, 'product_image' => 'カキ.jpg', 'stock' => 40, 'weight' => 1.00, 'size' => 10.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'カキはそのクリーミーな身と濃厚な味わいが特徴で、生食やフライで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:11:30', 'updated_at' => '2025-02-23 03:11:30'],
    // ['id' => 81, 'name' => 'アカガイ', 'product_price' => 3200, 'product_image' => 'アカガイ.jpg', 'stock' => 20, 'weight' => 1.00, 'size' => 8.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'アカガイはその甘みと柔らかい身が特徴で、刺身や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:13:45', 'updated_at' => '2025-02-23 03:13:45'],
    // ['id' => 82, 'name' => 'ハマグリ', 'product_price' => 3000, 'product_image' => 'ハマグリ.jpg', 'stock' => 25, 'weight' => 1.00, 'size' => 6.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'ハマグリはその甘みと風味が特徴で、吸い物や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:16:00', 'updated_at' => '2025-02-23 03:16:00'],
    // ['id' => 83, 'name' => 'シジミ', 'product_price' => 1500, 'product_image' => 'シジミ.jpg', 'stock' => 50, 'weight' => 0.50, 'size' => 3.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'シジミはその風味豊かな味わいが特徴で、味噌汁や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:18:15', 'updated_at' => '2025-02-23 03:18:15'],
    // ['id' => 84, 'name' => 'アサリ', 'product_price' => 2000, 'product_image' => 'アサリ.jpg', 'stock' => 40, 'weight' => 0.50, 'size' => 4.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'アサリはその甘みと風味が特徴で、味噌汁やパスタで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:20:30', 'updated_at' => '2025-02-23 03:20:30'],
    // ['id' => 85, 'name' => 'ムール貝', 'product_price' => 2500, 'product_image' => 'ムール貝.jpg', 'stock' => 30, 'weight' => 1.00, 'size' => 8.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'ムール貝はその濃厚な味わいが特徴で、ワイン蒸しやパスタで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:22:45', 'updated_at' => '2025-02-23 03:22:45'],
    // ['id' => 86, 'name' => 'ホンビノスガイ', 'product_price' => 2800, 'product_image' => 'ホンビノスガイ.jpg', 'stock' => 20, 'weight' => 1.00, 'size' => 10.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'ホンビノスガイはその甘みと風味が特徴で、刺身や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:25:00', 'updated_at' => '2025-02-23 03:25:00'],
    // ['id' => 87, 'name' => 'バカガイ', 'product_price' => 3000, 'product_image' => 'バカガイ.jpg', 'stock' => 25, 'weight' => 1.00, 'size' => 8.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'バカガイはその甘みと柔らかい身が特徴で、刺身や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:27:15', 'updated_at' => '2025-02-23 03:27:15'],
    // ['id' => 88, 'name' => 'アオヤギ', 'product_price' => 3200, 'product_image' => 'アオヤギ.jpg', 'stock' => 20, 'weight' => 1.00, 'size' => 10.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'アオヤギはその甘みと風味が特徴で、刺身や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:29:30', 'updated_at' => '2025-02-23 03:29:30'],
    // //added products later will delete
        ];

        // $statuses = ["pending","approved"];

        foreach ($products as $product) {
            $product['user_id'] = $users->random()->id; // Assign a random user
            $product['status'] = "approved"; // testing for home
            Product::create($product);
        }
    }
}
