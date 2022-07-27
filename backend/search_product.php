<?php
require 'db-config.php';
session_start();
if (!$_SESSION['loginStatus']) {
    header('Location: /login.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/search_result.css">
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
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- font-awesome icons -->
    <link href="../css/font-awesome.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="../js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic'
          rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <!--css-->
    <link rel="stylesheet" href=".../css/registration.css" type="text/css">
    <link rel="stylesheet" href="../css/my_account.css" type="text/css">
    <script type="text/javascript" src="../js/move-top.js"></script>
    <script type="text/javascript" src="../js/easing.js"></script>
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
<div class="agileits_header">
    <div class="w3l_offers">
        <a href="../products.php">Today's special Offers !</a>
    </div>
    <div class="w3l_search">
        <form action="/backend/search_product.php" method="get">
            <input type="text" name="Product" value="Search a product..." onfocus="this.value = '';"
                   onblur="if (this.value == '') {this.value = 'Search a product...';}" required="" id="search_text">
            <input type="submit" value="">
        </form>
        <div style="position: fixed; width: 23%; top: 44px;">
            <div class="list-group" id="show-list">

            </div>
        </div>

    </div>
    <div class="product_list_header">
        <form action="#" method="post" class="last">
            <fieldset>
                <input type="hidden" name="cmd" value="_cart"/>
                <input type="hidden" name="display" value="1"/>
                <input type="submit" name="submit" value="View your cart" class="button"/>
            </fieldset>
        </form>
    </div>
    <?php
    session_start();
    if ($_SESSION['loginStatus']) { ?>
        <div class="w3l_header_right" style="display: inline-block; padding-left: 15px; margin-top: 10px">
            <button id="logoutBtn" class="logoutBtn">Logout</button>
        </div>
        <?php
    } else { ?>
        <div class="w3l_header_right">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"
                                                                                  aria-hidden="true"></i><span
                            class="caret"></span></a>
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
            <h2><a><?php echo "Hi. " . $name; ?></a></h2>
            <?php
        } else { ?>
            <div class="w3l_header_right1">
                <h2><a href="mail.php">Contact Us</a></h2>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="clearfix"></div>
</div>
<!-- script-for sticky-nav -->
<script>
    $(document).ready(function () {
        var navoffeset = $(".agileits_header").offset().top;
        $(window).scroll(function () {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".agileits_header").addClass("fixed");
            } else {
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>
<!-- //script-for sticky-nav -->
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left">
            <h1><a href="../index.php"><span>Grocery</span> Store</a></h1>
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
<hr>
<h3 style="width: 80vw; margin: 0px auto">Search Results For : "<span><?php echo $_GET['Product']; ?></span>"</h3>

<div class="productBox">

    <?php

    $keyword = $_GET['Product'];

    require 'db-config.php';
    $limit = 2;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $offset = ($page - 1) * $limit;

    $sql = "SELECT * FROM products WHERE ProductName LIKE '%$keyword%' OR ProductSKU LIKE '%$keyword%' OR ProductLongDesc LIKE '%$keyword%' limit $offset,$limit";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="product">
                <img title=" " alt=" "
                     src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['ProductImage']); ?>"
                <h3 style="margin-top: 10px"><?php echo $row['ProductName']; ?></h3>
                <h4><?php echo $row['ProductPrice']; ?></h4>
                <p><?php echo $row['ProductShortDesc']; ?></p>
                <p><?php echo $row['ProductLongDesc']; ?></p>
                <button>Get Details</button>
            </div>
            <?php
        }
        ?>

        <?php
    } else {
        echo "<h4 style='padding: 40px 0px; color: dimgrey'>No Record Found for This Search...</h4>";
    }
    ?>
</div>

<?php
$sql = "SELECT * FROM products WHERE ProductName LIKE '%$keyword%' OR ProductSKU LIKE '%$keyword%' OR ProductLongDesc LIKE '%$keyword%'";
$result = $conn->query($sql);
if ($result) {
    $msg = "try again";
}
$total = mysqli_num_rows($result);
$pages = ceil($total / $limit);
if ($total > $limit) {
    ?>
    <div class="pagination_box">
        <ul class="pagination pt-2 pd-5">
            <?php
            if ($page > 1) { ?>
                <li><a href="search_product.php?Product=<?= $keyword ?>&page=<?= ($page - 1) ?>">Previous</a></li>
                <?php
            }
            ?>
            <?php
            for ($i = 1; $i <= $pages; $i++) { ?>
                <li class="page-item <?= ($i == $page) ? $active = 'active' : ''; ?>">
                    <a href="search_product.php?Product=<?= $keyword ?>&page=<?= $i ?>" class="page-link">
                        <?= $i ?>
                    </a>
                </li>
            <?php }

            if ($total > $page) { ?>
            <li><a href="search_product.php?Product=<?= $keyword ?>&page=<?= ($page + 1) ?>">Next</a></li>
            <?php
            }
            ?>
        </ul>
    </div>
<?php } ?>


<script type="text/javascript">
    $('#logoutBtn').click(function () {
        window.location.href = '../backend/logout.php'
    })

    $(document).ready(function () {

        $("#search_text").keyup(function () {
            let searchText = $(this).val();

            if (searchText != "" && searchText.length > 2) {
                $.ajax({
                    url: "search_suggestion.php",
                    method: "post",
                    data: {
                        query: searchText,
                    },
                    success: function (response) {
                        $("#show-list").html(response);
                    },
                });
            } else {
                $("#show-list").html("");
            }
        });

        $(document).on("click", "a", function () {
            $("#search_text").val($(this).text());
            $("#show-list").html("");
        });
    });
</script>
</body>
</html>