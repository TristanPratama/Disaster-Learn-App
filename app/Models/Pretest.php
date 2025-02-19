<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pretest extends Model
{
    use HasFactory;
    protected $table = 'pretests';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'answer5',
        'answer6',
        'answer7',
        'answer8',
        'answer9',
        'answer10',
        'answer11',
        'answer12',
        'answer13',
        'answer14',
        'answer15',
        'answer16',
        'answer17',
        'answer18',
        'answer19',
        'answer20',
        'answer21',
        'answer22',
        'answer23',
        'answer24',
        'answer25',
        'answer26',
        'answer27',
        'answer28',
        'answer29',
        'answer30',
    ];
}
