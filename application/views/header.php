<!DOCTYPE html>
<html lang="en">
    <!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
<!-- <script src="https://unpkg.com/@shopify/app-bridge@3.5.1/umd/index.development.js"></script>
<script>
 
var AppBridge = window['app-bridge'];
var createApp = AppBridge.default;
var app = createApp({
  apiKey: '<?= API_KEY; ?>',
  shopOrigin:'appinstallteststore.myshopify.com',
});
</script>
 -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"/>

 <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
 <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>


<style>

    #product_table_id_next{
        cursor: pointer;
    }
     #product_table_id_previous{
        cursor: pointer;
    }
    .main-wrap h2 {
    padding-left: 29px;
}

.main {
    padding-right: 44px;
}
</style>



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<!-- <p class="title">Welcome To Wishlist</p><br> -->
<div class="main-wrap">
  <h2>INQUIRY</h2>
<div class="main">

<a id="add_shop" class="btn btn-primary"  href="<?php echo  base_url(); ?>"><i class="fa fa-sliders" aria-hidden="true"></i>Home</a>


<a id="wishlist_data" class="btn btn-primary"  href="<?php echo  base_url(); ?>/homepage/dashboradViewLoad"><i class="fa fa-sliders" aria-hidden="true"></i>REQUEST QUOTE DATA</a>

<a id="wishlist_data" class="btn btn-primary"  href="<?php echo  base_url(); ?>/homepage/productInqViewLoad"><i class="fa fa-sliders" aria-hidden="true"></i>PRODUCT INQUIRY</a>

<a id="add_wishlist_store" class="btn btn-primary"  href="<?php echo  base_url(); ?>/homepage/SaveQuoteRequestImage"><i class="fa fa-sliders" aria-hidden="true"></i>REQUEST QUOTE IMAGE</a>

<a id="add_wishlist_store" class="btn btn-primary"  href="<?php echo  base_url(); ?>/homepage/viewRecapchaSetting"><i class="fa fa-sliders" aria-hidden="true"></i>SETTING</a>



</div>
</div>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
  body{background: #f6f6f7;font-family: poppins;}
  .btn-primary:hover{background-color: cadetblue;border-color: cadetblue;}
  .main-wrap{margin: 0px 0px 30px;display: flex;justify-content: space-between;align-items: center;padding: 20px 10px;box-shadow: 0px 0px 10px 0px #ccc;background: #fff;}
  .main-wrap h2{margin-bottom: 0px;color: cadetblue;margin-right: 40px;font-weight: 600;}
  .btn-primary{background-color: cadetblue;border-color: cadetblue;margin-right: 20px;font-size: 14px;font-weight: 400;}
  /*.main{display: flex;justify-content: center;}*/
  .title{text-align: center;font-weight: 600;margin-top: 30px;font-size: 20px;}
  .btn-primary:focus{box-shadow: unset !important;border: unset !important;}
</style>


</head>