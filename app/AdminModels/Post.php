<?php

namespace App\AdminModels;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'desc','slug','content','cat_id', 'icon', 'img'];

    //подготовка файлов перед сохранением
    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        //триггер сохранения изображений в папке на сервере перед сохранением в БД
        self::creating(function ($model){
            //объявление переменной с пустым массивом для сохранения в нем данных с названиями файлов
            $arr=[];
            if(isset($model->img)) {
                foreach ($model->img as $image) {
                    //сохранение файлов в папке на сервере public/images(создаем папку) и присвоение им уникального имени
                    //перед сохранением обязательно меняем стандартный путь функции store() в файле config/filesystems.php
                    //'root'=>public_path('images')
                    $imageName = $image->store('image');
                    //сохрание файлов в массиве
                    $arr[] = $imageName;
                }
            }
            //преобразование массива снова в строку для сохранения в БД (в реляционных БД массивы не храняться)
            $images = implode(' ', $arr);
            //присвоение столбцу строки с файлами изображений разделенные пробелом
            $model->img = $images;
        });
        //триггер
        //удаление изображений из папки на сервере после удаления из БД
        self::deleted(function($model){
            //конвертация данных из БД в массив
            $img = explode(' ', $model->img);
            //проходимся циклом по созданному массиву и удаляем все изображения
            // привязанные к модели из папки на сервере
            foreach ($img as $image) {
                //собачка вначале директивы позволяет не добавлять условный оператор проверки наличия файла перед удалением
                @unlink(public_path("images/$image"));
            }

        });

    }

    public function category ()
    {
       return $this->belongsTo('App\AdminModels\Category','cat_id');
    }

    public function tags ()
    {
        return $this->belongsToMany('App\AdminModels\Tag', 'posts_tags', 'post_id', 'tag_id');
    }
    public function comments ()
    {
        return $this->hasMany('App\AttachmentModels\Comment','post_id');
    }

}
