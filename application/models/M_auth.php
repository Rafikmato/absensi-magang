<?php


class M_auth extends CI_Model
{

    public function auth($password,$use)
    {
        $sandi = md5($password);
        $query = $this->db->query("SELECT * FROM users WHERE email = '$use' AND password = '$sandi'");
        $check = $query->num_rows();
        if($check > 0){
            foreach($query->result() as $rows){
                $id_user = $rows->id_user;
                $user_name = $rows->username;
                $surel = $rows->email;
                $level = $rows->role;
                $jkel = $rows->jenis_kelamin;
                $status = $rows->status;
                $jabatan = $rows->role;
                $pass = $rows->password;
                $id_jabatan = $rows->id_jabatan;
            }
            if($status > 0){
                $token = array(
                    'status' => 'login',
                    'id' => $id_user,
                    'user_name' => $user_name,
                    'email' => $surel,
                    'level' => $level,
                    'jenis_kelamin' => $jkel,
                    'status' => $status,
                    'in' => 'login',
                    'role' => $jabatan,
                    'password' => $pass,
                    'id_jabatan' => $id_jabatan
                );
                // 109563163573324009088
                $this->session->set_userdata($token);
                return redirect('/dashboard');
            }else{
                $this->session->set_flashdata('alert','<div class="alert alert-danger">Maaf username anda telah di nonaktifkan !</div>');
                return redirect('login');
            }
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger">Maaf username atau password anda salah</div>');
            return redirect('login');
        }
    }
    

}