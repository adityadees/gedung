<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymod extends CI_Model{

    public function cekadminlogin($user_username,$user_password){
        $res=$this->db->query("SELECT * FROM user WHERE user_username='$user_username' AND user_password=md5('$user_password')");
        return $res;
    }


    public function maxKepentingan(){
        $res = $this->db->query("SELECT kriteria_kode,max(nilai_nilai)as maxNilaiK  from nilai  GROUP BY kriteria_kode");
        return $res;
    }


    public function ViewDetail($table,$where){
        $this->db->select('*');
        $res=$this->db->get_where($table,$where);
        return $res->row_array();
    }
    public function ViewDataWhere($table,$where){
        $this->db->select('*');
        $res=$this->db->get_where($table,$where);
        return $res->result_array();
    }
    public function ViewData($table){
        $res=$this->db->get($table);
        return $res->result_array();
    }

    public function pagging($table,$number,$offset){
        return $query = $this->db->get($table,$number,$offset)->result_array();       
    }


    public function ViewDataRows($table){
        $res=$this->db->get($table);
        return $res->num_rows();
    }
    public function data($table,$number,$offset){
        return $query = $this->db->get('produk',$number,$offset)->result_array();      
    }

    public function order_by_rand($table){
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $res = $this->db->get($table);
        return $res->row_array();
    }

    public function CekDataRows($table,$where){
        $res=$this->db->get_where($table,$where);
        return $res;
    }
    public function ViewNumRows($table,$where,$data){
        $this->db->select('*');
        $this->db->where($where,$data);
        $res = $this->db->get($table);
        return $res->num_rows();
    }

    public function InsertData($table,$data){
        $res = $this->db->insert($table, $data);
        return $res;
    }

    public function UpdateData($table, $data, $where){
        $res = $this->db->update($table, $data, $where);
        return $res;
    }

    public function Update($table, $data){
        $res = $this->db->update($table, $data);
        return $res;
    }

    public function DeleteData($where,$table){
        $this->db->where($table);
        $res = $this->db->delete($where);
        return $res;
    }

    public function GetDataJoin($table,$where){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $this->db->from(''.$table1.' t1');
        $this->db->join(''.$table2.' t2','t1.'.$t1id.'=t2.'.$t2id);
        $this->db->where($where);
        $res = $this->db->get();
        return $res;
    }

    public function GetDataJoinlimit($table,$where){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $this->db->from(''.$table1.' t1');
        $this->db->join(''.$table2.' t2','t1.'.$t1id.'=t2.'.$t2id);
        $this->db->where($where);
        $this->db->limit('5');
        $res = $this->db->get();
        return $res;
    }

    public function best_seller(){
        $res = $this->db->query("SELECT produk_kode,count(produk_kode) as jumlah from pemesanan_detailp  GROUP by produk_kode order by jumlah desc");
        return $res;
    }

    public function getJoinWhere($table,$where){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $j=1;
        foreach($table as $table_name=>$table_id){ 
            if($j==1){$this->db->from(''.$table1.' t1');} else {
                $this->db->join(''.${'table'.$j}.' t'.$j,'t1.'.${'t'.$j.'id'}.'=t'.$j.'.'.${'t'.$j.'id'});
            }
            $j++;
        }
        $this->db->where($where);
        $res = $this->db->get();
        return $res;
    }


    public function getJoin($table){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $j=1;
        foreach($table as $table_name=>$table_id){ 
            if($j==1){$this->db->from(''.$table1.' t1');} else {
                $this->db->join(''.${'table'.$j}.' t'.$j,'t1.'.${'t'.$j.'id'}.'=t'.$j.'.'.${'t'.$j.'id'});
            }
            $j++;
        }
        $res = $this->db->get();
        return $res;
    }
    public function GetDataJoinNW($table){
        $i=1;
        foreach($table as $table_name=>$table_id){ 
            ${'table'.$i}=$table_name;
            ${'t'.$i.'id'}=$table_id;
            $i++;
        }

        $this->db->select('*');
        $this->db->from(''.$table1.' t1');
        $this->db->join(''.$table2.' t2','t1.'.$t1id.'=t2.'.$t2id);
        $res = $this->db->get();
        return $res;
    }



}
