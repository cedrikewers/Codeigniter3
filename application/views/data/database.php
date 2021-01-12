<script>
    $(document).ready(function(e){
    
        
    $("#submit").click(function(){
      if($("#updateid").val()!=""){
        var func = "<?php echo site_url("db/update"); ?>";
      }
      else{
        var func = "<?php echo site_url("db/create"); ?>";
      }
        $.ajax({
            type:"POST",
            url: func,
            data:$("#myForm").serialize(),
            success: function (response) {
                $("#myForm").trigger("reset");
                window.location.reload();
            }
        
        });
    });
    $(".deleteEntry").click(function(){
      var id = $(this).data("id");
      $.ajax({
        type:"POST",
        url: "<?php echo site_url('db/delete');?>",
        data:"id="+id,
        success: function (response) {
          $("#entry"+id).fadeOut("slow");
        }
      ,})

      
    });

    $(".updateEntry").click(function(){
      var id = $(this).data("id");
      $("#updatename").val($(this).closest('.card-header').data("name"));
      $("#updateheadline").val($(this).parent().next().find("h5").data("headline"));
      $("#updatecontent").val($(this).parent().next().find("p").data("content"));
      $("#updateid").val(id);



    });

    });
 </script>
<div class="container">
  <div class="row">

 
<?php 
echo $breadcrumb_bootstrap_style;


foreach($content as $data_item){

  $session = $this->session->userdata('id_user');
  if(!empty($session)){
  $is_admin = '<div class="deleteEntry float-right" style="cursor: pointer; " data-id='.$data_item['id'].'>
                  <i class="fas fa-trash" style="margin-top: 5px"></i>
              </div>
              <div class="updateEntry float-right" style="cursor: pointer; " data-id='.$data_item['id'].'>
                <i class="fas fa-edit" style="margin-top:5px; margin-right: 5px"></i>
              </div>';
  }
  else{
    $is_admin = "";
  }

  
    echo '
      <div class="col-sm-3" id="entry'.$data_item['id'].'">
        <div class="card border-dark mb-3" style="max-width: 18rem;">
          <div class="card-header" data-name='.$data_item['name'].'>'.$data_item['name'].$is_admin.'
            
          </div>
          <div class="card-body text-dark">
            <h5 class="card-title" data-headline='.$data_item['headline'].'>'.$data_item['headline'].'</h5>
            <p class="card-text" data-content='.$data_item['content'].'>'.$data_item['content'].'</p>
         </div>
        </div>
      </div>';


}
?>
 </div>
</div>

<form id="myForm">
<input type="hidden" id="updateid" name="id" value="" class="form-control">
  <div class="form-group">
    <label >Email address</label>
    <input type="email" class="form-control" id="updatename"  placeholder="name@example.com" name="name" ">
  </div>
  <div class="form-group">
    <label >Theme</label>
    <input type="text" class="form-control" id="updateheadline" placeholder="username"  name="headline" >
  </div>
  <div class="form-group">
    <label>Message</label>
    <textarea class="form-control" id="updatecontent" rows="3" name="content" ></textarea>
  </div>
  <button id="submit" type="button" class="btn btn-primary">Submit</button>
</form>

