<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';

  //   protected $guarded = [
  //   'id',
  //   'created_at',
  //   'updated_at',
  //   'deleted_at'
  // ];

    protected $fillable = [
    'student_id',
    'teacher_id',
    'message',
    'image_name',
    'teacher_name',
    'send',
  ];
  
  public function user(){
    return $this -> belongsTo(User::class);
  }
}
