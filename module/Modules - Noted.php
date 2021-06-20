<?php
/*
 * @Author: ogi.setiawan 
 * @Date: 2021-06-12 21:26:07 
 * @Last Modified by: ogi.setiawan
 * @Last Modified time: 2021-06-12 21:52:22
 */

//@ PENGANTAR AMAZON WEB SERVICE
//! Layanan AWS : Komputasi, Penyimpanan dan Keamanan Jaringan
//!  Komputasi ( Computasi-Cloud )
//? Penggunaan sesuai kebutuhan (on-demand) : Contoh jika tiba2 perlu server tinggal klik, atau perlu memori lebih tinggal klik
//? Submer daya IT : jadi ada layanan yang dibantu seperti Instalasi OS, Update software dll
//? Melalui Internet : dapat akses melalui internet , web / terprogram
//? Contoh : Suatu perusahaan telah berhasil membangun data center untuk menopang kebutuhan website-nya.
//? Setiap hari website tersebut rata-rata diakses oleh 10.000 pengunjung, namun umumnya pada hari minggu jumlahnya hanya 5.000 saja. 
//? Angka ini berubah lagi di hari-hari spesial seperti malam tahun baru ketika tiba-tiba 30.000 pengunjung membanjirinya.
//? Lantas website tersebut pun down beberapa kali. si Komputasi kloud ini bisa ngebantu sesuai permintaan

//! Model Penerepan Komputasi Cloud :
//? Cloud Based Deployment : Aplikasi/Data berbasis cloud sepenuhnya diterapkan di cloud dan semua bagian aplikasi berjalan di cloud.
//? On-premises Deployment ( Lokal ) : Aplikasi/Data yang diterarpkan di private-cloud ( local )
//? Hybrid Deployment : Penggabungan Aplikasi/Data berbasis cloud dan Aplikasi/Data tidak ada di cloud

//! Manfaat dari Komputasi Cloud
//? Mengubah pengeluaran di muka menjadi pengeluaran varible ( membayar untuk sumber daya yang dikonsumsi saja )
//? Menghentikan biaya pengelolaan dan pemeliharaan data center
//? Berhenti menebak kapasitas
//? Manfaatkan skala ekonomi yang masif
//? Tingkatkan kecepatan dan ketangkasan
//? Mendunia dalam hitungan menit

/// -------------------------------------------------------------------------------------------------------------------------------

//@ KOMPUTASI DI CLOUD
//~ Amazon Elastic Compute Cloud ( Amazon EC2 )
//? Layanan yang berbentuk virtual, yg memiliki kapasitas flexibel, hemat biaya, dan cepat dibanding server sendiri di data center

//! Tipe Instance Amazon EC2
//? General purpose instances: memberikan keseimbangan dan sering digunakan untuk berbagai beban kerja ssperti server aplikasi web
//? Compute optimized instances: biasanya dgunakan utk beban kerja batch processing yang membutuhkan banyak proses transaksi
//? Memory optimized instances: memberikan performa tinggi untuk pemroresan kumpulan besar memori
//? Accelerated computing instances: Tipe ini menggunakan perangkat keras akselerator untuk menjalankan beberapa fungsi secara lebih efisien dibandingkan dengan perangkat lunak yang berjalan pada CPU
//? Storage optimized instance: memberikan optimize dlm pengolahan data ( input / outpu )
//! Harga Amazon EC2 

//? On-Demand: sesuai permintaan, bisa dibayar selama object/instance berjalan (detik/jam). ideal untuk jangak pendek/baru mulai.
//? Savings Plans: perencanaan/analisa pemakaian anda di AWS selama 7,30 dll
//? Spot Instances: menggunakan kapasitas komputasi Amazon EC2 yang tak terpakai
//? Dedicated Hosts: tidak ada orang lain yang akan berbagi sewa dari server fisik tersebut. karena menggunakan lisensi

//! Penyesuaian Kapasitas Amazon EC2
//# bisnis tidak menentu jumlah customernya tiap bulan dan biasanya kita menggunakan skala rata2
//# tetapi ketika customer melonjak pada waktu tertentu sumber daya kita kelabakan
//# yaudah kita membeli sumber daya diatas rata2, tetapi ini akan membuat biaya kita menjadi tinggi
//~ Amazon EC2 Auto Scaling ( Penyesuaian kapasitas )
//# terkadang website bsa saja down, karena adanya suatu permintaan lebih dari kapasitas
//# maka dgn EC2 Auto Scaling bsa membuat kapasitas lain jika suatu permintaan lebih tinggi dr biasanya.
//# maka AWS EC2 menjadi solusi karena memiliki auto scaling :
//? Dynamic scaling, yaitu merespons terhadap perubahan permintaan.
//? Predictive scaling, yaitu secara otomatis menjadwalkan jumlah Amazon EC2 instances yang tepat berdasarkan prediksi permintaan.
//? Scaling up artinya menambahkan lebih besar daya pada memori(ram) ( leih besar sumber dayanya )
//? Scaling out artinaya menambahkan lebih banyak daya pada memori(ram) ( lebih banyak sumber dayana)
// #Kesimpulannya, dengan Amazon EC2 Auto Scaling kita bisa menggunakan instance sesuai permintaan, kemudian menonaktifkannya
//~ Auto Scaling Group 
//? Minimum capacity: set capacity saat berjalan/sepi
//? Desired capacity: set capacity saat normal
//? Maximum Capacity: set capacity saat ramai/max

//! Elastic Load Balancing ( Menyimbangkan Beban )
//# Setalah ada fitur penyusaian kapasitas, biasanya suatu permintaan tidak menuju lgsung ke instance yg dtuju,
//# malah terkadang membuat trafic pada instance saja, dan instance yang lain akhirnya nggngur
//# maka dari itu kita perlu host yg dapat mengatur suatu permintaan kepada instance yg minim proses (nganggur )
//? Amazon EC2 terdapat sebuah layanan yang dapat mengatur permintaan agar terdistribusi dengan baik (  load balancer )

//! Messaging dan Queueing
//# misal jika ada suatu permintaan ke instance A yg perlu instance B, tapi jika instance B sedang dalm performa sibuk
//# maka suatu request tersebut memiliki kendala (tidak sinkrong ). jadi harus menunggu instance B smpai normal 
//# dengan menyediakan buffer (antrean pesanan), kita dapat membuat sebuah antrean jika instance B sibuk, instance A tidak perlu
//# menunggu hingga suatu request selesai, tetapi melanjutkan request yang baru / lainya.
//~ Monolithic Application 
//# Misalnya kita punya aplikasi A yang mengirimkan pesan langsung ke aplikasi B. Jika aplikasi B mengalami kegagalan
//# dan tak dapat menerima pesan tersebut, maka aplikasi A pun akan terkena eror juga.
//# Desain aplikasi seperti ini dapat dianggap sebagai pendekatan monolithic application alias aplikasi monolitik, 
//# yaitu saat berbagai komponen digabungkan menjadi satu kesatuan.
//~ Microservicive
//# misal aplikasi A dan diproses oleh aplikasi B. Jika aplikasi B gagal, aplikasi A tidak mengalami gangguan apa pun.
//# Pesan yang dikirim masih dapat dikirim ke antrean dan akan tetap berada di sana sampai akhirnya diproses.
//~ Amazon Simple Queue Service (Amazon SQS)
//? tempat dimana semua pesan beruapa data (payload) ditaro sampai diproses hingga terkirim
//~ Amazon Simple Notification Service (Amazon SNS)
//? mengirimkan pesan ke layanan. Bedanya, ia juga dapat mengirimkan pemberitahuan ke pelanggan. (push notif)

//! Layanan Komputasi Tambahan
//~ Komputasi dengan serverless
//? layanan yang menggunakan tanpa pengelolaan (tanpa server), layanan lain seperti scalling, maintenance sudah automatic
//~ AWS Lamda
//? layanan yang memungkinkan Anda untuk menjalankan kode tanpa harus membuat atau mengelola server.
//#  Jika Anda memiliki 1 atau bahkan 1000 trigger (pemicu) yang masuk untuk memanggil function (fungsi),
//#  Lambda akan melakukan scaling terhadap function tersebut guna memenuhi permintaan.
//? AWS Lamda dirancang menjalankan kode dibawah 15 menit.
//~ Docker Container
//? Docker platform perangkat lunak yg menggunakan virtualisasi untuk menguji (test), deploy dengan cepat.
//? Container cara untuk mengemas kode, konfig dan dependensi 
//~ Amazon Elastic Container Service (Amazon ECS)
//? sistem manajemen container berkinerja tinggi yang dapat memungkinkan Anda untuk menjalankan 
//? dan melakukan scaling terhadap containerized application (aplikasi dalam container) di AWS.
//~ Amazon Elastic Kubernetes Service (Amazon EKS)
//? layanan terkelola sepenuhnya yang dapat Anda gunakan untuk menjalankan Kubernetes di AWS.
//? kubernetes perangkat lunak yang dpat mendeploy, dan mengelola aplikasi dalam kontainter dengan skala besar

//!  KESIMPULAN Setiap layanan dapat Anda gunakan sesuai dengan kebutuhan.
//? Jika Anda ingin menjalankan aplikasi dan menginginkan akses penuh ke sistem operasinya seperti Linux atau Windows, 
//? Anda bisa menggunakan Amazon EC2.
//? Jika Anda ingin menjalankan fungsi yang berjalan singkat, aplikasi berbasis kejadian, dan Anda tak ingin mengelola
//? infrastrukturnya sama sekali, gunakanlah layanan AWS Lambda.
//? Jika Anda ingin menjalankan beban kerja berbasis Docker container di AWS, langkah yang perlu Anda lalui adalah:
//? Anda harus memilih layanan orkestrasinya terlebih dahulu. Anda bisa menggunakan Amazon ECS atau Amazon EKS.
//? Setelah memilih alat orkestrasinya, kemudian Anda perlu menentukan platformnya. 
//? Anda dapat menjalankan container pada EC2 instance yang Anda kelola sendiri 
//? atau dalam lingkungan serverless seperti AWS Fargate yang dikelola oleh AWS.

/// -------------------------------------------------------------------------------------------------------------------------------

//@ Infrastruktur Global dan Keandalan
//! Pengantar Infrasturktur Global dan Kendalaan
//? Kebutuhan : Aplikasi yang harus berjalan, Konten yang disimpan, Data yang perlu dianalisa
//# misal ketika terputus koneksi ke data center, atau ada bencana lainya, maka bisnis akan terhambat
//? di AWS terdapat AWS Region

//! Insrasturktur Global AWS
//~ AWS Region
//? AWS membangun data center di berbagai kota di dunia. setiap region saling terhubung dengan jaringan fiber berkecepatan tinggi
//? 4 faktor bisini dalam pemilihan AWS region:
//? Compilience (kepatuhan): pemilihan region berdasakran suatu autran dari pemerintah 
//? Proximitly (kedekatan): pemilihan region pada suatu region yang berbeda (misal kita di indonesia, sedangkan konsumen di singapur, artinaya pilih reg. singapur)
//? Feature Availability (Ketersediaan Fitur: tidak semua AWS setiap region tidak memiliki fitur lengkap
//? Price : setiap AWS region memiliki harga yang berbeda
//~ Availability Zone
//? satu atau beberapa data center terpisah dengan daya, jaringan, dan konektivitasnya sendiri-sendiri
//# membangun data center di suatu region tidak lah baik, maka AWS memiliki sekolompok data enter yang saling sync.

//! Edge Localtion
//? teknik untuk menyimpan salinan data di cache dengan lokasi yang lebih dekat dgn suatu proses permintaan (CDN)
//? CDN di AWS disebut Amazon CloudFont layanan yang membantu proses pengiriman data lebih cepat.

//! Cara menyediakan Sumber Daya AWS
//~ AWS Management Console
//? antarmuka berbasis browser yang dapat menglola layanan AWS lainya.
//? seperti mencari layanan AWS dari nama, kata kunci dll, membangun lingkungan pengujian, melakukan pantuan, dll
//~ AWS Command Line Interface
//? CLI yang bertujuan untuk meminimalisir dari suatu kesalah UI, klo pakai CLI biasanya kita tidak mungkin sengaja!
//~ AWS Software Development Kit (SDK)
//? layanan yang bisa interaksi dengan bahasa pemrograman (C++,GO,Java,PHP dll)
//~ AWS Elastik Beanstalk
//? layanan yang terkelola (manager service), Cukup unggah kode dan tentukan konfigurasi yang Anda inginkan,
//~ AWS CloudFormation
//? layanan otomatis dan berulang, dengan cara konfigurasi berbasis JSON/YAML (cloudformation template)

/// -------------------------------------------------------------------------------------------------------------------------------

//@ JARINGAN
//! Pengantar Jaringan
//# misal dalam suatu permintaan langsung ke instance B tanpa melewati instance A, 
//# maka membuat suatu instance menjadi publik untuk instance A dan private untuk instace B (hanya diakases oleh req instance A)

//! Konektivitas ke AWS
//~ Amazon Virtual Private Cloud (VPC)
//? jaringan pribadi pada AWS, yang terisolasi dengan menggunakan subnet yang berbeda.
//~ Internet Gateway
//? mengijinkan traffic dari internet public mengalir masuk kedalam VPC. menghubungkan VPC ke internet?
//~ Virtual Private Gateway
//? mengijinkan suatu permintaan masuk jika berasal dari jaringan yang disetujui
//~ AWS Direct Connect
//? suatu koneksi kusus yang dirancang dengan keaman yang dengan tingkat tinggi.
//? koneksi yang privat dan terdedikasi antara data center perusahaan Anda dan AWS/

//! Subnet dan Network Access Control List
//~ Subnet
//? bagian dari VPC (Virtual Private Cloud) yang dpt menjadi publik atau private
//? keduanya bisa saling terhubung, misal subnet publik adlah website toko online dan subnet private untuk databasenya.
//~ Network Access Control List (Network ACL)
//? proses indentifikasi suatu permintaan yang keluar ataupun masuk (contoh petugas passport )
//~ Security Group
//? firewall virtual yang mengontrol/mengijinkan traffic masuk dan keluar untuk Amazon EC2 instance. beda dengan ACL menggunakan subnet 
//? contoh petugas gedung / security
//# contoh kita memiliki 2 instance A dan B
//# setiap instance memiliki security group dan ACL
//# jika kita mengirimkan data/paket ke instance B dari instance A
//# maka kita prosesnya paket diperiksa dulu di instance A untuk keluar melalui securty group dan diperksa oleh ACL
//# setelah ingin masuk ke instance B data/paket diperksa kembali oleh ACL yang dimiliki instance B selnjutnya akan diperiksa lagi
//# oleh security group instance B apakah data/paket tersebut diijinkan masuk

//! Jaringan Global
//? Amazon Route 53 ; layanan DNS yang merutekan pelanggan ke apliksi internet yang ada di AWS anda.
//? Amazon CloudFront : layanan CDN yang dimuat oleh cahce dengan lokasi paling dekat dari suatu permintaan

/// -------------------------------------------------------------------------------------------------------------------------------

//@ PENYIMPANAN DAN DATABASE
//! Instance Store dan Amazon Elastic Block Store (Amazon EBS)
//? Instance store : tempat penyimpanan storage sementara pasa Amazon EC2 Instance
//# cara kerja ketika instance storage djalan degan EC2 Instance maka ketika mati data tidak disimpan
//~ Amazon Elastic Block Store (Amazon EBS)
//? layanan yang menyediakan bock-level storage. yang dapat menyimpan data secara presisten
//# cara kerja ketika EBS storage djalan degan EC2 Instance maka ketika mati data dibackup dan diperbaru degan data terbaru.

//! Amazon Simple Storage (Amazon S3)
//? layanan yang dapat menyimpan dan mengambil data dalam jumlah tak terbatas pada skala apa pun.
//? Amazon S3 merupakan object-level storge. object terdiri dari data,metadata dan key
//? data -> gambar, file, video dll, metadata -> apa informasi di dlm data dan key adalah pengenal uik dari sebuah data
//~ Storage Class 
//? S3 Standart data disimpan 11 sembilan persen tetap utuh dlm satu tahun. class ini dapat menghosting web statis.
//? S3 Standard-Infrequent Access (S3 Standard-IA) ; class untuk menyimpan backup dan penyimpanan dlam jangka panjang
//? S3 One Zone-Infrequent Access (S3 One Zone-IA) ; bedanya untuk menghemat penyimpanan data dan hanya di avalibilty zone.
//? S3 Intelligent-Tiering ; memindahkan secara otomatis jika tidak menggunkan objec selama 30 hari ke S3 Standarti IA
//? S3 Glacier ; biasanya digunakan untuk menyimpan data audit dengan jangka panjang

//! Amazon Elastic File System (Amazon EFS)
//? sistem file terkelola yang bisa diskalakan dan dapat digunakan oleh layanan AWS Cloud dan sumber daya di data center on-premise.
//? EFS juga memungkinkan beberapa instance untuk melakukan proses read (membaca) dan write (menulis) data darinya pada saat bersamaan.
//? Setiap EC2 instance yang berada di Region yang sama dapat menyimpan data ke sistem file Amazon EFS.

//! Amazon Relational Database Service (Amazon RDS)
//? layanan yang menjalankan mesin database management system (RDBMS); amazon aurora, postgreSQL, MySQL, dll
//? kita dapat bermigrasi dari on-premise (data center lokal) ke AWS EC2

//! Amazon DynamoDB
//? hampir sama dengan Amazon RDSm bedanya DynamoDB Database non-reasoninal (non-sql) dan dijalankan database serverless (tanpa server)
//? yaitu sekema dalam stiap table tidak mesti sama

//! Amazon Redshift
//? layanan data warehousing yang dapat Anda gunakan untuk analitik big data. 
//? data warehouse adalah data yang tidak realtime atau data yang digunakan pada waktu tertentu

//! AWS Database Migration Service
//? layanan proses migrasi database ke AWS
//? migrasi homogen: proses migrasi yang bertipe sama sperti skema, struktur dll (homogenous database migration)
//? migratsi heterogeneous : proses migratasi bertipe yang tidak sama, kita menggunakan tool schema convertion tool

//! Layanan Database Tambahan
//? Amazon DocumentDB ;layanan yang dapat membantu Anda untuk menangani manajemen konten, katalog, ataupun profil pengguna.
//? Amazon Neptune ; layanan graph database (database grafik) yang berguna untuk membuat dan menjalankan aplikasi  dengan kumpulan data yang sangat terhubung, seperti social networking (jejaring sosial), recommendation engines  (mesin pemberi rekomendasi), fraud detection (sistem pendeteksi penipuan), dan knowledge graph (grafik pengetahuan: kumpulan deskripsi yang saling terkait dari entitas)
//? Amazon Managed Blockchain ; sistem ledger (kumpulan catatan riwayat aktivitas) terdistribusi yang memungkinkan banyak pihak menjalankan transaksi dan berbagi data tanpa otoritas pusat.
//? Amazon Quantum Ledger Database (Amazon QLDB) ; sistem pencatatan yang immutable di mana entri apa pun tidak akan pernah bisa dihapus dari audit
//~ Akaselator Database 
//? Amazon ElastiCache : menambah lapisan cache pada db, yang bsa meningkatkan read time wakty baca.
//? Amazon DynamoDB Accelerator (DAX) : meningkatkan waktu baca pada db nonreasonial 

/// -------------------------------------------------------------------------------------------------------------------------------

//@ KEAMANAN
//! Pengenalan Keamanan 
//? shared responsibility model : model tanggung jawab bersama
//? AWS mengontrol security of the cloud (keamanan dari cloud) dan Pelanggan mengontrol security in the cloud (keamanan di cloud)

//! Shared Responsibility Model
//? Customer bertanggung jawab atas data, appliacation dan operating system
//? AWS bertanggung jawab Hypervisior, network dan physical

//! Perizinan dan Hak Akses Pengguna
//~ AWS Identity and Access Management (AWS IAM) 
//? AWS IAM adalah layanan yang dapat mengontrol akses secara detail

//~ Fitur IAM
//? IAM Users ; Ia mewakili orang (personal) yang berinteraksi dengan layanan dan sumber daya AWS. tetapi perlu ijin untuk mengakses layanan lainya di AWS
//? IAM Policies; doc JSON yang mengizinkan atau menolak aktivitas tertentu terhadap layanan dan sumber daya AWS.
//? IAM Groups; grup/kelompok yang berisi kumpulan dari user
//? IAM Roles; permission yang dapat mengizinkan tindakan tertentu yang dibutuhkan secara temporer atau sementara

//! AWS Organizations
//? lokasi sentral yang dapat mengelola beberapa akun AWS. contohnya dalam bisnis adalah dept.
//~ Fitur AWS Organizations
//? Manajemen terpusat, Consolidated billing (Tagihan terkonsolidasi), Pengelompokan hierarki akun dan Kontrol atas layanan AWS dan tindakan API

//! Compliance (Kepatuhan)
//~ AWS Artifact
//? dokumen intuk keperluan laporan compliance untuk proses audit
//~ AWS Artifact Agreements
//?  informasi perjanjian di AWS di seluruh layanan
//~ AWS Artifact Reports
//? informasi tentang tanggung jawab untuk mematuhi standar regulasi tertent
//~ Customer Compliance Center
//? informasi yang dapat membantu untuk mempelajari lebih lanjut tentang compliance.

//! Serangan Denial-of-Service (DoS)
//? upaya yang dilakukan secara sengaja untuk membuat website atau aplikasi menjadi tidak bekerja dengan optimal bagi pengguna.
//? serangan dari satu arah ( satu sumber )
//~ Serangan Distributed Denial-of-Service (DDoS)
//? salah satu serangan yang dapat menimpa infrastruktur atau aplikasi Anda. Serangan ini telah membuat banyak bisnis hancur.
//? serangan dari beberapa arah menggunakan bot ( beberapa sumber ) menuju target
//~ Tipe serangan DDOs
//? UDP flood; 
//? HTTP level attack; 
//? Slowloris attack
//~ AWS Shield
//? AWS Shield Standard; secara otomatis melindungi sumber daya AWS Anda dari jenis serangan DDoS yang paling umum tanpa biaya.
//? AWS Shield Advanced; layanan berbayar yang menyediakan kemampuan untuk mendiagnostik, mendeteksi, dan memitigasi serangan DDoS yang canggih.

//! Layanan Keamanan Tambahan
//~ Encryption
//? Encryption at rest ; proses enkripsi terjadi saat data Anda dalam keadaan tidak bergerak (tersimpan dan tidak berpindah)
//? Encryption in-transit ; terjadi saat data Anda berpindah antara A dan B. A dan B ini bisa berupa apa pun, seperti layanan AWS dan klien yang mengakses layanan tersebut.
//~ AWS Key Management Service (AWS KMS)
//? layanan yang memungkinkan Anda untuk melakukan enkripsi menggunakan cryptographic key (kunci kriptografi).
//~ AWS Web Application Firewall (AWS WAF)
//? layanan yang dapat memantau request/permintaan jaringan yang masuk ke aplikasi web. sama dengan ACL (Network Access List) 
//? yang dapat memblokir permintaan dari IP pengguna
//~ Amazon Inspector
//? layanan yang membantu untuk melengkapi pemahaman kita untuk meningkatkan keamanan dan compliance/kepatuhan aplikasi dengan menjalankan penilaian keamanan secara otomatis terhadap infrastruktur.
//~ Amazon GuardDuty

/// -------------------------------------------------------------------------------------------------------------------------------

//@ PEMANTAUAN DAN ANALITIK
//! Amazon CloudWatch
//? layanan yang dapt memantau infrastruktur dan aplikasi yang Anda jalankan di AWS secara real time
//? dengan cara melacak dan memantau metrik, metrik adalah variabel yang terkait dgn sumbery daya ( penggunaan EC2 dan CPU)
//~ Manfaat menggunakan Amazon CloudWatch
//? Akses ke semua metrik dari satu lokasi
//? Visibilitas ke seluruh aplikasi, infrastruktur, dan layanan
//? Mengurangi waktu MTTR dan mengurangi TCO
//? Mengoptimalkan aplikasi dan sumber daya operasional

//! AWS CloudTrail
//? layanan audit API yang komprehensif. Dengan CloudTrail, Anda dapat melihat riwayat lengkap dari aktivitas pengguna dan panggilan API untuk aplikasi maupun sumber daya.
//? bisa dibilang log dari semua catatab sumber daya AWS

//! AWS Trusted Advisor
//? layanan web yang memeriksa lingkungan AWS Anda dan memberikan rekomendasi secara real time sesuai dengan praktik terbaik AWS.
//~ AWS Trusted Dashboard dan Contoh Alert
//? Cost Optimazion(pengoptimalan biaya) ; EBS volume yang tidak dimanfaatkan. maka kita bsa scalling
//? Performance (performa) ; pengiriman konten untuk Amazon CloudFront yang tidak teroptimasi.
//? Security (keamanan) ; password IAM User lemah
//? Fault Tolerance (toleransi dari kesalahan) ; misalny tidak ada backup
//? Service Limits (batasan layanan) ; misal limit dari kepemilikan VPC per Region adalah 5.

/// -------------------------------------------------------------------------------------------------------------------------------

//@ HARGA DAN DUKUNGAN
//? sebuah perencanaan dari harga beberapa layanan AWS
//! AWS Free Tier
//? beberapa layanan AWS secara gratis, terdapat 3 jenis
//~ Always free ; Contohnya adalah AWS Lambda yang merupakan layanan komputasi serverless alias tanpa server
//~ 12 months free ; layanan gratis sampai 12 bulan
//~ Trials ; beberapa layanan gratis

//! Konsep Harga AWS
//? Pay for what you use ; Bayar sesuai yang Anda gunakan
//? Pay less when you reserve; opsi reservasi yang memberikan diskon signifikan daripada harga instance dengan opsi penagihan On-Demand
//? Pay less with volume-based discounts when you use more;  Bayar lebih murah dengan diskon berbasis volume saat Anda menggunakan lebih sering
//~ AWS Pricing Calculator
//? Layanan estimasi biaya untuk kasus penggunaan di AWS
//? manfaatnya ; Memodelkan arsitektur yang diinginkan sebelum membangunnya, Menelusuri setiap harga sekaligus membuat perhitungan 

//! Billing Dashboard
//? layanan yang dapat Anda gunakan untuk melihat informasi penagihan, membayar tagihan AWS, memantau penggunaan, menganalisis, dan mengontrol biaya.

//! Consolidated Billing
//? fitur yang memungkinkan Anda untuk mendapatkan satu tagihan untuk semua akun AWS yang ada di organisasi.
//? jika memiliki 100 akun AWS, Anda tak akan mendapatkan 100 tagihan, melainkan hanya satu tagihan terpusat. 

//! AWS Budgets
//? memastikan bahwa uang yang dikeluarkan tidak akan melebihi anggaran

//! AWS Cost Explorer
//? layanan berbasis konsol yang dapat meninjau dan menganalisis secara visual pengeluaran Anda di AWS.
//? dikelompokkan berdasarkan beberapa atribut: layanan, AWS Regions, tipe instance, tag

//! AWS Support Plans
//~ AWS Basic Support ; paket AWS Basic Support tanpa biaya sama sekali seperti, Akses 24/7 ke customer service dll
//~ AWS Developer Support; misal sudah sedikit kenal dengan beberapa layanan, namun tak cukup yakin bagaimana cara penggunaannya untuk memenuhi kebutuha
//~ AWS Business Support ; digunakan jika sudah mulai menerapkan beban kerja produksi
//~ AWS Enterprise Support ; perusahaan yang menjalankan beban kerja penting

//! AWS Marketplace
//? katalog digital pilihan yang memiliki ribuan perangkat lunak dari berbagai vendor.