
<?$this->load->view('header');?>



<div class="product_inquiry">
    <p class="title">Product Inquiry Data</p>

<!-- <div class="name">             
  <span>Name:</span>
  <select class="select-data" id="categoryFilter">
      <option  value="">Select Name</option>
      
  <?php 

  $arr = array();
foreach($records as $key => $redord){ 
    $arr[] =  $redord['name'];
}
$unique_data = array_unique($arr);

  foreach($unique_data as $key => $redord){ ?>
    <option value="<?= $redord;?>"><?= $redord;?></option>
   <? } ?>
  </select>
</div> -->

    
<table id="example" class="display nowrap" cellspacing="0" width="98%">
<thead>
 <tr class="">
                        <th class="">Sr.No.</th>
                        <th class="">Name</th>
                        <th class="">Email</th>
                        <th class="">Phone</th>
                        <th class="">Message</th>
                        <th class="">Action</th>
                        <th style="display:none;" class="">Date</th>
                    </tr>
</thead>
 <tbody>
                  <?php  if(!empty($records)){ 
					$i = 1;
                    foreach($records as $key => $redord){
                      //name email phone enquiry_for  message     
                  ?>
                    <tr class="">
                        <td class=""><?= $i;?></td>
                        <td class=""><?= $redord['name'];?></td>
                        <td class=""><?= $redord['email'];?></td>
                        <td class=""><?= $redord['phone'];?></td>
                        <td class=""><?= $redord['message'];?></td>
                        <td class=""><button type="button" 
                      data-id="<?=$redord['id']?>" data-date="<?=$redord['created_at']?>" data-name="<?= $redord['name'];?>" data-email="<?= $redord['email'];?>" data-phone="<?= $redord['phone'];?>" data-msg="<?= $redord['message'];?>" class="btn btn-info modal-toggle" onclick="toggleModal()">View</button></td>
                        <td style="display:none;"class=""><?= $redord['created_at'];?></td>
                       
                   <?php $i++; } } else{ ?>
                          <tr>
                            <td colspan="4" align="center"> No Records Found..!</td>
                        </tr>
                   <?php } ?>
              
                </tbody>
</table>
</div>

<div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
                        <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-900 opacity-75" />
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                         <a id="wishlist_data" class="btn btn-primary"  href="<?php echo  base_url(); ?>/homepage/productInqViewLoad"><i class="fa fa-sliders" aria-hidden="true"></i>Back</a>

                        <h1 class="modalh1" style="text-align: center;font-size: 23px;">
                        Product Inquiry Details</h1>
                        <div class="orderdetails" style="margin-top: 25px;">
                        <p><label>Id : </label> <span class="data_id"><span> </p>
                        <p><label>Name : </label> <span class="data_name"><span> </p>
                        <p><label>Email : </label> <span class="data_email"><span> </p>
                        <p><label>Phone : </label> <span class="data_phone"><span> </p>
                        <p><label>Date : </label> <span class="data_date"><span> </p>
                        <p><label>Message : </label> <span class="data_msg"><span> </p>
                        <p><span class="otaxtype" style="content: "\A";white-space: pre;"><span> </p>

</div>
                        </div>
                        <div class="bg-gray-200 px-4 py-3 text-right">

                        </div>
                        </div>
                        </div>
                        </div>

<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
  body{background: #f6f6f7;}
  .name{padding: 0px 10px;}
    .main-wrap{margin: 0px 0px 30px;display: flex;justify-content: space-between;align-items: center;padding: 20px 10px;box-shadow: 0px 0px 10px 0px #ccc;background: #fff;}
  .main-wrap h2{margin-bottom: 0px;color: cadetblue;margin-right: 40px;font-weight: 600;font-family: poppins;}
  .main-wrap .btn-primary{background-color: cadetblue;border-color: cadetblue;margin-right: 20px;font-size: 14px;margin-top: 0px;padding: 5px 12px;font-weight: 400;font-family: poppins;}
  /*.main{display: flex;justify-content: center;}*/
  .title{text-align: center;font-weight: 600;margin-top: 30px;font-size: 20px;}
  .main-wrap .btn-primary:focus{box-shadow: unset !important;border: unset !important;}
    .title{margin-left: 10px;font-weight: 600;text-align: center;margin-top: 30px;font-size: 20px;}
    .btn-primary {color: #fff;background-color: cadetblue;border-color: cadetblue;margin-right: 12px;margin-top: 40px;padding: 6px 40px;}
    #table_id_wrapper{padding: 0px 10px;}
	thead{background: cadetblue;color: #fff;}
	.dataTables_length{margin: 20px 0px;}
	.dataTables_length select {padding: 5px 10px;margin: 0px 6px;}
	.dataTables_filter{margin: 20px 0px;}
	.dataTables_filter input{padding: 5px 10px;margin-left: 6px;border: 1px solid #000;}
	.dataTables_info, .dataTables_paginate.paging_two_button{margin: 30px 5px;}
  table.dataTable{border: 1px solid #ccc;}
	table.dataTable thead th{border-bottom: 1px solid #ccc;padding: 15px 18px 15px 10px;border-left: 1px solid #cccc;}
	.even td, .odd td{border-bottom: 1px solid #ccc;border-right: 1px solid #ccc;font-size: 14px; font-weight: 600;}
	table.dataTable tr.odd td.sorting_1, table.dataTable tr.odd{background-color: #fff;border-right: 1px solid #ccc;}
	#table_id{border: 1px solid #ccc;}
	table.dataTable tr.even td.sorting_1{background-color: #f1f1f1;}
	table.dataTable tr.even{background-color: #f1f1f1;}
    .odd td:last-child, .even td:last-child{border-right: unset;}

    .paginate_disabled_previous, .paginate_enabled_previous{display: flex;align-items: center;}
    .paginate_enabled_next, .paginate_disabled_next{display: flex;align-items: center;}
    .select-data{padding: 5px 10px;margin-left: 6px;}
    #product_table_id_wrapper{padding: 0px 10px;}

</style> 



<script>
$(document).ready( function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [ {
            extend: 'excelHtml5',
            // customize: function( xlsx ) {
            //    // var sheet = xlsx.xl.worksheets['sheet1.xml'];
 
            //     //$('row c[r^="C"]', sheet).attr( 's', '2' );
            // }
        } ]
    } );
} );

function toggleModal() { 
    document.getElementById('modal').classList.toggle('hidden')
}
        var modal = $('#modal');
        var close = $('.close');

        $("#example tbody").on("click",".modal-toggle",function(){
          
          $('.product_inquiry').toggle();

          $('.data_id').text("");
          $('.data_name').text("");
          $('.data_email').text("");
          $('.data_phone').text("");
          $('.data_date').text("");
          $('.data_msg').text("");

          var data_id = $(this).attr('data-id');
          var data_name = $(this).attr('data-name');
          var data_email = $(this).attr('data-email');
          var data_phone = $(this).attr('data-phone');
          var data_date = $(this).attr('data-date'); 
          var data_msg = $(this).attr('data-msg');

          $('.data_id').text(data_id);
          $('.data_name').text(data_name);
          $('.data_email').text(data_email);
          $('.data_phone').text(data_phone);
          $('.data_date').text(data_date);
          $('.data_msg').text(data_msg);

          //var taxtype = $(this).closest('tr').find('.taxtypeval').text();
          //$('.oid').text(data_id);
          //$('.ototal').text(data_total);
          //$('.otax').text(data_tax);

         
          //var dataArray = taxtype.split(",");
          //console.log(dataArray);
          //console.log(dataArray.join("\n"));

          //$('.otaxtype').text(taxtype);
         
        });
</script>


<style>

/*view modal css start*/

/*view modal css end*/

/*Swal alert css start*/

img {
  width: 200px;
}
input[type="text"] {
  padding: 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
}
h1 {
  border-bottom: solid 2px grey;
}
#success {
  background: green;
}
#error {
  background: red;
}
#warning {
  background: coral;
}
#info {
  background: cornflowerblue;
}
#question {
  background: grey;
}

/*Swal alert css end*/

/*datatable css start*/

.paginate_button{
  cursor: pointer;
}


/*datatable css end*/

/*Tooltip css start*/

.tool {
  cursor: pointer;
  font-size: 16px;
  position: relative;
  display: inline-block;
  font-family: 'Mirza', cursive;
}
/* st = Style tol tip */
.R-st {
  opacity: 0;
  color: Black;
  width: 158px;
  padding: 5px 0;
  background: White;
  text-align: center;
  position: absolute;
  border-radius: 6px;
  transition: opacity 1s;
}
.R-st:after {
  content: '';
  border-width: 5px;
  position: absolute;
  border-style: solid;
}
.tool:hover .R-st {
    opacity: 1;
}

/* B-st = Top style tip */
.R-st {
  top: -5px;
  left: 110%;  
}
.R-st:after{
  top: 35%;
  right: 100%;
  border-color: transparent #444 transparent transparent;
}

/*Tooltip css end*/

#example_filter input {
  padding: 5px;
}

</style>

<style>

  div#example_wrapper {
    padding-left: 98px;
    width: 96%;
}
.dt-buttons {
    padding-left: 14px;
}

div#example_filter {
    padding-right: 14px;
}



</style>






