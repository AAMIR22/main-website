<?php
session_start();
$_session["client"];
 $name=$_POST['suburb']?> <!doctype html>

<html lang="en"> 

 <head> 

  <meta charset="UTF-8"> 

  <title>alon</title> 

  <link rel="stylesheet" href="./style1.css"> 

 </head> 

 <body> <section><div class="content"> 
<?php echo $_SESSION["client"]?>
</div> </section> <section> <div class="signin"> 

 
    <div class="content"> 

     <h2>JOB ALLOCATION REQUEST</h2> 
<form action="salesprocess.php" method="post">

     <div class="form"> 
	
<div class="inputBox"> 
<input type="text" name="client" value="" readonly="readonly" required> <i><font color="red"><?php echo $_SESSION["client"]." - ".$name?></font></i> 
</div> 

<div class="inputBox"> 
<input type="text" name="quot" required> <i>QUOTATION</i> 
</div> 

<div class="inputBox"> 
<input type="text" name="po" required> <i>PO</i> 
</div>

<div class="inputBox"> 
<input type="text" name="dept" required> <i>Department</i> 
</div> 

      <div class="links"> <a href="#">Forgot</a> <a href="CLIENT REGISTER.html">New Client?</a> 

      </div> 

      <div class="inputBox"> 

       <input type="submit" value="Request"> 

      </div> 

     </div> 

    </div> 

   </div> 
</section> 
</body>
</html>