			

<div class="container">
	<div class="col-md-12">
					<div class="col-md-12">

						<ul class="breadcrumb">
							<li><a href="#">Stock</a>
							</li>
							<li>New Item</li>
						</ul>

					</div>
					
                <div class="col-md-12">
                    <div class="box">
                        <h1>New Item</h1>


                        <hr>

                        <h3>Item details</h3>
                        <form id ='stock' method=POST action="<?php echo base_url('index.php/Stock/Equipment/add')?>">
                            <div class="row">
								<div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="title">Category</label>
                                        <select class="form-control" name='category' id ='category'>
											<option value='' >Select</option>
                                            <?php foreach($cat as $key){
                                                echo '<option value="'.$key->id.'" >'.$key->category.'</option>';

                                                } ?>
										</select>
                                    </div>
                                </div>
							</div>
							<div class='row'>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="firstname">Model</label>
                                        <input type="text" class="form-control" id="model" name="model" value="<?php echo set_value('firstname'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('firstname'); ?></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="lastname">Item Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('lastname'); ?>">
										<label > <span style="color:#d9534f;"><?php echo form_error('lastname'); ?></span></label>
                                    </div>
                                </div>
								
                            </div>
							<div class="row">
                                
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="email">Quentity</label>
                                        <input type="Number" class="form-control" id="qnt" name='qnt' min="0">
										<label > <span style="color:#d9534f;"><?php echo form_error('occupation'); ?></span></label>
                                    </div>
                                </div>
                                
								<div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="address">Description</label>
                                        <textarea class="form-control" rows="5" id="description" name='description' required><?php echo set_value('address'); ?></textarea>
										<label > <span style="color:#d9534f;"><?php echo form_error('Address'); ?></span></label>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
									<button type="reset" class="btn btn-primary"> Reset</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>				
	</div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        submitform();
    });

function submitform(){

    $('form').submit(function(e){
        e.preventDefault();
        

        var me =$(this);
        $.ajax({
            url:me.attr('action'),
            type:'post',
            data:new FormData(this),
            dataType:'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.success==true){
                    $('#mymodel').modal('show')  ; 
                    $('.form-group').removeClass('has-error').removeClass('has-success');
                    $('.text-danger').remove();
                    me[0].reset();//loadAssignmenttable();

                }
                else{
                    
                    $.each(response.messages, function(key,value){
                        var element = $ ('#'+ key);
                        element.closest('div.form-group')
                        .removeClass('has-error')
                        .addClass(value.length >0 ? 'has-error':'has-success')
                        .find('.text-danger').remove();
                        element.after(value);
                    });
                }


            }
        })

        }

    );
}
</script>
