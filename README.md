# Aplikasi Transaksi Berbasis web

## Keterangan

Aplikasi transaksi berbasis web ini merupakan aplikasi transaksi sederhana yang berfungsi sebagai tempat di datanya barang pembelian, selain itu dengan adanya aplikasi ini dapat mempermudah user dalam melakukan transaksi, membuat laporan transaksi dan melihat history dari tiap tiap transaksi yang sudah dilakukan.
Untuk bisa memahami lebih jauh mengenai aplikasi ini, silahkan bisa mengunjungi [aplikasinya](http://transaksitest.ezyro.com/).

## Teknologi yang digunakan

Aplikasi Transaksi ini di buat dengan beberapa teknologi, yaitu
<ul>
<li>HTML</li>
<li>CSS</li>
<li>Bootstrap</li>
<li>jQuery</li>
<li>CodeIgniter 4</li>
</ul>

Untuk Membuat tampilan atau desain nya disini saya menggunakan CSS dan sebuah Framework css yaitu Bootstrap, untuk membuat website lebih interacktif saya menggunakan sebuah library javascript yaitu jQuery untuk mempermudah dalam penulisan kode, dan untuk logika pemrograman nya sendiri saya menggunakan sebuah framework PHP yaitu CodeIgniter versi 4 untuk mempermudah saya dalam membangun aplikasi.
Adapun library tambahan yang saya gunakan dalam membangun aplikasi ini, yaitu :

<ul>
<li>Sweetalert</li>
<li>Dompdf</li>
</ul>

Sweetalert digunakan untuk membuat sebuah notifikasi agar lebih menarik <br>
Dompdf digunakan untuk mengkonversi file php menjadi file pdf, sehingga dapat mencetak laporan transaksi dan menyimpanya dalam bentuk pdf

## Cara Penggunaan Aplikasi

Untuk dapat menjalankan aplikasi dengan baik maka bisa di perhatikan pada langkah langkah berikut:

<ol>
<li>Kunjungi laman http://transaksitest.ezyro.com/</li>
<li>Di halaman Transaksi terdapat beberapa field inputan yang wajid di isi, seperti field Tanggal, Customer, Barang, dan jumlah</li>
<li>Inputkan data data sesuai dengan field inputan yang tertera</li>
<li>Setelah melengkapi field pada form, klik tombol konfirmasi untuk menyimpan barang, maka akan muncul sebuah table yang berfungsi untuk menampung beberapa barang yang akan di beli, layaknya keranjang pada toko online </li>
<li>Setelah semua barang yang akan dibeli ditampung pada table, maka klik tombol simpan di bawah tabel untuk menyimpan rincian dari transaksi</li>
</ol>

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
