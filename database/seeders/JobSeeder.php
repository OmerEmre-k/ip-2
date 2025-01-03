<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    public function run()
    {
        DB::table('jobs')->insert([
            ['title' => 'Yazılım Mühendisi', 'description' => 'Yazılım çözümleri geliştirin ve bakımını yapın.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Veri Bilimci', 'description' => 'Karmaşık verileri analiz edin ve yorumlayın.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Proje Yöneticisi', 'description' => 'Proje ekiplerini başarılı teslimatlara yönlendirin.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Dijital Pazarlama Uzmanı', 'description' => 'Dijital pazarlama kampanyalarını planlayın ve yürütün.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Sistem Yöneticisi', 'description' => 'Sistem altyapısını yönetin ve optimize edin.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'UI/UX Tasarımcısı', 'description' => 'Kullanıcı dostu ve etkileyici tasarımlar oluşturun.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'İnsan Kaynakları Uzmanı', 'description' => 'Şirketin işe alım süreçlerini yönetin.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Satış Temsilcisi', 'description' => 'Müşteri ilişkilerini yönetin ve satış hedeflerini karşılayın.', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Mobil Uygulama Geliştirici', 'description' => 'Mobil platformlar için yenilikçi uygulamalar geliştirin.', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}

