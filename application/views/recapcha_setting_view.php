<?php $this->load->view('header');?>



    <html>
<head>
    <title>Save Recapcha setting</title>
</head>
 
<body>
    <div id="settingform">
    <h2>Configuration</h2>
    <form>
            <label>Admin Email Id : <input name="email" type="text" required/></label><br><br>
            <label>Google Recapcha Site Key(v2) : <input name="sitekey" type="text" required/></label><br><br>
            <label>Google Recapcha Secret Key(v2) : <input name="secretkey" type="text" required/></label><br><br>
            <button type="submit">Submit</button>
    </form>
    </div>
</body>
</html>
<style type="text/css">
    #settingform {
    margin-left: 41%;
    margin-top: 9%;
}
h2 {
    margin-bottom: 50px;
}
label {
    font-size: 14px;
}
</style>

<script type="text/javascript">
    
    $("#settingform").submit(function(event) {
    event.preventDefault();

    //get the form data
    var formData = {
      email: $("input[name=email]").val(),
      sitekey: $("input[name=sitekey]").val(),
      secretkey: $("input[name=secretkey]").val()
      
    };

    

$.ajax({
        url: "https://bigcapp-test-demo.demolocations.com/homepage/insetRecapchaSetting",
        type:'POST',
        dataType    : 'json',
        data      : formData,
        success:function(result){
          
          
          
          if(result.status == "Sucess"){
             $("form")[0].reset();
      //         swal(
      //   'Success'
      // )
            
             if($(".popup-close").trigger("click")){
              
             // $(".header__heading-link").trigger("click");
             }
             
          }else{
            
         
          }
        }
      });

  });
</script>