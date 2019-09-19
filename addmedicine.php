<?php
include('Server.php');?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>
    <link rel="stylesheet" href="styles2.css">
  </head>

  <body>
       <div class="container">
      <header>
        <div id="logo"><a href="#"><img src="images3/05.png"></a></div>
          <ul class="nav_menu">
              <li><a href="index.html" class="list_link">Dashboard</a></li>
              <li><a href="#" class="list_link" >Invoice Search</a></li>
              <li><a href="#"  class="list_link">Medicine Inventory</a></li>
              <h1>COMPANY</h1>
              <li><a href="#" class="list_link">Add Company</a></li>
              <li><a href="#" class="list_link">Manage Company</a></li>
              <h2>MEDICINE</h2>
              <li><a href="#" class="list_link">Add Medicine</a></li>
              <li><a href="#" class="list_link" >Manage Medicine</a></li>
              <h3>PHARMACIST</h3>
              <li><a href="#" class="list_link">Add Pharmacist</a></li>
              <li><a href="#" class="list_link" >Manage Pharmacist</a></li>
              <h4>REPORTS</h4>
              <li><a href="#" class="list_link">Stock Reports</a></li>
              <li><a href="#" class="list_link">Pharmacist Wise Reports</a></li>
              <li><a href="#" class="list_link" >Sales Reports</a></li>
          </ul>  
      </header>
      <section> 
          <div id="side_body"></div>
          <div id="side_body_1"></div>
          <div id="side_body_2"></div>
          <div id="side_body_3"></div>
          <div id="side_body_4"></div>
          <div id="center_body">
           	<form method="post" action="addmedicine.php">
               <?php include('errors.php')?>
                <div class="input-group-Header">
			<p>Add Medicine</p>
		</div>
        <div class="input-group">
			<label>Medicine Company</label>
            <select type="text" name="medicine company" id="medicine company" placeholder="">
                <option>Med Pharm Company</option>
                <option>Alliance Pharm Company</option>
                <option>Peri Pharm Company</option>
                <option>Cure Pharm Company</option>
                <option>Healer Pharm Company</option>
                <option>Esther Pharm Company</option>
                <option>Allibaaba Pharm Company</option>
                <option>Nanby Pharm Company</option>
                <option>Care Pharm Company</option>
                <option>Vision Pharm Company</option>
                <option>Acceptance Pharm Company</option>
            </select>
		</div>
        <div class="input-group">
			<label>Medicne Name</label>
			<input type="text" name="medicine name"  id="medicine name" placeholder="Enter Medicne Name">
		</div>
		<div class="input-group">
			<label>Medicine Batch Number</label>
			<input type="text" name="medicine batch number" id="medicine batch number" placeholder="Enter Batch Number">
		</div>
		<div class="input-group">
			<label>MFG Date</label>
			<input type="Date" name="mfg date"  id="mfg date" placeholder="">
		</div>
		<div class="input-group">
			<label>Expiry Date</label>
			<input type="Date" name="expiry date"  id="expiry date" placeholder="">
		</div>
		<div class="input-group">
			<label>Date of Entry</label>
			<input type="Date" name="date of entry"  id="date of entry" placeholder="">
		</div>
		<div class="input-group">
			<label>Quantity(Total Units)</label>
			<input type="text" name="quantity(total units)"  id="quantity(total units)" placeholder="Enter Quantity">
		</div>
        <div class="input-group">
			<label>Price Per Unit</label>
			<input type="text" name="price per unit"  id="price per unit" placeholder="Enter Price">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="add_btn" >Add</button>
		</div>
	</form>
        </div>
          <div id="top_body"></div>
           </section>
      <footer>Pharmacy Management System</footer>

    
       </div>
  </body>

</html>