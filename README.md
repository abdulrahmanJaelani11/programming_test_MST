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
<li>Template Stisla</li>
</ul>

Sweetalert digunakan untuk membuat sebuah notifikasi agar lebih menarik <br>
Dompdf digunakan untuk mengkonversi file php menjadi file pdf, sehingga dapat mencetak laporan transaksi dan menyimpanya dalam bentuk pdf

## Cara Penggunaan Aplikasi

Untuk dapat menjalankan aplikasi dengan baik maka bisa di perhatikan pada langkah langkah berikut:

### Langkah-langkah menginput data Transaksi
<ol>
<li>Kunjungi laman http://transaksitest.ezyro.com/</li>
<li>Di halaman Transaksi terdapat beberapa field inputan yang wajid di isi, seperti field Tanggal, Customer, Barang, dan jumlah</li>
<li>Inputkan data data sesuai dengan field inputan yang tertera</li>
<li>Setelah melengkapi field pada form, klik tombol konfirmasi untuk menyimpan barang, maka form yang tadi terisi akan kembali kosong kecuali No Transaksi, Customer dan tanggak tidak akan ter refresh</li>
<li>Setelah itu jika masih ada barang yang akan dibeli maka user bisa menginputkannya kembali di form</li>
<li>jika terdapat kesalahan pada saat menginputkan data maka user bisa mengubah atau menghapus data dengan mengklik tombol yang ada pada tiap tiap kolom</li>
<li>Setelah semua barang yang akan dibeli ditampung pada table, maka klik tombol simpan di bawah tabel untuk menyimpan riwayat dari transaksi</li>
<li>Setelah mengklik tombol simpan maka akan muncul notifikasi yang menginformasikan bahwa transaksi berhasil disimpan, jika user mengklik tombol lihat pada notifikasi maka akan diarahkan pada halaman daftar-transaksi, jika user mengklik tidak makan halaman akan ter refresh</li>
</ol>

### Keterangan mengenai halaman Daftar Transaksi

<ol>
<li>Untuk melihat daftar transaksi yang telah dilakukan maka user bisa mengunjungi laman http://transaksitest.ezyro.com/daftar-transaksi atau bisa dengan mengklik daftar transaksi pada navigasi bar, maka akan diarahkan pada halaman daftar transaksi</li>
<li>Pada halaman daftar-transaksi terdapat sebuah table yang berisi daftar-daftar transaksi yang pernah dilakukan</li>
<li>User juga dapat mencetak table transaksi tersebut dengan mengklik tombol print yang ada di atas table</li>
<li>Selain mencetak user juga dapat menghapus serta melihat detail dari tiap tiap transaksi</li>
</ol>

### Keterangan mengenai halaman Barang

<ol>
<li>Untuk mengatur barang (Menambah/Mengubah/menghapus) maka user bisa mengunjungi laman http://transaksitest.ezyro.com/tambah-barang atau bisa dengan mengklik Barang pada navigasi bar</li>
<li>Pada halaman barang terdapat sebuah table yang berisi daftar-daftar barang yang akan ditampilkan pada form transaksi</li>
<li>User bisa menambahkan data barang yang akan dijual dengan mengklik tombol Tambah barang yang ada di atas table</li>
<li>Kemudian isi field yang ada pada form, lalu klik Simpan</li>
<li>Setelah mengklik tombol simpan maka data akan tersimpan dan table akan seketika ter refresh</li>
<li>Untuk mengubah barang user bisa mengklik tombil warna hijau, maka akan muncul form untuk mengubah</li>
<li>Di form ubah user hanya bisa mengubah nama barang dan harga barang saja tanpa bisa mengubah kode barang</li>
<li>Untuk menghapus barang user bisa mengklik tombol berwarna merah dengan logo sampah, maka data akan terhapus dan table akan seketika ter refresh</li>
</ol>
