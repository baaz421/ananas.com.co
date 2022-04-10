<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style type="text/css">
      .progress-value {
    position: absolute;
    right:0;
    left:0;
}


    </style>
  </head>
  <body>
<?php 
// deal-switch.php

date_default_timezone_set("Asia/Qatar");
date_default_timezone_get();
$date = date("d-m-Y H:i");

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "qegmolla");
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("Connection failed to DATABASE!");

$deal_id = 20;

// progres bar 
function progressBar($prog_percen,$prog_color){
  $p = '
  <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated '.$prog_color.' text-center" role="progressbar" style="width: '.$prog_percen.'%" aria-valuemin="0" aria-valuemax="100"> 
      <span class="font-weight-bold text-dark">'.$prog_percen.' %</span>
    </div>
  </div>
  ';
  return $p;
}


// function Progress bar for red, orange, green zone
function zoneProgress($deal_id,$conn,$date){
  $deal_sql = "SELECT * FROM deal WHERE DID = {$deal_id}";
  $run_deal_sql = mysqli_query($conn, $deal_sql);
  if(mysqli_num_rows($run_deal_sql) > 0){
    $row = mysqli_fetch_assoc($run_deal_sql);
    $zone = $row['zone'];
    $d_id = $row['DID'];
    switch (true) {
      case ($zone == "red"): // case red zone

        echo  "Red Zone Active";
        $red_method = $row['red_method']; 
        echo " -- And method. -- ".$red_method;

          $change_method = "orange";
          if($red_method == "amount"){ // Red Amount method code 
            $red_estimate_amt = $row['e_value'];
         	  $red_amt = $row['red_am'];

              if($red_amt == ""){
                $red_live_amt = 0;
              }else{
                $red_live_amt = $red_amt;
              }
            $prog_percen = round(($red_live_amt/$red_estimate_amt)*100,2);
            $prog_color = "bg-danger";
            if($prog_percen >= 100){            
              $change_red_sql = "UPDATE deal SET zone = '{$change_method}', s_time_oran = '{$date}' update_time = '{$date}' WHERE DID ={$d_id}";
              mysqli_query($conn, $change_red_sql);
            }
            
          }else{ // Red Time method code 
            $start_date = strtotime($row['s_time_red']);
            $end_date = strtotime($row['e_time_red']);
            $current_date = strtotime($date);

            $range = $end_date-$start_date;
            $value = $current_date-$start_date;
            
            $calculation = round(($value/$range)*100,2);
            $prog_percen = $calculation;
            $prog_color = "bg-danger";

            if($prog_percen  >= 100){            
              $change_red_sql = "UPDATE deal SET zone = '{$change_method}', update_time = '{$date}' WHERE DID ={$d_id}";
              mysqli_query($conn, $change_red_sql);
            }
          }

          
        break;

      case ($zone == "orange"): // case orange zone
        echo "Orange Zone Active";
        $orange_method = $row['orange_method'];
        echo " -- And method. -- ".$orange_method;
        $change_method = "green";
        if($orange_method == "percentage"){ // Orange Percentage method code 

          $oran_per = $row['oran_per'];

          $oran_amt = $row['oran_am'];
            if($oran_amt == ""){
                $oran_live_amt = 0;
              }else{
                $oran_live_amt = $oran_amt;
              }

          $red_amt = $row['red_am'];
            if($red_amt == ""){
              $red_live_amt = 0;
            }else{
              $red_live_amt = $red_amt;
            }
          $orange_amount = $red_live_amt+(($oran_per/100)*$red_live_amt);
          $prog_percen = round(($oran_live_amt/$orange_amount)*100,2);
          $prog_color = "bg-warning";
          if($prog_percen >= 100){            
            $change_oran_sql = "UPDATE deal SET zone = '{$change_method}', s_time_green = '{$date}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_oran_sql);
          }

        }else{ // Orange Time method code 

          $start_date = strtotime($row['s_time_oran']);
          $days = $row['oran_days'];
          $add_days = "+$days day";
          $end_date = date('d-m-Y H:i',strtotime($add_days,$start_date));

          $orange_end_date = $row['e_time_oran'];
          if($orange_end_date == ""){
            $update_oran_end_date_sql = "UPDATE deal SET e_time_oran = '{$end_date}' WHERE DID = {$d_id}";
            mysqli_query($conn, $update_oran_end_date_sql);
          }        

          $end_date_o = strtotime($row['e_time_oran']);
          $current_date = strtotime($date);


          $range = $end_date_o - $start_date;
          $value = $current_date - $start_date;
          
          $calculation = round(($value/$range)*100,2);
          $prog_percen = $calculation;
          $prog_color = "bg-warning";

          if($prog_percen >= 100){            
            $change_oran_sql = "UPDATE deal SET zone = '{$change_method}', s_time_green = '{$date}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_oran_sql);
          }
          
        }
        break;

      case ($zone == "green"): // case green zone
        echo "Green Zone Active";
        $green_method = $row['green_method']; // getting method
        echo " -- And method. -- ".$green_method;
        $change_method = "completed";
        if($green_method == "percentage"){ // Green Percentage method code 

          $green_per = $row['green_per'];

          $green_amt = $row['green_am'];
            if($green_amt == ""){
                $green_live_amt = 0;
              }else{
                $green_live_amt = $green_amt;
              }

          $oran_amt = $row['oran_am'];
            if($oran_amt == ""){
              $oran_live_amt = 0;
            }else{
              $oran_live_amt = $oran_amt;
            }
          $green_amount = $oran_live_amt+(($green_per/100)*$oran_live_amt);
          $prog_percen = round(($green_live_amt/$green_amount)*100,2);
          $prog_color = "bg-success";

          if($prog_percen >= 100){            
            $change_green_sql = "UPDATE deal SET zone = '{$change_method}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_green_sql);
          }
          
        }else{ // Green Time method code

          $start_date = strtotime($row['s_time_green']);
          $days = $row['green_days'];
          $add_days = "+$days day";
          $end_date = date('d-m-Y H:i',strtotime($add_days,$start_date));

          $green_end_date = $row['e_time_green'];
          if($green_end_date == ""){
            $update_green_end_date_sql = "UPDATE deal SET e_time_green = '{$end_date}' WHERE DID = {$d_id}";
            mysqli_query($conn, $update_green_end_date_sql);
          }        

          $end_date_g = strtotime($row['e_time_green']);
          $current_date = strtotime($date);


          $range = $end_date_g - $start_date;
          $value = $current_date - $start_date;
          
          $calculation = round(($value/$range)*100,2);
          $prog_percen = $calculation;
          $prog_color = "bg-success";

          if($prog_percen >= 100){            
            $change_green_sql = "UPDATE deal SET zone = '{$change_method}', update_time = '{$date}' WHERE DID ={$d_id}";
            mysqli_query($conn, $change_green_sql);
          } 
          
          
        }
        break;
    }
  }

  return progressBar($prog_percen,$prog_color);
}

echo zoneProgress($deal_id,$conn,$date);
?>


  </body>
</html>

<?php 


?>






