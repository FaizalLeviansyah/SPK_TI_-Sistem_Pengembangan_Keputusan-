<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_kriteria.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 14/07/2021
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class M_kriteria extends CI_Model
{
    // create or insert
    function tambah_kriteria($data)
    {
        $this->db->insert('tbl_kriteria', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function tambah_penilaian($data)
    {
        return $this->db->insert('tbl_penilaian', $data);
    }

    // get data
    function get_data_kriteria($data = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_kriteria');
        if ($data != null) {
            $this->db->where($data);
        }
        $this->db->order_by('kd_kriteria');
        return $this->db->get();
    }

    public function get_max_kode()
    {
        $this->db->select_max('kd_kriteria');
        $this->db->from('tbl_kriteria');
        return $this->db->get();
    }

    function get_data_penilaian($data = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_penilaian');
        if ($data != null) {
            $this->db->where($data);
        }
        return $this->db->get();
    }

    // delete data
    public function hapus_kriteria($data)
    {
        $this->db->where($data);
        $this->db->delete('tbl_kriteria');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function hapus_penilaian($data)
    {
        $this->db->where($data);
        $this->db->delete('tbl_penilaian');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
