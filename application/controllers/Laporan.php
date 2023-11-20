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
    public function excel() {
        // $dataa = $this->M_laporan->rekap_all()->result();  

        // var_dump($data);
        // die();

        require(APPPATH. '../PHPExcel/Classes/PHPExcel.php');
        require(APPPATH. '../PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Rafik");
        $object->getProperties()->setLastModifiedBy("Rafik");
        $object->getProperties()->setTitle("Laporan Presensi");

        $object->setActiveSheetIndex(0);

        $object->setActiveSheet()->setCellValue('A3', 'No');
        // $object->setActiveSheet()->setCellValue('B3', 'Nama');
        // $object->setActiveSheet()->setCellValue('C3', 'Jam Masuk');
        // $object->setActiveSheet()->setCellValue('D3', 'Jam Keluar');
        // $object->setActiveSheet()->setCellValue('E3', 'Tanggal Absensi');
        // $object->setActiveSheet()->setCellValue('F3', 'Jabatan');
        // $object->setActiveSheet()->setCellValue('G3', 'Keterangan');

        // $baris = 2;
        // $no = 1;

        // foreach ($dataa['isal'] as $prensensi) {
        //     $object->getActiveSheet()->setCellValue('A'. $no++);
        //     // $object->getActiveSheet()->setCellValue('B'.$baris, $prensensi->username);
        //     // $object->getActiveSheet()->setCellValue('C'.$baris, $prensensi->jam_masuk);
        //     // $object->getActiveSheet()->setCellValue('D'.$baris, $prensensi->jam_keluar);
        //     // $object->getActiveSheet()->setCellValue('E'.$baris, $prensensi->tgl);
        //     // $object->getActiveSheet()->setCellValue('F'.$baris, $prensensi->lingkup);
        //     // $object->getActiveSheet()->setCellValue('G'.$baris, $prensensi->keterangan);

        //     $baris++;
        // }

        $filename="laporan_presensi".'xlsx';

        $object->getActiveSheet()->setTitle("Laporan Presensi");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename. '"');
        header('Cache-Control: max-age=0');

        $writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
        $writer->save('php://output');
    }
}