<h1>PHP SEMI MANUAL MIGRATIONS</h1>
<P>ini adalah sebuah kerangka migrations table ke databases berbasis semi ui untuk memudahkan pengembangan aplikasi menggunakan php native walau masih banyak kekurangan dari segi
kemudahan pemakaian hingga pengenalan kerangka yang masih terbilang kurang baik saya selaku developer sudah berusaha membuat kerangka ini se reusable dan semudah mungkin di gunakan 
dengan melengkapi fitur seperti penambahan seeder serta foreigenkey, penanganan kesalahan pada pembuatan table dan pada foreigenkey untuk detail penggunaannya ada di bawah ini.</P>

<big>Struktur file</big>
<p>tetapi sebelum itu mari kita berkenalan dengan struktur atau kerangka file migrations ini</p>

|_ assets                          
.|_ css <br>
. |_ bootstrap <br>
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
  <li
    <span>assets.php</span>
    <p>berisi file pendukung untuk ui atau tampilan yang di gunakan seperti fontawesome bootstrap serta css dan js external lainnya untuk yang spesial berada di file scripts.js karna berisi kode fetching untuk berinteraksi dengan file php yang berisi class migrations tanpa halaman tersebut loading terlebih dahulu</p>
  </li>
  <li>
    <span>migrate</span>
    <p>pada file ini hanya berisi satu file yaitu migrate.php ini adalah file yang menampung semua class serta fungsi yang akan berinteraksi langsung dengan ui karna fetching yang di lakukan oleh js yang sudah di buat tadi akan di arahkan ke file ini di dalam file ini terdapat satu class utama yaitu migrate serta 5 fungsi yaitu create,drop,seeder,fresh dan terakhir constructor untuk penginisialisasi file table nnti serta pengambilan data request body sesuai request yang di minta user </p>
  </li>
  <li>
    <span>table</span>
    <p>pada file ini kita dapat membuat sebuah file table yang di dalam file itu sudah di sediakan tempat untuk mengisi data table yang akan di buat seperti nama table, column dan tipe data serta atribut column user juga tidak perlu susah susah untuk membuat dari awal file table karna saya sudah menyediakan example atau template yang bisa di configurasi dengan mudah menjadi file pendeklarasian table yang di ingin kan ada juga file main yang berisi main_obj.php yang di mana file ini memiliki function function yang bisa mengolah data yang sudah di masukan ke dalam file pendeklarasian table sedemikian rupa hingga terbentuk menjadi code mysql yang padu , reuseble dan mudah di configurasi untuk di query </p>
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

