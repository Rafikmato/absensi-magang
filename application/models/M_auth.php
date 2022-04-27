<?php


class M_auth extends CI_Model
{

    public function auth($password,$use)
    {
        $sandi = md5($password);
        $query = $this->db->query("SELECT * FROM karyawan WHERE email = '$use' AND password = '$sandi'");
        $check = $query->num_rows();
        if($check > 0){
            foreach($query->result() as $rows){
                $id_user = $rows->id_karyawan;
                $user_name = $rows->username;
                $surel = $rows->email;
                $level = $rows->jabatan;
                $jkel = $rows->jenis_kelamin;
                $status = $rows->status;
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
                    'in' => 'login'
                );
                $this->session->set_userdata($token);
                return redirect('/dashboard');
            }else{
                $this->session->set_flashdata('alert','<div class="alert alert-danger">Maaf username anda telah di nonaktifkan !</div>');
                return redirect('/');
            }
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger">Maaf username atau password anda salah</div>');
            return redirect('/');
        }
    }
    public function auth_operator($password,$use)
    {
        $sandi = md5($password);
        $query = $this->db->query("SELECT * FROM operator WHERE email = '$use' AND password = '$sandi'");
        $check = $query->num_rows();
        if($check > 0){
            foreach($query->result() as $rows){
                $id = $rows->id;
                $username = $rows->username;
                $role = $rows->role;
                $profile = $rows->profile;
            }
            $token = [
                'id' => $id,
                'user_name' => $username,
                'role' => $role,
                'profile' => $profile ,
                'in' => 'login'
            ];
            $this->session->set_userdata($token);
            return redirect('/dashboard');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger">Maaf username atau password anda salah</div>');
            return redirect('/');
        }
    }

}