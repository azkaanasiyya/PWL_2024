# Jobsheet 2

## Nama : Azka Anasiyya Haris

## Kelas : TI 2F / 06

## NIM : 2241720157

### Praktikum 1 : Routing
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

### Praktikum 2 : Controller
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

Pada routes/web.php
```
Route::get('/', [PageController::class,'index']);
Route::get('/about', [PageController::class,'about']);
Route::get('/articles/{id}', [PageController::class,'articles']);
```
Pada /Controller/PageController.php
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
Pada routes/web.php
```
Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/', [HomeController::class,'index']);

Route::get('/about', [AboutController::class,'about']);

Route::get('/articles/{id}', [ArticleController::class,'articles']);
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

### Praktikum 3 : View
#### Membuat View
1. Pada direktori app/resources/views, buatlah file hello.blade.php.
```
<!-- View pada resources/views/hello.blade.php -->
<html>
    <body>
    <h1>Hello, {{ $name }}</h1>
    </body>
</html>
```
View tersebut dapat dijalankan melalui Routing, dimana route akan memanggil View
sesuai dengan nama file tanpa ‘blade.php’.
```
Route::get('/greeting', function () {
return view('hello', ['name' => 'Andi']);
});
```
Hasil:

URL: localhost/PWL_2024/public/greeting
<img src = .\img\14.png>
Maka ketika kita menjalankan URL tersebut akan memanggil fungsi yang mengembalikan view hello yang berisikan statement tersebut.

#### View dalam Direktori
1. Buatlah direktori blog di dalam direktori views dan lakukan perubahan pada route.
```
Route::get('/greeting', function () {
return view('blog.hello', ['name' => 'Azka']);
});
```
Hasil:

Membuat direktori blog
<img src = .\img\15.png>
URL: localhost/PWL_2024/public/greeting
<img src = .\img\16.png>
Berdasarkan praktikum tersebut, jika menggunakan dot(.) maka ketika file yang dipanggil berada dalam folder lain, dot(.) berfungsi untuk mendefinisikan lokasi file hello tersebut berada

#### Menampilkan View dari Controller
1. Buka WelcomeController.php dan tambahkan fungsi baru yaitu greeting.
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function hello() {
        return 'Hello World';
    }

    public function greeting() {
        return view('blog.hello', ['name' => 'Azka']);
    }
}
```
Ubah route /greeting dan arahkan ke WelcomeController pada fungsi greeting.
```
Route::get('/greeting', [WelcomeController::class,
'greeting']);
```
Hasil:

URL: localhost/PWL_2024/public/greeting
<img src = .\img\17.png>
Maka hasil dari perubahan diatas sama seperti hasil sebelumnya, hanya saja kita memanggil file WelcomeController yang terdapat fungsi greeting, maka akan menghasilkan seperti pada gambar tersebut.

#### Meneruskan Data ke View
1. Buka WelcomeController.php dan tambahkan ubah fungsi greeting.
```
class WelcomeController extends Controller
{
    public function hello() {
        return 'Hello World';
    }

    public function greeting(){
        return view('blog.hello') 
        ->with('name','Azka')
        ->with('occupation','Astronaut');
    }
}
```
Ubah hello.blade.php agar dapat menampilkan dua parameter
```
<html>
    <body>
    <h1>Hello, {{ $name }}</h1>
    <h1>You are {{ $occupation }}</h1>
    </body>
</html>
```
Hasil:

URL: localhost/PWL_2024/public/greeting
<img src = .\img\18.png>
Maka dari hasil tersebut telah berhasil menggunakan nilai terhadap variabel pada controller, sehingga nilai dari variabel tersebut diteruskan ke view.

### Soal Praktikum
#### Nomor 1
Jalankan Langkah-langkah Praktikum pada jobsheet di atas. Lakukan sinkronisasi
perubahan pada project PWL_2024 ke Github
<img src = .\img\19.png>

#### Nomor 2
Buatlah project baru dengan nama POS. Project ini merupakan sebuah aplikasi Point of
Sales yang digunakan untuk membantu penjualan.
<img src = .\img\20.png>

#### Nomor 3
Buatlah beberapa route, controller, dan view sesuai dengan ketentuan sebagai berikut.
1. Halaman Home
Menampilkan halaman awal website

Hasil:

Route
```
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class,'index']);
```
Controller
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }
}
```
View
```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Home</title>
</head>
<style>
    body {
        font-family: 'Perpetua', serif;
        color: #d972a7;
        text-align: center;
        background-color: #ded8db;
        padding: 50px;
    }
</style>
<body>
  <h1>Selamat datang di Halaman Home Azka</h1>
  <p><strong>Halaman ini dibuat dengan sederhana seperti kepribadian saya yang anggun dan sederhana.</strong></p>
</body>
</html>
```
Output
<img src = .\img\21.png>

2. Halaman Products
Menampilkan daftar product (route prefix)
/category/food-beverage
/category/beauty-health
/category/home-care
/category/baby-kid

Hasil:

Route
```
use App\Http\Controllers\ProductController;

Route::prefix('category')->group(function() {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});
```
Controller
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function foodBeverage(){
        return view('food');
    }
    public function beautyHealth(){
        return view('beauty');
    }
    public function homeCare(){
        return view('homeC');
    }
    public function babyKid(){
        return view('baby');
    }
}
```
View
```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Product</title>
</head>
<style>
    body {
        font-family: 'Perpetua', serif;
        color: #942c62;
        background-color: #bbb3b7;
        padding: 50px;
        font-size: 25px;
    }
</style>
<body>
    <div style="text-align: center">
        <h1>Category Food Beverage</h1>
    </div>
    <ol>
        <ul><strong>Hewani</strong>
            <li>Daging: Sapi, Babi, Ayam, Kambing, Domba</li>
            <li>Unggas: Ayam, Kalkun, Bebek, Angsa</li>
            <li>Ikan: Salmon, Tuna, Cod</li>
            <li>Telur: Telur ayam, Telur bebek, Telur angsa</li>
            <li>Susu: Susu sapi, Susu kambing, Susu domba</li>
        </ul>
        <ul><strong>Tanaman</strong>
            <li>Buah: Apel, Pisang, Jeruk, Anggur</li>
            <li>Sayur: Brokoli, Wortel, Bayam, Sawi</li>
            <li>Biji: Beras, Gandum, Jagung</li>
            <li>Kacang: Almond, Mente, Walnut</li>
        </ul>
        <ul><strong>Jamur</strong>
            <li>Jamur: kancing, jamur enoki, jamur kuping</li>
            <li>Ragi: Ragi roti, Ragi bir, Ragi anggur</li>
        </ul>
    </ol>
</body>
</html>
```
```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Product</title>
</head>
<style>
    body {
        font-family: 'Perpetua', serif;
        color: #db177c;
        background-color: #211f20;
        padding: 50px;
        font-size: 25px;
    }
</style>
<body>
    <div style="text-align: center">
        <h1>Category Beauty Health</h1>
    </div>
    <ol>
        <ul><strong>Skin Care</strong>
            <li>Cleanser and Toners</li>
            <li>Moisturizers and Serums</li>
            <li>Sunscreen</li>
            <li>Treatments(acne, anti-aging)</li>
            <li>Mask and Peels</li>
        </ul>
        <ul><strong>Hair Care</strong>
            <li>Shampoos and Conditioners</li>
            <li>Styling Products (gels, sprays)</li>
            <li>Hair Treatments (mask, oils)</li>
            <li>Hair Color and Styling Tools</li>
        </ul>
        <ul><strong>Makeup</strong>
            <li>Foundation and Concelare</li>
            <li>Powder and Blush</li>
            <li>Eye Shadow and Liner</li>
            <li>Mascara and Lipstik</li>
        </ul>
    </ol>
</body>
</html>
```
```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Product</title>
</head>
<style>
    body {
        font-family: 'Perpetua', serif;
        color: #ac6c8d;
        background-color: #302e2f;
        padding: 50px;
        font-size: 25px;
    }
</style>
<body>
    <div style="text-align: center">
        <h1>Category Home Care</h1>
    </div>
    <ol>
        <ul><strong>Layanan Kebersihan Rumah</strong>
            <li>Menyapu dan mengepel</li>
            <li>Membersihkan kamar mandi</li>
            <li>Membersihkan dapur</li>
            <li>Mengganti sprei dan sarung bantal</li>
        </ul>
        <ul><strong>Perawatan Ibu dan Bayi</strong>
            <li>Merawat bayi</li>
            <li>Memberikan ASI</li>
            <li>Memantau kesehatan ibu dan bayi</li>
            <li>Mengajari ibu tentang cara merawat bayi</li>
        </ul>
        <ul><strong>Perawatan Luka</strong>
            <li>Membersihkan luka</li>
            <li>Mengganti perban</li>
            <li>Memberikan obat</li>
            <li>Memantau kondisi luka</li>
        </ul>
    </ol>
</body>
</html>
```
```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Product</title>
</head>
<style>
    body {
        font-family: 'Perpetua', serif;
        color: #af879c;
        background-color: #514e50;
        padding: 50px;
        font-size: 25px;
    }
</style>
<body>
    <div style="text-align: center">
        <h1>Category Baby Kid</h1>
    </div>
    <ol>
        <ul><strong>Perlengkapan Bayi Baru Lahir</strong>
            <li>Popok dan tisu basah</li>
            <li>Pakaian</li>
            <li>Selimut dan bedong</li>
            <li>Botol susu dan dot</li>
            <li>Perlengkapan mandi</li>
        </ul>
        <ul><strong>Makanan Bayi</strong>
            <li>Susu formula</li>
            <li>ASI</li>
            <li>Makanan pendamping ASI (MPASI)</li>
            <li>Snack bayi</li>
        </ul>
        <ul><strong>Perlengkapan Menyusui</strong>
            <li>Pompa ASI</li>
            <li>Bantal menyusui</li>
            <li>Dot susu</li>
            <li>Bra menyusui</li>
        </ul>
    </ol>
</body>
</html>
```
Output
<img src = .\img\22.png>
<img src = .\img\23.png>
<img src = .\img\24.png>
<img src = .\img\25.png>

3. Halaman User
Menampilkan profil pengguna (route param)
/user/{id}/name/{name}

Hasil:

Route
```
use App\Http\Controllers\UserController;

Route::get('/user/{id}/name/{name}', [UserController::class, 'index']);
```
Controller
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($id, $name) {
        return view('user', ['id'=>$id, 'name'=>$name]);
    }
}
```
```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman User</title>
</head>
<style>
    body {
        font-family: 'Perpetua', serif;
        color: #eb76b2;
        background-color: #d7d1d4;
        padding: 50px;
        font-size: 25px;
    }
</style>
<body>
    <div style="text-align: center">
        <h1>Halaman Profile</h1>
    </div>
    <ol>
        <ul><strong>Profile User: </strong>
            <li>Id: {{$id}}</li>
            <li>Nama: {{$name}}</li>
            <li>Kelas: TI-2F</li>
            <li>Prodi: D4 Teknik Informatika</li>
            <li>Jurusan: Teknologi Informasi</li>
    </ol>
</body>
</html>
```
Output
<img src = .\img\26.png>

4. Halaman Penjualan
Menampilkan halaman transaksi POS

Hasil:

Route
```
use App\Http\Controllers\PenjualanController;

Route::get('/penjualan', [PenjualanController::class, 'index']);
```
Controller
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index() {
        return view('penjualan');
    }
}
```
View
```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Penjualan</title>
</head>
<style>
    body {
        font-family: 'Perpetua', serif;
        color: #5c0733;
        background-color: #d7d1d4;
        padding: 50px;
        font-size: 25px;
    }
</style>
<body>
    <div style="text-align: center">
        <h1>Halaman Transaksi</h1>
    </div>
    <ol>
        <ul><strong>Transaksi 1: </strong>
            <li>Sabun Mandi</li>
            <li>Sikat Gigi</li>
            <li>Parfume</li>
            <li>Sandal</li>
            <li>Baju</li>
        </ul>
        <ul><strong>Transaksi 2: </strong>
            <li>Mie Instan</li>
            <li>Beras</li>
            <li>Telur</li>
            <li>Kecap</li>
            <li>Minyak Goreng</li>
        </ul>
    </ol>
</body>
</html>
```
Output
<img src = .\img\27.png>

#### Nomor 4
Route tersebut menjalankan fungsi pada Controller yang berbeda di setiap halaman.

#### Nomor 5
Fungsi pada Controller akan memanggil view sesuai halaman yang akan ditampilkan.

#### Nomor 6
Simpan setiap perubahan yang dilakukan pada project POS pada Git, sinkronisasi
perubahan ke Github

Hasil:
<img src = .\img\28.png>








