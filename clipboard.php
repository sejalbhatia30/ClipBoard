<?php
session_start();
include('clipfunctions.php');
  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clipped</title>
    
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</head>
<body>
  
  <?php
  $url = $_SERVER['REQUEST_URI'];
$parts = Explode('.php', $url);
$id = $parts[1];


if($id==""){
    echo " <h1 class = 'display-1 text-center'>Welcome to Universal Clipboard</h1>";
}
else
  {  
       $val=checkurl($id);
    if($val==0){
         echo" 
         <div class = 'container'>
         <h1  class='mt-5 text-success text-center display-4'>Universal Clipboard</h1>

          <div class='form-group'>

                  <textarea placeholder='Type Here..' class='mt-5 form-control' id='text' rows='12'></textarea>

                  </div>
          <input type = 'hidden' id = 'url' value = ".$id.">
          
          <p class = 'text-center' id = 'save'></p>
          </div>
         
            
        ";
    }
    
  }
  ?>
  <script type='text/javascript'>
      
      
$('#text').on('input',function(e){

   
    var text = $('#text').val();
    var url= $('#url').val();
  


      $.ajax({
                     type:"POST",
                     url :"clipfunctions.php",
                     data: {
                       copy:"yes",
                       url:url,
                       text:text

                     },
                     success : function(msg){
                       $('#save').html("yaya");
                       

                     }
                 });

});
      
  </script> 
</body>
</html>







