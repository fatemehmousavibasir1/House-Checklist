
<?php
									include('config.php');
                                   
									if(!empty($_POST["cat_id"])) 
									{
										$id=intval($_POST['cat_id']);
										$query=mysqli_query($con,"SELECT * FROM `product group` WHERE Parent_ID=$id");
										?>
										<option value="">Select Country</option>
										<?php
										while($row=mysqli_fetch_array($query))
										{
											?>
											<option value="<?php echo htmlentities($row['Product_Group_ID']); ?>"><?php echo htmlentities($row['Group_Name']); ?></option>
											<?php
										}
									}
									?>			
								