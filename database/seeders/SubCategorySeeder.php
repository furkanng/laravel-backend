<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("sub_categories")->delete();

        $defaultData =
            [
                [
                    'id' => 1,
                    'name' => "Erkek Giyim & Aksesuar",
                    "category_id" => 1,
                    'seo_link' => 'erkek-giyim-aksesuar',
                    "seo_title" => 'erkek-giyim-aksesuar',
                    "seo_description" => 'erkek giyim ve aksesuar koleksiyonları. Modayı yakından takip eden erkekler için en şık giyim ve aksesuar ürünleri. En son trendleri keşfedin!',
                    "seo_keywords" => "erkek giyim, erkek aksesuar, moda trendleri, şık erkek giysileri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 2,
                    'name' => "Kadın Giyim & Aksesuar",
                    "category_id" => 1,
                    'seo_link' => 'kadin-giyim-aksesuar',
                    "seo_title" => 'kadin-giyim-aksesuar',
                    "seo_description" => 'kadın giyim ve aksesuar koleksiyonları. Kadınların tarzını yansıtan giyim ve aksesuar seçenekleri. En son moda trendleriyle şıklığı yakalayın!',
                    "seo_keywords" => "kadın giyim, kadın aksesuar, moda trendleri, zarif kadın elbiseleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 3,
                    'name' => "Ayakkabı & Çanta",
                    "category_id" => 1,
                    'seo_link' => 'ayakkabi-canta',
                    "seo_title" => 'ayakkabi-canta',
                    "seo_description" => 'ayakkabılar ve çantalar. Ayağınızdaki şıklığı tamamlayan ayakkabılar ve uyumlu çantalar. Tarzınıza uygun seçenekler sizi bekliyor!',
                    "seo_keywords" => "ayakkabı, çanta, moda, şık ayakkabı modelleri, çanta markaları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 4,
                    'name' => "Çocuk Giyim & Aksesuar",
                    "category_id" => 1,
                    'seo_link' => 'cocuk-giyim-aksesuar',
                    "seo_title" => 'cocuk-giyim-aksesuar',
                    "seo_description" => 'çocuk giyim ve aksesuar koleksiyonları. Çocukların tarzını yansıtan giyim ve aksesuar seçenekleri. En son moda trendleriyle çocuklarınızı şımartın!',
                    "seo_keywords" => "çocuk giyim, çocuk aksesuar, moda trendleri, sevimli çocuk elbiseleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 5,
                    'name' => "Güneş Gözlüğü Modelleri",
                    "category_id" => 1,
                    'seo_link' => 'gunes-gozlugu-modelleri',
                    "seo_title" => 'gunes-gozlugu-modelleri',
                    "seo_description" => 'güneş gözlüğü modelleri. Modaya uygun ve göz sağlığınızı koruyan güneş gözlükleri seçenekleri. Stilinizi tamamlayın!',
                    "seo_keywords" => "güneş gözlüğü, güneş gözlüğü modelleri, güneş gözlüğü markaları, güneş gözlüğü fiyatları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 6,
                    'name' => "Telefon & Aksesuarları",
                    "category_id" => 2,
                    'seo_link' => 'telefon-aksesuarlar',
                    "seo_title" => 'telefon-aksesuarlar',
                    "seo_description" => 'telefon aksesuarları. En son teknolojiye uygun telefon kılıfları, şarj cihazları ve diğer aksesuar seçenekleri. Teknolojiyi tarzınızla birleştirin!',
                    "seo_keywords" => "telefon aksesuarları, telefon kılıfı, şarj cihazı, kulaklık, teknoloji aksesuarları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 7,
                    'name' => "Bilgisayar Modelleri",
                    "category_id" => 2,
                    'seo_link' => 'bilgisayar-modelleri',
                    "seo_title" => 'bilgisayar-modelleri',
                    "seo_description" => 'bilgisayar modelleri. En son teknolojiye uygun dizüstü ve masaüstü bilgisayar seçenekleri. Güçlü performans, şık tasarım!',
                    "seo_keywords" => "bilgisayar modelleri, dizüstü bilgisayar, masaüstü bilgisayar, bilgisayar fiyatları, en son teknoloji",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 8,
                    'name' => "Televizyon & Ses Sistemleri",
                    "category_id" => 2,
                    'seo_link' => 'televizyon-ses-sistemleri',
                    "seo_title" => 'televizyon-ses-sistemleri',
                    "seo_description" => 'televizyon modelleri ve ses sistemleri. Yüksek çözünürlük, net ses kalitesi. Ev sineması deneyimini yaşayın!',
                    "seo_keywords" => "televizyon modelleri, ses sistemleri, ev sineması, 4K televizyon, ses sistemi fiyatları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 9,
                    'name' => "Elektrikli Ev Aletleri",
                    "category_id" => 2,
                    'seo_link' => 'elektrikli-ev-aletleri',
                    "seo_title" => 'elektrikli-ev-aletleri',
                    "seo_description" => 'elektrikli ev aletleri. Pratik ve kullanışlı mutfak aletleri, temizlik robotları ve daha fazlası. Ev işlerinizi kolaylaştırın!',
                    "seo_keywords" => "elektrikli ev aletleri, mutfak aletleri, temizlik robotları, elektrikli süpürge, pratik ev aletleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 10,
                    'name' => "Beyaz Eşya Modelleri",
                    "category_id" => 2,
                    'seo_link' => 'beyaz-esya-modelleri',
                    "seo_title" => 'beyaz-esya-modelleri',
                    "seo_description" => 'beyaz eşya modelleri. Enerji tasarruflu buzdolapları, çamaşır makineleri ve bulaşık makineleri. Modern teknolojiyle donatılmış beyaz eşyalar!',
                    "seo_keywords" => "beyaz eşya modelleri, enerji tasarruflu beyaz eşya, buzdolabı, çamaşır makinesi, bulaşık makinesi, beyaz eşya fiyatları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 11,
                    'name' => "Fotoğraf & Kamera Modelleri",
                    "category_id" => 2,
                    'seo_link' => 'fotograf-kamera-modelleri',
                    "seo_title" => 'fotograf-kamera-modelleri',
                    "seo_description" => 'fotoğraf makineleri ve kameralar. Yüksek çözünürlük, profesyonel fotoğrafçılık için ideal seçenekler. En son teknolojiyle fotoğrafçılığın keyfini çıkarın!',
                    "seo_keywords" => "fotoğraf makineleri, kamera modelleri, dijital kameralar, aynasız fotoğraf makineleri, profesyonel fotoğraf ekipmanları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 12,
                    'name' => "Mobilya Modelleri",
                    "category_id" => 3,
                    'seo_link' => 'mobilya-modelleri',
                    "seo_title" => 'mobilya-modelleri',
                    "seo_description" => 'mobilya modelleri. Modern ve şık tasarımlar, dayanıklı malzemeler. Ev dekorasyonunuza uygun mobilyaları keşfedin!',
                    "seo_keywords" => "mobilya modelleri, modern mobilyalar, oturma grupları, yatak odası takımları, yemek odası mobilyaları, mobilya fiyatları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 13,
                    'name' => "Dekorasyon & Aydınlatma Ürünleri",
                    "category_id" => 3,
                    'seo_link' => 'dekorasyon-aydinlatma-urunleri',
                    "seo_title" => 'dekorasyon-aydinlatma-urunleri',
                    "seo_description" => 'Ev dekorasyonu ve aydınlatma için en ürünler. Şık lambalar, dekoratif objeler ve aydınlatma çözümleriyle evinizi aydınlatın ve güzelleştirin!',
                    "seo_keywords" => "dekorasyon ürünleri, aydınlatma ürünleri, lambalar, dekoratif objeler, iç mekan aydınlatma, ev dekorasyonu",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 14,
                    'name' => "Ev Tekstili Modelleri",
                    "category_id" => 3,
                    'seo_link' => 'ev-tekstili-modelleri',
                    "seo_title" => 'ev-tekstili-modelleri',
                    "seo_description" => 'Yumuşak ve şık ev tekstili ürünleri. Yatak örtüleri, perde ve döşeme tekstili. Evinizin konforunu artırın!',
                    "seo_keywords" => "ev tekstili modelleri, yatak örtüsü, perde, döşeme tekstili, ev tekstili markaları, konforlu ev tekstili",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 15,
                    'name' => "Mutfak Gereçleri",
                    "category_id" => 3,
                    'seo_link' => 'mutfak-gerecleri',
                    "seo_title" => 'mutfak-gerecleri',
                    "seo_description" => 'Yenilikçi mutfak gereçleri ve aletleri. Mutfakta işleri kolaylaştıran araçlar. Lezzetli yemekler yapmanın keyfini çıkarın!',
                    "seo_keywords" => "mutfak gereçleri, mutfak aletleri, pişirme araçları, mutfakta kullanışlı ürünler, yemek yapma araçları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 16,
                    'name' => "Banyo & Ev Gereçleri",
                    "category_id" => 3,
                    'seo_link' => 'banyo-ev-gerecleri',
                    "seo_title" => 'Banyo & Ev Gereçleri',
                    "seo_description" => 'Banyo ve ev gereçleri kategorisi, evinizin güzelliğini ve düzenini sağlamak için ihtiyacınız olan ürünleri sunar. ',
                    "seo_keywords" => "banyo gereçleri, ev gereçleri, banyo aksesuarları, temizlik malzemeleri, ev düzenleme ürünleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 17,
                    'name' => "Yapı Market & Bahçe",
                    "category_id" => 3,
                    'seo_link' => 'yapi-market-bahce',
                    "seo_title" => 'Yapı Market & Bahçe',
                    "seo_description" => 'Yapı market ve bahçe kategorisi, evinizi güzelleştirmek ve bahçenizi düzenlemek için gereken her şeyi sunar. ',
                    "seo_keywords" => "yapı market ürünleri, bahçe ürünleri, bahçe mobilyaları, yapı malzemeleri, bahçe düzenleme",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 18,
                    'name' => "Evcil Hayvan Ürünleri",
                    "category_id" => 3,
                    'seo_link' => 'evcil-hayvan-urunleri',
                    "seo_title" => 'Evcil Hayvan Ürünleri',
                    "seo_description" => 'Evcil hayvanlarınız için en yeni ve kaliteli ürünleri bulabileceğiniz kategori. Oyuncaklar, ',
                    "seo_keywords" => "evcil hayvan ürünleri, oyuncaklar, beslenme ürünleri, bakım malzemeleri, kedi köpek ürünleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 19,
                    'name' => "Kırtasiye & Ofis",
                    "category_id" => 3,
                    'seo_link' => 'kirtasiye-ofis',
                    "seo_title" => 'Kırtasiye & Ofis',
                    "seo_description" => 'Kırtasiye ve ofis malzemeleri kategorisi, iş yeriniz ve okulunuz için ihtiyacınız olan kırtasiye ürünlerini ve ofis malzemelerini sunar!',
                    "seo_keywords" => "kırtasiye malzemeleri, ofis malzemeleri, kalem, defter, dosya, okul malzemeleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 20,
                    'name' => "Süpermarket",
                    "category_id" => 3,
                    'seo_link' => 'supermarket',
                    "seo_title" => 'Süpermarket',
                    "seo_description" => 'Süpermarket kategorisi, günlük ihtiyaçlarınız için gereken temel gıda ürünlerini!',
                    "seo_keywords" => "süpermarket alışverişi, gıda alışverişi, taze meyve, sebze, ev malzemeleri, temel gıda ürünleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 21,
                    'name' => "Bebek Bezi & Islak Mendil",
                    "category_id" => 4,
                    'seo_link' => 'bebek-bezi-islak-mendil',
                    "seo_title" => 'Bebek Bezi & Islak Mendil',
                    "seo_description" => 'Bebek bezi ve islak mendil kategorisi, bebek bakımı için ihtiyacınız olan temel ürünleri sunar. !',
                    "seo_keywords" => "bebek bezleri, islak mendiller, bebek bakım ürünleri, bebek hijyen ürünleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 22,
                    'name' => "Bebek Giyim",
                    "category_id" => 4,
                    'seo_link' => 'bebek-giyim',
                    "seo_title" => 'Bebek Giyim',
                    "seo_description" => 'Bebek giyim kategorisi, sevimli ve rahat bebek kıyafetleriyle dolu. Bebek elbiseleri!',
                    "seo_keywords" => "bebek giysileri, bebek kıyafetleri, bebek ayakkabıları, bebek aksesuarları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 23,
                    'name' => "Hamile Giyim",
                    "category_id" => 4,
                    'seo_link' => 'hamile-giyim',
                    "seo_title" => 'Hamile Giyim',
                    "seo_description" => 'Hamile giyim kategorisi, şık ve konforlu hamile kıyafetleriyle dolu. Hamile elbiseleri',
                    "seo_keywords" => "hamile giysileri, hamile kıyafetleri, hamile pantolonları, hamile elbiseleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 24,
                    'name' => "Bebek Arabaları",
                    "category_id" => 4,
                    'seo_link' => 'bebek-arabalar',
                    "seo_title" => 'Bebek Arabaları',
                    "seo_description" => 'Bebek arabaları kategorisi, güvenli ve konforlu bebek arabalarını içerir. Yüksek kaliteli bebek arabaları arasından seçim yapın!',
                    "seo_keywords" => "bebek arabaları, bebek taşıma sistemleri, bebek arabası modelleri, bebek pramları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 25,
                    'name' => "Beslenme & Mama Sandalyesi",
                    "category_id" => 4,
                    'seo_link' => 'beslenme-mama-sandalyesi',
                    "seo_title" => 'Beslenme & Mama Sandalyesi',
                    "seo_description" => 'Bebeğiniz için sağlıklı beslenme ürünleri ve konforlu mama sandalyeleri. En kaliteli beslenme ürünleri seçenekleri burada!',
                    "seo_keywords" => "beslenme ürünleri, mama sandalyesi, bebek beslenmesi, mama sandalyesi modelleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 26,
                    'name' => "Parfüm & Deodorant",
                    "category_id" => 5,
                    'seo_link' => 'parfum-deodorant',
                    "seo_title" => 'Parfüm & Deodorant',
                    "seo_description" => 'Yüksek kaliteli parfüm ve etkili deodorantlarla kendinizi özel hissedin. En sevilen parfüm markaları burada!',
                    "seo_keywords" => "parfüm, deodorant, parfüm markaları, en iyi deodorant",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 27,
                    'name' => "Saç Bakım & Şekillendirme",
                    "category_id" => 5,
                    'seo_link' => 'sac-bakim-sekillendirme',
                    "seo_title" => 'Saç Bakım & Şekillendirme',
                    "seo_description" => 'Saçınıza özel bakım ürünleri ve şık saç şekillendirme araçları. Saçınızı sevdiğiniz gibi şekillendirin!',
                    "seo_keywords" => "saç bakımı, saç şekillendirme, saç bakım ürünleri, saç şekillendirme araçları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 28,
                    'name' => "Yüz & Vücut Bakımı",
                    "category_id" => 5,
                    'seo_link' => 'yuz-vucut-bakim',
                    "seo_title" => 'Yüz & Vücut Bakımı',
                    "seo_description" => 'Cildiniz için özel yüz ve vücut bakım ürünleri. Sağlıklı ve genç görünümlü bir cilt için en kaliteli ürünler burada!',
                    "seo_keywords" => "cilt bakımı, vücut bakımı, cilt temizleme, güzellik ürünleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 29,
                    'name' => "Makyaj",
                    "category_id" => 5,
                    'seo_link' => 'makyaj',
                    "seo_title" => 'Makyaj',
                    "seo_description" => 'Doğal güzellikten dramatik makyaja kadar her tarza uygun makyaj ürünleri. En sevilen makyaj markaları burada!',
                    "seo_keywords" => "makyaj ürünleri, makyaj malzemeleri, makyaj markaları, güzellik ürünleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 30,
                    'name' => "Sağlık & Medikal Ürünler",
                    "category_id" => 5,
                    'seo_link' => 'saglik-medikal-urunler',
                    "seo_title" => 'Sağlık & Medikal Ürünler',
                    "seo_description" => 'Sağlık problemleriniz için özel medikal ürünler. En kaliteli sağlık ürünleri burada!',
                    "seo_keywords" => "medikal ürünler, sağlık ürünleri, sağlık malzemeleri, sağlık cihazları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 31,
                    'name' => "Kadın Bakım Ürünleri",
                    "category_id" => 5,
                    'seo_link' => 'kadin-bakim-urunleri',
                    "seo_title" => 'Kadın Bakım Ürünleri',
                    "seo_description" => 'Saç, cilt ve vücut bakımı için en kaliteli ürünler. Doğal güzelliğinizi ön plana çıkarın!',
                    "seo_keywords" => "kadın bakım ürünleri, güzellik ürünleri, cilt bakımı, saç bakımı",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 32,
                    'name' => "Erkek Bakım Ürünleri",
                    "category_id" => 5,
                    'seo_link' => 'erkek-bakim-urunleri',
                    "seo_title" => 'Erkek Bakım Ürünleri',
                    "seo_description" => 'Erkekler için saç, cilt ve tıraş bakım ürünleri. Kendinizi yeniden keşfedin!',
                    "seo_keywords" => "erkek bakım ürünleri, tıraş ürünleri, cilt bakımı, saç bakımı",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 33,
                    'name' => "Kol Saatleri",
                    "category_id" => 6,
                    'seo_link' => 'kol-saatleri',
                    "seo_title" => 'Kol Saatleri',
                    "seo_description" => 'Zamanı şıklıkla takip edin. En şık ve güvenilir kol saatleri burada!',
                    "seo_keywords" => "kol saatleri, saat modelleri, marka saatler",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 34,
                    'name' => "Takı",
                    "category_id" => 6,
                    'seo_link' => 'taki',
                    "seo_title" => 'Takı',
                    "seo_description" => 'Şıklığınızı tamamlayacak takı modelleri. Her tarza uygun kolye, bilezik, yüzük ve daha fazlası!',
                    "seo_keywords" => "takı, mücevher, kolye, bilezik, yüzük",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 35,
                    'name' => "Spor Giyim",
                    "category_id" => 7,
                    'seo_link' => 'spor-giyim',
                    "seo_title" => 'Spor Giyim',
                    "seo_description" => 'Rahat ve şık spor giyim modelleri. Spor yaparken tarzınızdan ödün vermeyin!',
                    "seo_keywords" => "spor giyim, spor kıyafetler, spor kıyafet markaları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 36,
                    'name' => "Outdoor Giyim",
                    "category_id" => 7,
                    'seo_link' => 'outdoor-giyim',
                    "seo_title" => 'Outdoor Giyim',
                    "seo_description" => 'Doğa ile iç içe giyim tarzı. Outdoor etkinlikler için özel tasarlanmış giysiler!',
                    "seo_keywords" => "outdoor giyim, doğa giyim, trekking giyim, dağcılık giyim",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 37,
                    'name' => "Kitap & Dergi",
                    "category_id" => 8,
                    'seo_link' => 'kitap-dergi',
                    "seo_title" => 'Kitap & Dergi',
                    "seo_description" => 'En yeni kitaplar ve dergiler. Edebiyat dünyasındaki son trendler ve çok daha fazlası!',
                    "seo_keywords" => "kitap, dergi, edebiyat, okuma",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 38,
                    'name' => "Müzik Enstrümanları",
                    "category_id" => 8,
                    'seo_link' => 'muzik-enstrumanlar',
                    "seo_title" => 'Müzik Enstrümanları',
                    "seo_description" => 'En kaliteli müzik enstrümanları. Müzik tutkunlarının vazgeçilmezi!',
                    "seo_keywords" => "müzik enstrümanları, enstrüman, müzik aletleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 39,
                    'name' => "Film",
                    "category_id" => 8,
                    'seo_link' => 'film',
                    "seo_title" => 'Film',
                    "seo_description" => 'En yeni filmler ve film dünyasındaki gelişmeler. Sinema keyfini yaşayın!',
                    "seo_keywords" => "film, sinema, film izleme",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 40,
                    'name' => "Hobi & Oyun",
                    "category_id" => 8,
                    'seo_link' => 'hobi-oyun',
                    "seo_title" => 'Hobi & Oyun',
                    "seo_description" => 'En popüler hobi ürünleri ve oyunlar. Keyifli zaman geçirmek için aradığınız her şey burada!',
                    "seo_keywords" => "hobi, oyun, hobi ürünleri, oyunlar",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 41,
                    'name' => "Bilet",
                    "category_id" => 9,
                    'seo_link' => 'bilet',
                    "seo_title" => 'Bilet',
                    "seo_description" => 'Konser, tiyatro, sinema ve etkinlik biletleri. En popüler etkinliklere biletiniz burada!',
                    "seo_keywords" => "bilet, etkinlik biletleri, konser biletleri, sinema biletleri",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 42,
                    'name' => "Oto Aksesuar",
                    "category_id" => 10,
                    'seo_link' => 'oto-aksesuar',
                    "seo_title" => 'Oto Aksesuar',
                    "seo_description" => 'Araçlarınız için en yeni ve kullanışlı aksesuarlar. Otomobil tutkunlarını bekleyen bir dünya!',
                    "seo_keywords" => "oto aksesuar, araç aksesuarları, otomobil aksesuarları",
                    "status" => 1,
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    'id' => 43,
                    'name' => "Tüm Motosiklet Ürünleri",
                    'category_id' => 10,
                    'seo_link' => 'tum-motosiklet-urunleri',
                    'seo_title' => 'Tüm Motosiklet Ürünleri',
                    'seo_description' => 'En kaliteli motosiklet aksesuarları ve yedek parçaları. Motosiklet tutkunlarının vazgeçilmezi!',
                    'seo_keywords' => 'motosiklet aksesuarları, motosiklet yedek parçaları, motosiklet ürünleri',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ];

        SubCategory::query()->insert($defaultData);
    }
}
