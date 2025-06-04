<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $siswa = Siswa::insert([
            [
                'nama' => 'ABU BAKAR TSABIT GHUFRON', 
                'nis' => '20388',
                'gender' => 'L',
                'alamat' => 'Sleman',
                'kontak' => '085839328609',
                'email' => '20388@gmail.com',
                'status_lapor_pkl'=> false,
                'foto'=>'null',
            ],
            [
                'nama' => 'MUTIARA SEKAR KINASIH', 
                'nis' => '20431',
                'gender' => 'P',
                'alamat' => 'Bantul',
                'kontak' => '085198553807',
                'email' => '20431@gmail.com',
                'status_lapor_pkl'=> false,
                'foto'=>'null',
            ],
            [
                'nama' => 'ADE ZAIDAN ALTHAF', 
                'nis' => '20390',
                'gender' => 'L',
                'alamat' => 'Gunungkidul',
                'kontak' => '087786760589',
                'email' => '20390@gmail.com',
                'status_lapor_pkl'=> false,
                'foto'=>'null',
            ],
            [
                'nama' => 'ANGELINA THITHIS SEKAR LANGIT', 
                'nis' => '20396',
                'gender' => 'P',
                'alamat' => 'Kulonprogo',
                'kontak' => '081272353535',
                'email' => '20396@gmail.com',
                'status_lapor_pkl'=> false,
                'foto'=>'null',
            ],
            [
                'nama' => 'MARCELLINUS CHRISTO PRADIPTA', 
                'nis' => '20422',
                'gender' => 'L',
                'alamat' => 'Sleman',
                'kontak' => '089688361696',
                'email' => '20422@gmail.com',
                'status_lapor_pkl'=> false,
                'foto'=>'null',
            ],
            [
                'nama' => 'NAUFELIRNA SUBKHI RAMADHANI', 
                'nis' => '20454',
                'gender' => 'P',
                'alamat' => 'Klaten',
                'kontak' => '089671421234',
                'email' => '20454@gmail.com',
                'status_lapor_pkl'=> false,
                'foto'=>'null',
            ],
            [
                'nama' => 'ROSYIDAH MUTHMAINNAH', 
                'nis' => '20448',
                'gender' => 'P',
                'alamat' => 'Sleman',
                'kontak' => '087883538770',
                'email' => '20448@gmail.com',
                'status_lapor_pkl'=> false,
                'foto'=>'null',
            ],
            [
                'nama' => 'GABRIEL POSSENTI GENTA BAHANA NAGARI', 
                'nis' => '20410',
                'gender' => 'L',
                'alamat' => 'Sleman',
                'kontak' => '089634085990',
                'email' => '20410@gmail.com',
                'status_lapor_pkl'=> false,
                'foto'=>'null',
            ],
            [
                'nama' => 'NAFISYA RHEA PRAYASTI', 
                'nis' => '20411',
                'gender' => 'P',
                'alamat' => 'Bantul',
                'kontak' => '08816752848',
                'email' => '20411@gmail.com',
                'status_lapor_pkl'=> false,
                'foto'=>'null',
            ],
            [
                'nama' => 'FARCHA AMALIA NUGRAHAINI', 
                'nis' => '20408',
                'gender' => 'P',
                'alamat' => 'Sleman',
                'kontak' => '0895380761274',
                'email' => '20408@gmail.com',
                'status_lapor_pkl'=> false,
                'foto'=>'null',
            ],
        ]);
    }
}
