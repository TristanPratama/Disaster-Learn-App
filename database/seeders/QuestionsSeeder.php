<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'value' => 'Cukup hanya melalui pembelajaran di sekolah, keluarga dan teman untuk mengetahui apa yang harus dilakukan saat bencana terjadi.',
                'answer' => false,
            ],
            [
                'name' => 'Tidak hanya disarankan untuk mencari tempat yang aman saat berbahaya, tetapi dianjurkan juga menjauh dari lokasi yang berbahaya.',
                'answer' => false,
            ],
            [
                'value' => 'Saat terjadi bencana harus menghindari area listrik dan yang berbahaya.',
                'answer' => True,
            ],
            [
                'name' => 'Tidak panik saat terjadi bencana dan bertindak rasional dan tetap tenang.',
                'answer' => True,
            ],
            [
                'value' => 'Alarm darurat harus ditanggapi dengan serius dan segera bertindak.',
                'answer' => True,
            ],
            [
                'name' => 'Tidak berbahaya jika seseorang masuk ke air saat banjir',
                'answer' => false,
            ],
            [
                'value' => 'Setelah gempa bumi, seseorang harus waspada terhadap kemungkinan gempa susulan.',
                'answer' => True,
            ],
            [
                'name' => 'Penting untuk mengetahui apa yang harus dilakukan setelah fase akut pada bencana alam.',
                'answer' => True,
            ],
            [
                'value' => 'Memberikan pertolongan kepada orang yang membutuhkan bantuan setelah bencana alam.',
                'answer' => True,
            ],
            [
                'name' => 'Memberikan pertolongan pertama yang diperlukan dengan memeriksa apakah ada orang yang terluka di daerah di mana tidak ada risiko setelah bencana alam merupakan tindakan yang salah.',
                'answer' => False,
            ],
            [
                'value' => 'Rumah tidak boleh dimasuki sampai dipastikan bangunannya tidak rusak setelah fase akut bencana alam selesai berlangsung.',
                'answer' => True,
            ],
            [
                'name' => 'Alat komunikasi dapat digunakan setelah bencana alam, tak terkecuali untuk keadaan darurat.',
                'answer' => false,
            ],
            [
                'value' => 'Perlu mengetahui lembaga yang dapat memberi bantuan saat bencana.',
                'answer' => True,
            ],
            [
                'name' => 'Perlunya pelatihan pertolongan pertama.',
                'answer' => True,
            ],
            [
                'value' => 'Kesiapsiagaan perlu dilakukan terhadap segala bencana yang mungkin terjadi di Indonesia.',
                'answer' => True,
            ],
            [
                'name' => 'Jika terjadi bencana, perlengkapan pertolongan pertama pada bencana harus selalu siap dan selalu up-to-date di rumah.',
                'answer' => True,
            ],
            [
                'value' => 'Memiliki pengetahuan yang cukup untuk memberitahu orang lain tentang tindakan pencegahan yang harus diambil terhadap kemungkinan bencana.',
                'answer' => True,
            ],
            [
                'name' => 'Dampak buruk bencana dapat dikurangi dengan melakukan Tindakan Siaga Bencana sebelumnya',
                'answer' => True,
            ],
            [
                'value' => 'Perlu adanya rencana kesiapsiagaan bencana bagi keluarga dan meninjau rencana ini secara berkala.',
                'answer' => True,
            ],
            [
                'name' => 'Mengikuti seminar pra-bencana yang bermanfaat untuk menambah pengetahuan.',
                'answer' => True,
            ],
            [
                'value' => 'Keluarga harus mengetahui keberadaan dan lokasi titik kumpul (assembly point) saat terjadi bencana.',
                'answer' => True,
            ],
            [
                'name' => 'Tidak perlu mengetahui prosedur pertolongan untuk hewan peliharaan selama bencana.',
                'answer' => False,
            ],
            [
                'name' => 'Fase Managemen Bencana setelah fase kesiapsiagaan adalah fase respon.',
                'answer' => True,
            ],
            [
                'name' => 'Tujuan pertolongan pada kondisi gawat darurat adalah menyelematkan nyawa.',
                'answer' => True,
            ],
            [
                'name' => 'Jika korban dapat berjalan maka masuk triase hijau.',
                'answer' => True,
            ],
            [
                'name' => 'Jika korban tidak dapat berjalan maka cek nafas apabila terdapat nafas masuk trias hitam.',
                'answer' => False,
            ],
            [
                'name' => 'Apabila korban dapat berjalan maka cek nafas apabila terdapat nafas lebih dari 30x/ menit maka masuk trias merah.',
                'answer' => True,
            ],
            [
                'name' => 'Apabila  korban dapat berjalan maka cek nafas apabila terdapat nafas kurang dari 30x/ menit cek capillary refil jika lebih dari 2 detik maka masuk trias merah.',
                'answer' => True,
            ],
            [
                'name' => 'Apabila  korban dapat berjalan maka cek nafas apabila terdapat nafas kurang dari 30x/ menit cek capillary refil jika kurang dari 2 detik cek status mental apabila tidak ada masuk trias kuning.',
                'answer' => False,
            ],
            [
                'name' => 'Apabila  korban dapat berjalan maka cek nafas apabila terdapat nafas kurang dari 30x/ menit cek capillary refil jika kurang dari 2 detik cek status mental apabila ada masuk trias merah.',
                'answer' => False,
            ],
        ]);
    }
}
