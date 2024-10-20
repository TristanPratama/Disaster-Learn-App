@extends('layouts.responden')

@section('container')
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h5 class="m-0 font-weight-bold text-primary">PENJELASAN PENELITIAN</h5>
        </div>
        <div class="card-body text-gray-800">

                <p>Saya yang bertanda tangan dibawah ini: </p>
                <table>
                    <tr>
                        <td><span class="mr-5">Nama</span></td>
                        <td>: Maula Mar’atus S, S.Kep.,Ns.,M.Kep.</td>
                    </tr>
                    <tr>
                        <td><span class="mr-3">NIK / NIDN</span></td>
                        <td>: 201390126/0631019002</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: Dosen Universitas Kusuma Husada Surakarta</td>
                    </tr>
                </table>
                <p class="mt-2">Bermaksud mengadakan penelitian tentang <b>"The Effect Of Disaster Management Learning Application To Improve Disaster Preparedness"</b>. Oleh karena itu, berikut ini saya menjelaskan beberapa hal terkait dengan penelitian yang akan saya lakukan:</p>
            <ol>
                <li>Tujuan penelitian ini adalah Untuk mengetahui pengaruh Disaster Management Learning Application To Improve Disaster Preparedness</li>
                <li>Manfaat penelitian ini adalah Meningkatkan Kesipaisagaan Bencana Relawan Bencana</li>
                <li>Responden dalam penelitian ini adalah Relawan Bencana dari Timor Leste</li>
                <li>Kegiatan penelitian ini akan dilakukan dengan memberikan Disaster Management Learning Application</li>
                <li>Pelaporan hasil penelitian ini nantinya akan menggunakan kode, bukan nama sebenarnya dari Responden (privacy, dignity, anonimity).</li>
                <li>Responden dalam penelitian ini bersifat sukarela, partisipan berhak untuk mengajukan keberatan pada peneliti jika terdapat hal–hal yang tidak berkenan dan selanjutnya akan dicari penyelesaian masalahnya berdasarkan kesepakatan antara peneliti dan responden.</li>
                <li>Lembar persetujuan akan diberikan kepada responden setelah mengikuti penjelasan dari peneliti. Responden memiliki hak untuk ikut serta sebagai responden maupun mengundurkan diri sewaktu-waktu (self determination), dan tidak ada sanksi apapun apabila Responden mengundurkan diri.</li>
            </ol>
            <br>
            <div class="row">
                <div class="col-lg-7"></div>
                <div class="col-lg-5">
                    <div class="text-center">
                        <p>Surakarta</p>
                        <img src="{{ asset("img/ttd.png") }}" alt="">
                        <br><br>
                        <p class="name">Maula Mar’atus S, M. Kep</p>
                        <p class="nik">NIK 201390126</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h5 class="m-0 font-weight-bold text-primary">TIM PENELITIAN</h5>
        </div>
        <div class="card-body text-gray-800">
            <p class="mt-2">Berikut adalah daftar peneliti pada penelitian tentang <b>"The Effect Of Disaster Management Learning Application To Improve Disaster Preparedness"</b> :</p>
            <ol>
                <li>Maula Mar’atus Solikhah, M. Kep (Dosen UKH Surakarta)</li>
                <li>Intan Batubara, M. Kep, MSN (Dosen UKH Surakarta)</li>
                <li>Febriana Sartika S, M. Kep (Dosen Poltekkes Kemenkes Surakarta)</li>
                <li>Addi Mardi Harnanto, MN (Ketua Bapena DPD PPNI Kota Surakarta dan Dosen Poltekkes Kemenkes Surakarta)</li>
                <li>Ns Gonzalo Joze Teixeira., S. Kep (Dosen ICS Dili Timor Leste)</li>
            </ol>
            <p class="mt-2">Berikut adalah daftar partisipan yang berkontribusi dalam pembuatan website survey pada penelitian ini : </p>
            <ol>
                <li>Tristan Hans Pratama (Mahasiswa Universitas Sebelas Maret Surakarta)</li>
                <li>Ilham Nur Romdoni (Mahasiswa Universitas Sebelas Maret Surakarta)</li>
            </ol>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h5 class="m-0 font-weight-bold text-primary">PERSETUJUAN MENJADI PARTISIPAN PENELITIAN</h5>
        </div>
        <div class="card-body text-gray-800">
            <p>Saya menyatakan dengan sesungguhnya bahwa setelah mendapatkan penjelasan penelitian dan memahami informasi yang diberikan oleh peneliti serta mengetahui tujuan dan manfaat penelitian, maka dengan ini saya secara sukarela bersedia menjadi Responden dalam penelitian yang berjudul <b>“The Effect of Disaster Management Learning Application to Improve Disaster Preparedness” </b>.</p>
            <p>Demikian pernyataan ini saya buat dengan sebenar-benarnya dan penuh kesadaran dan tanpa paksaan dari siapapun.</p>

            <div>
                <input type="checkbox" id="myCheckbox">
                <label for="myCheckbox">Saya setuju dengan pernyataan di atas</label>
            </div>
            <a href="biodata" id="myButton" class="btn btn-primary disabled">Lanjut ke Halaman Survey</a>
        </div>
    </div>
@endsection
