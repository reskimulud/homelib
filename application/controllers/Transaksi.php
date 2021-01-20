<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller

{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        // $this->load->model('Pagination_model', 'page');
    }

    public function index()
    {
        $data['title']          = 'Transaksi';
        $data['user']           = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transactions']   = $this->database->getTransaction();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('backend/transaction/index', $data);
        $this->load->view('template/footer');
    }

    public function edit($value, $id)
    {
        $transactions    = $this->database->getTransaction();

        if ($id == '') {
            $this->session->set_flashdata(
                'error',
                'Data tidak diedit'
            );
            redirect('transaksi');
        } else {

            if ($value < 1 || $value > 3) {
                $this->session->set_flashdata(
                    'error',
                    'Data tidak diedit'
                );
                redirect('transaksi');
            } else {
                foreach ($transactions as $transaction) {
                    if ($transaction['id'] == $id) {
                        $this->db->where('id', $id);
                        $this->db->update('transaction', ['status' => $value]);

                        if ($value == 2) {
                            $invoice_number = 'INV' . $transaction['transaction_number'] . $value;

                            $result = $this->buaatInvoice($transaction['transaction_number'], $transaction['id'], $transaction['user_id']);
                            
                            if ($result) {

                                $this->session->set_flashdata(
                                    'toast',
                                    "Invoice ditambahkan dengan No. Invoice : #$invoice_number"
                                );
                            }

                        }

                        $this->session->set_flashdata(
                            'message',
                            'Status diperbarui'
                        );
                        redirect('transaksi');
                    }
                }
            }

        }
    }

    public function delete($id)
    {
        if ($id == '') {
            $this->session->set_flashdata(
                'error',
                'Data tidak dihapus'
            );
            redirect('transaksi');
        } else {
            $this->database->delete($id, 'transaction');

            $this->session->set_flashdata(
                'message',
                'Data berhasil dihapus'
            );
            redirect('transaksi');
        }
    }

    public function invoice()
    {
        $data['title']      = 'Invoice';
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoicies']  = $this->database->getInvoice();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('backend/transaction/invoice', $data);
        $this->load->view('template/footer');
    }

    public function buaatInvoice($transactionNumber, $transactionID, $userOrderID)
    {
        $invoice_number = 'INV' . $transactionNumber;
        $data   = [
            'invoice_number' => $invoice_number,
            'order_by'       => $userOrderID,
            'date_created'   => time(),
            'transaction_id' => $transactionID
        ];

        return $this->database->save($data, 'transaction_invoice');
    }

    public function queryDetailInvoice($id)
    {
        $query      = "SELECT `transaction_invoice`.*, `transaction`.`product`, `transaction`.`shipping_address`, `transaction`.`transaction_number`, `transaction`.`total_fee`, `user`.`name`, `user`.`email`, `user`.`phone`, `product_payment_method`.`method`, `product_payment_method`.`icon`, `product_payment_method`.`account_holder`, `product_payment_method`.`number`
                         FROM `transaction_invoice` JOIN `transaction` JOIN `user` JOIN `product_payment_method`
                           ON `transaction_invoice`.`transaction_id`    = `transaction`.`id`
                          AND `transaction_invoice`.`order_by`          = `user`.`id`
                          AND `transaction`.`method_id` = `product_payment_method`.`id`   
                        WHERE `transaction_invoice`.`id`                = $id";
        return $this->db->query($query)->row_array();
    }

    public function detail_invoice($id)
    {
        $detailInvoice  = $this->queryDetailInvoice($id);

        if ($detailInvoice) {
            $data['title']      = 'Detail Invoice #' . $detailInvoice['invoice_number'];
            $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['detail']     = $detailInvoice;
            $data['products']   = json_decode($detailInvoice['product']);
            
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('backend/transaction/detail_invoice', $data);
            $this->load->view('template/footer');

        } else {
            $this->session->set_flashdata(
                'error',
                'Invoice tidak ditemukan'
            );
            redirect('transaksi/invoice');
        }

        
    }

    public function print_invoice($id)
    {
        $detailInvoice  = $this->queryDetailInvoice($id);

        if ($detailInvoice) {
            $data['title']      = 'Detail Invoice' . $detailInvoice['invoice_number'];
            $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['detail']     = $detailInvoice;
            $data['products']   = json_decode($detailInvoice['product']);
            
            $this->load->view('backend/transaction/print_invoice', $data);

        } else {
            $this->session->set_flashdata(
                'error',
                'Invoice tidak ditemukan'
            );
            redirect('transaksi/invoice');
        }

        
    }

    public function deleteinvoice($id)
    {
        if ($id == '') {
            $this->session->set_flashdata(
                'error',
                'Data tidak dihapus'
            );
            redirect('transaksi/invoice');
        } else {
            $this->database->delete($id, 'transaction_invoice');
            
            $this->session->set_flashdata(
                'message',
                'Data berhasil dihapus'
            );
            redirect('transaksi/invoice');
        }
    }

    public function konfirmasi()
    {
        $data['title']      = 'Konfirmasi Pembayaran';
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['confirms']   = $this->db->get('transaction_confirm')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('backend/transaction/confirm', $data);
        $this->load->view('template/footer');
    }

    public function confirm($transaction_number)
    {
        $transaction    = $this->database->getTransactionByNumber($transaction_number);
        $confirm        = $this->db->get_where('transaction_confirm', ['transaction_number' => $transaction_number])->row_array();

        if ($transaction) {
            $this->database->update(['status' => 2], $transaction['id'], 'transaction');
            $this->database->update(['is_confirmed' => 1], $confirm['id'], 'transaction_confirm');

            $invoice = $this->buaatInvoice($transaction['transaction_number'], $transaction['id'], $transaction['user_id']);

            if ($invoice) {
                $invoice_number = 'INV' . $transaction['transaction_number'];
                $this->session->set_flashdata(
                    'toast',
                    "Invoice ditambahkan dengan No. Invoice : #$invoice_number"
                );
            }

            $this->session->set_flashdata(
                'message',
                'Permintaan dikonfirmasi'
            );
            redirect('transaksi/konfirmasi');
        } else {
            $this->session->set_flashdata(
                'error',
                'Transaksi tidak ditemukan'
            );
            redirect('transaksi/konfirmasi');
        }
    }

}