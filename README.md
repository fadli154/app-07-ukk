<h1 align="center">Assets ukk</h1>

<h2 id="download">🔽 Instalasi</h2>

1. Clone repository

```bash
git clone https://github.com/Tofu-TheGreat/dispress.git

cd dispress

composer install

cp .env.example .env
```

2. Konfigurasi database melalui `.env`

```
DB_DATABASE=db_07_ukk
```

3. Migrasi dan symlinks

```bash
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
```

4. Jalankan website

```bash
php artisan serve
```
