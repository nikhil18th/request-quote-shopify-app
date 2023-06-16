<?php
if (!defined('BASEPATH'))
   // exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

// header('Content-Security-Policy: frame-ancestors : https://bigcapp-test-demo.demolocations.com/ https://bigcapp-test-demo.demolocations.com/login https://bigcapp-test-demo.demolocations.com/homepage https://shopteststore1234.myshopify.com https://admin.shopify.com');
?>
<!-- <meta https-equiv="Content-Security-Policy" content="default-src 'self' ; ">  -->
<?php

class Login extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('homem', 'home');
        $this->load->model('loginm', 'auth');

       // $this->load->model('charges_model', 'charges');
    }

    public function index() {
        //echo "inn";
        //8cc9fd8c502def5d2c4a42275e6d8fdc
        //echo $this->input->get('code');
        if ($this->input->get('code')) {
            
            $code = $this->input->get('code');
            $shop = $this->input->get('shop');
            $params = array('shop_domain' => $shop, 'token' => '', 'api_key' => API_KEY, 'secret' => SECRET);
            $this->load->library('Shopifyapi', $params);
            $token = $this->shopifyapi->getAccessToken($code);
           // echo "inn";
           // echo $token;
            if ($token != '') {

                $this->session->set_userdata('token', $token);
                $this->session->set_userdata('shop', $shop);
                $getstore = $this->auth->checkStore($shop, $token);
                
                if (!$getstore) {

                    $data = array('shop_url' => $shop, 'token' => $token, 'created_at' => date('Y:m:d H:i:s'), 'status' => 1, 'is_updated' => 1);//, 'is_updated' => 1
                    $shop_id = $this->auth->setStore($data);
                                        

                    $getstore = $this->auth->checkStore($shop, $token);
                    

                    $this->session->set_userdata('store', $getstore);
                    
                } else {
                    
                    $this->auth->UpdateToken($shop, $token, 1);
                    $getstore = $this->auth->checkStore($shop, $token);                    
                    $this->session->set_userdata('store', $getstore);
                }
                //echo "inn2"; //die;
                //$getstore
                redirect('homepage?token='.$token);
                //redirect('homepage');
            }
           // echo "inn3"; die;
            //redirect('homepage');
            redirect('homepage?token='.$token);
            exit;
        } else if ($this->input->post('shop') || ($this->input->get('shop'))) {
            
            $shop = $this->input->post('shop') ? $this->input->post('shop') : $this->input->get('shop');
            $params = array('shop_domain' => $shop, 'token' => '', 'api_key' => API_KEY, 'secret' => SECRET);
            $this->load->library('shopifyapi', $params);

            //get the URL to the current page
            $pageURL = base_url('login');
            redirect($this->shopifyapi->getAuthorizeUrl(SHOPIFY_SCOPE, $pageURL));
            exit;
        }
        $data['title'] = 'Training';
        $this->load->view('loginpage', $data);
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }
     
    
}