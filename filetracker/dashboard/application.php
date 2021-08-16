<?php session_start();
if(!isset($_SESSION['user'])){
	header("Location: login.php");
}
include '../_inc/connection.php';

$dessql="SELECT 
faculty.id,
faculty.desname,
department.Dep_name
FROM
faculty
INNER JOIN department ON faculty.depart_id = department.ID";
$desr=mysqli_query($con,$dessql);


include 'layouts/header.php';?>
<section id="feature">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
                              <h2>Submit Your Application <small>We will do our best to respond to you </small></h2>
                         </div>
                         <form action="actions/apa.php" method="post" enctype="multipart/form-data">
                         	<div class="row">
                         	
                         		<div class="col-md-4">
                         			   <div class="form-group">
                         			   <label>To</label> 
                       <select name="des_id" class="form-control" required> <option value="">--Please Select--</option><?php while ($desrow=mysqli_fetch_assoc($desr)) {?>
                            <option value="<?php echo $desrow['id']  ; ?> "><?php echo $desrow['Dep_name'];?>
                            	<?PHP echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp"; ?><?php echo $desrow['desname'];?></option>
                        <?php }?>
                        </select>
                    	</div>
                            </div>

                         		<div class="col-md-4">
                         			<div class="form-group">
                         				<label>Subject</label>
										<input type="text" name="subject" value="" class="form-control" autocomplete="off">
                         			</div>
                         		</div>
                         		<div class="col-md-4">
                         			<div class="form-group">
                         				<label >Date</label>
					<input type="date" name="Date" value="" class="form-control" autocomplete="off">
			
                         			</div>
                         		</div>
                         		<div class="col-md-12">
                         			<div class="form-group">
                         			<label>Body</label>
                         			<textarea name="body" class="form-control"></textarea>
                         		</div>
                         		</div>
                                     <div class="col-md-12">

                                          <div class="form-group">
                                                <label>File</label>
                                                <input type="file" name="image">
                                          </div>
                                    </div>
                         		<div class="col-md-12">
                         			<br/>
                         			<button type="submit" name="submit" class="btn btn-success btn-block">Submit Application</button>
                         		</div>

                         	</div>

                         </form>
			</div>
		</div>
	</div>
</section>

<?php include 'layouts/footer.php';?>