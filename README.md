# Laravel Job Application Management System

Bu proje, kullanıcıların iş ilanlarını görüntüleyebileceği ve iş başvurusu yapabileceği bir iş başvuru yönetim sistemi olarak tasarlanmıştır.

## Özellikler

- Laravel 9.x framework ile geliştirildi.
- Kullanıcılar iş ilanlarını görüntüleyebilir ve başvuru yapabilir.
- Başvuru bilgilerinin yönetimi için bir veritabanı ile entegre.

## Gereksinimler

- PHP >= 8.0
- Composer
- MySQL veya MariaDB
- Laravel 9.x

## Kurulum

1. Depoyu klonlayın:
    ```bash
    git clone https://github.com/OmerEmre-k/laravel-job-applications.git
    ```

2. Proje dizinine gidin:
    ```bash
    cd laravel-job-applications
    ```

3. Bağımlılıkları yükleyin:
    ```bash
    composer install
    ```

4. `.env` dosyasını yapılandırın ve veritabanı bilgilerini girin.

5. Veritabanını oluşturun ve migrasyonları çalıştırın:
    ```bash
    php artisan migrate
    ```

6. Uygulamayı başlatın:
    ```bash
    php artisan serve
    ```

## Kullanım

- Uygulamayı çalıştırarak iş ilanlarını görüntüleyebilir ve başvuruları yönetebilirsiniz.

---

### Veritabanı Şablonları için README  

```markdown
# Job Application Database Schema

Bu repository, Laravel projesi için kullanılan veritabanı şemasını ve migrasyon dosyalarını içerir.

## İçerik

- **Migrasyon Dosyaları**: Veritabanı yapısını tanımlamak için kullanılır.
- **Seeders**: Örnek veriler eklemek için kullanılır.

## Kullanım

1. Bu repository'i klonlayın:
    ```bash
    git clone https://github.com/kullaniciAdi/job-application-database.git
    ```

2. Laravel projenizde `database/migrations` ve `database/seeders` dizinlerine ekleyin.

3. Migrasyonları çalıştırmak için:
    ```bash
    php artisan migrate
    ```

4. Örnek veriler eklemek için:
    ```bash
    php artisan db:seed
    ```

## Veritabanı Yapısı

- **Tables**:
  - `users`: Kullanıcı bilgileri.
  - `jobs`: İş ilanları.
  - `applications`: Başvuru detayları.
  - `skills`: Beceriler.
  - Diğer gerekli tablolar...

## Katkıda Bulunma

Bu şemayı iyileştirmek için katkıda bulunabilirsiniz:
1. Depoyu çatallayın.
2. Değişiklikleri yapıp commit edin.
3. Pull request açın.
