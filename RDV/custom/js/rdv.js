// global the manage memeber table 
var manageMemberTable;


$(document).ready(function() {
	manageMemberTable = $("#manageMemberTable").DataTable({
		"ajax": "php_action/retrieve.php",
		"order": []
	});

	$("#addMemberModalBtn").on('click', function() {
		// reset the form 
		$("#createMemberForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createMemberForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var patient = $("#patient").val();
			var service = $("#service").val();
			var doctor = $("#doctor").val();
			var rdvDate = $("#rdvDate").val();
			var rdvTime = $("#rdvTime").val();

    
                    //// patient
			if(patient == "" ) {
				$("#patient").closest('.form-group').addClass('has-error');
				$("#patient").after('<p class="text-danger">This field is required</p>');
			}
			else {
				$("#patient").closest('.form-group').removeClass('has-error');
				$("#patient").closest('.form-group').addClass('has-success');
			}
                   /// service
			if(service == "" ) {
				$("#service").closest('.form-group').addClass('has-error');
				$("#service").after('<p class="text-danger">This field is required</p>');
			}
			else {
				$("#service").closest('.form-group').removeClass('has-error');
				$("#service").closest('.form-group').addClass('has-success');
			}
                   ////  doctor
			if(doctor == "" ) {
				$("#doctor").closest('.form-group').addClass('has-error');
				$("#doctor").after('<p class="text-danger">This field is required</p>');
			}
			else {
				$("#doctor").closest('.form-group').removeClass('has-error');
				$("#doctor").closest('.form-group').addClass('has-success');  
			}
			////  rdvDate
			if(rdvDate == "" ) {
				$("#rdvDate").closest('.form-group').addClass('has-error');
				$("#rdvDate").after('<p class="text-danger">This field is required</p>');
			}
			else {
				$("#rdvDate").closest('.form-group').removeClass('has-error');
				$("#rdvDate").closest('.form-group').addClass('has-success');
			}
			////  rdvTime
			if(rdvTime == "" ) {
				$("#rdvTime").closest('.form-group').addClass('has-error');
				$("#rdvTime").after('<p class="text-danger">This field is required</p>');
			}
			else {
				if(!rdvTime.match(/^(0?[8]|0?[9]|10|11|15|16):(0[0]|1[5]|3[0]|4[5])$/)) {
				$("#rdvTime").closest('.form-group').addClass('has-error');
				$("#rdvTime").after('<p class="text-danger">Plz match the fomat HH:mm <br> Appointments are from 8 to 12 in the Morning <br> from 3 to 5 in the afternoon</p>');
				}
				else {
				$("#rdvTime").closest('.form-group').removeClass('has-error');
				$("#rdvTime").closest('.form-group').addClass('has-success');
			    }
			}

			      // check if all is well

			if(patient && service && doctor && rdvDate && rdvTime.match(/^(0?[8]|0?[9]|10|11|15|16):(0[0]|1[5]|3[0]|4[5])$/)) {
				//submi the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error 
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

							// reset the form
							$("#createMemberForm")[0].reset();		

							// reload the datatables
							manageMemberTable.ajax.reload(null, false);
							// this function is built in function of datatables;
						} 
					} // success  
				}); // ajax subit 				
			} /// if
			return false;
		}); // /submit form for create member
	}); // /add modal

});

function removeMember(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/remove.php',
				type: 'post',
				data: {member_id : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageMemberTable.ajax.reload(null, false);

						// close the modal
						$("#removeMemberModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again');
	}
}

function editMember(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#member_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {

				$("#rdvID").val(response.rdvID);

				$("#editRdvDate").val(response.rdvDate);

				$("#editRdvTime").val(response.rdvTime);

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.rdvID+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editPatient = $("#editPatient").val();
					var editService = $("#editService").val();
					var editDoctor = $("#editDoctor").val();
					var editRdvDate = $("#editRdvDate").val();
					var editRdvTime = $("#editRdvTime").val();


					   /// Patient
					if(editPatient == "" ) {
						$("#editPatient").closest('.form-group').addClass('has-error');
						$("#editPatient").after('<p class="text-danger">This field is required</p>');
					}
					else {
						$("#editPatient").closest('.form-group').removeClass('has-error');
						$("#editPatient").closest('.form-group').addClass('has-success');	
					}
						   /// Service
					if(editService == "" ) {
						$("#editService").closest('.form-group').addClass('has-error');
						$("#editService").after('<p class="text-danger">This field is required</p>');
					}
					else {
						$("#editService").closest('.form-group').removeClass('has-error');
						$("#editService").closest('.form-group').addClass('has-success');
					}
						   ////  Doctor
					if(editDoctor == "" ) {
						$("#editDoctor").closest('.form-group').addClass('has-error');
						$("#editDoctor").after('<p class="text-danger">This field is required</p>');
					}
					else {
						$("#editDoctor").closest('.form-group').removeClass('has-error');
						$("#editDoctor").closest('.form-group').addClass('has-success');  
					}

					       ////  rdvDate
					if(editRdvDate == "" ) {
						$("#editRdvDate").closest('.form-group').addClass('has-error');
						$("#editRdvDate").after('<p class="text-danger">This field is required</p>');
					}
					else {
						$("#editRdvDate").closest('.form-group').removeClass('has-error');
						$("#editRdvDate").closest('.form-group').addClass('has-success');
					}
					////  rdvTime
					if(editRdvTime == "" ) {
						$("#editRdvTime").closest('.form-group').addClass('has-error');
						$("#editRdvTime").after('<p class="text-danger">This field is required</p>');
					}
					else {
						if(!editRdvTime.match(/^(0?[8]|0?[9]|10|11|15|16):(0[0]|1[5]|3[0]|4[5])$/)) {
						$("#editRdvTime").closest('.form-group').addClass('has-error');
						$("#editRdvTime").after('<p class="text-danger">Plz match the fomat HH:mm <br> Appointments are from 8 to 12 in the Morning <br> from 3 to 5 in the afternoon</p>');
						}
						else {
						$("#editRdvTime").closest('.form-group').removeClass('has-error');
						$("#editRdvTime").closest('.form-group').addClass('has-success');
						}
					}

					if(editPatient && editService && editDoctor && editRdvDate && editRdvTime.match(/^(0?[8]|0?[9]|10|11|15|16):(0[0]|1[5]|3[0]|4[5])$/)) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');

									// reload the datatables
									manageMemberTable.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error 
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

	} else {
		alert("Error : Refresh the page again");
	}
}