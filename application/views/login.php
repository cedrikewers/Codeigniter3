<head>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>  
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">

</head>
    
<body>
    
<script>

    

</script>




    <div id="form" style="width: 80%; margin: auto;">
        <form action="<?php site_url('login') ?>" method="post" class="form-horizontal">
            <div class="mb-3">
            <label class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" />
            </div>
            <div class="mb-3">
            <label class="form-label">Password:</label>
                <input type="text" class="form-control" name="password" />
            </div>
            <div class="mb-3">
            <div class="form-text" >
            <?php if(isset($_SESSION)) {
                echo $this->session->flashdata('flash_data');
            } ?>
            </div>
            </div>
            <div class="mb-3">
                <button onclick="parent.window.location.reload()" type="submit" type="button" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

</body>  