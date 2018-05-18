
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
form label{
display: inline-block;
width: 100px;
float: left;
font-weight: bold;
}
</style>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    float:right;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: right;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    float:right;
    border-top: none;
}
}
</style>

<style>
    body {
     float:center;
     height: 500px;
    }
img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 40%;
   }
  </style>




<div class="tab">
  <button class="tablinks" onclick="nav(event, 'Login')">Login</button>
</div>

</head>
<body>
<img src="images/main.png">

</div>
<div id="Login" class="tabcontent">
  <h3>Login</h3>
<form action="" method="POST">
<input type="hidden" name="login" value="login"/>
<label for="email">Email:</label><input type="email" name="email"/><br>
<label for="password">Password:</label><input type="password" name="password"/><br>
<input type="submit" name="submit" value="Login"/>
</form>
<button class="tablinks" onclick="closewindow()">close</button>
</div>

<script>
function nav(evt, reg) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(reg).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<script>
function closewindow() {
    document.getElementById("Login").style.display="none";

}
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>





     <?php
require __DIR__ . '/includes/auth.php';

$email = $auth->getUsername();
$page_con = $auth->admin()->GetPageContent();
if (!isset($email)) 
{
//Nothing

}else
{
	echo "welcome " . $email;
	if ($auth->hasRole(\Delight\Auth\Role::SUPER_ADMIN)) 
	{
    		print '<a href="admin_panel.php">Admin Panel</a> ';
	} 
	
}

if (isset($_GET['logout']))
{
	try
	{
    		$auth->logOutEverywhere();
	}catch (\Delight\Auth\NotLoggedInException $e) 
	{
    	echo 'not logged in';
	}

}

?>

<div class="topnav">
 <?php foreach($page_con as $row):?>
	<a class="active" href="?page=<?= $row["page_name"]?>"> <?= $row["page_name"]?></a>
<?php endforeach ?>
</div>
<?php
        if (isset($_GET['page']))
        {
                $auth->SelectPage($_GET['page']);
        }
                        

?>

</body>
</html> 


