<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('edit_menu');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['sitename'] = 'WIBURL';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Menu successfully added</div>');
            redirect('menu');
        }
    }

    function edit()
    {
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');
        $this->edit_menu->menuEdit($id, $menu);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Menu successfully edited</div>');
        redirect('menu');
    }

    function delete()
    {

        $id = $this->input->post('id');
        $this->edit_menu->menuDelete($id, 'user_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success">Menu successfully deleted</div>');
        redirect('menu');
    }


    // Submenu



    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['sitename'] = 'WIBURL';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->edit_menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Submenu successfully added</div>');
            redirect('menu/submenu');
        }
    }

    public function subEdit()
    {
        $id = $this->input->post('id');

        $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];

        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Submenu successfully edited</div>');
        redirect('menu/submenu');
    }

    public function subDelete()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        $this->session->set_flashdata('message', '<div class="alert alert-success">Submenu successfully deleted</div>');
        redirect('menu/submenu');
    }
}
