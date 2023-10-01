<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->delete();

        $defaultData =
            [
                [
                    'id' => 1,
                    'name' => "Giyim & Ayakkabı",
                    'image' => "giyim-ayakkabi.jpg",
                    'seo_link' => 'giyim-ayakkabi',
                    'seo_title' => 'Moda Trendleri - Giyim & Ayakkabı Alışverişi',
                    'seo_description' => 'En son moda trendlerini keşfedin. Yeni sezon giyim ve ayakkabı koleksiyonlarına göz atın. Modayı yakından takip edin!',
                    'seo_keywords' => "moda trendleri, giyim, ayakkabı, alışveriş, online mağaza",
                    'top_menu' => 1,
                    'showcase' => 1,
                    'row' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 2,
                    'name' => "Elektronik",
                    'image' => "elektronik.jpg",
                    'seo_link' => 'elektronik',
                    'seo_title' => 'En İyi Elektronik Ürünler - Teknoloji Alışverişi',
                    'seo_description' => 'En yeni elektronik ürünleri keşfedin. Akıllı telefonlar, tabletler, bilgisayarlar ve daha fazlası. Teknolojiyi yakından deneyimleyin!',
                    'seo_keywords' => "elektronik ürünler, teknoloji, akıllı telefonlar, tabletler, bilgisayarlar, alışveriş",
                    'top_menu' => 1,
                    'showcase' => 1,
                    'row' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 3,
                    'name' => "Ev & Yaşam",
                    'image' => "ev-yasam.jpg",
                    'seo_link' => 'ev-yasam',
                    'seo_title' => 'Ev Dekorasyonu ve Yaşam Ürünleri - Ev Alışverişi',
                    'seo_description' => 'Ev dekorasyonu ve yaşam ürünleri ile evinizi güzelleştirin. Mobilyalar, ev tekstili, mutfak gereçleri ve daha fazlası. Ev alışverişi için doğru adres!',
                    'seo_keywords' => "ev dekorasyonu, yaşam ürünleri, mobilyalar, ev tekstili, mutfak gereçleri, alışveriş",
                    'top_menu' => 1,
                    'showcase' => 1,
                    'row' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 4,
                    'name' => "Anne, Bebek",
                    'image' => "anne-bebek.jpg",
                    'seo_link' => 'anne-bebek',
                    'seo_title' => 'Anne ve Bebek Ürünleri - Anne Bebek Alışverişi',
                    'seo_description' => 'Anne ve bebek ürünleri için en uygun fiyatlarla alışveriş yapın. Bebek giyim, bebek bakım ürünleri ve anne ürünleri için doğru adres!',
                    'seo_keywords' => "anne bebek ürünleri, bebek giyim, bebek bakım ürünleri, anne ürünleri, anne bebek alışverişi",
                    'top_menu' => 1,
                    'showcase' => 1,
                    'row' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 5,
                    'name' => "Kozmetik & Kişisel Bakım",
                    'image' => "kozmetik-kisisel-bakim.jpg",
                    'seo_link' => 'kozmetik-kisisel-bakim',
                    'seo_title' => 'En İyi Kozmetik ve Kişisel Bakım Ürünleri - Güzellik Alışverişi',
                    'seo_description' => 'Cilt bakımı, makyaj ürünleri ve kişisel bakım ürünleri en uygun fiyatlarla burada! Güzelliğinizi ön plana çıkarın!',
                    'seo_keywords' => "kozmetik, kişisel bakım ürünleri, cilt bakımı, makyaj ürünleri, güzellik alışverişi",
                    'top_menu' => 1,
                    'showcase' => 1,
                    'row' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 6,
                    'name' => "Mücevher & Saat",
                    'image' => "mucevher-saat.jpg",
                    'seo_link' => 'mucevher-saat',
                    'seo_title' => 'Mücevher ve Saat Modelleri - Takı ve Saat Alışverişi',
                    'seo_description' => 'En şık mücevher ve saat modelleri burada! Takı ve saat alışverişi için en güvenilir adres. Tarzınızı yansıtın!',
                    'seo_keywords' => "mücevher modelleri, saat modelleri, takı alışverişi, saat alışverişi, mücevher ve saat",
                    'top_menu' => 1,
                    'showcase' => 1,
                    'row' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 7,
                    'name' => "Spor & Outdoor",
                    'image' => "spor-outdoor.jpg",
                    'seo_link' => 'spor-outdoor-fUUpc',
                    'seo_title' => 'Spor ve Outdoor Aktiviteler - Spor Malzemeleri ve Ekipmanları',
                    'seo_description' => 'Spor ve outdoor aktiviteleri için en uygun fiyatlarla spor malzemeleri ve ekipmanları burada! Spor yapmanın keyfini çıkarın!',
                    'seo_keywords' => "spor malzemeleri, outdoor aktiviteler, spor ekipmanları, spor alışverişi",
                    'top_menu' => 1,
                    'showcase' => 1,
                    'row' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 8,
                    'name' => "Kitap, Müzik, Film, Oyun",
                    'image' => "kitap-muzik-film.jpg",
                    'seo_link' => 'kitap-muzik-film',
                    'seo_title' => 'Kitap, Müzik, Film ve Oyun Alışverişi - En Yeni Kitaplar ve Popüler Oyunlar',
                    'seo_description' => 'En yeni kitaplar, müzik albümleri, filmler ve oyunlar burada! Kültürel alışverişin tadını çıkarın, en sevdiğiniz içeriklerle buluşun!',
                    'seo_keywords' => "kitap alışverişi, müzik albümleri, film satın al, popüler oyunlar, kültürel alışveriş",
                    'top_menu' => 1,
                    'showcase' => 1,
                    'row' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 9,
                    'name' => "Bilet, Tatil & Eğlence",
                    'image' => "bilet-tatil-eglence.jpg",
                    'seo_link' => 'bilet-tatil-eglence',
                    'seo_title' => 'Bilet, Tatil ve Eğlence Rezervasyonları - Konser, Tatil ve Etkinlik Biletleri',
                    'seo_description' => 'En popüler konserlerden tatil destinasyonlarına, etkinlik biletlerinden tur rezervasyonlarına kadar her şey burada! Unutulmaz anılar için yerinizi şimdi ayırtın!',
                    'seo_keywords' => "konser biletleri, tatil rezervasyonları, etkinlik biletleri, tur rezervasyonları, eğlence etkinlikleri",
                    'top_menu' => 1,
                    'showcase' => 1,
                    'row' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'id' => 10,
                    'name' => "Otomotiv & Motosiklet",
                    'image' => "otomotiv-motosiklet.jpg",
                    'seo_link' => 'otomotiv-motosiklet',
                    'seo_title' => 'Otomotiv ve Motosiklet Aksesuarları - Araba ve Motosiklet Yedek Parçaları',
                    'seo_description' => 'Araç ve motosiklet tutkunları için her şey burada! En yeni otomotiv aksesuarlarından yedek parçalara kadar geniş ürün yelpazesiyle sizi bekliyoruz.',
                    'seo_keywords' => "otomotiv aksesuarları, motosiklet yedek parçaları, araba bakım ürünleri, otomotiv alışverişi, motosiklet aksesuarları",
                    'top_menu' => 1,
                    'showcase' => 1,
                    'row' => 0,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ];

        Category::query()->insert($defaultData);
    }
}
