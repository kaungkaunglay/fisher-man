<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sub_category;
use App\Models\Role;
use App\Models\Users;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $faker;
    public function __construct()
    {
        $this->faker = Faker::create();
    }

    public function run(): void
    {
        // Fetch all users
        $user_ids = Role::where('id', 2)->with('users:id')->first()->users->pluck('id')->toArray();

        // if ($users->isEmpty()) {
        //     $this->command->info('No users found. Please create users before seeding products.');
        //    // Ensure there are users to assign
        //  return;
        // }

        $product_names = ['スルメ', '水イカ', 'アマダイ', 'レンコ鯛', 'ブリ', 'ワラサ', 'ヤズ', 'ヒラス', 'ヒラコ', '鯛', 'マグロ', 'ヨコワ', 'ハガツオ', 'スジカツオ', 'ビンナガ', '丸トビ', '角トビ', 'アジ', 'サバ', 'クエ', 'イサキ', 'アカムツ', 'ナメル', 'チカメキントキ', 'ヒラメ', 'メンボ', 'イシダイ', 'イシガキダイ', 'タチウオ', 'サワラ', '沖メバル', 'ダルマ', 'カマス', '活きアナゴ', 'サザエ', 'アワビ'];


        $product_descriptions = [
            '対馬のスルメは、対馬周辺で獲れるイカを使って作られる乾燥スルメのことです。脂がのっており、肉厚でしっかりとした食感からその品質の高さと風味の良さで知られております。 そのまま、焼き、天ぷら等の料理だけではなく、贈り物やお土産としても人気があります。',
            '「対馬水イカ」とは、長崎県の対馬近海で獲れるアオリイカのことを指します。  身が厚く、甘みが強い：アオリイカ特有の濃厚な甘みと弾力のある食感が特徴です。 特に刺身で食べると、甘みと旨味がダイレクトに味わえます。',
            '甘鯛は、白身魚で,味が繊細で美味しいことで知られている高級魚です。 特に対馬の甘鯛は、その美味しさとともに特別な評価を受けており、食通にも愛されています。 対馬の甘鯛は、繊細で上品な味わいが特徴ですので、刺身、塩焼き、煮つけ等の料理などに適しています。',
            '「対馬レンコ鯛」は、長崎県の対馬近海で獲れ、 正式には「キダイ（黄鯛）」という魚で、体が黄色みを帯び、目の周りが金色に輝くのが特徴です。 上品な甘みと淡白な味わいで、煮つけや焼き物にすると、ホロッと崩れる柔らかさが楽しめます。 ',
            '「対馬鰤（ぶり）」は、長崎県の対馬近海で獲れるぶりを指します。 周辺の海域は寒流と暖流が交わり、そこで育ったブリは身が引き締まり、脂のノリも絶妙です。 おすすめは脂のノリをダイレクトに味わえる刺身やブリしゃぶ、特に冬の、「寒ブリ」は脂の乗りが最高です。 ',
            '「対馬ワラサ」は、長崎県の対馬近海で獲れる「ワラサ」のことを指します。 ワラサはブリの成長過程にあたる魚で、60cm程度の若いブリを「ワラサ」と呼びます。程よい脂とさっぱりした味わいが楽しめます。 旬の時期は秋から冬、寒くなるほど美味しくなります。',
            '「対馬ヤズ」は、長崎県の対馬近海で獲れる「ヤズ」のことを指します。 ヤズはブリの幼魚にあたり、 成魚のブリに比べて脂が少なめで、あっさりとしています。 夏から秋にかけてが旬で、対馬では地元の食材として、新鮮なヤズを様々な料理で楽しめます。',
            '「ツシマヒラス」は、長崎県の対馬近海で獲れる「ヒラス」です。 ヒラスは主に沿岸の岩礁帯に生息しています。 対馬周辺の荒波にもまれ、身が引き締まって質の高いヒラスは、春から初夏（4月〜6月）が旬で、対馬では、新鮮なヒラスを刺身や塩焼きなどで楽しめます。',
            '「ツシマヒラコ」は、長崎県の対馬近海で獲れる「ヒラマサ」の若魚を指す呼び名です。特に引き締まった身と上品な脂が特徴です。 対馬近海の豊かな海で育った、品質が高く、地元でも人気の魚です。 旬は春から夏（4月〜8月）、脂がほどよく乗って美味しくなります。 ',
            '「対馬タイ」は、対馬近海で獲れる「マダイ（真鯛）」のことを指します。 対馬周辺の海域は潮流が速く、餌も豊富で、身が引き締まり旨味が濃いのが特徴です。 食べ方は刺身、鯛めし、煮付け等様々。旬（3月〜5月）には、マダイを地元の料理法で楽しめるお店も多いです。',
            '「対馬マグロ」は、長崎県の対馬近海で獲れるマグロのことを指します。 対馬周辺は豊かな漁場で、そこで育ったマグロは脂のノリが良く、身が引き締まっています。  新鮮な対馬マグロは刺身や寿司で食べるのが一番。旬は冬（12月〜2月）、脂がのって最高です。 ',
            '「対馬ヨコワ」は、対馬近海で獲れる「ヨコワ（ヨコ）」のことを指します。 ヨコワは本マグロの幼魚の呼び名です。 新鮮な対馬ヨコワは刺身や寿司で食べるのが一番。さっぱりとした赤身を楽しめます。 旬は春から夏（4月〜8月）で、身が引き締まって美味しいです。',
            '「対馬ハガツオ」は、対馬近海で獲れる「ハガツオ（羽鰹）」のことを指します。 上品な脂と旨味が特徴です。  新鮮な対馬ハガツオは刺身やタタキで食べるのが一番。表面を軽く炙ったタタキは最高です。 旬は春から夏（4月〜8月）で、脂のノリが良く美味しいです。',
            '「対馬スジカツオ」は、対馬近海で獲れる「スジカツオ（筋鰹）」のことを指します。 豊かな海で育ったスジカツオは、身が引き締まり、鮮度抜群です。 スジカツオは特にタタキ、は香ばしさで抜群です。 旬は夏から秋（7月〜10月）、特に身が引き締まります。',
            '「対馬ビンナガ」は、対馬近海で獲れる「ビンナガマグロ（ビンチョウマグロ）」のことを指します。 脂がのっているのにさっぱりとした味わいが魅力です。新鮮な対馬ビンナガは刺身で食べるのが一番。 旬は冬から春（12月〜3月）、脂がのり、特に美味いです。',
            '「対馬丸トビ」は、対馬近海で獲れる「マルトビウオ（丸飛魚）」のことを指し、対馬の食卓では馴染みが深いです。新鮮な対馬丸トビは、刺身で食べると淡白な甘みと弾力を楽しめます。 旬は春から初夏（4月〜6月）で、この時期は身が引き締まり、特に美味いです。 ',
            '「対馬角トビ」は、対馬近海で獲れる「カクトビウオ（角飛魚）」のことを指します。 胸ビレが長く、飛距離が長いです。 対馬周辺で育った角トビは、淡白であっさり。食べやすいです。 旬は春から夏（4月〜8月）で、この時期は身が引き締まり、特に美味しくなります。',
            '「対馬アジ」は、長崎県の対馬近海で獲れる「アジ（鯵）」のことを指します。 豊かな漁場の対馬は、マアジやシマアジが多く獲れ、高品質で全国的に高評価です。 対馬アジは刺身でいただくのが一番。なめろうもおすすめ。 旬は春から秋（4月〜10月）で、珍重されます。',
            '「対馬サバ」は、対馬近海で獲れる「サバ（鯖）」のことを指します。 好漁場の対馬は、マサバ（真鯖）やゴマサバ（胡麻鯖）が豊富に水揚げされます。脂がのって濃厚な旨味が特徴です。 新鮮な対馬サバの「しめ鯖」は最高です。旬は年中、脂がのり、美味しさが際立ちます。',
            '「対馬クエ」は、対馬近海で獲れる「クエ」のことを指します。「鍋の王様」として有名です。 豊かな漁場で育った対馬クエは地元の特産品として人気です。 鍋が定番。身から出る上品な出汁は、野菜との相性も抜群。 旬は冬（11月〜2月）、特に脂がのり、美味です。',
            '「対馬イサキ」は、対馬近海で獲れる「イサキ（伊佐木）」。上品な白身と脂が特徴で、対馬の豊かな海域で育ったイサキは旨味が濃いと評判です。新鮮な対馬イサキは刺身が絶品。旬は初夏から夏（5月〜8月）、梅雨の時期は「梅雨イサキ」として、特に美味いです。',
            '「対馬アカムツ」は対馬近海で獲れる「アカムツ（赤鯥）」のことを指します。 別名「ノドグロ（喉黒）」。 濃厚な脂と上品な甘みを持つ高級魚です。 新鮮なアカムツは刺身が絶品。炙って食べるのも◎。 旬は秋から冬（10月〜2月）、脂がのり、旨味が凝縮されます。',
            '「対馬ナメル」は、対馬近海で獲れます。 正式名称はババガレイ（婆鰈）。粘液が特徴で、名前の由来です。 対馬近海の海域で育ったナメルは、身がふっくらしていて、上品な甘みがあります。 最も定番の食べ方が煮付け。旬は冬（11月〜2月）、脂がのり、絶品です。',
            '「対馬チカメキントキ」は、対馬近海で獲れる「チカメキントキ（近目金時）」。 大きな目と鮮やかな赤色が特徴です。 対馬周辺に生息し、上品な白身と甘みのある脂が魅力です。 この魚は刺身が絶品。旬は秋から冬（10月〜2月）、脂がのり、特に美味いです。',
            '「対馬ヒラメ」は、対馬近海で獲れる「ヒラメ（平目）」のことを指します。 豊かな海域の対馬で育ち、高級魚としても有名です。 食べ方は薄造りが定番。ポン酢やもみじおろしで◎。 旬は冬（12月〜2月）、特に冬の対馬ヒラメは寒ヒラメとも呼ばれ、絶品の味わいです。',
            '「対馬メンボ」は、対馬周辺で獲れる「メンボ（アカエイ）」のことを指します。 煮付けや味噌煮にして食べられることが多く、独特の食感が楽しめます。 特に味噌ダレの煮付けは濃厚な旨味と味噌のコクが相性抜群。 旬は春から夏（4月〜8月）、身が柔らかく美味いです。',
            '「対馬イシダイ」は、対馬近海で獲れる「イシダイ（石鯛）」のことを指します。 黒と白の縞模様が特徴で、上品な旨味がある高級魚です。 おすすめは薄造り。ポン酢やもみじおろしで◎。 旬は春から夏（4月〜8月）身が引き締まり、脂がのって美味いです。 ',
            '「対馬イシガキダイ」は対馬近海で獲れる「イシガキダイ（石垣鯛）」のことです。 黒い斑点模様が特徴で、濃厚な旨味と上品な甘みがある高級魚です。 新鮮なイシガキダイは薄造りが絶品。ポン酢やもみじおろしで◎。 旬は春から夏（4月〜8月）、脂がのって美味いです。',
            '「対馬タチウオ」は、対馬近海で獲れる「タチウオ（太刀魚）」のことを指します。 刀（太刀）のような姿が名前の由来です。 対馬近海で育ったタチウオは、旨味が濃厚です。 タチウオは刺身が絶品。旬は夏から秋（7月〜10月）、脂がのり、美味いです。',
            '「対馬鰆（ツシマサワラ）」は、長崎県の対馬近海で獲れる「サワラ（鰆）」のことを指します。 上品な甘みと旨味がある高級魚です。 対馬近海の豊かな海域で育ったサワラは、脂がのっていて絶品です。刺身がおすすめ。 旬は春（3月〜5月）、「春の魚」として有名です。',
            '「対馬沖メバル」は、長崎県の対馬近海で獲れる「メバル（眼張）」のことを指します。 大きな目と丸みのある体が特徴で、豊かな海域で育ったメバルは、上品な旨味がある高級魚です。新鮮なメバルは刺身が絶品。 旬は冬から春（12月〜4月）、脂がのって美味いです。',
            '「対馬ダルマ」は、長崎県の対馬近海で獲れる「ダルマダイ」のことを指します。 丸みを帯びた体型と大きな目が特徴で、見た目が「ダルマ（達磨）」に似ていることからその名がついています。 対馬近海の深海域に生息し、脂がのっていて濃厚な旨味がある高級魚です。',
            '「対馬カマス」は、対馬近海で獲れる「カマス（梭子魚）」のことを指します。 細長い体と鋭い歯が特徴で、上品な旨味が楽しめます。 カマスは刺身が絶品。炙ることで香ばしさが加わります。 旬は秋から冬（9月〜12月）、「秋カマス」は塩焼きや一夜干しが人気です。',
            '「対馬活きアナゴ」は、対馬近海で獲れる「アナゴ（穴子）」のことを指します。ふっくらとした食感とほんのり甘みのある旨味が絶品です。 新鮮な活きアナゴは刺身でも美味。薄造りにしてポン酢で◎。 旬は夏（6月〜8月）、「夏アナゴ」と呼ばれ、旨味が濃厚です。',
            '「対馬サザエ」は、「（栄螺）」と書きます。コリコリとした食感が特徴で、殻ごと直火で焼く壺焼きは、肝の濃厚な旨味が引き立ち、磯の香りも楽しめます。 また、刺身も絶品。コリコリとした食感と甘みが楽しめます。 旬は春から夏（4月〜8月）、特に旨味が濃厚です。',
            '「対馬アワビ」は、対馬近海で獲れる「アワビ（鮑）」のことを指します。 コリコリとした食感が特徴で、対馬近海の海藻を食べて育ったアワビは、濃厚な甘みと旨味が絶品の高級食材です。 旬は夏（6月〜8月）、「夏アワビ」と呼ばれ、濃厚な旨味が楽しめます。',
        ];


        $product_units = [124.0, 105.0, 126.0, 114.0, 127.0, 124.0, 119.0, 125.0, 126.0, 127.0, 124.0, 125.0, 125.0, 122.0, 122.0, 124.0, 126.0, 127.0, 127.0, 125.0, 122.0, 126.0, 125.0, 122.0, 127.0, 127.0, 121.0, 127.0, 119.0, 127.0, 125.0, 124.0, 126.0, 124.0, 126.0, 122.0];

        // Create 50 products with a random user_id
        // $products = [
        //     ['id' => 51, 'name' => '本マグロ', 'product_price' => 8000, 'product_image' => '本マグロ.jpg', 'stock' => 20, 'weight' => 3.0, 'size' => 100.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => '本マグロは最高級のマグロとして知られ、濃厚な旨味ととろける食感が特徴です。寿司や刺身で食べるのが一般的で、日本料理の中でも特に人気のある魚です', 'user_id' => 2, 'created_at' => '2025-02-23 01:21:43', 'updated_at' => '2025-02-23 01:21:43'],
        //     ['id' => 52, 'name' => '真鯛', 'product_price' => 4500, 'product_image' => '真鯛.jpg', 'stock' => 20, 'weight' => 3.0, 'size' => 60.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => '真鯛は「祝い魚」としても知られ、上品な甘みと引き締まった身が特徴です。刺身や塩焼き、煮付けに最適で、日本の伝統的な料理にもよく使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:24:09', 'updated_at' => '2025-02-23 01:24:09'],
        //     ['id' => 53, 'name' => 'ブリ', 'product_price' => 3800, 'product_image' => 'ブリ.jpg', 'stock' => 20, 'weight' => 10.0, 'size' => 100.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-27', 'discount' => 800.0, 'sub_category_id' => 11, 'description' => 'ブリは冬に脂がのり、特に「寒ブリ」として人気があります。刺身、照り焼き、しゃぶしゃぶなどさまざまな調理法で楽しめます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:27:11', 'updated_at' => '2025-02-23 01:27:11'],
        //     ['id' => 54, 'name' => 'イサキ', 'product_price' => 3800, 'product_image' => 'イサキ.jpg', 'stock' => 30, 'weight' => 3.0, 'size' => 50.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => 'イサキは柔らかく、ほのかな甘みが特徴の白身魚です。煮付けや塩焼きでよく食べられ、人気の魚です。', 'user_id' => 2, 'created_at' => '2025-02-23 01:29:37', 'updated_at' => '2025-02-23 01:29:37'],
        //     ['id' => 55, 'name' => 'アジ', 'product_price' => 2800, 'product_image' => 'アジ.jpg', 'stock' => 30, 'weight' => 1.0, 'size' => 30.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => 'アジは日本でよく食べられる魚で、焼き物やフライ、刺身などで楽しめます。脂ののり具合が程よく、さっぱりした味わいが特徴です。', 'user_id' => 2, 'created_at' => '2025-02-23 01:32:03', 'updated_at' => '2025-02-23 01:32:03'],
        //     ['id' => 56, 'name' => 'サンマ', 'product_price' => 3200, 'product_image' => 'サンマ.jpeg', 'stock' => 30, 'weight' => 2.0, 'size' => 70.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => 'サンマは秋の代表的な魚で、脂がのった美味しさが特徴です。焼きサンマとして食べるのが一般的で、秋の味覚として大変人気があります。', 'user_id' => 2, 'created_at' => '2025-02-23 01:35:27', 'updated_at' => '2025-02-23 01:35:27'],
        //     ['id' => 57, 'name' => 'イカ', 'product_price' => 2800, 'product_image' => 'イカ.jpg', 'stock' => 40, 'weight' => 2.0, 'size' => 80.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 12, 'description' => 'イカはその柔らかな食感と風味が特徴です。刺身や焼き物、天ぷらなどさまざまな料理に使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:38:03', 'updated_at' => '2025-02-23 01:38:03'],
        //     ['id' => 58, 'name' => 'タコ', 'product_price' => 2800, 'product_image' => 'タコ.jpg', 'stock' => 50, 'weight' => 2.0, 'size' => 100.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 12, 'description' => 'タコはプリプリした食感が特徴で、酢の物、たこ焼き、刺身などさまざまな料理に使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 01:40:11', 'updated_at' => '2025-02-23 01:40:11'],
        //     ['id' => 59, 'name' => 'マダコ', 'product_price' => 3800, 'product_image' => 'マダコ.jpg', 'stock' => 2, 'weight' => 3.0, 'size' => 100.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 13, 'description' => '日本で最もポピュラーなタコで、プリプリした食感と甘みのある味が特徴。たこ焼き、酢の物、刺身、煮物など様々な料理に使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:21:43', 'updated_at' => '2025-02-23 02:21:43'],
        //     ['id' => 60, 'name' => 'アオリイカ', 'product_price' => 5000, 'product_image' => 'アオリイカ.jpg', 'stock' => 10, 'weight' => 2.0, 'size' => 70.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 12, 'description' => 'アオリイカはその肉厚で甘みのある身が特徴です。刺身やイカ焼き、天ぷらなどさまざまな料理に最適です。', 'user_id' => 2, 'created_at' => '2025-02-23 02:24:14', 'updated_at' => '2025-02-23 02:24:14'],
        //     ['id' => 61, 'name' => 'カレイ', 'product_price' => 3000, 'product_image' => 'カレイ.jpg', 'stock' => 30, 'weight' => 2.0, 'size' => 60.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 13, 'description' => 'カレイは淡泊な味わいと繊細な身質が特徴の魚で、煮付けや焼き物、唐揚げなどで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:27:56', 'updated_at' => '2025-02-23 02:27:56'],
        //     ['id' => 62, 'name' => 'ハマチ', 'product_price' => 3200, 'product_image' => 'ハマチ.jpg', 'stock' => 25, 'weight' => 3.0, 'size' => 70.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => 'ハマチは養殖で育てられることが多く、肉質は柔らかく脂がのっており、刺身や照り焼き、寿司などで人気です。', 'user_id' => 2, 'created_at' => '2025-02-23 02:30:17', 'updated_at' => '2025-02-23 02:30:17'],
        //     ['id' => 63, 'name' => 'タラ', 'product_price' => 2500, 'product_image' => 'タラ.jpg', 'stock' => 30, 'weight' => 4.0, 'size' => 80.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 13, 'description' => 'タラは白身魚で、淡白でクセのない味が特徴です。鍋物やフライ、シチューなどで使われます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:33:02', 'updated_at' => '2025-02-23 02:33:02'],
        //     ['id' => 64, 'name' => 'マグロ', 'product_price' => 5200, 'product_image' => 'マグロ.jpg', 'stock' => 10, 'weight' => 5.0, 'size' => 120.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => 'マグロは世界中で愛されている魚で、その身はしっとりとした食感が特徴です。寿司や刺身でよく食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:35:35', 'updated_at' => '2025-02-23 02:35:35'],
        //     ['id' => 65, 'name' => 'キンメダイ', 'product_price' => 4000, 'product_image' => 'キンメダイ.jpg', 'stock' => 15, 'weight' => 3.0, 'size' => 100.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => 'キンメダイは脂がのり、非常に美味しい魚です。刺身や焼き物、煮付けなどで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:37:57', 'updated_at' => '2025-02-23 02:37:57'],
        //     ['id' => 66, 'name' => 'サーモン', 'product_price' => 2800, 'product_image' => 'サーモン.jpg', 'stock' => 40, 'weight' => 2.0, 'size' => 60.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => 'サーモンはその脂ののった身が特徴で、刺身や寿司、焼き物などで非常に人気があります。', 'user_id' => 2, 'created_at' => '2025-02-23 02:40:00', 'updated_at' => '2025-02-23 02:40:00'],
        //     ['id' => 67, 'name' => 'カンパチ', 'product_price' => 3500, 'product_image' => 'カンパチ.jpg', 'stock' => 25, 'weight' => 3.0, 'size' => 70.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => 'カンパチはその引き締まった身と美味しい脂が特徴で、刺身や寿司、焼き物などで好まれます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:42:04', 'updated_at' => '2025-02-23 02:42:04'],
        //     ['id' => 68, 'name' => 'カツオ', 'product_price' => 2200, 'product_image' => 'カツオ.jpg', 'stock' => 35, 'weight' => 1.5, 'size' => 40.0, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.0, 'sub_category_id' => 11, 'description' => 'カツオは「初鰹」として春に漁獲されることが多く、風味豊かな肉質とさっぱりした味わいが特徴です。刺身やタタキで楽しめます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:44:20', 'updated_at' => '2025-02-23 02:44:20'],
        //     // ['id' => 69, 'name' => 'アナゴ', 'product_price' => 3000, 'product_image' => 'アナゴ.jpg', 'stock' => 20, 'weight' => 1.50, 'size' => 50.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'アナゴは柔らかく甘みのある身が特徴で、寿司や天ぷら、煮物などでよく食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:46:30', 'updated_at' => '2025-02-23 02:46:30'],
        //     //added products later will delete
        //     // ['id' => 70, 'name' => 'ホッケ', 'product_price' => 2800, 'product_image' => 'ホッケ.jpg', 'stock' => 30, 'weight' => 2.00, 'size' => 60.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'ホッケは脂がのっており、焼き物や煮付けで食べられることが多い魚です。', 'user_id' => 2, 'created_at' => '2025-02-23 02:48:45', 'updated_at' => '2025-02-23 02:48:45'],
        //     // ['id' => 71, 'name' => 'シマアジ', 'product_price' => 4500, 'product_image' => 'シマアジ.jpg', 'stock' => 15, 'weight' => 2.50, 'size' => 70.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 11, 'description' => 'シマアジは高級魚として知られ、その身は引き締まり、甘みがあります。刺身や寿司で食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:51:10', 'updated_at' => '2025-02-23 02:51:10'],
        //     // ['id' => 72, 'name' => 'メバル', 'product_price' => 3200, 'product_image' => 'メバル.jpg', 'stock' => 25, 'weight' => 1.50, 'size' => 40.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'メバルは白身魚で、淡白な味わいが特徴です。煮付けや塩焼きで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:53:25', 'updated_at' => '2025-02-23 02:53:25'],
        //     // ['id' => 73, 'name' => 'カワハギ', 'product_price' => 3800, 'product_image' => 'カワハギ.jpg', 'stock' => 20, 'weight' => 1.00, 'size' => 30.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 13, 'description' => 'カワハギはその肝が美味しいことで知られ、刺身や鍋物で食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:55:40', 'updated_at' => '2025-02-23 02:55:40'],
        //     // ['id' => 74, 'name' => 'アワビ', 'product_price' => 8000, 'product_image' => 'アワビ.jpg', 'stock' => 10, 'weight' => 1.00, 'size' => 15.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'アワビは高級食材として知られ、その身は柔らかく、甘みがあります。刺身や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 02:58:00', 'updated_at' => '2025-02-23 02:58:00'],
        //     // ['id' => 75, 'name' => 'サザエ', 'product_price' => 3500, 'product_image' => 'サザエ.jpg', 'stock' => 15, 'weight' => 1.00, 'size' => 10.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'サザエはその独特の食感と風味が特徴で、刺身や壺焼きで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:00:15', 'updated_at' => '2025-02-23 03:00:15'],
        //     // ['id' => 76, 'name' => 'ホタテ', 'product_price' => 3000, 'product_image' => 'ホタテ.jpg', 'stock' => 20, 'weight' => 1.50, 'size' => 15.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'ホタテはその甘みと柔らかい身が特徴で、刺身やバター焼きで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:02:30', 'updated_at' => '2025-02-23 03:02:30'],
        //     // ['id' => 77, 'name' => 'ウニ', 'product_price' => 6000, 'product_image' => 'ウニ.jpg', 'stock' => 10, 'weight' => 0.50, 'size' => 5.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'ウニは濃厚な味わいが特徴で、寿司や刺身で食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:04:45', 'updated_at' => '2025-02-23 03:04:45'],
        //     // ['id' => 78, 'name' => 'イクラ', 'product_price' => 4000, 'product_image' => 'イクラ.jpg', 'stock' => 30, 'weight' => 0.20, 'size' => 2.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'イクラはサケの卵で、そのプチプチとした食感と甘みが特徴です。寿司や丼物で食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:07:00', 'updated_at' => '2025-02-23 03:07:00'],
        //     // ['id' => 79, 'name' => 'タラコ', 'product_price' => 3500, 'product_image' => 'タラコ.jpg', 'stock' => 25, 'weight' => 0.30, 'size' => 3.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'タラコはスケトウダラの卵で、その濃厚な味わいが特徴です。寿司やパスタで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:09:15', 'updated_at' => '2025-02-23 03:09:15'],
        //     // ['id' => 80, 'name' => 'カキ', 'product_price' => 2800, 'product_image' => 'カキ.jpg', 'stock' => 40, 'weight' => 1.00, 'size' => 10.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'カキはそのクリーミーな身と濃厚な味わいが特徴で、生食やフライで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:11:30', 'updated_at' => '2025-02-23 03:11:30'],
        //     // ['id' => 81, 'name' => 'アカガイ', 'product_price' => 3200, 'product_image' => 'アカガイ.jpg', 'stock' => 20, 'weight' => 1.00, 'size' => 8.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'アカガイはその甘みと柔らかい身が特徴で、刺身や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:13:45', 'updated_at' => '2025-02-23 03:13:45'],
        //     // ['id' => 82, 'name' => 'ハマグリ', 'product_price' => 3000, 'product_image' => 'ハマグリ.jpg', 'stock' => 25, 'weight' => 1.00, 'size' => 6.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'ハマグリはその甘みと風味が特徴で、吸い物や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:16:00', 'updated_at' => '2025-02-23 03:16:00'],
        //     // ['id' => 83, 'name' => 'シジミ', 'product_price' => 1500, 'product_image' => 'シジミ.jpg', 'stock' => 50, 'weight' => 0.50, 'size' => 3.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'シジミはその風味豊かな味わいが特徴で、味噌汁や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:18:15', 'updated_at' => '2025-02-23 03:18:15'],
        //     // ['id' => 84, 'name' => 'アサリ', 'product_price' => 2000, 'product_image' => 'アサリ.jpg', 'stock' => 40, 'weight' => 0.50, 'size' => 4.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'アサリはその甘みと風味が特徴で、味噌汁やパスタで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:20:30', 'updated_at' => '2025-02-23 03:20:30'],
        //     // ['id' => 85, 'name' => 'ムール貝', 'product_price' => 2500, 'product_image' => 'ムール貝.jpg', 'stock' => 30, 'weight' => 1.00, 'size' => 8.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'ムール貝はその濃厚な味わいが特徴で、ワイン蒸しやパスタで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:22:45', 'updated_at' => '2025-02-23 03:22:45'],
        //     // ['id' => 86, 'name' => 'ホンビノスガイ', 'product_price' => 2800, 'product_image' => 'ホンビノスガイ.jpg', 'stock' => 20, 'weight' => 1.00, 'size' => 10.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'ホンビノスガイはその甘みと風味が特徴で、刺身や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:25:00', 'updated_at' => '2025-02-23 03:25:00'],
        //     // ['id' => 87, 'name' => 'バカガイ', 'product_price' => 3000, 'product_image' => 'バカガイ.jpg', 'stock' => 25, 'weight' => 1.00, 'size' => 8.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'バカガイはその甘みと柔らかい身が特徴で、刺身や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:27:15', 'updated_at' => '2025-02-23 03:27:15'],
        //     // ['id' => 88, 'name' => 'アオヤギ', 'product_price' => 3200, 'product_image' => 'アオヤギ.jpg', 'stock' => 20, 'weight' => 1.00, 'size' => 10.00, 'day_of_caught' => '2025-02-23', 'expiration_date' => '2025-02-28', 'discount' => 0.00, 'sub_category_id' => 14, 'description' => 'アオヤギはその甘みと風味が特徴で、刺身や酒蒸しで食べられます。', 'user_id' => 2, 'created_at' => '2025-02-23 03:29:30', 'updated_at' => '2025-02-23 03:29:30'],
        //     // //added products later will delete
        // ];

        // $products = [['name' => 'スルメ', 'product_price' => 127.5, 'product_image' => 'スルメ/スルメ.jpg', 'stock' => 124, 'description' => '対馬のスルメは、対馬周辺で獲れるイカを使って作られる乾燥スルメのことです。脂がのっており、肉厚でしっかりとした食感からその品質の高さと風味の良さで知られております。そのまま、焼き、天ぷら等の料理だけではなく、贈り物やお土産としても人気があります。']];

        // $statuses = ["pending","approved"];

        foreach ($product_names as $index => $product) {
            
            Product::create([
                'name' => $product,
                'product_price' => 127.5,
                'product_image' => $product."/".$product.".jpg",
                'stock' => (int) $product_units[$index],
                'description' => $product_descriptions[$index],
                'user_id' => $this->faker->randomElement($user_ids ?? [2]),
                'sub_category_id' => $index + 1,
                'status' => 'approved'
            ]);
        }
    }
}
