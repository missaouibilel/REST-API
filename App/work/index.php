<!DOCTYPE html>
<html>
    <head>
        <title>REST API CRUD USING PHP&MYSQL </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>


    </head>
    <body>
        <div class="container">
            <br/>
            <h3 class="text-center">REST API using PHP & MYSQL</h3>
            <br>
            <div class="text-right" style="margin-bottom: 5px; float:right">
                <button type="button" class="btn btn-success" name="add_button" id="add_button">Add</button>
            </div>
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Poste</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </body>
</html>
<div id="apicrudmodal" class="modal" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="api_crud_form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="poste">Poste</label>
                    <input type="text" id="poste" name="poste" class="form-control">
                </div>
               
                <div class="modal_footer">
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <input type="hidden" name="action" id="action" value="insert">
                    <div style="float:right; padding-top:8px;">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <input type="submit" name="button-action" id="button_action" value="Insert" class="btn btn-primary" >
                    </div>
                   
                </div>
            </form>
      </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    fetch_data();
    function fetch_data()
    {
        $.ajax({
            url:"fetch.php",
            success:function(data)
            {
                $('tbody').html(data);
            }
        })
    }
    $("#add_button").click(function(){
        $("#apicrudmodal").modal('show');
    })
    $("#api_crud_form").on('submit',function(event){
        event.preventDefault();
        if($('#name').val()=="")
        {
            alert("Enter the name");
        }else if($('#email').val()=="")
        {
            alert("Enter the email");
        }else if($('#poste').val()=="")
        {
            alert("enter the poste");
        }else
        {
            var form_data = $(this).serialize();
            $.ajax({
                url:"action.php",
                method:"POST",
                data:form_data,
                success:function(data){
                    fetch_data();
                    $("#api_crud_form")[0].reset();
                    $("#apicrudmodal").modal("hide");
                    if(data == "insert")
                    {
                        alert ("Data inserted with succesfully");

                    }else if(data == "update")
                    {
                        alert("Data updated with succesfully");
                    }
                }
            })
        }
    })
})
</script>