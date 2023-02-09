<?php include('includes/title.php');
include('includes/connection.php');
?>
<div id="response_panel">
<!-- response -->
</div>
<div id="dark_panel">
<!-- dark_panel -->
</div>
<div id="darker_panel">
    <!-- darker panel -->
</div>
<!-- registration panel -->
<div id="registration_panel">
    <form id="frmMember"enctype="multipart/form-data"action="home.php"method="POST">
        <div class="top_form">
            <div class="col_one_form">
                <div class="form-group">
            <input type="text"class="form-control"placeholder="First Name"name="fname"id="fname">
            </div>
            <div class="form-group">
        <input type="text"class="form-control"placeholder="Middle Name"name="mname"id="mname">
        </div>
        <div class="form-group">
        <input type="text"class="form-control"placeholder="Last Name"name="lname"id="lname">
        </div>
        <div class="form-group">
        <input type="number"class="form-control"placeholder="Age"name="age"id="age">
        </div>
        <input type="text"class="form-control"placeholder="Residence"name="residence"id="residence">
            <input type="text"class="form-control"placeholder="Email"name="email"id="email">
            </div>
            <div class="col_two_form">
                <div class="form-group">
        <input type="date"name="dob"id="dob"class="form-control"placeholder="D.O.B">
        </div>
        <div class="form-group">
        <input type="number"class="form-control"placeholder="Telephone No."name="telephone"id="telephone">
        </div>
        <div class="form-group">
        <input type="file"class="form-control"name="files[]"id="files" multiple/>
        </div>
        <div class="form-group">
        <input type="button"name="btn_add_member"id="btn_add_member" class="btn btn_sbmt"value="ADD">
    </div>
        
            </div>
        </div>
        
    </form>
</div>
<!-- end -->
<?php
// includes
include('pages/top_bar.php');
include('pages/navbar.php');
?>
<div class="home_panel">
<?php include('pages/panel.php');?>
</div>
<?php include('includes/js_links.php');?>