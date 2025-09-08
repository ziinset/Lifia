<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
        'role', // jangan lupa tambahin kalau ada role admin/user
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi ke Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
