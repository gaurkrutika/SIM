<?php
require("connection.php");
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']=='YES'):
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATASHEET MANAGEMENT DASHBOARD</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
    <div id="dashboardMainContainer">
        <div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="dashboard_logo">SIM</h3>
            <div class="dashboard_sidebar_user">
                <img src="" alt="User image." />
                <span><?php echo $_SESSION['Username']; ?></span>
            </div>
            <div class="dashboard_sidebar_menus">
                <ul class="dashboard_menu_lists">
                    <li class="menuActive">
                        <a href=""><i class="fa fa-dashboard menuIcons"></i><span class="nav-text"> LINE 1</span></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-dashboard menuIcons"></i> LINE 2</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-dashboard menuIcons"></i> LINE 3</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-dashboard menuIcons"></i> LINE 4</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-dashboard menuIcons"></i> LINE 5</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-dashboard menuIcons"></i> LINE 6</a>
                    </li>
                    <li>
                        <a href="line_7.php"><i class="fa fa-dashboard menuIcons"></i> LINE 7</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-dashboard menuIcons"></i> LINE 8</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-dashboard menuIcons"></i> LINE 9</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-dashboard menuIcons"></i> LINE 10</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dasboard_content_container" id="dasboard_content_container">
            <div class="dashboard_topNav" id="dashboard_topNav">
                <a href="logout.php" id="logoutBtn"><i class="fa fa-power-off"></i> Log-out</a>
            </div>
            <div class="dashboard_content" id="dashboard_content" >
                <div class="dashboard_content_main" id="dashboard_content_main" >
                    
                
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php else: header("Location: login.php"); exit; ?>
<?php endif; ?>
