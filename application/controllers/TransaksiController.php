<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('transaksi_model');
        $this->load->model('jeniskendaraan_model');
        $this->load->model('metodecuci_model');
        $this->load->model('diskon_model');
        $this->load->model('user_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksi_model->index();
        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/transaksi', $data);
        $this->load->view('pemilik/master/footer', $data);
    }

    public function tambah()
    {
        $data['transaksi']          = $this->transaksi_model->index();
        $data['jenis_kendaraan']    = $this->jeniskendaraan_model->index();
        $data['metode_mencuci']     = $this->metodecuci_model->index();
        $data['diskon']             = $this->diskon_model->index();
        $data['user']               = $this->user_model->index();

        $this->load->view('pemilik/master/header', $data);
        $this->load->view('pemilik/master/sidebar', $data);
        $this->load->view('pemilik/master/topbar', $data);
        $this->load->view('pemilik/transaksi_tambah', $data, array('error' => ''));
        $this->load->view('pemilik/master/footer', $data);
    }

    public function simpanData()
    {
    }

    public function jenis_kendaraan()
    {
        $id = $_GET['jenis_kendaraan'];
        $this->db->select('*');
        $this->db->from('jenis_kendaraan');
        $this->db->where('id', $id);
        $data = $this->db->get('')->result();

        foreach ($data as $t) :
            echo $t->tarif;
        endforeach;
    }

    public function metode_mencuci()
    {
        $id2 = $_GET['metode_mencuci'];
        $this->db->select('*');
        $this->db->from('metode_mencuci');
        $this->db->where('id', $id2);
        $data = $this->db->get('')->result();

        foreach ($data as $tm) :
            echo $tm->tarif_tambahan;
        endforeach;
    }

    public function diskon()
    {
        $id3 = $_GET['diskon'];
        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->where('id', $id3);
        $data = $this->db->get('')->result();

        foreach ($data as $d) :
            echo $d->potongan_harga;
        endforeach;
    }

    public function subtotal()
    {
        $id     = $_GET['jenis_kendaraan'];
        $id2    = $_GET['metode_mencuci'];

        $this->db->select('*');
        $this->db->from('jenis_kendaraan');
        $this->db->where('id', $id);
        $data1 = $this->db->get('')->result();

        $this->db->select('*');
        $this->db->from('metode_mencuci');
        $this->db->where('id', $id2);
        $data2 = $this->db->get('')->result();

        foreach ($data1 as $d1) :
            foreach ($data2 as $d2) :
                //         $sub_total = $d1->tarif + $d2->tarif_tambahan;
                //         echo $sub_total;

                if (!empty($data2)) {
                    $sub_total = $d1->tarif + $d2->tarif_tambahan;
                    echo $sub_total;
                } else {
                    echo $d1->tarif;
                }

            endforeach;
        endforeach;

        // foreach ($data1 as $d) :
        //     foreach ($$data2 as $d2):
        //         if(!empty($id2)){
        //             $sub_total = $d->tarif + $id2;
        //             echo $sub_total;
        //         }else{
        //             echo $d->tarif;
        //         }
        //     endforeach;

        //     if (!empty($data2)) {
        //         $sub_total = $d->tarif + $data2;
        //         echo $sub_total;
        //     } else {
        //         echo $d->tarif;
        //     }
        // endforeach;
    }

    public function total()
    {
        $id  = $_GET['jenis_kendaraan'];
        $id2 = $_GET['metode_cuci'];
        $id3 = $_GET['diskon'];

        $this->db->select('*');
        $this->db->from('jenis_kendaraan');
        $this->db->where('id', $id);
        $data1 = $this->db->get('')->result();

        $this->db->select('*');
        $this->db->from('metode_cuci');
        $this->db->where('id', $id2);
        $data2 = $this->db->get('')->result();

        $this->db->select('*');
        $this->db->from('diskon');
        $this->db->where('id', $id3);
        $data3 = $this->db->get('')->result();

        foreach ($data1 as $d) :
            foreach ($data2 as $d2) :
                foreach ($data3 as $d3) :
                    if (!empty($id3)) {
                        if (!empty($id2)) {
                            $jenis_kendaraan    = $d->tarif;
                            $metode_mencuci     = $d2->tarif_tambahan;
                            $diskon             = $d3->potongan_harga;
                            $total      = ($jenis_kendaraan + $metode_mencuci) - $diskon;
                            echo $total;
                        } else {
                            echo $d->tarif;
                        }
                    } elseif ($id3 == 0) {
                        if (!empty($id2)) {
                            $jenis_kendaraan    = $d->tarif;
                            $metode_mencuci     = $d2->tarif_tambahan;

                            $total = $jenis_kendaraan + $metode_mencuci;
                            echo $total;
                        } else {
                            echo $d->tarif;
                        }
                    } else {
                        if (!empty($id2)) {
                            $total = $d->tarif + $d2->tarif_tambahan;
                            echo $total;
                        } else {
                            echo $d->tarif;
                        }
                    }

                endforeach;

            endforeach;

        endforeach;
    }

    public function detail()
    {
        $this->load->view('pemilik/master/header');
        $this->load->view('pemilik/master/sidebar');
        $this->load->view('pemilik/master/topbar');
        $this->load->view('pemilik/transaksi_detail');
        $this->load->view('pemilik/master/footer');
    }
}
