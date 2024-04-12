<h1>PHP SEMI MANUAL MIGRATIONS</h1>
<P>ini adalah sebuah kerangka migrations table ke databases berbasis semi ui untuk memudahkan pengembangan aplikasi menggunakan php native walau masih banyak kekurangan dari segi
kemudahan pemakaian hingga pengenalan kerangka yang masih terbilang kurang baik saya selaku developer sudah berusaha membuat kerangka ini se reusable dan semudah mungkin di gunakan 
dengan melengkapi fitur seperti penambahan seeder serta foreigenkey, penanganan kesalahan pada pembuatan table dan pada foreigenkey untuk detail penggunaannya ada di bawah ini.</P>

<big>Struktur file</big>
<p>tetapi sebelum itu mari kita berkenalan dengan struktur atau kerangka file migrations ini</p>

|_ assets                          
.|_ css <br>
..|_ bootstrap <br>
...|_ bootstrap.min.css <br>
..|_ style.css <br>
.|_ js <br>
..|_ bootstrap <br>
...|_ bootstrap.bundle.min.js <br>
...|_ popper.min.js <br>
...|_ fontawesome.min.js <br>
..|_ scripts.js <br>
|_ migrate <br>
.|_ migrate.php <br>
|_ table <br>
.|_ main <br>
..|_ main_obj.php <br>
.|_ 0_table_tablename_example.php <br>
.|_ table_buku.php <br>
.|_ table_koleksipribadi.php <br>
.|_ table_user.php <br>
|_ index.php <br>
|_ migrations.php <br>
koneksi.php <br>

<ul>
  <li>
    <span>koneksi.php</span>
    <p>file ini di gunakan untuk menyambungkan file php yang kita miliki dengan database yang akan kita gunakan sebagai tempat menyimpan table dan data yang kita miliki</p>
  </li>
  <li>
    <span>assets.php</span>
    <p>berisi file pendukung untuk ui atau tampilan yang di gunakan seperti fontawesome bootstrap serta css dan js external lainnya untuk yang spesial berada di file scripts.js karna berisi kode fetching untuk berinteraksi dengan file php yang berisi class migrations tanpa halaman tersebut loading terlebih dahulu</p>
  </li>
  <li>
    <span>migrate</span>
    <p>pada file ini hanya berisi satu file yaitu migrate.php ini adalah file yang menampung semua class serta fungsi yang akan berinteraksi langsung dengan ui karna fetching yang di lakukan oleh js yang sudah di buat tadi akan di arahkan ke file ini di dalam file ini terdapat satu class utama yaitu migrate serta 5 fungsi yaitu create,drop,seeder,fresh dan terakhir constructor untuk penginisialisasi file table nnti serta pengambilan data request body sesuai request yang di minta user </p>
  </li>
  <li>
    <span>table</span>
    <p>pada file ini kita dapat membuat sebuah file table yang di dalam file itu sudah di sediakan tempat untuk mengisi data table yang akan di buat seperti nama table, column dan tipe data serta atribut column user juga tidak perlu susah susah untuk membuat dari awal file table karna saya sudah menyediakan example atau template yang bisa di configurasi dengan mudah menjadi file pendeklarasian table yang di ingin kan ada juga file example lain yang sudah siap di gunakan yaitu ada file table buku,user dan koleksi pribadi untuk user dia memiliki contoh penggunaan seeder dan untuk file kategori dia memiliki contoh penggunaan foreign key dan ada file main yang berisi main_obj.php yang di mana file ini memiliki function function yang bisa mengolah data yang sudah di masukan ke dalam file pendeklarasian table sedemikian rupa hingga terbentuk menjadi code mysql yang padu , reuseble dan mudah di configurasi untuk di query menggunakan sitem pendekatan API </p>
  </li>
  <li>
    <span>index.php</span>
    <p>file yang berisi html tampilan untuk mempermudah menjalankan kerangka migrations ini </p>
  </li>
  <li>
    <span>migrations.php</span>
    <p>file yang berisi nama file dan nama class agar file migrate dalam menginisialisasi file mana saja dan class apa saja yang akan di jalankan saat user mengirimkan request create,drop atau fresh </p>
  </li>
</ul>

<big>Cara penggunaan</big>

![image](https://github.com/nurdiansyahagung10/php_semi_manual_migrations/assets/89456852/291ae8d4-61fe-4f9c-a2c2-c3e51141da9a)

<p>pertama yang harus di lakukan adalah memastikan file yang sudah di ambil dari github ini berada di htdocs xampp lalu kita akan mengkonfigurasi koneksi dan membuat database yang akan kita konfigurasi di file koneksi.php ini, ubah new_php menjadi nama database kalian untuk host, username dan password biarkan saja jika kalian menggunakan xampp yang database nya tidak menggunakan password atau bukan menggunakan database hosting</p>

![image](https://github.com/nurdiansyahagung10/php_semi_manual_migrations/assets/89456852/1b1e2d74-2ff1-45d0-bc94-904df3748c0e)

<p>lalu pergi ke file table dan di sini  saya sudah menyediakan file 0_table_tablename_example.php penamaan angka 0 pada file tersebut hanya bertujuan agar file tersebut selalu terletak di atas file lain untuk penggunaanya bisa kalian copy dulu agar file example ini reuseble atau tetap ada agar bisa di gunakan lagi lalu rename nama file nya menjadi apa saja yang kalian ingin kan contohnya yang sudah saya buat table_buku.php dan di dalam file example nya sudah ada instruksi penggunaanya yang pertama kalian ubah class name nya yang di sana bernama tablename awalnya ini akan kita jadikan menjadi nama table yang akan kita buat contoh di sini saya akan menggantinya menjadi buku karna saya akan membuat table buku lalu kita akan memasukan nama id untuk table buku ini di variable table id dan untuk column lainnya saya masukan di variable table insert di sana juga ada type data dan atribut untuk table id yang bisa di configurasi tetapi untuk defaultnya itu tidak usah di ubah dan untuk seeder data lalu foreign key di sini tidak usah kita ubah ubah karna tidak akan kita gunakan untuk sekarang tetapi jika ingin tahu cara pengguanaannya bisa lihat di file table_user.php untuk penggunaan seeder nya dan untuk penggunaan foreign key nya bisa di lihat di file table_koleksipribadi.php</p>

![image](https://github.com/nurdiansyahagung10/php_semi_manual_migrations/assets/89456852/cb89b1a8-f7f4-4f7f-9fc3-9211b2b1c3fd)

<p>maka akan seperti ini contoh penampilannya yang sudah saya configurasi sesuai keinginan saya untuk detail dari table buku yang ingin saya buat</p>

![image](https://github.com/nurdiansyahagung10/php_semi_manual_migrations/assets/89456852/afeaae56-df76-4d03-ba39-c0293c01b0a4)

<p>selanjutnya pergi ke file migrations.php di sini kita harus mendeklarasikan nama file dan nama class di dalam file ini tepat nya di dalam variable arrag asosiatif $files untuk keynya kita memasukan nama file dan untuk value nya kita memasukan nama class nya atau untuk lebih mudahnya data di kiri kita memasukan nama file tablenya dan untuk di kananya kita memasukan nama class di dalam file table tersebut untuk memasukan nama file tidak usah dengna location filenya karna itu sudah kami urus di file lain </p>

![image](https://github.com/nurdiansyahagung10/php_semi_manual_migrations/assets/89456852/22eec5e4-6437-4bd6-9f3e-e9d6b22fa9a0)

<p>jika sudah pergi ke halaman localhost yang menuju ke file struktur migrations kalian contohnya { localhost/namafileterluar/migrations } di sini di sediakan 3opsi untuk mengcreate semua table mengdrop semua table atau melakukan keduanya secara bersamaan dengan melakukan fresh ini juga di gunakan sebagai penambahan seeder karna pada fresh ini saya menambahkan beberapa penanganan error tambahan dan di sini juga saya sudah menyediakan 2 tema terang dan gelap untuk contohnya kita tekan tombol fresh</p>

![image](https://github.com/nurdiansyahagung10/php_semi_manual_migrations/assets/89456852/cbe6a980-117d-484e-81f9-8b3b537f5b9c)

<P>terakhir walau jika tampilan loading pada atas halaman sudah hilang tunggu sampai notification keterangan migrations muncul hall ini tergantung dari seberapa bagusnya spek laptop untuk menangani pengolahan data tapi walau begitu sampai muncul notification ini tidak akan memakan waktu yang lama dan biasanya hanya akan terjadi di fitur fresh saja dan jika sudah muncul maka tandanya kita sudah berhasil memigrations atau membuat table dari file php ke database dengan konfigurasi nama column yang bisa kita ubah ubah tanpa harus ke halaman admin mysql</P>
