<?php 

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_laporan");
    }
    public function rekap()
    {
        if(isset($_POST["rekap"]))
        {
            if($_POST["bulan"] == "" && $_POST["tahun"] == "")
            {
                $data = $this->M_laporan->rekap_all()->result();                
            }else{
                
                $bulan = $_POST["bulan"];
                $tahun = $_POST["tahun"];
                $data = $this->M_laporan->rekap($tahun,$bulan)->result();
                
                if($bulan == "all")
                {
                    $data = $this->M_laporan-> rekap_all_byYear($tahun)->result();
                    
                }
            }
            $this->load->view("laporan/rekap",[
                'data' => $data,
                'tahun' => isset($tahun) ? $tahun : '',
                'bulan' => isset($bulan) ? $bulan : '',
            ]);
        }
    }
}