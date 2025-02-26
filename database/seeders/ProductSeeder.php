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
            ['id' => 51, 'name' => '本マグロ', 'product_price' => 8000, 'product_image' => 'storage/products/本マグロ.jpg', 'stock' => 20, 'weight' => 3.00, 'size' => 100.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => '本マグロは最高級のマグロとして知られ、濃厚な旨味ととろける食感が特徴です。寿司や刺身で食べるのが一般的で、日本料理の中でも特に人気のある魚です', 'user_id' => 2, 'created_at' => '2025-02-23 01:21:43', 'updated_at' => '2025-02-23 01:21:43'],
            ['id' => 52, 'name' => '真鯛', 'product_price' => 4500, 'product_image' => 'storage/products/真鯛.jpg', 'stock' => 20, 'weight' => 3.00, 'size' => 60.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => '真鯛は「祝い魚」としても知られ、上品な甘みと引き締まった身が特徴です。刺身や塩焼き、煮付けに最適で、日本の伝統的な料理にもよく使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:24:09', 'updated_at' => '2025-02-23 01:24:09'],
            ['id' => 53, 'name' => 'ブリ', 'product_price' => 3800, 'product_image' => 'storage/products/ブリ.jpg', 'stock' => 20, 'weight' => 10.00, 'size' => 100.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-27', 'discount' => 800.00, 'sub_category_id' => 11, 'description' => 'ブリは冬に脂がのり、特に「寒ブリ」として人気があります。刺身、照り焼き、しゃぶしゃぶなどさまざまな調理法で楽しめます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:27:11', 'updated_at' => '2025-02-23 01:27:11'],
            ['id' => 54, 'name' => 'イサキ', 'product_price' => 3800, 'product_image' => 'storage/products/イサキ.jpg', 'stock' => 30, 'weight' => 3.00, 'size' => 50.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'イサキは柔らかく、ほのかな甘みが特徴の白身魚です。煮付けや塩焼きでよく食べられ、人気の魚です。', 'user_id' => 2, 'created_at' => '2025-02-23 01:29:37', 'updated_at' => '2025-02-23 01:29:37'],
            ['id' => 55, 'name' => 'アジ', 'product_price' => 2800, 'product_image' => 'storage/products/アジ.jpg', 'stock' => 30, 'weight' => 1.00, 'size' => 30.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'アジは日本でよく食べられる魚で、焼き物やフライ、刺身などで楽しめます。脂ののり具合が程よく、さっぱりした味わいが特徴です。', 'user_id' => 2, 'created_at' => '2025-02-23 01:32:03', 'updated_at' => '2025-02-23 01:32:03'],
            ['id' => 56, 'name' => 'サンマ', 'product_price' => 3200, 'product_image' => 'storage/products/サンマ.jpeg', 'stock' => 30, 'weight' => 2.00, 'size' => 70.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'サンマは秋の代表的な魚で、脂がのった美味しさが特徴です。焼きサンマとして食べるのが一般的で、秋の味覚として大変人気があります。', 'user_id' => 2, 'created_at' => '2025-02-23 01:35:27', 'updated_at' => '2025-02-23 01:35:27'],
            ['id' => 57, 'name' => 'イカ', 'product_price' => 2800, 'product_image' => 'storage/products/イカ.jpg', 'stock' => 40, 'weight' => 2.00, 'size' => 80.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 12, 'description' => 'イカはその柔らかな食感と風味が特徴です。刺身や焼き物、天ぷらなどさまざまな料理に使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:38:03', 'updated_at' => '2025-02-23 01:38:03'],
            ['id' => 58, 'name' => 'タコ', 'product_price' => 2800, 'product_image' => 'storage/products/タコ.jpg', 'stock' => 50, 'weight' => 2.00, 'size' => 100.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 12, 'description' => 'タコはプリプリした食感が特徴で、酢の物、たこ焼き、刺身などさまざまな料理に使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:40:11', 'updated_at' => '2025-02-23 01:40:11'],
            ['id' => 59, 'name' => 'マダコ', 'product_price' => 3800, 'product_image' => 'storage/products/マダコ.jpg', 'stock' => 2, 'weight' => 3.00, 'size' => 100.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => '日本で最もポピュラーなタコで、プリプリした食感と甘みのある味が特徴。たこ焼き、酢の物、刺身、煮物など様々な料理に使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:21:43', 'updated_at' => '2025-02-23 02:21:43'],
            ['id' => 60, 'name' => 'アオリイカ', 'product_price' => 5000, 'product_image' => 'storage/products/アオリイカ.jpg', 'stock' => 10, 'weight' => 2.00, 'size' => 70.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 12, 'description' => 'アオリイカはその肉厚で甘みのある身が特徴です。刺身やイカ焼き、天ぷらなどさまざまな料理に最適です。', 'user_id' => 2, 'created_at' => '2025-02-23 02:24:14', 'updated_at' => '2025-02-23 02:24:14'],
            ['id' => 61, 'name' => 'カレイ', 'product_price' => 3000, 'product_image' => 'storage/products/カレイ.jpg', 'stock' => 30, 'weight' => 2.00, 'size' => 60.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'カレイは淡泊な味わいと繊細な身質が特徴の魚で、煮付けや焼き物、唐揚げなどで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:27:56', 'updated_at' => '2025-02-23 02:27:56'],
            ['id' => 62, 'name' => 'ハマチ', 'product_price' => 3200, 'product_image' => 'storage/products/ハマチ.jpg', 'stock' => 25, 'weight' => 3.00, 'size' => 70.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'ハマチは養殖で育てられることが多く、肉質は柔らかく脂がのっており、刺身や照り焼き、寿司などで人気です。', 'user_id' => 2, 'created_at' => '2025-02-23 02:30:17', 'updated_at' => '2025-02-23 02:30:17'],
            ['id' => 63, 'name' => 'タラ', 'product_price' => 2500, 'product_image' => 'storage/products/タラ.jpg', 'stock' => 30, 'weight' => 4.00, 'size' => 80.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'タラは白身魚で、淡白でクセのない味が特徴です。鍋物やフライ、シチューなどで使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:33:02', 'updated_at' => '2025-02-23 02:33:02'],
            ['id' => 64, 'name' => 'マグロ', 'product_price' => 5200, 'product_image' => 'storage/products/マグロ.jpg', 'stock' => 10, 'weight' => 5.00, 'size' => 120.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'マグロは世界中で愛されている魚で、その身はしっとりとした食感が特徴です。寿司や刺身でよく食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:35:35', 'updated_at' => '2025-02-23 02:35:35'],
            ['id' => 65, 'name' => 'キンメダイ', 'product_price' => 4000, 'product_image' => 'storage/products/キンメダイ.jpg', 'stock' => 15, 'weight' => 3.00, 'size' => 100.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'キンメダイは脂がのり、非常に美味しい魚です。刺身や焼き物、煮付けなどで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:37:57', 'updated_at' => '2025-02-23 02:37:57'],
            ['id' => 66, 'name' => 'サーモン', 'product_price' => 2800, 'product_image' => 'storage/products/サーモン.jpg', 'stock' => 40, 'weight' => 2.00, 'size' => 60.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'サーモンはその脂ののった身が特徴で、刺身や寿司、焼き物などで非常に人気があります。', 'user_id' => 2, 'created_at' => '2025-02-23 02:40:00', 'updated_at' => '2025-02-23 02:40:00'],
            ['id' => 67, 'name' => 'カンパチ', 'product_price' => 3500, 'product_image' => 'storage/products/カンパチ.jpg', 'stock' => 25, 'weight' => 3.00, 'size' => 70.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'カンパチはその引き締まった身と美味しい脂が特徴で、刺身や寿司、焼き物などで好まれます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:42:04', 'updated_at' => '2025-02-23 02:42:04'],
            ['id' => 68, 'name' => 'カツオ', 'product_price' => 2200, 'product_image' => 'storage/products/カツオ.jpg', 'stock' => 35, 'weight' => 1.50, 'size' => 40.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'カツオは「初鰹」として春に漁獲されることが多く、風味豊かな肉質とさっぱりした味わいが特徴です。刺身やタタキで楽しめます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:44:20', 'updated_at' => '2025-02-23 02:44:20'],
        ];

        foreach ($products as $product) {
            $product['user_id'] = $users->random()->id; // Assign a random user
            Product::create($product);
        }
    }
}
