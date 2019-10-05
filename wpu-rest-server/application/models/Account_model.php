<?php

class Account_model extends CI_Model
{

    public function getAccount($id = null){

        if ($id==null){
            return $this->db->get('registration')->result_array();
        } 
        else 
        {
            return $this->db->get_where('registration', ['id'=> $id] )->result_array();
        }
    }

    public function deleteAccount ($id){
        $this -> db -> delete ('registration',['id' => $id ]);

        return $this -> db -> affected_rows();
    }

    public function createAccount ($data) {
        $this->db->insert('registration', $data);
        return $this -> db -> affected_rows();
    }

    public function updateAccount ($data, $id) {
        $this->db->update('registration', $data, ['id'=>$id]);
        return $this -> db -> affected_rows();
    }
}