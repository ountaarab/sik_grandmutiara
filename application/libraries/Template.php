<?php

class Template {

    protected $_ci;

    function __construct() {
        $this->_ci = &get_instance();
    }

    function back_end($template, $data = null) {
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $data['_head'] = $this->_ci->load->view('template_back_end/header', $data, true);
        $data['_navbar'] = $this->_ci->load->view('template_back_end/navbar', $data, true);
        $data['_sidebar'] = $this->_ci->load->view('template_back_end/sidebar', $data, true);
        $data['_footer'] = $this->_ci->load->view('template_back_end/footer', $data, true);
        $this->_ci->load->view('template_back_end/body.php', $data);
    }

    function front_end($template, $data = null) {
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $data['_head'] = $this->_ci->load->view('templates_front_end/header', $data, true);
        $data['_navbar'] = $this->_ci->load->view('templates_front_end/navbar', $data, true);
        $data['_footer'] = $this->_ci->load->view('templates_front_end/footer', $data, true);
        $this->_ci->load->view('templates_front_end/body.php', $data);
    }

    function front_endnew($template, $data = null) {
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $data['_head'] = $this->_ci->load->view('templates_front_endnew/header', $data, true);
        $data['_navbar'] = $this->_ci->load->view('templates_front_endnew/navbar', $data, true);
        $data['_footer'] = $this->_ci->load->view('templates_front_endnew/footer', $data, true);
        $this->_ci->load->view('templates_front_endnew/body.php', $data);
    }
}