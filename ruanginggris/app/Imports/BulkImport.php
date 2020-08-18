<?php
namespace App\Imports;
use App\Bulk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
class BulkImport implements ToModel,WithHeadingRow
{
	/**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bulk([
          'nama' => $row['nama'],
          'username' => $row['username'],
          'email' => $row['email'],
          'email_verified_at' => $row['email_verified_at'],
          'password' => Hash::make($row['password']),
          'password_asli' => $row['password_asli'],
          'alamat' => $row['alamat'],
          'telp' => $row['telp'],
          'foto' => $row['foto'],
          'remember_token' => $row['remember_token'],
          'created_at' => $row['created_at'],
          'updated_at' => $row['updated_at'],
          'level' => $row['level'],
          'order_id' => $row['order_id'],
          'nama_paket' => $row['nama_paket'],
          'start_login' => $row['start_login'],
          'expired_login' => $row['expired_login'],
        ]);
    }
}
