<?php
/*
 * @Author: ogi.setiawan 
 * @Date: 2021-06-12 21:26:07 
 * @Last Modified by: ogi.setiawan
 * @Last Modified time: 2021-06-12 21:30:23
 */

//@ PENGANTAR AMAZON WEB SERVICE
//! Layanan AWS : Komputasi, Penyimpanan dan Keamanan Jaringan
//~ Komputasi ( Computasi-Cloud )
//? Penggunaan sesuai kebutuhan (on-demand) : Contoh jika tiba2 perlu server tinggal klik, atau perlu memori lebih tinggal klik
//? Submer daya IT : jadi ada layanan yang dibantu seperti Instalasi OS, Update software dll
//? Melalui Internet : dapat akses melalui internet , web / terprogram

//? Contoh : Suatu perusahaan telah berhasil membangun data center untuk menopang kebutuhan website-nya.
//? Setiap hari website tersebut rata-rata diakses oleh 10.000 pengunjung, namun umumnya pada hari minggu jumlahnya hanya 5.000 saja. 
//? Angka ini berubah lagi di hari-hari spesial seperti malam tahun baru ketika tiba-tiba 30.000 pengunjung membanjirinya.
//? Lantas website tersebut pun down beberapa kali. si Komputasi kloud ini bisa ngebantu sesuai permintaan

//~ Model Penerepan Komputasi Cloud :
//? Cloud Based Deployment : Aplikasi/Data berbasis cloud sepenuhnya diterapkan di cloud dan semua bagian aplikasi berjalan di cloud.
//? On-premises Deployment ( Lokal ) : Aplikasi/Data yang diterarpkan di private-cloud ( local )
//? Hybrid Deployment : Penggabungan Aplikasi/Data berbasis cloud dan Aplikasi/Data tidak ada di cloud

//~ Manfaat dari Komputasi Cloud
//? Mengubah pengeluaran di muka menjadi pengeluaran varible ( membayar untuk sumber daya yang dikonsumsi saja )
//? Menghentikan biaya pengelolaan dan pemeliharaan data center
//? Berhenti menebak kapasitas
//? Manfaatkan skala ekonomi yang masif
//? Tingkatkan kecepatan dan ketangkasan
//? Mendunia dalam hitungan menit

//@ KOMPUTASI DI CLOUD
//~ Amazon Elastic Compute Cloud ( Amazon EC2 )
//? Layanan yang berbentuk virtual, yg memiliki kapasitas flexibel, hemat biaya, dan cepat dibanding server sendiri di data center

//~ Tipe Instance Amazon EC2
//? General purpose instances: memberikan keseimbangan dan sering digunakan untuk berbagai beban kerja ssperti server aplikasi web
//? Compute optimized instances: biasanya dgunakan utk beban kerja batch processing yang membutuhkan banyak proses transaksi
//? Memory optimized instances: memberikan performa tinggi untuk pemroresan kumpulan besar memori
//? Accelerated computing instances: Tipe ini menggunakan perangkat keras akselerator untuk menjalankan beberapa fungsi secara lebih efisien dibandingkan dengan perangkat lunak yang berjalan pada CPU
//? Storage optimized instance: memberikan optimize dlm pengolahan data ( input / outpu )

//~ Harga Amazon EC2 
//? On-Demand: sesuai permintaan, bisa dibayar selama object/instance berjalan (detik/jam). ideal untuk jangak pendek/baru mulai.
//? Savings Plans: perencanaan/analisa pemakaian anda di AWS selama 7,30 dll
//? Spot Instances: menggunakan kapasitas komputasi Amazon EC2 yang tak terpakai
//? Dedicated Hosts: tidak ada orang lain yang akan berbagi sewa dari server fisik tersebut. karena menggunakan lisensi

//~ Penyesuaian Kapasitas Amazon EC2
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

//~ Elastic Load Balancing ( Menyimbangkan Beban )
//# Setalah ada fitur penyusaian kapasitas, biasanya suatu permintaan tidak menuju lgsung ke instance yg dtuju,
//# malah terkadang membuat trafic pada instance saja, dan instance yang lain akhirnya nggngur
//# maka dari itu kita perlu host yg dapat mengatur suatu permintaan kepada instance yg minim proses (nganggur )
//? Amazon EC2 terdapat sebuah layanan yang dapat mengatur permintaan agar terdistribusi dengan baik (  load balancer )

//~ Messaging dan Queueing
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