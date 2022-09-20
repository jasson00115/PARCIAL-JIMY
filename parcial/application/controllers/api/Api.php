<?php
defined('BASEPATH') or exit('No direct script access allowed');
/* access library REST_Controller, remember is library is a REST Server resource*/
require APPPATH . 'libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class api extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'use');
    }

    public function index_get()
    {
        $id = $this->use->getUsers();
        $this->response($id, 200);
    }

    public function get_token($longitud)
    {
        $codigo = "";
        $alphabeth = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $alphabeth[mt_rand(0, strlen($alphabeth) - 1)];
        }

        return $codigo;
    }

    public function index_post()
    {
        $nombre = $this->input->post('nombre');
        $email = $this->input->post('email');
        $contrasenia = $this->input->post('contrasenia');
        $confirmacion = $this->input->post('confirmacion');
        $codigo = $this->get_token(8);
        $carrera = $this->input->post('carrera');
        $anio = $this->input->post('anio');
        $correlativo = $this->input->post('correlativo');


        while (!$this->use->TokenAuth($codigo)) {
            $codigo = $this->get_token(8);
        }
        
        $encrypted1 = md5($contrasenia);
        $encrypted2 = md5($confirmacion);

        $data = array(

            'nombre' => $nombre,
            'email' => $email,
            'contrasenia' => $encrypted1,
            'confirmacion' => $encrypted2,
            'codigo' => $codigo,
            'carrera' => $carrera,
            'anio' => $anio,
            'correlativo' => $correlativo,

        );

        $insert = $this->use->save($data);
        $http_codigo = 0;
        if ($insert) {
            $http_codigo = 200;
            //$res['error'] = false;
            $res['message'] = 'insert success';
            $res['data'] = $data;
        } else {
            $res['error'] = true;
            $res['message'] = 'insert failed';
            $res['data'] = null;
            $http_codigo = 400;
        }

        $this->response($res, $http_codigo);
    }
}
