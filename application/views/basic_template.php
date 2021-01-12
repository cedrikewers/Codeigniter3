<!DOCTYPE html>
<html>

<head>

    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/loginFrame.css')?>">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="https://kit.fontawesome.com/8d774a68be.js" crossorigin="anonymous"></script>
    <script>
      function login(){
        document.getElementById("loginFrame").style.display = "inline";
      }
      function closeLogin(){
        document.getElementById("loginFrame").style.display = "none";
      }
 
    </script>
     


</head>

<body <?php $session = $this->session->userdata('id_user');
                if(empty($session)){
                  echo 'onload="login()"';
                };
      ?>>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php foreach ($nav_list as $nav_item): ?>
          
          <?php if($title == $nav_item){ 
                  echo '<li class="nav-item active"><b>';
                } 
                else{ 
                  echo '<li class="nav-item">';
                }

            echo anchor($nav_item,$nav_item, array('class' => 'nav-link'));?> 
            
            <?= ($title == $nav_item ? '</b>' : '')?>
          
          </li>
    <?php endforeach;?>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('data/database')?>">Database</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <?php $session = $this->session->userdata('id_user');
        if(!empty($session)){
          echo '<li class="nav-item">
                  <a class="nav-link " href="'.base_url('logout').'" tabindex="-1" >Logout</a>
                </li>';
        }
        else{
          echo '<li class="nav-item">
                  <a class="nav-link " onclick="login()" style="cursor:pointer" tabindex="-1" >Login</a>
                </li>';
        } 

      ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="loginFrame" id="loginFrame" style="display:none" onclick="closeLogin()">
  <div class="loginFrameFrame">
    <iframe class="loginFrameContent"  src="<?php echo base_url('login')?>" frameborder="0"></iframe>
  </div>
</div>



<?php


    echo $content;


?>

<em>&copy; 2020</em>
</body>
</html>
