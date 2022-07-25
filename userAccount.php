<?php

session_start();
if (!$_SESSION['loginStatus']) {
    header('Location: /login.php');
} else {
    $loginSuccess = "You have successfully Logged In";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic'
          rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <!--css-->
    <link rel="stylesheet" href="css/registration.css" type="text/css">
    <link rel="stylesheet" href="css/my_account.css" type="text/css">
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>
</head>
<body>

<!--Login Success Message-->

<?php

if (isset($loginSuccess)) { ?>
    <div id="messageBox"><?php echo $loginSuccess; ?></div>

    <?php
}
?>




<!-- header -->
<div class="agileits_header">
    <div class="w3l_offers">
        <a href="products.php">Today's special Offers !</a>
    </div>
    <div class="w3l_search">
        <form action="#" method="post">
            <input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
            <input type="submit" value=" ">
        </form>
    </div>
    <div class="product_list_header">
        <form action="#" method="post" class="last">
            <fieldset>
                <input type="hidden" name="cmd" value="_cart" />
                <input type="hidden" name="display" value="1" />
                <input type="submit" name="submit" value="View your cart" class="button" />
            </fieldset>
        </form>
    </div>
    <?php
    session_start();
    if($_SESSION['loginStatus']){ ?>
        <div class="w3l_header_right" style="display: inline-block; padding-left: 15px; margin-top: 10px">
            <button id="logoutBtn">Logout</button>
        </div>
        <?php
    }else{ ?>
    <div class="w3l_header_right">
        <ul>
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
                <div class="mega-dropdown-menu">
                    <div class="w3ls_vegetables">
                        <ul class="dropdown-menu drp-mnu">
                            <li><a href="login.php">Login</a></li>
                            <li><a href="login.php">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <?php
    }
    ?>

    <div class="w3l_header_right1">
        <?php
        session_start();
        $name = $_SESSION['userFirstName'];
        if (isset($name)) { ?>
            <h2><a><?php echo  "Hi. ".$name; ?></a></h2>
            <?php
        }else{ ?>
        <div class="w3l_header_right1">
            <h2><a href="mail.php">Contact Us</a></h2>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function() {
        var navoffeset=$(".agileits_header").offset().top;
        $(window).scroll(function(){
            var scrollpos=$(window).scrollTop();
            if(scrollpos >=navoffeset){
                $(".agileits_header").addClass("fixed");
            }else{
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>
<!-- //script-for sticky-nav -->
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="index.php"><span>Grocery</span> Store</a></h1>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="special_items">
                <li><a href="/events.php">Events</a><i>/</i></li>
                <li><a href="about.php">About Us</a><i>/</i></li>
                <li><a href="products.php">Best Deals</a><i>/</i></li>
                <li><a href="services.php">Services</a></li>
            </ul>
        </div>
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //header -->

<!--User Profile-->
<div class="user_profile">
    <div class="leftBox">
        <h3 id="update_heading">Add Address Information</h3>
        <form id="address_form">
            <input type="text" name="userAddress" placeholder="Address" required=" " id="userAddress">

            <input type="text" name="userAddress2" placeholder="Address 2" required=" " id="userAddress2">

            <input type="text" name="city" placeholder="City" required=" " id="city">

            <input type="text" name="userState" placeholder="State" required=" " id="userState">

            <input type="text" name="userCountry" placeholder="Country" required=" " id="userCountry">

            <input type="text" name="userZip" placeholder="ZIP Code" required=" " id="userZip">

            <input type="text" name="userFax" placeholder="Fax" required=" " id="userFax">

            <input type="submit" value="Submit Information" name="submit" id="submit">
            <input type="submit" value="Update" name="submit" id="update_form">
        </form>

    </div>
    <div class="rightBox">
        <h3>Your Address Information</h3>
        <div id="addressInfo">

        </div>
        <p id="address_message">Address Information is not there please Add.</p>
        <div>
            <button id="updateBtn">Update Your Address</button>
            <button id="deleteBtn">Delete Address Information</button>
        </div>

    </div>
</div>

<!--User Profile-->

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-3 w3_footer_grid">
            <h3>information</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="/events.php">Events</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="products.php">Best Deals</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="short-codes.php">Short Codes</a></li>
            </ul>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <h3>policy info</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="faqs.php">FAQ</a></li>
                <li><a href="privacy.php">privacy policy</a></li>
                <li><a href="privacy.php">terms of use</a></li>
            </ul>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <h3>what in stores</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="pet.php">Pet Food</a></li>
                <li><a href="frozen.html">Frozen Snacks</a></li>
                <li><a href="kitchen.php">Kitchen</a></li>
                <li><a href="products.php">Branded Foods</a></li>
                <li><a href="household.php">Households</a></li>
            </ul>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <h3>twitter posts</h3>
            <ul class="w3_footer_grid_list1">
                <li><label class="fa fa-twitter" aria-hidden="true"></label><i>01 day ago</i><span>Non numquam <a
                            href="#">http://sd.ds/13jklf#</a>
						eius modi tempora incidunt ut labore et
						<a href="#">http://sd.ds/1389kjklf#</a>quo nulla.</span></li>
                <li><label class="fa fa-twitter" aria-hidden="true"></label><i>02 day ago</i><span>Con numquam <a
                            href="#">http://fd.uf/56hfg#</a>
						eius modi tempora incidunt ut labore et
						<a href="#">http://fd.uf/56hfg#</a>quo nulla.</span></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <div class="agile_footer_grids">
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h4>100% secure payments</h4>
                    <img src="images/card.png" alt=" " class="img-responsive"/>
                </div>
            </div>
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h5>connect with us</h5>
                    <ul class="agileits_social_icons">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="wthree_footer_copy">
            <p>© 2016 Grocery Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
    </div>
</div>
<!-- //footer -->

<!--Footer-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>-->
<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        var $addressForm = $('#address_form');-->
<!--        $addressForm.validate({});-->
<!--    });-->
<!--</script>-->

<script>
    $('#messageBox').delay(4000).fadeOut()
    $('#messageBoxSuccess').delay(4000).fadeOut();

    $('#logoutBtn').click(function () {
        window.location.href = 'backend/logout.php'
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#update_form').hide()
        $('#updateBtn').hide();
        $('#deleteBtn').hide();

        function loadAddressDetails(){
            $.ajax({
              url:'backend/get_address.php',
                type: 'GET',
                success: function (data) {
                    $('#address_message').hide()
                    $('#addressInfo').html(data)
                    $('#updateBtn').show()
                    $('#deleteBtn').show()
                }
            })
        }

        $('#submit').click(function (event) {
            event.preventDefault();
            var postData = $('#address_form');

            $.ajax({
                    url:"backend/my_account_page.php",
                    type: "POST",
                    data: $("#address_form").serialize(),
                    success: function (data) {
                        if (data == 1){
                            $('#messageBox').text('Address Successfully Added').show();
                            $('#messageBox').delay(4000).fadeOut()
                            $('#address_message').hide()
                            loadAddressDetails();
                            $('#address_form').trigger('reset')
                        }
                    } 
            })
        })

//        update
        $('#updateBtn').click(function () {
            $('#update_heading').text('Update Address')
            $('#submit').hide()
            $('#update_form').show()

            $.ajax({
                url:'backend/update_address.php',
                type: 'GET',
                success: function (data) {
                    var getData = $.parseJSON(data);
                    $('#userAddress').val(getData.address);
                    $('#userAddress2').val(getData.address2);
                    $('#city').val(getData.city);
                    $('#userState').val(getData.state);
                    $('#userCountry').val(getData.country);
                    $('#userZip').val(getData.zip);
                    $('#userFax').val(getData.fax);
                }
            })
            
//            sending updated address to server
            $('#update_form').click(function (event) {
                event.preventDefault();
                $.ajax({
                    url:"backend/updated_address.php",
                    type: "POST",
                    data: $("#address_form").serialize(),
                    success: function (data) {
                        if (data == 1){
                            $('#messageBox').text('Address Updated Success').show();
                            $('#messageBox').delay(4000).fadeOut()
                            loadAddressDetails();
                            $('#address_form').trigger('reset')
                            $('#update_form').hide()
                            $('#submit').show()
                            $('#update_heading').text('Add Address Information')
                        }
                    }
                })
            })

        })

//        Delete Address Information
        $('#deleteBtn').click(function () {
            $.ajax({
                url:"backend/delete_address.php",
                type: "GET",
                success: function (data) {
                    if (data == 1){
                        $('#messageBox').text('Address Delete Successfully').show();
                        $('#messageBox').delay(4000).fadeOut()
                        $('#addressInfo').html('')
                        $('#address_message').show()
                        $('#updateBtn').hide()
                        $('#deleteBtn').hide()
                    }
                }
            })
        })
    })
</script>


</body>
</html>