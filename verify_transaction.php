<?php session_start(); ?>
<?php
include 'admin/includes/dbconnection.php';
$ref = $_GET['reference'];
$total = $_GET['total'];
$venue = $_GET['venue'];
$id = $_GET['venueid'];
$udate = $_GET['cdate'];


if ($ref == ""){
    header("Location:javascript://history.go(-1)");
    exit;
}
?>
<?php
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: ",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    //echo $response;
    $result = json_decode($response);
  }
  if($result->data->status == 'success'){
    $status = $result->data->status;
    $reference = $result->data->reference;
    $channel = $result->data->channel;
    $ip_address = $result->data->ip_address;
    $email = $result->data->customer->email;
    $amount = $result->data->amount;
    // $start_time = $result->log->start_time;
    date_default_timezone_set('Africa/Lagos');
    $cdate = date('Y-m-d h:i:s a', time());
    $t = "TRA";
    $d = date('Y');
    $r = rand(10000, 99999);
    $bookid = $t.'/'.$d.'/'.$r;

    $sql = $conn->query("INSERT INTO payment (cdate, email, venue, amount, channel, reference_id, ip_address) VALUES ('$cdate', '$email', '$venue', '$total', '$channel', '$reference', '$ip_address')") or die(mysqli_error($conn));
    $conn->query("INSERT INTO tblbooking (BookingID, cdate, email, amount, venue, ddate) VALUES ('$bookid', '$udate', '$email', '$total', '$venue', '$cdate')") or die(mysqli_error($conn));
    $conn->query("UPDATE tblservice SET status = '1' WHERE ID='$id'") or die(mysqli_error($conn));

    if(!$sql){
        echo 'There is an error'.mysqli_error($conn);
    }else{
        echo "<script> alert('Venue Booked Sucessfully ✔✔'); window.location='index.php?page=book'; </script>";
        exit;
    }
    
  }else{
    header("Location:error.php");
    exit;
  }
?>
