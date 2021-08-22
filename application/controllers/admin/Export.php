<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_peminjaman');
        if (!$this->session->userdata('status_login')) {
            //session kosong
            redirect('admin/login', 'refresh');
        } else if ($this->session->userdata('tipe') !== 'adm') {
            //akses bukan admin
			if ($this->session->userdata('tipe') == 'guru') {

				redirect('guru/beranda', 'refresh');
			}
			if ($this->session->userdata('tipe') == 'usr') {

				redirect("beranda", "refresh");
			}
        }
    }    

    public function index($bulan)
    {
        $select = 'user.nama_lengkap, user.nisn, buku.judul_buku, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, user.ttd';
        $data_peminjam = $this->model_peminjaman->select_join2_where($select, $bulan)->result();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //membuat nama file
        $bulan = date("F Y", strtotime($bulan));
        $filename = "Laporan Peminjaman Per $bulan";

        $spreadsheet->getDefaultStyle()->getFont()->setName('Times new Roman');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(12);

        //style judul
        $styleJudulDokumen = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
            ],
            'font' => [
                'size' => 14,
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A1")->applyFromArray($styleJudulDokumen);
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getRowDimension(1)->setRowHeight(37.50);
        $spreadsheet->getActiveSheet()->mergeCells('A1:G1');

        //judul
        $judul = "LAPORAN PEMINJAMAN PERPUSTAKAAN\nSMK NEGERI 1 GEGER Per $bulan";
        $sheet->setCellValue('A1', $judul);

        //style header tabel
        $styleHeaderTabel = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A4:G4")->applyFromArray($styleHeaderTabel);
        $spreadsheet->getActiveSheet()->getRowDimension(4)->setRowHeight(35);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(11);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(23);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(13);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(14);

        //header tabel
        $sheet->setCellValue('A4', 'No')
            ->setCellValue('B4', 'NISN')
            ->setCellValue('C4', 'Nama Lengkap')
            ->setCellValue('D4', 'Judul Buku')
            ->setCellValue('E4', 'Tanggal Peminjaman')
            ->setCellValue('F4', 'Tanggal Pengembalian')
            ->setCellValue('G4', 'Tanda Tangan Siswa');
        
        //data peminjaman
        $row = 5;
        $no = 1;
        foreach($data_peminjam as $data) {
            $sheet->setCellValue("A$row", $no)
                ->setCellValue("B$row", $data->nisn)
                ->setCellValue("C$row", $data->nama_lengkap)
                ->setCellValue("D$row", $data->judul_buku)
                ->setCellValue("E$row", $data->tanggal_pinjam)
                ->setCellValue("F$row", $data->tanggal_kembali);
            $this->draw_ttd($data->ttd, $row, $spreadsheet->getActiveSheet());
            $row++;
            $no++;
        }

        //style tabel
        $row = $row-1;
        //all
        $styleTabelAll = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A4:G$row")->applyFromArray($styleTabelAll);

        //header
        $styleTabelHeader = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A4:G4")->applyFromArray($styleTabelHeader);
        $spreadsheet->getActiveSheet()->getRowDimension(4)->setRowHeight(35);
        //end style tabel

        //tanda tangan
        $rowTanggal = $row+2;
        $rowKepalaPerpus = $rowTanggal+1;
        $rowNamaKepala = $rowKepalaPerpus+4;

        
        $sheet->setCellValue("F$rowTanggal", 'Madiun, '.date('d-m-Y'));
        $sheet->setCellValue("F$rowKepalaPerpus", "Kepala Perpustakaan");
        $sheet->setCellValue("F$rowNamaKepala", "Agus Rohmansyah");
        
        $spreadsheet->getActiveSheet()->mergeCells("F$rowTanggal:G$rowTanggal");
        $spreadsheet->getActiveSheet()->mergeCells("F$rowKepalaPerpus:G$rowKepalaPerpus");
        $spreadsheet->getActiveSheet()->mergeCells("F$rowNamaKepala:G$rowNamaKepala");

        //export ke xlsx
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function simpan_pinjaman_siswa($nisn)
    {
        $select = 'user.nama_lengkap, user.nisn, peminjaman.tanggal_pinjam, peminjaman.tanggal_kembali, buku.judul_buku';
        $where = 'peminjaman.tanggal_kembali IS NOT NULL AND user.nisn = '.$nisn;

        $data_pinjaman = $this->model_peminjaman->select_join4_where($select, $where)->result();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Times new Roman');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(12);

        //style judul
        $styleJudulDokumen = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
            ],
            'font' => [
                'size' => 14,
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A1")->applyFromArray($styleJudulDokumen);
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getRowDimension(1)->setRowHeight(37.50);
        $spreadsheet->getActiveSheet()->mergeCells('A1:D1');

        //judul
        $judul = "KARTU PEMINJAMAN DAN PENGEMBALIAN BUKU\nPERPUSTAKAAN SMK NEGERI 1 GEGER";
        $sheet->setCellValue('A1', $judul);

        //style header tabel
        $styleHeaderTabel = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A5:D5")->applyFromArray($styleHeaderTabel);
        $spreadsheet->getActiveSheet()->getRowDimension(5)->setRowHeight(35);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);

        //header tabel
        $sheet->setCellValue('A3', 'NISN')
            ->setCellValue('A4', 'Nama Lengkap')
            ->setCellValue('C3',': '.$data_pinjaman[0]->nisn)
            ->setCellValue('C4',': '.$data_pinjaman[0]->nama_lengkap);

        $sheet->setCellValue('A5', 'No')
            ->setCellValue('B5', 'Tanggal Peminjaman')
            ->setCellValue('C5', 'Judul Buku')
            ->setCellValue('D5', 'Tanggal Pengembalian');

        //data peminjaman
        $row = 6;
        $no = 1;
        foreach($data_pinjaman as $data) {
            $sheet->setCellValue("A$row", $no)
                ->setCellValue("B$row", $data->tanggal_pinjam)
                ->setCellValue("C$row", $data->judul_buku)
                ->setCellValue("D$row", $data->tanggal_kembali);
            $row++;
            $no++;
        }

        //style tabel
        $row = $row-1;
        //all
        $styleTabelAll = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A5:D$row")->applyFromArray($styleTabelAll);

        //header
        $styleTabelHeader = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A5:D5")->applyFromArray($styleTabelHeader);
        // $spreadsheet->getActiveSheet()->getRowDimension(4)->setRowHeight(35);
        //end style tabel


        //membuat nama file
        $filename = "Kartu Peminjaman ".$data_pinjaman[0]->nama_lengkap;

        //export ke xlsx
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function draw_ttd($ttd, $node, $file)
    {
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName($ttd);
        $drawing->setDescription('TTD Siswa');
        $drawing->setPath('./asset/admin/ttd/'.$ttd);
        $drawing->setCoordinates("G$node");
        $drawing->setHeight(15);
        $drawing->setResizeProportional(true);
        $drawing->setWorksheet($file);
    }

    public function simpan_informasi_peminjaman_buku() {
        $data = $this->model_peminjaman->select_join5_where()->result();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Times new Roman');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(12);

        //style judul
        $styleJudulDokumen = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
            ],
            'font' => [
                'size' => 14,
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A1")->applyFromArray($styleJudulDokumen);
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getRowDimension(1)->setRowHeight(37.50);
        $spreadsheet->getActiveSheet()->mergeCells('A1:H1');

        //judul
        $judul = "INFORMASI PEMINJAMAN BUKU";
        $sheet->setCellValue('A1', $judul);

        //style header tabel
        $styleHeaderTabel = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A3:H3")->applyFromArray($styleHeaderTabel);
        $spreadsheet->getActiveSheet()->getRowDimension(3)->setRowHeight(35);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(4);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        
        //tanggal
        $spreadsheet->getActiveSheet()->mergeCells('G2:H2');
        $sheet->setCellValue('F2', 'Tanggal')
        ->setCellValue('G2', date("d-m-Y H:i:s"));

        //header tabel
        $sheet->setCellValue('A3', 'No')
        ->setCellValue('B3', 'Judul Buku')
        ->setCellValue('C3', 'Tahun Terbit')
        ->setCellValue('D3', 'Penulis')
        ->setCellValue('E3', 'Penerbit')
        ->setCellValue('F3', 'Dipinjam')
        ->setCellValue('G3', 'Tersedia')
        ->setCellValue('H3', 'Total');
        //data peminjaman
        $row = 4;
        $no = 1;
        foreach($data as $v) {
            $sheet->setCellValue("A$row", $no)
                ->setCellValue("B$row", $v->judul_buku)
                ->setCellValue("C$row", $v->tahun_terbit)
                ->setCellValue("D$row", $v->penulis)
                ->setCellValue("E$row", $v->penerbit)
                ->setCellValue("F$row", $v->dipinjam)
                ->setCellValue("G$row", $v->tersedia)
                ->setCellValue("H$row", $v->total);
            $row++;
            $no++;
        }

        //style tabel
        $row = $row-1;
        //all
        $styleTabelAll = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                'wrapText' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A3:H$row")->applyFromArray($styleTabelAll);

        //header
        $styleTabelHeader = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'font' => [
                'bold' => true,
            ],
        ];
        $spreadsheet->getActiveSheet()->getStyle("A3:H3")->applyFromArray($styleTabelHeader);
        // $spreadsheet->getActiveSheet()->getRowDimension(4)->setRowHeight(35);
        //end style tabel


        //membuat nama file
        $filename = "Informasi Peminjaman Buku ".date("d-m-Y H:i:s");

        //export ke xlsx
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}

/* End of file Export.php */

?>
