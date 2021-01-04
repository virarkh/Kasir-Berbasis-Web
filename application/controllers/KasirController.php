<?php
defined('BASEPATH') or exit('No direct script access allowed');

setlocale(LC_ALL, 'id-ID', 'id_ID');

class KasirController extends CI_Controller
{

        function __construct()
        {
                parent::__construct();
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

        public function index()
        {
                // if ($this->session->userdata('logged_in') != TRUE) {
                //         $this->session->set_flashdata('notif', 'Anda harus login dulu');
                //         redirect('AuthController');
                // }

                $tgl_awal   = $this->input->get('tgl_awal');
                $tgl_akhir  = $this->input->get('tgl_akhir');

                if (empty($tgl_awal) or empty($tgl_akhir)) {
                        $transaksi      = $this->kasir_model->index();
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

        public function tambah()
        {
                // if ($this->session->userdata('logged_in') != TRUE) {
                //         $this->session->set_flashdata('notif', 'Anda harus login dulu');
                //         redirect('AuthController');
                // }

                $data['transaksi']          = $this->kasir_model->index();
                $data['jenis_kendaraan']    = $this->jeniskendaraan_model->index();
                $data['metode_mencuci']     = $this->metodecuci_model->index();
                $data['diskon']             = $this->diskon_model->index();
                $data['user']               = $this->user_model->index();

                $data = array(
                        'invoice' => $this->kasir_model->tambah_data()
                );

                $this->load->view('kasir/master/header', $data);
                $this->load->view('kasir/kasir_tambah', $data, array('error' => ''));
                $this->load->view('kasir/master/footer', $data);
        }

        public function detail($id)
        {
                // if ($this->session->userdata('logged_in') != TRUE) {
                //         $this->session->set_flashdata('notif', 'Anda harus login dulu');
                //         redirect('AuthController');
                // }

                $where  = array('id' => $id);
                $data['transaksi'] = $this->kasir_model->detail($where, 'transaksi')->result();

                $jenis_kendaraan = $this->kasir_model->get_jns_kendaraan($id);
                $data['jenis_kendaraan'] = $jenis_kendaraan;

                $metode_mencuci = $this->kasir_model->get_met_cuci($id);
                $data['metode_mencuci'] = $metode_mencuci;

                $diskon = $this->kasir_model->get_diskon($id);
                $data['diskon'] = $diskon;

                $user = $this->kasir_model->get_user($id);
                $data['user'] = $user;

                $this->load->view('kasir/master/header', $data);
                $this->load->view('kasir/master/topbar', $data);
                $this->load->view('kasir/kasir_detail', $data);
                $this->load->view('kasir/master/footer', $data);
        }

        public function profil()
        {
                // if ($this->session->userdata('logged_in') != TRUE) {
                //         $this->session->set_flashdata('notif', 'Anda harus login dulu');
                //         redirect('AuthController');
                // }

                // if ($this->session->userdata('logged_in') != TRUE) {
                //         $this->session->set_flashdata('notif', 'Anda harus login dulu');
                //         redirect('AuthController');
                // }

                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

                $this->load->view('kasir/master/header', $data);
                $this->load->view('kasir/master/topbar', $data);
                $this->load->view('kasir/profil_detail', $data);
                $this->load->view('kasir/master/footer', $data);
        }

        public function edit()
        {
                // if ($this->session->userdata('logged_in') != TRUE) {
                //         $this->session->set_flashdata('notif', 'Anda harus login dulu');
                //         redirect('AuthController');
                // }

                // if ($this->session->userdata('logged_in') != TRUE) {
                //         $this->session->set_flashdata('notif', 'Anda harus login dulu');
                //         redirect('AuthController');
                // }

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

        public function ganti_pass()
        {
                // if ($this->session->userdata('logged_in') != TRUE) {
                //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" >Anda Harus Login Terlebih Dahulu!</div>');
                //         redirect('AuthController');
                // }

                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

                $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');

                $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');

                $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

                if ($this->form_validation->run() == false) {
                        $this->load->view('kasir/master/header', $data);
                        $this->load->view('kasir/master/topbar', $data);
                        $this->load->view('kasir/ganti_pass', $data);
                        $this->load->view('kasir/master/footer', $data);
                } else {
                        $current_password = $this->input->post('current_password');
                        $new_password     = $this->input->post('new_password1');

                        if (!password_verify($current_password, $data['user']['password']['view_password'])) {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah Semua</div>');
                                redirect('KasirController/ganti_pass');
                        } else {
                                if ($current_password == $new_password) {
                                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Baru tidak boleh sama dengan password lama</div>');
                                        redirect('KasirController/ganti_pass');
                                } else {
                                        // jika pass sudah OK
                                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                                        $this->db->set('password', $password_hash);
                                        $this->db->where('username', $this->session->userdata('username'));
                                        $this->db->update('user');

                                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti</div>');
                                        redirect('KasirController/profil');
                                }
                        }
                }
        }
}
