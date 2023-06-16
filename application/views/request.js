
$(window).on('load', function () {

// var button= $('<a href="" class="modal_open">Request a Quote</a>');
   //var form= $('<a href="" class="modal_open">Request a Quote</a><div class ="modal_box"><div class="modal_content"><div class="modal_footer" style="float:right;"><a href = "javascript:void(0);" class = "close" href="">X</a></div><div class="modal-dialog modal_body"><div class="modal-content"><div class="modal-header"><h4 class="modal-title">Request a Quote</h4></div><div class="modal-body"><div id="app"><form action="/"><div><label for="name">Name:</label><br><input id="name" type="text" name="name" required/></div><div><label for="email">Email:</label><br><input id="email" type="email" name="email"  required/></div><div><label for="phone">Phone:</label><br><input id="phone" type="text" name="phone"  required/></div><div><label for="phone">Enquiry For:</label><br><select name="enquiryfor" id="enquiry-for" required="required"><option value="Barcode Label Printers">collection title</option></select></div><div><label for="caps">Your Message:</label><br><textarea  name="yourmessage" id="your-message" required="required"></textarea></div><div class="field-wrapper"><div id="google_recaptcha"></div><button class="submit inquiry_form" type="submit">Submit</button><div><h3>Response from server:</h3><pre class="response"></pre></div></form></div></div></div></div></div></div>');  
//var form= $('<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"><div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel">Modal title</h4></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary save-changes">Save changes</button></div></div></div></div>');
var form= $('<a href="#" class="btn" data-popup-open="popup-1">Open Popup</a><div class="popup" data-popup="popup-1"><div class="popup-inner"><div class="modal-content"><div class="modal-header"><h4 class="modal-title">Request a Quote</h4></div><div class="modal-body"><div id="app"><form id="quoteform" action="/"><div><label for="name">Name:</label><br><input id="name" type="text" name="name" required=""></div><div><label for="email">Email:</label><br><input id="email" type="email" name="email" required=""></div><div><label for="phone">Phone:</label><br><input id="phone" type="text" name="phone" required=""></div><div><label for="phone">Enquiry For:</label><br><select name="enquiryfor" id="enquiry-for" required="required"><option value="Barcode Label Printers">Home page</option> <option value="Barcode Label Printers">test</option></select></div><div><label for="caps">Your Message:</label><br><textarea name="yourmessage" id="your-message" required="required"></textarea></div> <div class="field-wrapper"><div id="google_recaptcha" style=""><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfFSIUUAXXXXXXXXXXXDk7giXSN6Y8&amp;co=aHR0cHM6Ly9zaG9wdGVzdHN0b3JlMTIzNC5teXNob3BpZnkuY29tOjQ0Mw..&amp;hl=en&amp;v=Xh5Zjh8Od10-SgxpI_tcSnHR&amp;size=normal&amp;cb=oryoxel31cax" width="304" height="78" role="presentation" name="a-fdhxufvfmrpq" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div></div><button class="submit inquiry_form" type="submit">Submit</button><div><h3>Response from server:</h3>pre class="response"></pre></div></form> </div></div></div></p><a href="#" class="popup-close" data-popup-close="popup-1">x</a</div></div>');
var product_form=$('<button type="button" class="btn1 btn-light" id="product_inq_Button">Product Inquiry</button><form id="form1" style="display:none;"><h4 class="modal-title">Do You Have Any Question?</h4><p>* All fields are marked as required fields</p><input type="hidden" name="enquiry-for" value="ZeniusExpert"><div class="form-group name-field"><label for="your_name_pi">Name*</label><input type="text" class="form-control" name="your-name" id="your_name_pi" required="required" placeholder="Enter Your Name"></div><div class="form-group email-field"><label for="your_email_pi">Email*</label><input type="email" class="form-control" name="your-email" id="your_email_pi" required="required" placeholder="Enter Your Email"></div><div class="form-group phone-field"><label for="your_phone_pi">Phone*</label><input type="text" class="form-control" name="your-phone" id="your_phone_pi" required="required" placeholder="Enter Your Phone"></div><div class="form-group question-field"><label for="your_message_pi">Question*</label><textarea class="form-control" name="your-message" id="your_message_pi" required="required" placeholder="Enter Your Question"></textarea></div><div class="form-group captcha-field"><div id="recaptcha2"></div></div><div class="form-group action-btn"><input type="submit" class="form-control" name="Send Request"></div><div class="form-group messages-pi"></div></form>');

$(function() {
  // Open
  $('[data-popup-open]').on('click', function(e) {
    var targeted_popup_class = $(this).attr('data-popup-open');    
    $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);    
    e.preventDefault();
  });
  
  // Close
  $('[data-popup-close]').on('click', function(e) {
    var targeted_popup_class = $(this).attr('data-popup-close');
    $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
    e.preventDefault();
  });  
  
});



$(".app_form").append(form);
$('#product_inquiry').append(product_form);


    $("#product_inq_Button").click(function(){
        $("#form1").toggle();
       //alert("inn");
    });


 $("form #quoteform").submit(function(event) {
    event.preventDefault();

    //get the form data
    var formData = {
      name: $("input[name=name]").val(),
      email: $("input[name=email]").val(),
      yourmessage: $("#your-message").val(),
      phone: $("input[name=phone]").val(),
      enquiryfor: $( "#enquiry-for option:selected" ).text()
      
    };

    

$.ajax({
        url: "https://bigcapp-test-demo.demolocations.com/homepage/RequestQuoteSaveData",
        type:'POST',
        dataType    : 'json',
        data      : formData,
        success:function(result){
          
          
          
          if(result.status == "Sucess"){
             $("form")[0].reset();
              swal(
        'Success'
      )
            
             if($(".popup-close").trigger("click")){
              
              $(".header__heading-link").trigger("click");
             }
             
          }else{
            
         
          }
        }
      });

  });
 
 /*product inquery form*/

 $("#form1").submit(function(event) {
    event.preventDefault();

    //get the form data
    var formData = {
      name: $("input[name=your-name]").val(),
      email: $("input[name=your-email]").val(),
      yourmessage: $("#your_message_pi").val(),
      phone: $("input[name=your-phone]").val(),
     /* enquiryfor: $( "#enquiry-for option:selected" ).text()*/
      
    };

    console.log(formData);
   

$.ajax({
        url: "https://bigcapp-test-demo.demolocations.com/homepage/ProductInqSaveData",
        type:'POST',
        dataType    : 'json',
        data      : formData,
        success:function(result){
          
          
          
          if(result.status == "Sucess"){
             $("#form1")[0].reset();
              swal(
        'Success'
      )
            
             if($("#product_inq_Button").trigger("click")){
              
              $(".header__heading-link").trigger("click");
             }
             
          }else{
            
         
          }
        }
      });

  });


 });


// function include(file) {

//   let script = document.createElement('script');
//   script.src = file;
//   script.type = 'text/javascript';
//   script.defer = true;

//   document.getElementsByTagName('head').item(0).appendChild(script);

// }
// include('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js');
// include('https://unpkg.com/popper.js');
// include('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js');