<?php
defined('BASEPATH') or exit('No direct script access allowed');

setlocale(LC_ALL, 'id-ID', 'id_ID');

class KasirController extends CI_Controller
{
        function __construct()
        {
                parent::__construct();
                date_default_timezone_set('Asia/Jakarta');
                $this->load->model('kasir_model');
                $this->load->model('jeniskendaraan_model');
                $this->load->model('metodecuci_model');
                $this->load->model('diskon_model');
                $this->load->model('user_model');
                $this->load->helper('url', 'form');
                $this->load->library('form_validation');
                $this->load->library('session');
                $this->load->library('dompdf_gen');

                if ($this->session->userdata('logged_in') != TRUE) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
                        redirect('AuthController');
                }
        }

        public function indexKasir()
        {
                $tgl_awal   = $this->input->get('tgl_awal');
                $tgl_akhir  = $this->input->get('tgl_akhir');

                if (empty($tgl_awal) or empty($tgl_akhir)) {
                        $transaksi      = $this->kasir_model->indexKasir();
                        // $url_cetak      = 'TransaksiController/cetak';
                        $label          = 'Semua Data Pengeluaran';
                } else {

                        $transaksi      = $this->kasir_model->view_by_date($tgl_awal, $tgl_akhir);
                        $tgl_awal       = strftime('%d %B %Y', strtotime($tgl_awal));
                        $tgl_akhir      = strftime('%d %B %Y', strtotime($tgl_akhir));
                        $label          = 'Periode Tanggal &nbsp;' . $tgl_awal . ' - ' . $tgl_akhir;
                }

                $data['transaksi']  = $transaksi;
                $data['label']      = $label;


                $this->load->view('kasir/master/header', $data);
                $this->load->view('kasir/master/topbar', $data);
                $this->load->view('kasir/index', $data);
                $this->load->view('kasir/master/footer', $data);
        }

        public function addKasir()
        {
                $data['transaksi']          = $this->kasir_model->indexKasir();
                $data['jenis_kendaraan']    = $this->jeniskendaraan_model->indexJK();
                $data['metode_mencuci']     = $this->metodecuci_model->indexMM();
                $data['diskon']             = $this->diskon_model->indexDiskon();
                $data['user']               = $this->user_model->index();
                $data['invoice']            = $this->kasir_model->invoice();

                $this->load->view('kasir/master/header', $data);
                $this->load->view('kasir/master/topbar', $data);
                $this->load->view('kasir/kasir_tambah', $data, array('error' => ''));
                $this->load->view('kasir/master/footer', $data);
        }

        public function jenis_kendaraan()
        {
                $id = $_GET['jenis_kendaraan'];
                $this->db->select('*');
                $this->db->from('jenis_kendaraan');
                $this->db->where('id', $id);
                $jenis_kendaraan = $this->db->get('')->result();

                foreach ($jenis_kendaraan as $jk) :
                        echo $jk->tarif;
                endforeach;
        }

        public function metode_mencuci()
        {
                $id2 = $_GET['metode_mencuci'];
                $this->db->select('*');
                $this->db->from('metode_mencuci');
                $this->db->where('id', $id2);
                $metode_mencuci = $this->db->get('')->result();

                foreach ($metode_mencuci as $mm) :
                        echo $mm->tarif_tambahan;
                endforeach;
        }

        public function diskon()
        {
                $id3 = $_GET['diskon'];
                $this->db->select('*');
                $this->db->from('diskon');
                $this->db->where('id', $id3);
                $diskon = $this->db->get('')->result();

                foreach ($diskon as $d) :
                        echo $d->potongan_harga;
                endforeach;
        }

        public function subtotal()
        {
                $id     = $_GET['jenis_kendaraan'];
                $id2    = $_GET['metode_mencuci'];
                // $id3    = $_GET['diskon'];

                $this->db->select('*');
                $this->db->from('jenis_kendaraan');
                $this->db->where('id', $id);
                $jenis_kendaraan = $this->db->get('')->result();

                $this->db->select('*');
                $this->db->from('metode_mencuci');
                $this->db->where('id', $id2);
                $metode_mencuci = $this->db->get('')->result();

                foreach ($jenis_kendaraan as $jk) :
                        foreach ($metode_mencuci as $mm) :
                                if (!empty($id2)) {
                                        $subtotal = $jk->tarif + $mm->tarif_tambahan;
                                        echo $subtotal;
                                        // }
                                } else {
                                        echo $jk->tarif;
                                }
                        endforeach;
                endforeach;
        }

        public function total()
        {
                $id     = $_GET['jenis_kendaraan'];
                $id2    = $_GET['metode_mencuci'];
                $id3    = $_GET['diskon'];

                $this->db->select('*');
                $this->db->from('jenis_kendaraan');
                $this->db->where('id', $id);
                $jenis_kendaraan = $this->db->get('')->result();

                $this->db->select('*');
                $this->db->from('metode_mencuci');
                $this->db->where('id', $id2);
                $metode_mencuci = $this->db->get('')->result();

                $this->db->select('*');
                $this->db->from('diskon');
                $this->db->where('id', $id3);
                $diskon = $this->db->get('')->result();

                foreach ($jenis_kendaraan as $jk) :
                        foreach ($metode_mencuci as $mm) :
                                foreach ($diskon as $d) :
                                        if (!empty($id2)) {
                                                if (!empty($id3)) {
                                                        $total = (($jk->tarif + $mm->tarif_tambahan) - $d->potongan_harga);
                                                        echo $total;
                                                }
                                        } else {
                                                echo $jk->tarif;
                                        }

                                endforeach;
                        endforeach;
                endforeach;
        }

        public function addDataKasir()
        {
                $data =  [
                        'tanggal'           => $this->input->post('tanggal'),
                        'invoice '          => $this->input->post('invoice'),
                        'user_id'           => $this->input->post('user_id'),
                        'nama_customer '    => $this->input->post('nama_customer'),
                        'jenis_id'          => $this->input->post('jenis_id'),
                        'metode_id'         => $this->input->post('metode_id'),
                        'sub_total'         => $this->input->post('sub_total'),
                        'diskon_id'         => $this->input->post('diskon_id'),
                        'total'             => $this->input->post('total'),
                ];
                $this->session->set_flashdata('success', 'Data Berhasil di Tambah');

                $this->kasir_model->addModelKasir($data);
                redirect('KasirController/indexKasir');
        }

        // NOT USE!!!!
        // public function detail($id)
        // {
        //         $where  = array('id' => $id);
        //         $data['transaksi'] = $this->kasir_model->detailModel($where, 'transaksi')->result();

        //         $jenis_kendaraan            = $this->kasir_model->get_jenis_kendaraan($id);
        //         $data['jenis_kendaraan']    = $jenis_kendaraan;

        //         $metode_mencuci             = $this->kasir_model->get_metode_mencuci($id);
        //         $data['metode_mencuci']     = $metode_mencuci;

        //         $diskon                     = $this->kasir_model->get_diskon($id);
        //         $data['diskon']             = $diskon;

        //         $user   = $this->kasir_model->get_user($id);
        //         $data['user']   = $user;

        //         $this->load->view('kasir/master/header', $data);
        //         $this->load->view('kasir/master/topbar', $data);
        //         $this->load->view('kasir/kasir_detail', $data);
        //         $this->load->view('kasir/master/footer', $data);
        // }

        public function profil()
        {
                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

                $this->load->view('kasir/master/header', $data);
                $this->load->view('kasir/master/topbar', $data);
                $this->load->view('kasir/profil_detail', $data);
                $this->load->view('kasir/master/footer', $data);
        }

        public function edit()
        {
                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

                $this->form_validation->set_rules('username', 'username', 'required|trim');

                if ($this->form_validation->run() == false) {
                        $this->load->view('kasir/master/header', $data);
                        $this->load->view('kasir/master/topbar', $data);
                        $this->load->view('kasir/profil_edit', $data);
                        $this->load->view('kasir/master/footer', $data);
                } else {
                        $nama_user = $this->input->post('nama_user');
                        $username = $this->input->post('username');
                        $email = $this->input->post('email');
                        $no_hp = $this->input->post('no_hp');
                        $alamat = $this->input->post('alamat');

                        // cek jika ada gambar yang akan diupload
                        $upload_image = $_FILES['foto_profil']['name'];

                        if ($upload_image) {
                                $config['allowed_types'] = 'gif|jpg|png';
                                $config['max_size']      = '2048';
                                $config['upload_path']   = './assets/profil';

                                $this->load->library('upload', $config);

                                if ($this->upload->do_upload('foto_profil')) {
                                        $old_image = $data['user']['foto_profil'];
                                        if ($old_image != 'default.png') {
                                                unlink(FCPATH . 'assets/profil/' . $old_image);
                                        }

                                        $new_image = $this->upload->data('file_name');
                                        $this->db->set('foto_profil', $new_image);
                                } else {
                                        echo $this->upload->display_errors();
                                }
                        }

                        $this->db->set('nama_user', $nama_user);
                        $this->db->set('email', $email);
                        $this->db->set('no_hp', $no_hp);
                        $this->db->set('alamat', $alamat);
                        $this->db->where('username', $username);
                        $this->db->update('user');

                        $this->session->set_flashdata('success', 'Data Berhasil di Ubah');

                        redirect('KasirController/profil');
                }
        }


        // NOT USE!!!
        // public function changePassword()
        // {
        //         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //         $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');

        //         $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[5]|matches[new_password2]');

        //         $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[5]|matches[new_password1]');

        //         if ($this->form_validation->run() == false) {
        //                 $this->load->view('kasir/master/header', $data);
        //                 $this->load->view('kasir/master/topbar', $data);
        //                 $this->load->view('kasir/change_password', $data);
        //                 $this->load->view('kasir/master/footer', $data);
        //         } else {
        //                 $current_password = $this->input->post('current_password');
        //                 $new_password     = $this->input->post('new_password1');

        //                 if (!password_verify($current_password, $data['user']['password']['view_password'])) {
        //                         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah Semua</div>');
        //                         redirect('KasirController/changePassword');
        //                 } else {
        //                         if ($current_password == $new_password) {
        //                                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru tidak boleh sama dengan password lama</div>');
        //                                 redirect('KasirController/changePassword');
        //                         } else {
        //                                 // jika pass sudah OK
        //                                 // $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
        //                                 $password         = md5($this->input->post('password1'));
        //                                 $view_password         = $this->input->post('password1');


        //                                 $this->db->set('password', $password);
        //                                 $this->db->set('view_password', $view_password);
        //                                 $this->db->where('email', $this->session->userdata('email'));
        //                                 $this->db->update('user');

        //                                 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti</div>');
        //                                 redirect('KasirController/profil');
        //                         }
        //                 }
        //         }
        // }
}
