<link href="<?= css; ?>/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?= css; ?>/styles.css" rel="stylesheet">
<link href="<?= css; ?>/forms.css" rel="stylesheet">

<div class="page-content">
    	<div class="row">
		  <div class="col-md-12">

	  			<div class="row">
	  				<div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
                                <div class="panel-title">Data Edit</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" method='post' role="form">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">sfsfsd</label>
								    <div class="col-sm-10">
								      <input type="text" value="<?= $idbl; ?>" class="form-control" name="sfsfsd" placeholder="sfsfsd">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">fsdff</label>
								    <div class="col-sm-10">
								      <input type="text" value="<?= $nmbl; ?>" class="form-control" name="fsdff" placeholder="fsdff">
								    </div>
								  </div>
								  <div class="form-group">
                                      
								    <div class="col-sm-offset-2 col-sm-10">
                                        <button name='update' class="btn btn-info" type="submit">
													Update
												</button>
								      <button name='save' type="submit" class="btn btn-primary">Save</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
	  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Data View</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table table-striped">
				              <thead>
				                <tr>
				                  <th>#</th>
				                  <th>sfsfsd</th>
				                  <th>fsdff</th>
				                  <th width='25%'></th>
				                </tr>
				              </thead>
				              <tbody>
				                    <?php $i = 1;
                                        while($de = $vv->gaeObjek($d)){
                                                print "
                                                 <tr>
                                                  <td>$i</td>
                                                  <td>$de->sfsfsd</td>
                                                  <td>$de->fsdff</td>
                                                  <td>
                                      <a href='?update=$de->sfsfsd' class='btn btn-info'>Update</a>
                                      <a href='?delete=$de->sfsfsd' class='btn btn-danger'>Delete</a>                  </td>
                                                </tr>
                                                "; $i++;
                                            }
                                    ?>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
	  			</div>
            </div>
    </div>
</div>