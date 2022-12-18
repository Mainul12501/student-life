<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComments extends Model
{
    use HasFactory;
    protected $fillable = ['comment_by', 'comment_to', 'comments', 'comment_by_name', 'comment_to_name', 'comment_by_image', 'comment_to_image','comment_image','comment_audio'];
//    protected $guarded  = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
