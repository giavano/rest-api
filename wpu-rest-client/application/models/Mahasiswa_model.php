<?php 

class Mahasiswa_model extends CI_model {

    private function callAPI($method, $api, $data){
        $url = 'http://localhost:8080/rest-api/wpu-rest-server/api/account/' . $api ;
        $curl = curl_init();
     
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
           default:
              if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
        }
     
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
           'APIKEY: 111111111111111111111',
           'Content-Type: application/json',
        ));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
     
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
     }

    public function getAllMahasiswa()
    {        
        $get_data = $this->callAPI('GET', '', false);
        $response = json_decode($get_data,  true);
        return $response['data'];
    }

    public function getMahasiswaById($id)
    {
        $get_data = $this->callAPI('GET', '?id='.$id, false);
        $response = json_decode($get_data,  true);
        return $response['data'][0];
    }

    public function tambahDataMahasiswa()
    {
        // //set empty variable placeholders
        // $mobile = $firstname = $lastname = $dob = $gender = $email = "";

        // //Get data from Form
        // $mobile = secure_data($_POST['mobile']);
        // $firstname = secure_data($_POST['firstname']);
        // $lastname = secure_data($_POST['lastname']);
        // $dob = secure_data($_POST['dob']);
        // $gender = secure_data($_POST['gender']);
        // $email = secure_data($_POST['email']);
        // //Set up POST array
        // $array = array (
        //     "mobile" => $mobile,
        //     "firstname" => $firstname,
        //     "lastname" => $lastname,
        //     "dob" => $dob,
        //     "gender" => $gender,
        //     "email" => $email
        // );

        // $make_call = $this->callAPI('POST', '', json_encode($data));
        // $response = json_decode($make_call, true);
        // $data     = $response['response']['data'][0];

    }

    public function hapusDataMahasiswa($id)
    {
       //  $this->callAPI('DELETE', $id, false);
    }



    public function ubahDataMahasiswa()
    {
        // $data = [
        //     "nama" => $this->input->post('nama', true),
        //     "nrp" => $this->input->post('nrp', true),
        //     "email" => $this->input->post('email', true),
        //     "jurusan" => $this->input->post('jurusan', true)
        // ];

        // $this->db->where('id', $this->input->post('id'));
        // $this->db->update('mahasiswa', $data);
    }

    public function cariDataMahasiswa()
    {
        // $keyword = $this->input->post('keyword', true);
        // $this->db->like('nama', $keyword);
        // $this->db->or_like('jurusan', $keyword);
        // $this->db->or_like('nrp', $keyword);
        // $this->db->or_like('email', $keyword);
        // return $this->db->get('mahasiswa')->result_array();
    }
}