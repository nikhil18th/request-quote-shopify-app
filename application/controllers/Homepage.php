<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');


class Homepage extends CI_Controller {

    function __construct(){

        ini_set('display_errors', 0);

        parent::__construct();

        $this->load->library('session','form_validation');

        $this->load->helper('url');

        $this->load->helper('form');

        $this->load->helper('file');

        $this->load->model('homem', 'home');

        $this->load->helper('download');
        $this->load->model('loginm', 'auth');
    }

    public function index()
    {   


        //echo "welcome"; //die;
         //$shop = "appinstallteststore.myshopify.com";

        // $getStore = $this->home->getStore($shop);
          //echo $getStore;
        //$token = $getStore->token;
        // echo $token;
   
   // // $data['title'] = 'Dashboard';

   //  $store_id      = getstore('id');

   //  //$orderdata = $this->orders->getOrderList();

   //  $orders = $this->orders->getTotalOrders();

   //  //$products = $this->orders->getTotalProducts();

   //  $data = ['total_orders' => $orders];

         $data = $this->auth->getAllStore();

// // create a new cURL resource
// $ch = curl_init();

// // set your URL to the request URL
// curl_setopt($ch, CURLOPT_URL, "https://appinstallteststore.myshopify.com/admin/products.json");
// curl_setopt($ch, CURLOPT_HEADER, 0);

// // pass to the browser to return results of the request
// $result = curl_exec($ch);

// // closes cURL resource
// curl_close($ch);


// //$product = JSON.decode($result)

//          print_r($result);

    //if ($this->input->get('token')) {
        
        //  if ($this->input->get('token') == $data[0]->token) {

         // $data['records'] = $this->home->getQuoteRequestData();
        
        //$response = $this->load->view('dashboard_quote_requestdata',$data,TRUE);
         $response = $this->load->view('welcome_dashboard');
        echo $response;
       //  }else{

       // echo "Invalid signin";
  //  }


  //  }else{

     //   echo "Invalid signin";
   // }

      
      
    }
    
    function ajax_upload()  
      {  
           if(isset($_FILES["image_file"]["name"]))  
           {  
                $config['upload_path'] = './upload/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  
                     echo $this->upload->display_errors();  
                }  
                else  
                {  

                    $data = $this->upload->data();
                     
                    $img = $data['file_name']; 

                    $images = array(
                        'image' => $img,
                    );

                    
                    
                   // $db_img = $this->home->getImgData('rquestquoteimage');

                   // if(!$db_img){
                       $this->db->insert('rquestquoteimage',$images);
                    //}else{


                    //}

                     echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
                }  
           }  
      }


   //  public function upload() 
   //  {
   //      //$post_data = $this->input->post();
   //      //print_r($post_data);die;
   //    // if ($this->input->get('hmac')) {
   //      // $imgname = $file_info['file_name']; 
   //       //$image = time().$img;
       
   //      $config['upload_path'] = './upload/';
   //      $config['allowed_types'] = 'jpg|png|jpeg|gif';
   //      $config['max_size'] = 1024000;
   //      $config['max_width'] = 1500;
   //      $config['max_height'] = 1500;
   //      //$config['file_name'] = $image;
        
   //      $this->load->library('upload', $config);
        
   //      if (!$this->upload->do_upload('profile_pic')) 
   //      {
   //          $error = array('error' => $this->upload->display_errors());
   //          $this->load->view('saveimageform', $error);
   //      }else{
   //          // $path = '/uploads/';
   //          // $files = glob($path.'*'); // get all file names
   //          // //print_r($files);
   //          // foreach($files as $file){ // iterate files
   //          // if(is_file($file))
   //          // unlink($file); // delete file
   //          // //echo $file.'file deleted';
   //          // }  
            
   //          $data = array('image_metadata' => $this->upload->data());
   //          $file_info = $this->upload->data();
   //          //print_r($file_info);
   //          $img = $file_info['file_name']; 

   //          $images = array(
   //              'image' => $img,
   //          );

   //          $this->db->insert('rquestquoteimage',$images);
   //          //echo $img;
   //          $this->load->view('saveimageform', $img);
   //      }

   //     //  }else{

   //     // echo "Invalid signin";
   // // }

   //  }
    
    public function dashboradViewLoad()
    {   

    //if ($this->input->get('hmac')) {
           
    
        $data['records'] = $this->home->getQuoteRequestData();
        
        $response = $this->load->view('dashboard_quote_requestdata',$data,TRUE);
        
        echo $response;
    //     }else{

    //     echo "Invalid signin";
    // }
        
        die;
    }


    public function productInqViewLoad()
    {   

    //if ($this->input->get('hmac')) {
           
    
        $data['records'] = $this->home->getProductInqData();
        
        $response = $this->load->view('product_inquiry_view',$data,TRUE);
        
        echo $response;
    //     }else{

    //     echo "Invalid signin";
    // }
        
        die;
    }

    public function SaveQuoteRequestImage()
    {   
       // if ($this->input->get('hmac')) {
        $data['records1'] = $this->home->saveRquestImage();
        $response = $this->load->view('saveimageform',$data,TRUE);
        
        echo $response;

    //     }else{

    //     echo "Invalid signin";
    // }
        die;
    }


    
    
    public function RequestQuoteSaveData()
    {   
       
        $post_data = $this->input->post();
       

        $inq_name = $post_data['name'];

        $inq_email = $post_data['email'];

        $inq_yourmessage = $post_data['yourmessage'];

        $inq_phone = $post_data['phone'];

        $inq_for = $post_data['enquiryfor'];



        $data = array(



                        'name'  => $inq_name,

                        'email'  => $inq_email,

                        'phone' => $inq_phone,

                        'enquiry_for' => $inq_for,

                        'message' => $inq_yourmessage,

                        'status' => '1',

                        'created_at' => date("Y-m-d H:i:s")

                        );  

          

             $insert = $this->db->insert('quote_requests',$data);

             if($insert){

               $resp = 'Sucess';

                }   

       
            echo json_encode(array('status' => $resp,'product_count' => $count));


    }



     public function ProductInqSaveData()
    {   
       

        $post_data = $this->input->post();
       

        $inq_name = $post_data['name'];

        $inq_email = $post_data['email'];

        $inq_yourmessage = $post_data['yourmessage'];

        $inq_phone = $post_data['phone'];




        $data = array(

                        'name'  => $inq_name,

                        'email'  => $inq_email,

                        'phone' => $inq_phone,

                        'message' => $inq_yourmessage,

                        'status' => '1',

                        'created_at' => date("Y-m-d H:i:s")

                        );  

             $insert = $this->db->insert('product_inquiry',$data);

             if($insert){

               $resp = 'Sucess';

                }   

       
            echo json_encode(array('status' => $resp,'product_count' => $count));


    }
    

     public function viewRecapchaSetting()
    {   
       
         $this->load->view('recapcha_setting_view');
         // https://appinstallteststore.myshopify.com/admin/api/2020-01/collections.json


//         $siteurl = SHOP_NAME;
//         $getStore = $this->home->getShopByUrl($siteurl);
//         $token = $getStore->token;
//         $shop = $getStore->shop_url;
//         //print_r($getStore);


//        $params = array('shop_domain' => $shop, 'token' => $token, 'api_key' => API_KEY, 'secret' => SECRET);
 
//     $this->load->library('shopifyapi', $params);

//         //die;
//         try {
// $product = $this->shopifyapi->call("GET","/admin/api/2023-01/collection_listings.json");
//         } catch (ShopifyApiException $e) {
//             // pre($e);
//         }
//           print_r($product);
        //$collection = $this->Shopifyapi->call('POST', '/admin/'.SHOPIFY_API_VERSION.'/collections.json');
          
         // echo json_encode($collection);

        // $post_data = $this->input->post();
       
        // $inq_name = $post_data['name'];

        // $inq_email = $post_data['email'];

        // $inq_yourmessage = $post_data['yourmessage'];

        // $inq_phone = $post_data['phone'];




        // $data = array(

        //                 'name'  => $inq_name,

        //                 'email'  => $inq_email,

        //                 'phone' => $inq_phone,

        //                 'message' => $inq_yourmessage,

        //                 'status' => '1',

        //                 'created_at' => date("Y-m-d H:i:s")

        //                 );  

        //      $insert = $this->db->insert('product_inquiry',$data);

        //      if($insert){

        //        $resp = 'Sucess';

        //         }   

       
        //     echo json_encode(array('status' => $resp,'product_count' => $count));


    }

     public function insetRecapchaSetting()
    {   
       
        $post_data = $this->input->post();
       
        $email = $post_data['email'];

        $sitekey = $post_data['sitekey'];

        $secretkey = $post_data['secretkey'];

        $data = array(
                        'email'  => $email,

                        'site_key'  => $sitekey,

                        'secret_key' => $secretkey

                        );  

          
             $insert = $this->db->insert('recapcha_configuration',$data);
             
             if($insert){

               $resp = 'Sucess';

                }   

       
            echo json_encode(array('status' => $resp,'product_count' => $count));


    }

//     public function wishlistCount()
//     {    

//             $post_data = $this->input->post();

//             $shopify_customer_id = $post_data['shopify_customer_id'];

//             $where3 = 'wishlist_products.'."shopify_customer_id = ".$shopify_customer_id; 

//             $wishlist_count = $this->home->getWishlistProductCount('wishlist_products',$where3);

//             $count = $wishlist_count[0]->wishlist_count;

//             echo json_encode(array('product_count' => $count));

//     }

//     public function getWishlistProduct()
//     {

//             $post_data = $this->input->post();

//             $shopify_customer_id = $post_data['shopify_customer_id'];

//             $where3 = 'wishlist_products.'."shopify_customer_id = ".$shopify_customer_id;  

//             $data['wishlist_product']  = $this->home->getResultByWhere('wishlist_products',$where3);

//             $view = $this->load->view('load_wishlist_product', $data, $return = true);

//             echo json_encode(['view' => $view]);

//             exit();
//     }

 
//     public function deleteWshlistProductByCustomer()
//     {

//             $Customer_id  = $_POST['Customerid'];
            
//             $where4 = 'wishlist_products.'."shopify_customer_id = ".$Customer_id;  
            
//             $delete = $this->home->deleteDataByCustomer('wishlist_products',$where4);
            
//             //$delete = $this->home->deleteDataByCustomer('temp_wishlist_products',$where4);
            
//             echo $delete;

//     }

//     public function getWishlistProductByWhere()
//     {

//             $Customer_id  = $_POST['Customerid'];

//             //$where5 = 'wishlist_products.'."shopify_customer_id = ".$Customer_id;  

//             $sta = 1;

//             $data2 = array('status' => 1); 

//             $where5 = 'wishlist_products.'."shopify_customer_id = ".$Customer_id;

//             $update = $this->home->update('wishlist_products',$data2,$where5);

//             if($update){

//                 echo "sucess";
//             }

//             //$mail_wishlist_product  = $this->home->getResultByWhere('wishlist_products',$where5);;

//             //$view = $this->load->view('load_wishlist_product', $data, $return = true);

//             //print_r ($mail_wishlist_product);

//             exit();

//     }

    

//     public function updateCheckStatus()
//     {

//             $Customer_id  = $_POST['Customerid'];

//             $variant_id  = $_POST['data_var_id'];

//             $sta = 1 ;

//             $data3 = array('status' => $sta ); 

//             $where5 = 'wishlist_products.'."shopify_customer_id = ".$Customer_id." and wishlist_products.product_variant_id = ".$variant_id;
            
//             //UPDATE `wishlist_products` SET `status`= 1 WHERE`shopify_customer_id`= 6452018086120 AND `product_variant_id`= 43877526765800
//             $update=$this->home->update('wishlist_products',$data3,$where5);

//             $where6 = 'wishlist_products.'."shopify_customer_id = ".$Customer_id." and wishlist_products.status = ".$sta;
            
//             $statusdata = $this->home->getResultByWhere('wishlist_products',$where6);
            
//             $array = json_decode(json_encode($statusdata), true);
            
//             foreach($array as $producttitle){
                
//                 $products['info'][] = array('pName' => $producttitle['product_title'], 'pPrice' => $producttitle['product_price'], 'pQty' => $producttitle['product_quantity'], 'pVarianttitle' => $producttitle['product_variant_title']);

//             }
            
//             //print_r($products);exit();
         
//             echo json_encode($products);
//             exit();
//     }

//     public function updateUnCheckStatus()
//     {

//             $Customer_id  = $_POST['Customerid'];

//             $variant_id  = $_POST['data_var_id'];

//              $sta = 0 ;

//             $data3 = array('status' => $sta ); 

//             $where5 = 'wishlist_products.'."shopify_customer_id = ".$Customer_id." and wishlist_products.product_variant_id = ".$variant_id;

//            // UPDATE `wishlist_products` SET `status`= 1 WHERE`shopify_customer_id`= 6452018086120 AND `product_variant_id`= 43877526765800

//             $update=$this->home->update('wishlist_products',$data3,$where5);

//             $stas = 1;
//             $where6 = 'wishlist_products.'."shopify_customer_id = ".$Customer_id." and wishlist_products.status = ".$stas;
            
//             $statusdata = $this->home->getResultByWhere('wishlist_products',$where6);
            
//             $array = json_decode(json_encode($statusdata), true);
            
//             foreach($array as $producttitle){
                
//                 $products['info'][] = array('pName' => $producttitle['product_title'], 'pPrice' => $producttitle['product_price'], 'pQty' => $producttitle['product_quantity'], 'pVarianttitle' => $producttitle['product_variant_title']);

//             }
            
//             //print_r($products);exit();
         
//             echo json_encode($products);

//             exit();

//     }
    
//     public function afterMailUpdateUnCheckStatus()
//     {

//             $Customer_id  = $_POST['Customerid'];

//             $sta = 0 ;

//             $data = array('status' => $sta ); 

//             $where = 'wishlist_products.'."shopify_customer_id = ".$Customer_id;

//             $update=$this->home->update('wishlist_products',$data,$where);

//     }

//     public function onLoadCheckStatus()
//     {

//             $Customer_id  = $_POST['Customerid'];

//             $stas = 1;
//             $where6 = 'wishlist_products.'."shopify_customer_id = ".$Customer_id." and wishlist_products.status = ".$stas;
            
//             $statusdata = $this->home->getResultByWhere('wishlist_products',$where6);
            
//             $array = json_decode(json_encode($statusdata), true);
            
//             foreach($array as $producttitle){
                
//                 $products['info'][] = array('pName' => $producttitle['product_title'], 'pPrice' => $producttitle['product_price'], 'pQty' => $producttitle['product_quantity'], 'pVarianttitle' => $producttitle['product_variant_title']);

//             }
            
//             //print_r($products);exit();
         
//             echo json_encode($products);

//     }
    
//     public function sendMail()
//     {
           
//           // echo $this->input->post();
          
//             $store_name = $_POST['store_name'];
//             $store_email_id = $_POST['Email_id'];
//             $Customer_id  = $_POST['Customerid'];
//             $data_cust_title  = $_POST['data_cust_title'];
//             $data_cust_email  = $_POST['data_cust_email'];
//             $message  = $_POST['message'];
          
//             $today = date("m/d/y");
//             $stas = 1;
//             $where = 'wishlist_products.'."shopify_customer_id = ".$Customer_id." and wishlist_products.status = ".$stas;
//             $statusdata = $this->home->getResultByWhere('wishlist_products',$where);
               
               
//                 // $config = array(
//                 // 'protocol' => 'mail', // 'mail', 'sendmail', or 'smtp'
//                 // 'smtp_host' => 'smtp.gmail.com', 
//                 // 'smtp_port' => 465,
//                 // 'smtp_crypto' => 'ssl',
//                 // 'smtp_user' => 'mattin.h@edreamz.in',
//                 // 'smtp_pass' => 'Mattin@2020',
//                 // 'mailtype' => 'html', //plaintext 'text' mails or 'html'
//                 // // 'smtp_timeout' => '10', //in seconds
//                 // 'charset' => 'utf-8',
//                 // //'wordwrap' => TRUE,
//                 // );   
                        
//             $config = Array(    
    
//             'protocol' => 'sendmail',
    
//             'mailtype' => 'html',
    
//             'charset' => 'iso-8859-1'
    
//             );
            
//             //$from = $this->input->post('Email_id');
//             $from = $data_cust_email;
//             $this->load->library('email', $config); 
//             $this->email->from($from);
//             $this->email->to($store_email_id);
//             $this->email->cc('yen.mccarthy@eskandar.com');
//             $this->email->bcc('kiran.k@edreamz.in');
           
//             //$this->email->to('nikhil.m@edreamz.in');
           
            
//            $html = '<!DOCTYPE html>
    
//              <html>
//                      <head>
//                         <style>
//                         table {
//                           border-collapse: collapse;
//                           width: 100%;
//                         }

//                         td, th {
//                           border: 1px solid #dddddd;
//                           text-align: left;
//                           padding: 8px;
//                         }

//                         tr:nth-child(even) {
//                           background-color: #000;
//                         }
//                         </style>
//                         </head>
//                         <body>
//                             <div style="border: 1px solid #ccc;padding: 10px;">
//                             <h2 style="color: #000;font-weight: 600;font-size: 22px;color: cadetblue;">WISHLIST</h2>
//                                <h2>Hello '.$data_cust_title.'</h2>

//                                 <div style="overflow: auto;background: #f1f1f199;border-radius: 0px 0px 10px 10px;border-top: 2px solid cadetblue;display: block;">

//                                 <table style="width: 906px;overflow: auto;margin: auto;margin-top: 20px;margin-bottom: 20px;display: block;padding: 30px;">
//                                   <tr style="background-color: #f1f1f1;">
//                                     <th style="font-weight: 600;font-size: 14px;white-space: nowrap;">DATE OF WISHLIST</th>
//                                     <th style="font-weight: 600;font-size: 14px;white-space: nowrap;">CUSTOMER NAME</th>
//                                     <th style="font-weight: 600;font-size: 14px;white-space: nowrap;">CONTACT EMAIL</th>
//                                     <th style="font-weight: 600;font-size: 14px;white-space: nowrap;">PRODUCT NAME</th>
//                                     <th style="font-weight: 600;font-size: 14px;white-space: nowrap;">PRODUCT IMAGE</th>
//                                     <th style="font-weight: 600;font-size: 14px;white-space: nowrap;">VARIANT NAME</th>
//                                     <th style="font-weight: 600;font-size: 14px;white-space: nowrap;">DESCRIPTION</th>
//                                     <th style="font-weight: 600;font-size: 14px;white-space: nowrap;">PRICE</th>
//                                   </tr>';
                                  

//                                 foreach($statusdata as $data){
//                                     $price = $data->product_price/100;
//                                  $html .='<tr>
//                                           <td style="font-weight: 600;white-space: nowrap;background: #fff;">'.$today.'</td>
//                                           <td style="font-weight: 600;white-space: nowrap;background: #fff;">'.$data_cust_title.'</td>
//                                           <td style="font-weight: 600;white-space: nowrap;background: #fff;">'.$data_cust_email.'</td>
//                                           <td style="font-weight: 600;white-space: nowrap;background: #fff;">'.$data->product_title.'</td>
//                                           <td style="font-weight: 600;white-space: nowrap;background: #fff;"><img src="https:'.$data->product_image.'" width="100" height="100" /></td>
//                                           <td style="font-weight: 600;white-space: nowrap;background: #fff;">'.$data->product_variant_title.'</td>
//                                           <td style="font-weight: 600;white-space: nowrap;background: #fff;">'.$data->product_description.'</td>
//                                           <td style="font-weight: 600;white-space: nowrap;background: #fff;">Rs '.$price.'</td>
//                                           </tr>';
//                                 }

//                                 $html .='</table>
//                             </div>

//                            <p><span style="display: inline-block;margin-right: 10px;font-weight: 600;  font-size: 14px;">Massage :</span>'.$message.'</p>

//                            <div clas="icon">
//                            </div>
//                            </div>
//                         </body>
//              </html>';
    
//                 // echo $html;die;
//                 $this->email->subject($store_name);
//                 $this->email->message($html);
//                 // echo "send mail" ;   
//                 //$this->email->send();die;
//                 // echo "send mail" ;  
          
//       if($this->email->send())
//       {
//            //  echo "send mail" ; die; 
//         foreach($statusdata as $data){
            
//              $price = $data->product_price/100;
             
//             $data1 = array(
                
//                 'store_name'  => $store_name,
                
//                 'shopify_customer_id'  => $Customer_id,
                
//                 'customer_name' => $data_cust_title,
                
//                 'customer_email' => $data_cust_email,
                
//                 'product_id' => $data->product_id,
                
//                 'product_quantity' => $data->product_quantity,
                
//                 'product_title' => $data->product_title,
                
//                 'product_description' => $data->product_description,
                
//                 'product_price' => "RS".$price,
                
//                 'product_image' => $data->product_image,
                
//                 'product_variant_title' => $data->product_variant_title,
                
//                 'product_variant_id' => $data->product_variant_id,
                
//                  'status' => 0,
                
//                 'created_at' => date("Y-m-d H:i:s")
                
//                 );
//               $insert = $this->home->insert('send_wishlist_product_to_store',$data1);  
//         }
                
                
//         }

//     }

//     public function removeWishlistProduct()
//     {

//         $Customer_id  = $_POST['Customerid'];

//         $data_var_id  = $_POST['data_var_id'];

//         $where5 = 'wishlist_products.'."shopify_customer_id = ".$Customer_id." and wishlist_products.product_variant_id = ".$data_var_id;

//         $this->home->removeWishlistProduct('wishlist_products',$where5);

//     }

//     public function deleteRowWishlistProduct()
//     {

//          //$post_data = $this->input->post();
    
//          //$where3 = 'wishlist_products.'."shopify_customer_id = ".$shopify_customer_id;  
    
//         // $wishlist_count = $this->home->getWishlistProductCount('wishlist_products',$where3);

//     }
    
//     /*add shop code start*/
    
//    public function addShopDataView()
//     {    
    
//          $data['records2'] = $this->home->getAllShop();
//          $response = $this->load->view('add_shop',$data,TRUE);
//          echo $response;
//       //  $this->load->view('add_shop');
//           die;
//     }
    
//    public function addShopDatainsert()
//     {    
//         $post_data = $this->input->post();

//         $sname = $_POST['shop_name'];;  
//         $semail =  $_POST['shop_email'];;  
       
//         $data = array(
//                      'shop_name'  => $sname,
//                      'shop_email'  => $semail,
//                      'status' => 0,
//                      'created_at' => date("Y-m-d H:i:s")
//                      ); 
                        
     
//         // $query = $this->db->query('SELECT `shop_name`, `shop_email` FROM `add_wishlist_shop` WHERE `shop_name`="'.$sname.'" AND `shop_email`="'.$semail.'"');
//          $query = $this->db->query('SELECT `shop_name`, `shop_email` FROM `add_wishlist_shop` WHERE  `shop_email`="'.$semail.'"');

//          $dataExists =    $query->result();
         
        
//         if($dataExists){
            
//          $msg = "exsist"; 
         
//         // echo "yes"; 
         
//         }else{
            
            
//          $insert = $this->home->insert('add_wishlist_shop',$data); 
         
//            if($insert){
          
//             $msg = 'Sucess';

//             }    
            
//         }
        
       
            
//          echo json_encode(array('status' => $msg));
//        //  print_r($dataExists);die;

//     }
    
//      public function deleteShopById()
//     {

//             $shop_id  = $_POST['shop_id'];
            
//             $where = 'add_wishlist_shop.'."id = ".$shop_id;  
            
//             $delete = $this->home->deleteDataByCustomer('add_wishlist_shop',$where);
            
//             echo $delete;
            
       

//     }

//     public function getAllShopData()
//     {
//             $statusdata = $this->home->getAllShop();;
            
//             $array = json_decode(json_encode($statusdata), true);
            
//             foreach($array as $shop_data){
            
//             $products['info'][] = array('sName' => $shop_data['shop_name'], 'semail' => $shop_data['shop_email']);
            
//             }
            
//             //print_r($products);exit();
            
//             echo json_encode($products);

//     }
}