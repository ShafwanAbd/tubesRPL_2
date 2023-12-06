@extends('layouts.layout1')

@section('content')
<div class="faq">
    <div class="margin-bottom-5">
        <h2>FAQ</h2>
    </div>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            Metode pembayaran apa saja yang tersedia?

            </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
            INTERNASIONAL : Mastercard dan Visa

            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
            Apakah Byrs.co memiliki toko offline?
            </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
            Untuk saat ini toko resmi Byrs.co dapat ditemukan secara online di https://www.tokopedia.com/Byrs.co. Untuk pilihan offline, kami memiliki beberapa Retailer resmi di seluruh Indonesia yang bisa Anda kunjungi - klik disini untuk daftarnya.
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
            Jika ukuran produk terlalu besar atau terlalu kecil, apakah bisa ditukar?
            </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
            Ya tentu saja. Silakan periksa Syarat & Ketentuan Pengembalian kami
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
            Apakah ukuran Byrs.co sama dengan sepatu biasa lainnya?
            </button>
            </h2>
            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
            <div class="accordion-body">
            Bagan ukuran kami akan membantu menentukan ukuran terbaik dan cocok untuk Anda. Secara umum, kami menyarankan untuk menurunkan satu ukuran (downsizing) dari ukuran yang biasa Anda pakai. Lihat tabel ukuran kami di sini.
            </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
            Metode Pengiriman apa yang Anda tawarkan?
            </button>
            </h2>
            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
            <div class="accordion-body">
            INTERNASIONAL : DHL Express
            </div>
            </div>
        </div>
    </div>
</div>
@endsection