# Gudang Produk – Fastprint Sync App

Aplikasi ini adalah **web application berbasis Laravel** yang digunakan untuk **mengelola data produk gudang** dengan fitur **sinkronisasi data dari API Fastprint**.  
Data yang disinkronkan akan disimpan ke dalam database dan dikelompokkan berdasarkan **produk, kategori, dan status**.

---

## 🚀 Tech Stack

- **Laravel** 10.10  
- **PHP** > 8.1  
- **MySQL** 8  
- **Composer** 2.2  

---

## 📁 Database Structure

Aplikasi ini menggunakan 3 tabel utama:

- `produk`
- `kategori`
- `status`

Struktur tabel dapat dilihat pada folder:
```
database/migrations
```

---

## ⚙️ How To Run This Project (Local Setup)

Ikuti langkah-langkah berikut agar aplikasi dapat berjalan di local machine.

### 1. Clone Repository
```bash
git clone <repository_url>
cd <project_folder>
```

---

### 2. Install Dependencies
Pastikan Composer sudah ter-install.
```bash
composer install
```

---

### 3. Setup Environment File
Duplikasi file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Konfigurasi aplikasi dan database di file `.env`:

```env
APP_NAME=GudangProduk
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gudang
DB_USERNAME=root
DB_PASSWORD=
```

> Database default bernama **gudang**.  
> Silakan sesuaikan dengan konfigurasi local masing-masing.

---

### 4. Generate Application Key
```bash
php artisan key:generate
```

Perintah ini akan mengisi `APP_KEY` secara otomatis di file `.env`.

---

### 5. Run Database Migration
Pastikan database **sudah dibuat** di MySQL.
```bash
php artisan migrate
```

Perintah ini akan membuat tabel:
- produk
- kategori
- status

---

### 6. Run Application
```bash
php artisan serve
```

Buka browser dan akses:
```
http://localhost:8000
```

---

## 🔄 Sync Data from Fastprint API

Setelah aplikasi berjalan:

1. Akses aplikasi melalui browser
2. Masuk ke halaman **Sync Data**
3. Ikuti langkah-langkah yang tersedia di halaman tersebut
4. Data dari **Fastprint API** akan otomatis:
   - Diambil dari API
   - Diproses
   - Disimpan ke database

---

## 🧪 Troubleshooting

Jika terjadi kendala:

- Pastikan PHP versi ≥ 8.1
- Pastikan MySQL service berjalan
- Pastikan database sudah dibuat
- Bersihkan cache Laravel jika diperlukan:
```bash
php artisan optimize:clear
```

---

## 👨‍💻 Author

Laravel-based application for product warehouse management with Fastprint API integration.

Happy coding 🚀
