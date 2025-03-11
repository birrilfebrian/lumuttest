## Inisiasi database
saat mengclone website ini jalankan perintah command dibawah ini dan pastikan berada di folder clone yang benar
```
php artisan migrate
```
untuk menginisiasi database

## Akun
pada saat migrate tentu isi dari data tidak ada oleh karena itu untuk membuat akun pertama kali bisa menjalankan command prompt ini
```
php artisan tinker
```
lalu 
```
use App\Models\Account;
Account::create([
    'username' => 'admin',
    'password' => bcrypt('admin'),
    'name' => 'Admin',
    'role' => 'admin'
]);
```
untuk membuat akun admin dengan role admin dan password admin, setelah itu untuk membuat akun selanjutnya bisa menggunakan dashboard admin


Semoga hal ini dapat membantu bapak/ibu dalam mengetest aplikasi yang saya buat, memang masi banyak sekali kekurangan dalam aplikasi ini dan tentu saya berharap agar bisa menjadi salah satu bagian dalam team anda 
