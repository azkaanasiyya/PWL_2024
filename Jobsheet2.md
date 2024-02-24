# Jobsheet 2

## Nama : Azka Anasiyya Haris

## Kelas : TI 2F / 06

## NIM : 2241720157

### Praktikum 1 
#### Basic Routing
1. Buka file routes/web.php. Tambahkan sebuah route untuk nomor 1 seperti di bawah
ini
```
use Illuminate\Support\Facades\Route;
Route::get('/hello', function () {
return 'Hello World';
});
```
Hasil:
<img src = .\img\1.png>
Maka akan muncul teks "Hello World" yang merupakan nilai return dari fungsi /hello.

2. Untuk membuat route kedua, tambahkan route /world seperti di bawah ini:
```
use Illuminate\Support\Facades\Route;
Route::get('/world', function () {
return 'World';
});
```
Hasil:
<img src = .\img\2.png>
Ketika URL dijalankan maka akan muncul teks "World" yang merupakan nilai return dari fungsi /world.

3. Selanjutnya, cobalah membuat route ’/’ yang menampilkan pesan ‘Selamat Datang’.
```
Route::get('/', function() {
    return 'Selamat Datang';
});
```
Hasil:
<img src = .\img\3.png>

4. Kemudian buatlah route ‘/about’ yang akan menampilkan NIM dan nama Anda.
```
Route::get('/about', function() {
    return 'NIM: 2241720157 <br> Nama: Azka Anasiyya Haris';
});
```
Hasil:
<img src = .\img\4.png>

#### Route Parameters
1. Kita akan memanggil route /user/{name} sekaligus mengirimkan parameter berupa
nama user $name seperti kode di bawah ini.
```
Route::get('/user/{Azka}', function($name) {
    return 'Nama saya '.$name;
});
```
Hasil:

URL: localhost/PWL_2024/public/user/NamaAnda
<img src = .\img\5.png>
Maka nilai yang kita ketik pada URL akan terinput menjadi nilai dari parameter.

URL: localhost/PWL_2024/public/user/
<img src = .\img\6.png>
Maka halaman tidak akan ditemukan karena pada route /user terdapat parameter yang harus diisi, karena tidak ada nilainya maka akan membuat halaman tidak ditemukan seperti pada gambar diatas. 

2. Suatu route, juga bisa menerima lebih dari 1 parameter seperti kode berikut ini. Route
menerima parameter $postId dan juga $comment.
```
Route::get('/posts/{post1}/comments/{comment5}', function
($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});
```
Hasil:
<img src = .\img\7.png>
Sama seperti sebelumnya, nilai yang kita ketik akan menjadi input dari parameter routenya.

3. Kemudian buatlah route /articles/{id} yang akan menampilkan output “Halaman Artikel
dengan ID {id}”, ganti id sesuai dengan input dari url.
```
Route::get('/articels/{article1234}', function($id) {
    return 'Halaman Artikel dengan ID '.$id;
});
```
Hasil:
<img src = .\img\8.png>

#### Optional Parameters
1. Kita akan memanggil route /user sekaligus mengirimkan parameter berupa nama user
$name dimana parameternya bersifat opsional
```
Route::get('/user/{Azka?}', function($name=null) {
    return 'Nama saya '.$name;
});
```
Hasil:

URL: localhost/PWL_2024/public/user/
<img src = .\img\9.png>
Hasilnya berbeda dengan sebelumnya, jika parameter name tidak ada isinya maka nilainya akan default, yaitu null sehingga halaman akan tetap muncul.

URL: localhost/PWL_2024/public/user/NamaAnda
<img src = .\img\10.png>
Maka nama akan muncul karena nilai parameternya telah terinput pada URL.

2. Ubah kode pada route /user menjadi seperti di bawah ini
```
Route::get('/user/{name?}', function($name='John') {
    return 'Nama saya '.$name;
});
```
Hasil:
<img src = .\img\11.png>
Maka nama yang muncul adalah nilai default dari parameternya yaitu "John".

### Praktikum 2
#### Membuat Controller
1. Setelah sebuah controller telah didefinisikan action, kita dapat menambahkan controller
tersebut pada route. Ubah route /hello menjadi seperti berikut:
```
Route::get(‘/hello’, [WelcomeController::class,’hello’]);
```
Buka browser, tuliskan URL untuk memanggil route tersebut:
localhost/PWL_2024/public/hello. Perhatikan halaman yang muncul dan jelaskan
pengamatan Anda

Hasil:
<img src = .\img\12.png>

2. Modifikasi hasil pada praktikum poin 2 (Routing) dengan konsep controller. Pindahkan
logika eksekusi ke dalam controller dengan nama PageController

Hasil:
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }

    public function about() {
        return 'NIM: 2241720157 <br> Nama: Azka Anasiyya Haris';
    }

    public function articles($id) {
        return 'Halaman Artikel dengan ID '.$id;
    }
}
```

3. Modifikasi kembali implementasi sebelumnya dengan konsep Single Action Controller.
Sehingga untuk hasil akhir yang didapatkan akan ada HomeController,
AboutController dan ArticleController. Modifikasi juga route yang
digunakan.

Hasil:
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }
}
```
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        return 'NIM: 2241720157 <br> Nama: Azka Anasiyya Haris';
    }
}
```
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($id) {
        return 'Halaman Artikel dengan ID '.$id;
    }
}
```

#### Resource Controller
1. Untuk membuatnya dilakukan dengan menjalankan perintah berikut ini di terminal.
```
php artisan make:controller PhotoController --resource
```
Setelah controller berhasil degenerate, selanjutnya harus dibuatkan route agar dapat
terhubung dengan frontend. Tambahkan kode program berikut pada file web.php
```
use App\Http\Controllers\PhotoController;
Route::resource('photos', PhotoController::class);
```
Hasil:
Jalankan cek list route (php artisan route:list)
<img src = .\img\13.png>





