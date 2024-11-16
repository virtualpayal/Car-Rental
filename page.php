<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">

<title>About US</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>
<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
                      <?php 
$pagetype=$_GET['type'];
$sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section class="page-header aboutus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1><?php   echo htmlentities($result->PageName); ?></h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li><?php   echo htmlentities($result->PageName); ?></li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<section class="about_us section-padding">
  <div class="container">
    <div class="section-header text-center">

    <h2>About US</h2>
    <p>

    <b>General Questions</b>
    
1. What do I need to rent a car?
You will need a valid driver's license, a credit card in your name, and proof of insurance.

2. How old do I need to be to rent a car?
The minimum age to rent a car is usually 21. However, drivers under 25 may be subject to additional fees and restrictions.

3. Can I rent a car if I don't have a credit card?
Some locations may accept debit cards, but additional identification and proof of insurance may be required. It's best to check with the specific rental location beforehand.

4. Do you offer one-way rentals?
Yes, one-way rentals are available between select locations. Additional fees may apply.
Booking and Reservations

5. How can I make a reservation?
Reservations can be made online through our website, via our mobile app, or by calling our customer service hotline.

6. Can I modify or cancel my reservation?
Yes, reservations can be modified or canceled online, through our app, or by contacting customer service. Please review our cancellation policy for any applicable fees.

7. Is there a fee for adding an additional driver?
Yes, there is a fee for adding additional drivers. However, this fee may be waived for spouses or domestic partners.
Insurance and Coverage

8. Do I need to purchase additional insurance?
While it's not required, we recommend purchasing additional coverage for added peace of mind. Your personal auto insurance or credit card may provide some coverage, so check with your provider.

9. What is the damage waiver, and do I need it?
The damage waiver reduces your financial responsibility for damage to the rental car. It is optional but recommended to avoid high out-of-pocket costs in the event of an accident.
Vehicle Pickup and Return

10. What do I need to bring when picking up the rental car?
You will need your driver's license, credit card, and reservation confirmation. If you used a debit card for the reservation, you may need additional identification.

11. Can I return the car outside of business hours?
Many locations offer after-hours return. Please check with your rental location for specific instructions.

12. What happens if I return the car late?
Late returns may incur additional fees. If you anticipate being late, please contact the rental location as soon as possible to discuss options.

<b>Fees and Charges</b>
13. Are there any hidden fees I should be aware of?
All fees will be disclosed at the time of booking. Common additional fees include those for extra drivers, young drivers, one-way rentals, and late returns.

14. Is there a mileage limit on the rental?
Most rentals come with unlimited mileage, but some vehicle types and special offers may have mileage restrictions. Be sure to review the terms and conditions of your rental agreement.


<b>Special Requests</b>
15. Can I rent a specific make or model?
While we cannot guarantee specific makes or models, you can choose a car from a specific category. We will do our best to accommodate your preferences.

16. Do you offer child seats or GPS devices?
Yes, we offer child seats, GPS devices, and other accessories for an additional fee. Please request these items at the time of booking.

17. Can I take the rental car out of the state or country?
Out-of-state travel is usually permitted, but international travel may have restrictions. Please check with your rental location for details.


<b>Customer Support</b>
18. What should I do if the car breaks down or I have an accident?
In case of a breakdown, contact our roadside assistance immediately. If you have an accident, ensure everyone's safety first, then contact the police and our customer service for further instructions.

19. How can I contact customer service?
You can reach customer service via phone, email, or through our website's live chat feature. Our support team is available 24/7 to assist you.
    </p>


    <!-- <h2><?php   echo htmlentities($result->PageName); ?></h2>
      <p><?php  echo $result->detail; ?> </p>
-->
    </div>
   <?php } }?>
  </div>
</section>
<!-- /About-us--> 





<<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>