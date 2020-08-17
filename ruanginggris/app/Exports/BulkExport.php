<?php
namespace App\Exports;
use App\Bulk;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
class BulkExport implements FromQuery,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // use Exportable;

    public function headings(): array
    {
        return [
          'id',
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
        ];
    }
    public function query()
    {
        return Bulk::query();
        /*you can use condition in query to get required result
         return Bulk::query()->whereRaw('id > 5');*/
    }
    public function map($bulk): array
    {
        return [
            $bulk->id,
            $bulk->nama,
            $bulk->username,
            $bulk->email,
            $bulk->email_verified_at,
            $bulk->password,
            $bulk->password_asli,
            $bulk->alamat,
            $bulk->telp,
            $bulk->foto,
            $bulk->remember_token,
            Date::dateTimeToExcel($bulk->created_at),
            Date::dateTimeToExcel($bulk->updated_at),
            $bulk->level,
        ];
    }

}
