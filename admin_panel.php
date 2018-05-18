<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
</style>
<style>
    body {
     height: 500px;
    }
  </style>
<body>
<?php
//Super_admin Only
$heading = $_POST['heading'];
$content = $_POST['content'];
$active = $_POST['active'];
$update = $_POST['update'];
$count = 0;

require __DIR__ . '/includes/auth.php';


	if ($auth->hasRole(\Delight\Auth\Role::SUPER_ADMIN)) {
if(isset($update)){
$updatep = $auth->admin()->EditPage($heading,$content);
}
   		$page_con = $auth->admin()->GetPageContent();

foreach($page_con as $row){
print '<div class="tab"><button class="tablinks" onclick="openCity(event,\''.$row["page_name"].'\')">'.$row["page_name"].'</button></div><div id="'.$row["page_name"].'" class="tabcontent"><form action="" method="POST"><input type="hidden" name="active" value="1"/><input type="hidden" name="update" value="1"><input type="textbox" name="heading" value="'.$row["page_name"].'"/><textarea name="content" style="width: 476px; height: 376px;">'.$row["content"].'</textarea><input type = "submit" value="Edit page"/></form></div>';
}
		print '<br><center><h1>Admin<h1></center><br><form action="" method="POST">Heading:<input type="text" id="heading" name="heading"/><br>Content:<textarea rows="4" cols="50" id="content" name="content"></textarea><br>active: YES:<input type="checkbox" value="1" name="active"> or NO:<input type="checkbox" value="0" name="active"/><br> <input type="submit" value="Submit"/></form>';
                if(isset($_POST['page'])){
		
			
			//Make call to database to get page heading and content set in textarea and text box
			//need to add Update clause to Auth.php 
			//make jobs db entry form also New tab
			//make calenders intergrate with jobs
			//make it look pretty
		}
		$username = $auth->getUsername();
		if(isset($_REQUEST["heading"]))
			{ 
    			if(!isset($update))
			{
			try {
    				print "trying to add page...";
				$userId = $auth->admin()->AddNewPage($username , $heading, $content, $active , $heading);
				print "Page <h3>" . $heading . "</h3> created!<br>";
		    	    }
			catch (\Delight\Auth\UserAlreadyExistsException $e) {
    			echo "Page already exsits ";
			}
			}
		}
	}
	else{
		echo "Fail";
   		header('Location: index.php');
   		exit;
	    }
?>

<form action="" mothod="POST">
<select onchange='changeFunc()' name="page" id="page">
<?php foreach ($page_con as $row): ?>
    <option value='<?=$row["page_name"]?>'><?=$row["page_name"]?></option>
<?php endforeach ?>
</select>
<input type="submit" value="Edit"/>
</form>


<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
</body>
