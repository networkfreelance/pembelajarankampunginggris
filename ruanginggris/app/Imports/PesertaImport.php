<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class PesertaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nama' => $row[1],
            'username' => $row[2],
            'email' => $row[3],
            'email_verified_at' => $row[4],
            'password' => $row[5],
            'password_asli' => $row[6],
            'alamat' => $row[7],
            'telp' => $row[8],
            'foto' => $row[9],
            'remember_token' => $row[10],
            'created_at' => $row[11],
            'updated_at' => $row[12],
            'level' => $row[13],
        ]);
    }
}
