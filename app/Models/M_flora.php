<?php

namespace App\Models;
use CodeIgniter\Model;

class M_flora extends Model
{

    public function tampil($tabel ,$id){
     return $this->db->table($tabel)
     ->orderby($id,'desc')
     ->get()
     ->getResult();

 }

 public function tampil1($tabel){
     return $this->db->table($tabel)
     ->get()
     ->getResult();

 }

 public function join($tabel, $tabel2, $on, $id){
     return $this->db->table($tabel)
     ->join($tabel2, $on,'left')
     ->orderby($id,'desc')
     ->get()
     ->getResult();

 }

 public function joinWhere($tabel, $tabel2, $on, $where){
     return $this->db->table($tabel, $where)
     ->join($tabel2, $on,'left')
     ->get()
     ->getRow();

 }

 public function getWhere($tabel,$where){
    return $this->db->table($tabel)
    ->getWhere($where)
    ->getRow();
}

public function tambah($tabel, $isi){
  return $this->db->table($tabel)
  ->insert($isi);
}

public function edit($tabel, $isi, $where){
  return $this->db->table($tabel)
  ->update($isi, $where);
}

public function hapus($table,$where){
   return $this->db->table($table)
   ->delete($where);
}


public function joinnelson($tabel, $tabel2, $tabel3,$tabel4, $on, $on2,$on3, $id){
  return $this->db->table($tabel)
  ->join($tabel2, $on,'left')
  ->join($tabel3, $on2,'left')
  ->join($tabel4, $on3,'left')
  ->orderby($id,'desc')
  ->get()
  ->getResult();

}

public function joinn($tabel, $tabel2, $on, $id){
  return $this->db->table($tabel)
  ->join($tabel2, $on,'left')
  ->orderby($id,'desc')
  ->get()
  ->getResult();

}

public function joinnelsona($tabel, $tabel2, $tabel3, $on, $on2, $id){
  return $this->db->table($tabel)
  ->join($tabel2, $on,'left')
  ->join($tabel3, $on2,'left')
  ->orderby($id,'desc')
  ->get()
  ->getResult();

}


public function joinaria($tabel, $tabel2, $tabel3,$on, $on2, $id){
  return $this->db->table($tabel)
  ->join($tabel2, $on,'left')
  ->join($tabel3, $on2,'left')
  ->orderby($id,'desc')
  ->get()
  ->getResult();

}

public function getwherejoin($tabel, $tabel2,$on,$id){
  return $this->db->table($tabel)
  ->join($tabel2, $on,'left')
  ->getWhere($where)
  ->getRow();

}

public function getLaporanByDate($start_date, $end_date)
{
    return $this->db->table('absen')
    ->where('tanggal >=', $start_date)
    ->where('tanggal <=', $end_date)
    ->get()
    ->getResult();
}

public function getLaporanByDateForExcel($start_date, $end_date)
{
    $query = $this->db->table('absen')
    ->where('tanggal >=', $start_date)
    ->where('tanggal <=', $end_date)
    ->get();

    return $query->getResultArray();
}


}
