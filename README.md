# Kanvas Kata - Laravel Project

## Deskripsi Proyek
Kanvas Kata adalah sebuah web blog rework dari [Projek Laravel Blog-Post](https://github.com/Reehan242/laravel-blog-post) dengan fitur yang lebih lengkap dan desain yang lebih menarik. Dibuat menggunakan **Laravel**, yang memungkinkan pengguna untuk:
- Melihat, membuat, mengedit, dan menghapus postingan.
- Memberikan like dan comment pada sebuah postingan.
- Mengunggah gambar sebagai thumbnail postingan.
- Login untuk mengakses dashboard pribadi.

## Fitur Utama
- **Autentikasi Pengguna**: Login/logout untuk mengakses fitur khusus user, seperti interaksi posting dan dashboard pribadi.
- **Manajemen Postingan**:  
   - Tambah, edit, dan hapus postingan.  
   - Upload satu gambar sebagai thumbnail.
- **Interaksi Postigan**: 
   - Memberikan komen pada postingan
   - Memberi like pada postingan 
- **Dashboard User**: 
   - Melihat statistic user, seperti total post, total comment, total likes, dsb.
   - Mengelola postingan, seperti membuat , mengubah, dan menghapus post.
   - Melihat daftar postingan yang diberi like, sekaligus link ke post tersebut untuk mempermudah akses.
   - Melihat daftar komen yang dibuat oleh user, serta link ke post yang diberi komen tersebut.
- **Authorization Admin**:  
   - Admin dapat menambah kategori post.
- **Kategori Post**: Postingan dapat dikelompokkan berdasarkan kategori.
  
## Teknologi yang Digunakan
- **Framework**: Laravel 8
- **Database**: MySQL
- **Frontend**: Bootstrap 5
- **Language**: PHP, HTML, CSS, JavaScript

---

## Cara setup projek agar bisa dijalankan
- Pastikan sudah menginstal composer 
- Download projek ini sebagai zip
- Ekstrak file projek
- Di folder projek, buka terminal dan jalankan perintah 'composer install'
- Ubah nama file .env.example menjadi .env
- Pada .env, ubah settingan nya sesuai dengan apa yang akan digunakan (seperti db_name, username, host, password dsb.)
- Jika sudah, projek sudah dapat dijalankan dengan mengetikan artisan command "php artisan serve".

