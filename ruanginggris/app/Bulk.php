<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Bulk extends Model
{
    protected $table = 'users';
    protected $fillable = [
      'nama',
      'username',
      'email',
      'email_verified_at',
      'password',
      'password_asli',
      'alamat',
      'telp',
      'foto',
      'remember_token',
      'created_at',
      'updated_at',
      'level',
      'order_id',
      'nama_paket',
      'start_login',
      'expired_login',
    ];
}
