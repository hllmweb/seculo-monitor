<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagina extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        //libreris e helprs
        $this->load->helper(array('form', 'url', 'html', 'directory', 'funcoes_helper'));
        $this->load->library(array('session','form_validation', 'pagination','autenticacao'));
        
        //models
        $this->load->model('m_datamodule', 'datamodule', true);
        $this->load->model('m_lockupfield', 'lockupfield', true);
    }

   //lista principal dos chamado 
   function index() { 
        //autenticação & protetor de acesso
        $this->autenticacao->verificador();

        $data = array(
            'titulo_page'   => 'Século Monitor',
        );

        $this->load->view('chamado/pagina', $data);
    }



    //sair chamado
    function sair(){
        $this->session->unset_userdata('IDUSUARIO');
        $this->session->unset_userdata('TIPO');
        $this->session->unset_userdata('NOME');

        $this->session->sess_destroy();
        redirect(base_url('login/index'));    
    }


}