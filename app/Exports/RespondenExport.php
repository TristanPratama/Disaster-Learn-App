<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

class RespondenExport implements FromCollection, WithTitle, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $questions = Question::all();
        $Respondens = DB::table('users')
        ->join('biodatas', 'users.id', '=', 'biodatas.user_id')
        ->leftjoin('pretests', 'users.id', '=', 'pretests.user_id')
        ->leftjoin('posttests', 'users.id', '=', 'posttests.user_id')
        ->select(
            'users.id',
            'biodatas.nama_lengkap',
            'biodatas.usia',
            'biodatas.jenis_kelamin',
            'biodatas.alamat',
            'biodatas.hp',
            'biodatas.institusi',
        );

        $Respondens->addSelect(DB::raw("CASE WHEN biodatas.user_id > 0 THEN 'Setuju' ELSE 'Tidak Setuju' END"));
        $Respondens->addSelect('biodatas.jenis_anggota','biodatas.p1','biodatas.p2','biodatas.p3','biodatas.nilai_pre');

        // Add the CASE statements for pretests.answer columns
        for ($i = 1; $i <= count($questions); $i++) {
            $Respondens->addSelect(DB::raw("CASE WHEN pretests.answer{$i} =". $questions[$i-1]->answer . " THEN 1 ELSE '0' END as `pretests.answer{$i}`"));
        }


        $Respondens->addSelect('biodatas.nilai_post');

        // Continue with the rest of the columns for posttests.answer
        for ($i = 1; $i <= count($questions); $i++) {
            $Respondens->addSelect(DB::raw("CASE WHEN posttests.answer{$i} =". $questions[$i-1]->answer . " THEN 1 ELSE '0' END AS `posttests.answer{$i}`"));
        }

        // Add the remaining columns
        $Respondens->addSelect('biodatas.created_at');

        // Get the result
        $Respondens = $Respondens->get();

        return $Respondens;


    }

    public function title(): string
    {
        return 'Data Responden'; // Custom title for the Users sheet
    }

    public function headings(): array
    {
        return [
            'User ID', 'Nama Lengkap', 'Usia', 'Jenis Kelamin', 'Alamat', 'Nomor HP', 'Asal Institusi', 'Persetujuan menjadi Responden', 'Jenis Anggota', 'Apakah Anda pernah mengikuti latihan gempa/kebakaran sebelumnya?', 'Apakah Anda pernah mengalami dampak akibat  bencana alam sebelumnya?', 'Apakah Anda pernah memiliki kerabat yang pernah mengalami bencana alam sebelumnya?',
            'Nilai Pretest', 'Pretest 1', 'Pretest 2', 'Pretest 3', 'Pretest 4', 'Pretest 5', 'Pretest 6', 'Pretest 7', 'Pretest 8', 'Pretest 9', 'Pretest 10', 'Pretest 11', 'Pretest 12', 'Pretest 13', 'Pretest 14', 'Pretest 15', 'Pretest 16', 'Pretest 17', 'Pretest 18', 'Pretest 19', 'Pretest 20', 'Pretest 21', 'Pretest 22', 'Pretest 23', 'Pretest 24', 'Pretest 25', 'Pretest 26', 'Pretest 27', 'Pretest 28', 'Pretest 29', 'Pretest 30',
            'Nilai Postest', 'Posttest 1', 'Posttest 2', 'Posttest 3', 'Posttest 4', 'Posttest 5', 'Posttest 6', 'Posttest 7', 'Posttest 8', 'Posttest 9', 'Posttest 10', 'Posttest 11', 'Posttest 12', 'Posttest 13', 'Posttest 14', 'Posttest 15', 'Posttest 16', 'Posttest 17', 'Posttest 18', 'Posttest 19', 'Posttest 20', 'Posttest 21', 'Posttest 22', 'Posttest 23', 'Posttest 24', 'Posttest 25', 'Posttest 26', 'Posttest 27', 'Posttest 28', 'Posttest 29', 'Posttest 30',
            'Created At' ]; // Custom column labels for the Users sheet
    }
}

