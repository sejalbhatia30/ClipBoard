<?php



function connection(){
    
    $link=mysqli_connect("localhost","id6563907_jaiguruji","12345","id6563907_users");
    if( mysqli_connect_error()){
     die("hello");
     }
    return $link;
}

function checkurl($url){
 
  $link =connection();
  $query = "SELECT data from `clip` WHERE url = '$url'";
  $result = mysqli_query($link,$query);
  if($result){
    if(mysqli_num_rows($result)== 1){
        $row = mysqli_fetch_assoc($result);
        
        $data = $row['data'];
        echo $data;
        $query2 = "DELETE FROM `clip`
                    WHERE url = '$url'";
        $result2 = mysqli_query($link,$query2);
        return 1;
    }
    
    else
    {
        $query = "INSERT INTO `clip` (url, data)
                    VALUES ('$url', '')";
        $result = mysqli_query($link,$query);
        return 0;
       
    }
  }
  
}


     if(isset($_POST['copy'])){
            
        $link=connection();
        $data=$_POST['text'];
        $url=$_POST['url'];
        $query = "UPDATE `clip`
            SET data = '$data'
            WHERE url = '$url'";
        $result = mysqli_query($link,$query);
        
        if($result)echo "Copied";
        else echo "no..";
        
        }



?>