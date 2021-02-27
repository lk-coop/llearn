<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    # protected $table = 'some_table_name'; // Если нужно кастомное наинменование таблицы (а не согласно конвенциям)
    # protected $primaryKey = 'some_id'; // Если нужно использовать кастомное наименование первичного ключа (по умолчанию = id)
    # public $incrementing = false; // Поле не инкрементируемое, самостоятельно следит за заполнением
    # protected $keyType = 'string'; // Определение типа инкрементируемого поля
    # public $timestamps = false; // Laravel не будет следить за заполнением полей создания записи, редактирования


    protected $attributes = [ // Здесь для полей указываются значения по умолчанию
        'title' => 'Post title',
        'text' => 'Automatic text'
    ];

//    $fillable; // белый список полей, которые доступны для массового заполнения
    protected $fillable = ['title', 'content', 'rubric_id'];
    // protected $guarded = []; // Разрешённые свойства, если указать пустой массив - все достпуно для заполнения
    /*
     * Если у полей есть значения по умолчания - будут записаны эти самые значения
     */


    public function getPostDate() {
        return Carbon::parse($this->created_at)->diffForHumans();

//        $formatter = new \IntlDateFormatter('ru_RU', \IntlDateFormatter::FULL, \IntlDateFormatter::FULL);
//        $formatter->setPattern('d MMM y');
//
//        return $formatter->format(new \DateTime($this->created_at));
    }

    public function rubric()
    {
        return $this->belongsTo(Rubric::class);
    }
}
