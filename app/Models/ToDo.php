<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;
    private static $todo;
    public static function newTodo($request)
    {
        self::$todo = new ToDo();
        self::saveBasicInfo(self::$todo,$request);

    }
    public static function updateTodo($request,$id)
    {
        $todo = ToDo::findOrFail($id);
        self::saveBasicInfo($todo,$request);
    }
    private static function saveBasicInfo($todo,$request)
    {
        $todo->title                    = $request->title;
        $todo->description             = $request->description;
        $todo->save();
    }
    public static function deleteTodo($id)
    {
        $todo = ToDo::findOrFail($id);
        $todo->delete();
    }
}
