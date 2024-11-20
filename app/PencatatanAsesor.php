<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PencatatanAsesor extends Model
{

    use SoftDeletes;

    protected $table = 'pencatatan_asesor';

    protected $dates = ['approve_at'];

    protected $fillable = [
        'pencatatan_id', 'nama_asesor', 'nik', 'alamat', 'status_asesor','users_id','slug',
        'no_registrasi_asesor', 'npwp', 'email', 'tgl_lahir', 'pendidikan', 'no_telpon',
        'provinsi', 'kab_kota', 'tempat_lahir', 'no_reg_asesor', 'surat_penghapusan', 'ket_hapus',
        'is_active', 'status', 'acc_deleted', 'is_deleted', 'approved_at', 'approve', 'is_new', 'is_updated'
    ];

    protected $hidden = [
    ];

    public function sertifikat(){
        return $this->hasMany(PencatatanSertifikat::class, 'asesor_id', 'id');
    }

    public function pencatatanAsesor(){
        return $this->belongsTo(Pencatatan::class, 'pencatatan_id', 'id');
    }

    public function perjanjian(){
        return $this->hasMany(ExtAsesor::class, 'asesor_id', 'id');
    }

    public function propinsi(){
        return $this->hasOne(Propinsi::class,'id_propinsi_dagri', 'provinsi');
    }

    public function kabkota(){
        return $this->hasOne(KabKota::class, 'id_kabupaten_dagri', 'kab_kota');
    }

    public function tmptLhir(){
        return $this->hasOne(Propinsi::class,'id_propinsi_dagri', 'tempat_lahir');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
