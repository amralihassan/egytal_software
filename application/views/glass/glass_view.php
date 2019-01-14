<div class="se-pre-con"></div>
<div class="container">
	<h4>حساب الزجاج</h4><hr>
	  <ol class="breadcrumb">
	    <li><a href="#" onclick="loadCutomersituation();"><i class="fa fa-dashboard"></i> الرئيسية</a>&nbsp;&nbsp;</li>
	    <li class="active">حساب الزجاج</li>
	  </ol>
	  <!-- new glass for customer -->
	<!-- alert -->
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success w3-green" style="display: none;"></div>
			<div class="alert alert-danger w3-red" style="display: none;"></div>
		</div>
	</div>
		<!-- add new glass project -->
		<form action="" method="POST" id="frmNew">
			<div class="row">
			  <div class="col-md-3">
				  	<div class="form-group">
				  		<label><b>اسم العميل</b></label>
				  		<select class="form-control select2" name="ctm_id" id="customers_name">
				  			<option value="">اسم العميل</option>
				  		</select>
				  	</div>
			  </div>
			  <div class="col-md-3">
				  	<div class="form-group">
				  		<label><b>اسم المشروع</b></label>
				  		<input type="text" name="project_name" class="form-control" required="" placeholder="اسم المشروع">
				  	</div>
			  </div>
			  <div class="col-md-6">
				  	<div class="form-group">
				  		<label><b>ملاحظات</b></label>
				  		<input type="text" name="notes" class="form-control" placeholder="ملاحظات">
				  	</div>
			  </div>
			</div>
		</form>
		<button class="btn btn-success" id="btnSave"> حفظ</button>
	  <br><br>
		<div class="row">
			<div class="col-md-12">
				<!-- tables -->
				<div class="table table-responsive" id="glass_projects_table"></div>
				<div align="center" id="glass_projects_pagination_link"></div>
			</div>
		</div>
</div>
<!-- delete model -->
<div class="modal fade" id="deleteModal_glass_projects" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				هل تريد اتمام عملية الحذف؟
			</div>
			<div class="modal-footer">
				<button type="button" id="btnDelete_glass_projects" class="w3-btn w3-red">حذف</button>
				<button type="button" class="w3-btn w3-grey" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>

<!-- update model -->
<div class="modal fade" id="updateModel_glass_projects" role="dialog" tabindex="1">
	<div class="modal-dialog" role="document">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header" style="background-color: #337ab7; color: white;">
		        <h4 class="modal-title" id="exampleModalLongTitle"></h4>
		    </div>
			<div class="modal-body">
				<form method="POST" action="" id="frmUpdate">
					<input type="text" name="id_update" hidden="">
					<div class="row">
						  <div class="col-md-12">
							  	<div class="form-group">
							  		<label><b>اسم العميل</b></label>
							  		<select class="form-control select2" name="ctm_id_update" id="customers_name_update" style="width: 100%;">
							  			<option value="">اسم العميل</option>
							  		</select>
							  	</div>
						  </div>
					</div>
					  <div class="row">
						  <div class="col-md-12">
							  	<div class="form-group">
							  		<label><b>اسم المشروع</b></label>
							  		<input type="text" name="project_name_update" class="form-control" required="" placeholder="اسم المشروع">
							  	</div>
						  </div>
					  </div>
	 					<div class="row">
							  <div class="col-md-12">
								  	<div class="form-group">
								  		<label><b>ملاحظات</b></label>
								  		<input type="text" name="notes_update" class="form-control" placeholder="ملاحظات">
								  	</div>
							  </div>
	 					</div>


				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnUpdate" class="btn btn-success">حفظ التعديل</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	function insert_glass_project(id)
	{
		var id_pro = id;
    $.ajax({
      type:'ajax',
      method:'get',
      url:'<?php echo base_url() ?>Glass/loadGlass_project_details',
  		data:{id_pro:id_pro},
      async:false,
      dataType:'json',
      success:function(response){
				$('#page-content').html(response.page);
				$('#id_pro').html('<input type="text" hidden name="offerID" id="offerID" value="'+response.id_pro+'">')
      }
    });
	}
	function update_glass_project(id)
	{
		var customerID = '';
		$('#updateModel_glass_projects').modal('show');
  		$('#updateModel_glass_projects').find('.modal-title').text('تعديل');
  		$('#frmUpdate').attr('action','<?php echo base_url() ?>Glass/update_glass_project');
  		$.ajax({
  			type:'ajax',
  			method:'get',
  			url:'<?php echo base_url() ?>Glass/getdatabyid',
  			data:{id:id},
  			async:false,
  			dataType:'json',
  			success:function(data){
  				customerID = data.ctm_id;
  				$('input[name=id_update]').val(data.id);
  				$('input[name=project_name_update]').val(data.project_name);
  				$('input[name=notes_update]').val(data.notes);
  			}
  		});
  		// load customer
		$.ajax({
			type:'ajax',
			method:'get',
			data:{ctmid:customerID},
			url:'<?php echo base_url() ?>Customer/retrive_customer_by_ctmID',
			dataType:'json',
			success:function(data)
			{
				$('#customers_name_update').html(data);
			}
		});
	}
	$('#btnUpdate').click(function (){
		var url = $('#frmUpdate').attr('action'); // action
		var data = $('#frmUpdate').serialize();
		$.ajax({
			type:'ajax',
			method:'post',
			url:url,
			data:data,
			async:false,
			dataType:'json',
			success:function(response){
				if (response.success) {

					$('#updateModel_glass_projects').modal('hide');
					$('#frmUpdate')[0].reset();
					$('.alert-success').html('تم التعديل بنجاح.').fadeIn().delay(2000).fadeOut('slow');
					load_glass_projects_data(1);
				}
			}
		});
	})
	function print_glass_project(id)
	{
		window.open("<?php echo base_url() ?>Glass/printGlassreport/"+id,'_blank');
	}
	function delete_glass_project(id)
	{
  		$('#deleteModal_glass_projects').modal('show');
  		$('#btnDelete_glass_projects').click(function(){
  			$.ajax({
  				type:'ajax',
  				method:'get',
  				async:false,
  				url:'<?php echo base_url() ?>Glass/delete_glass_project',
  				data:{id:id},
  				dataType:'json',
  				success:function(response){
  					if (response.success) {
  						$('#deleteModal_glass_projects').modal('hide');
  						$('.alert-success').html('تم الحف بنجاح.').fadeIn().delay(4000).fadeOut('slow');
  						load_glass_projects_data(1);
  					}
  				}
  			});
  		});
	}
	load_glass_projects_data(1);
	function load_glass_projects_data(page) {
		$.ajax({
			url:'<?php echo base_url() ?>Glass/pagination/' + page,
			method:'get',
			dataType:'json',
			success:function(data){
				$('#glass_projects_table').html(data.glass_projects_table);
				$('#glass_projects_pagination_link').html(data.glass_projects_pagination_link);
				$(".se-pre-con").fadeOut("slow");
			}
		});
	}
	$(document).on('click',".pagination li a", function(event){
		event.preventDefault();
		var page = $(this).data('ci-pagination-page');
		load_glass_projects_data(page);
	});
 	 $(function () {
    	//Initialize Select2 Elements
   		 $('.select2').select2()
	  })
	  load_customer();
	  function load_customer()
  {
		// retrive accounts
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url() ?>Customer/retrive_customer',
            dataType:'json',
            success:function(data)
            {
                $('#customers_name').html(data);
            }
        });
  }
  $('#btnSave').click(function(){
		var url = '<?php echo base_url() ?>Glass/add_glass_project';
		var data = $('#frmNew').serialize();
		$.ajax({
			type:'ajax',
			method:'post',
			url:url,//action
			data:data,
			async:false,
			dataType:'json',
			success:function(response){
				if (response.success) {
					$('#frmNew')[0].reset();
					$('.alert-success').html('تمت الإضافة بنجاح').fadeIn().delay(2000).fadeOut('slow');
					// go to top page
              		$('html, body').animate({ scrollTop: 0 }, 0);
					load_glass_projects_data(1);
				}

			}
		});
  })
</script>
