<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_flora;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Home extends BaseController
{

    public function login()
	{
		echo view ('header');
		echo view('login');
	}
	public function aksi_login()
	{
		$u=$this->request->getPost('username');
        $p=$this->request->getPost('pw');

        $model = new M_flora();
        $where=array(
            'username'=> $u,
            'pw'=> $p
        );
        $model = new M_flora();
        $cek = $model->getWhere('user',$where);

        if ($cek>0){
           session()->set('id_user',$cek->id_user);
           session()->set('username',$cek->username);
           session()->set('pw',$cek->pw);
           session()->set('level',$cek->id_level);
           return redirect()->to('home/dashboard');
        }else{
        return redirect()->to('home/login');
    }
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('home/login');
	}

	public function dashboard()
	{
		if (session()->get('level')>0){
		echo view ('header');
		echo view ('menu');
		echo view('dashboard');
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function level()
	{
		if (session()->get('level')>0){
		$model = new M_flora();
		$data['manda'] = $model->join('user','level','user.id_level=level.id_level', 'id_user');
		echo view ('header');
		echo view ('menu');
		echo view('level',$data);
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

//user
	public function user()
	{
		if (session()->get('level')>0){
		$model = new M_flora();
		$data['manda'] = $model->join('user','level','user.id_level=level.id_level', 'id_user');
		echo view ('header');
		echo view ('menu');
		echo view('user',$data);
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function tambah_user()
	{
		if (session()->get('level')>0){
		$model = new M_flora();
		echo view ('header');
		echo view ('menu');
		echo view('tambah_user');
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function aksi_t_user()
	{
		$model = new M_flora();
		$a = $this->request->getPost('username');
		$b = $this->request->getPost('pw');
		$c = $this->request->getPost('level');
		$isi = array(
			'username' => $a,
			'pw' => $b,
			'id_level' => $c
		);
		$model ->tambah('user', $isi);

		return redirect()->to('home/user');
	}

	public function hapus_user($id){
		$model = new M_flora();
		$where=array('id_user'=>$id);
		$model->hapus('user',$where);
		return redirect()->to('home/user');
	}

	public function edit_user($id){
		if (session()->get('level')>0){
		$model = new M_flora();
		$where=array('id_user'=>$id);

		$data['satu']=$model->getWhere('user',$where);

		echo view ('header');
		echo view ('menu',$data);
		echo view ('edit_user',$data);
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function aksi_edit_user()
	{
		$model = new M_flora();
		$a = $this->request->getPost('username');
		$b = $this->request->getPost('pw');
		$id = $this->request->getPost('id');

		$where=array('id_user'=>$id);

		$isi = array(
			'username' => $a,
			'pw' => $b

		);
		$model ->edit('user', $isi,$where);

		return redirect()->to('home/user');
	}


//karyawan
	public function karyawan()
	{
		if (session()->get('level')>0){
		$model = new M_flora();
		$data['manda'] = $model->tampil('karyawan', 'id_karyawan');
		echo view ('header');
		echo view ('menu');
		echo view('karyawan',$data);
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function tambah_karyawan()
	{
		if (session()->get('level')>0){
		$model = new M_flora();
		echo view ('header');
		echo view ('menu');
		echo view('tambah_karyawan');
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function aksi_t_karyawan()
	{
		$model = new M_flora();
		$a = $this->request->getPost('nama');
		$b = $this->request->getPost('nomor');
		$c = $this->request->getPost('jk');
		$d = $this->request->getPost('jabatan');
		$isi = array(
			'nama' => $a,
			'nomor' => $b,
			'jk' => $c,
			'jabatan' => $d
		);
		$model ->tambah('karyawan', $isi);

		return redirect()->to('home/karyawan');
	}

	public function hapus_karyawan($id){
		$model = new M_flora();
		$where=array('id_karyawan'=>$id);
		$model->hapus('karyawan',$where);
		return redirect()->to('home/karyawan');
	}

	public function edit_karyawan($id){
		if (session()->get('level')>0){
		$model = new M_flora();
		$where=array('id_karyawan'=>$id);

		$data['satu']=$model->getWhere('karyawan',$where);

		echo view ('header');
		echo view ('menu',$data);
		echo view ('edit_karyawan',$data);
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function aksi_edit_karyawan()
	{
		$model = new M_flora();
		$a = $this->request->getPost('nama');
		$b = $this->request->getPost('nomor');
		$c = $this->request->getPost('jk');
		$d = $this->request->getPost('jabatan');
		$id = $this->request->getPost('id');

		$where=array('id_karyawan'=>$id);

		$isi = array(
			'nama' => $a,
			'nomor' => $b,
			'jk' => $c,
			'jabatan' => $d

		);
		$model ->edit('karyawan', $isi,$where);

		return redirect()->to('home/karyawan');
	}


//absen
	public function absen()
	{
		if (session()->get('level')>0){
		$model = new M_flora();
		$data['manda'] = $model->tampil('absen', 'id_absen');
		echo view ('header');
		echo view ('menu');
		echo view('absen',$data);
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function tambah_absen()
	{
		if (session()->get('level')>0){
		$model = new M_flora();
		echo view ('header');
		echo view ('menu');
		echo view('tambah_absen');
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
		
	}

	public function aksi_t_absen()
	{
		$model = new M_flora();
		$a = $this->request->getPost('nama');
		$b = $this->request->getPost('tanggal');
		$c = $this->request->getPost('jam_masuk');
		$d = $this->request->getPost('jam_keluar');
		$isi = array(
			'nama' => $a,
			'tanggal' => $b,
			'jam_masuk' => $c,
			'jam_keluar' => $d
		);
		$model ->tambah('absen', $isi);

		return redirect()->to('home/absen');
	}

	public function hapus_absen($id){
		$model = new M_flora();
		$where=array('id_absen'=>$id);
		$model->hapus('absen',$where);
		return redirect()->to('home/absen');
	}

	public function edit_absen($id){
		if (session()->get('level')>0){
		$model = new M_flora();
		$where=array('id_absen'=>$id);

		$data['satu']=$model->getWhere('absen',$where);

		echo view ('header');
		echo view ('menu',$data);
		echo view ('edit_absen',$data);
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function aksi_edit_absen()
	{
		$model = new M_flora();
		$a = $this->request->getPost('nama');
		$b = $this->request->getPost('tanggal');
		$c = $this->request->getPost('jam_masuk');
		$d = $this->request->getPost('jam_keluar');
		$id = $this->request->getPost('id');

		$where=array('id_absen'=>$id);

		$isi = array(
			'nama' => $a,
			'tanggal' => $b,
			'jam_masuk' => $c,
			'jam_keluar' => $d
		);
		$model ->edit('absen', $isi,$where);

		return redirect()->to('home/absen');
	}

//gaji
	public function gaji()
	{
		if (session()->get('level')>0){
		$model = new M_flora();
		$data['manda'] = $model->tampil('gaji', 'id_gaji');
		echo view ('header');
		echo view ('menu');
		echo view('gaji',$data);
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function tambah_gaji()
	{
		if (session()->get('level')>0){
		$model = new M_flora();
		echo view ('header');
		echo view ('menu');
		echo view('tambah_gaji');
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
		
	}

	public function aksi_t_gaji()
	{
		$model = new M_flora();
		$a = $this->request->getPost('nama');
		$b = $this->request->getPost('gaji');
		$isi = array(
			'nama' => $a,
			'gaji' => $b
		);
		$model ->tambah('gaji', $isi);

		return redirect()->to('home/gaji');
	}

	public function hapus_gaji($id){
		$model = new M_flora();
		$where=array('id_gaji'=>$id);
		$model->hapus('gaji',$where);
		return redirect()->to('home/gaji');
	}

	public function edit_gaji($id){
		if (session()->get('level')>0){
		$model = new M_flora();
		$where=array('id_gaji'=>$id);

		$data['satu']=$model->getWhere('gaji',$where);

		echo view ('header');
		echo view ('menu',$data);
		echo view ('edit_gaji',$data);
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}

	public function aksi_edit_gaji()
	{
		$model = new M_flora();
		$a = $this->request->getPost('nama');
		$b = $this->request->getPost('gaji');
		$id = $this->request->getPost('id');

		$where=array('id_gaji'=>$id);

		$isi = array(
			'nama' => $a,
			'gaji' => $b
		);
		$model ->edit('gaji', $isi,$where);

		return redirect()->to('home/gaji');
	}

//laporan (include excel, pdf, browser)
	public function laporan()
	{
		if (session()->get('level')>0){
		$model = new M_flora();
		echo view ('header');
		echo view ('menu');
		echo view('laporan');
		echo view ('footer');
		}else{
            return redirect()->to('home/login');
        }
	}




	public function generate_pdf()
	{
		$this->laporan_pdf();
	}

	private function laporan_pdf()
	{
		$model = new M_flora();

		$start_date = $this->request->getPost('start_date'); 
		$end_date = $this->request->getPost('end_date'); 

		$data['laporan'] = $model->getLaporanByDate($start_date, $end_date); 
		$options = new Options();
		$options->set('isHtml5ParserEnabled', true);
		$options->set('isRemoteEnabled', true);
		$dompdf = new Dompdf($options);


		$html = view('laporan_pdf', $data);

		$dompdf->loadHtml($html);
		$dompdf->render();
		$dompdf->stream("laporan.pdf");
	}





	public function generate_window()
	{
		echo view('header');
		echo view('menu');
		echo view('laporan');
		echo view('footer');
	}

	public function generate_window_result()
	{
        // Ambil data formulir berdasarkan rentang waktu dari request POST
		$start_date = $this->request->getPost('start_date');
		$end_date = $this->request->getPost('end_date');
		$model = new M_flora();
		$data['formulir'] = $model->getLaporanByDate($start_date, $end_date);

		echo view('cetak_hasil', $data);
	}




	public function generate_excel()
	{
		$model = new M_flora();
		$start_date = $this->request->getPost('start_date'); 
		$end_date = $this->request->getPost('end_date'); 


		$data['laporan'] = $model->getLaporanByDateForExcel($start_date, $end_date);
		$spreadsheet = new Spreadsheet();
		$spreadsheet->getProperties()->setCreator("Your Name")
		->setLastModifiedBy("Your Name")
		->setTitle("Laporan Booking")
		->setSubject("Laporan Booking")
		->setDescription("Laporan Booking")
		->setKeywords("PHPExcel")
		->setCategory("Test result file");


		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'nama')
		->setCellValue('B1', 'tanggal')
		->setCellValue('C1', 'jam masuk')
		->setCellValue('D1', 'jam keluar');


		$rowCount = 2;
		foreach ($data['laporan'] as $row) {
			$sheet->setCellValue('A'.$rowCount, $row['nama'])
			->setCellValue('B'.$rowCount, $row['tanggal'])
			->setCellValue('C'.$rowCount, $row['jam_masuk'])
			->setCellValue('D'.$rowCount, $row['jam_keluar']);
			$rowCount++;
		}


		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="laporan_dokter.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
	}

}