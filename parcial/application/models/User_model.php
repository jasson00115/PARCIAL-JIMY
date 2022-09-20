<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function save($data)
    {
        $s = $this->db->insert("codes", $data);
        return $s;
    }

    public function getUsers()
    {
        $this->db->select("*");
        $this->db->from("codes");
        $results = $this->db->get();
        return $results->result();
    }

    public function getUser($id)
    {
        $this->db->select("u.nombre, u.email, u.contrasenia, u.confirmacion u.codigo, u.carrera, u.anio, u.correlativo");
        $this->db->from("codes");
        $this->db->where("u.alumno", $id);
        $result = $this->db->get();
        return $result->row();
    }

    public function update($data, $id)
    {
        $this->db->where("alumno", $id);
        $this->db->update("codes", $data);
    }

    public function delete($id)
    {
        $this->db->where("alumno", $id);
        $this->db->delete("codes");
    }

    public function TokenAuth($token)
    {
        $this->db->select("*");
        $this->db->from("codes");
        $this->db->where("codigo", $token);
        $results = $this->db->get();
        return empty($results->result());
    }

    public function accederA($email, $contrasenia)
    {
        global $encrypted3;
        if($contrasenia != null)
        {
            $encrypted3 = md5($contrasenia);
        }
        
        $this->db->select("*");
        $this->db->from("codes");
        $this->db->where("email = '" . $email . "' and contrasenia = '" . $encrypted3 . "' ");

        $result = $this->db->get()->row();

        if ($result) {
            echo '<div id="ok" width="30px" class="alert alert-success" role="alert">
            <h5>INICIO DE SESIÓN EXITOSO</h5>
            </div>';
            return true;
        } else {
        }
    }

    public function cambioC($email, $contrasenia)
    {
        global $encrypted4;
        if($contrasenia != null){
            $encrypted4 = md5($contrasenia);
        }
        
        $this->db->select("*");
        $this->db->from("codes");
        $this->db->where("email ='" . $email . "'");

        $result = $this->db->get()->row();

        if ($result) {
            $datos = $this->db->query("UPDATE codes SET contrasenia = '" . $encrypted4 . "' WHERE email = '" . $email . "'");
            if ($datos) {
                echo '<div id="ok" width="30px" class="alert alert-success" role="alert">
                <h5>CAMBIO DE CONTRASEÑA EXITOSO</h5>
                </div>';
                return $datos;
            } else {
                echo '<div id="error" width:30px class="alert alert-danger" role="alert">
                <h5>CAMBIO DE CONTRASEÑA FALLIDO</h5>
                </div>';
                return null;
            }
        } else {
        }
    }
}
