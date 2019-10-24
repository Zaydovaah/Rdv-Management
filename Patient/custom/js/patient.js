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
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			var phone = $("#phone").val();
			var address = $("#address").val();
			var cni = $("#cni").val();

                    //// firstname
			if(firstname == "" ) {
				$("#firstname").closest('.form-group').addClass('has-error');
				$("#firstname").after('<p class="text-danger">This field is required</p>');
			}
			else {
				if(!firstname.match(/^[a-zA-Z ]+$/)) {
				$("#firstname").closest('.form-group').addClass('has-error');
				$("#firstname").after('<p class="text-danger">invalid entry</p>');
				}
				else {
				$("#firstname").closest('.form-group').removeClass('has-error');
				$("#firstname").closest('.form-group').addClass('has-success');
			    }
			}
                   /// lastname
			if(lastname == "" ) {
				$("#lastname").closest('.form-group').addClass('has-error');
				$("#lastname").after('<p class="text-danger">This field is required</p>');
			}
			else {
				if(!lastname.match(/^[a-zA-Z ]+$/)) {
				$("#lastname").closest('.form-group').addClass('has-error');
				$("#lastname").after('<p class="text-danger">invalid entry</p>');
				}
				else {
				$("#lastname").closest('.form-group').removeClass('has-error');
				$("#lastname").closest('.form-group').addClass('has-success');
			    }
			}
			////  phone
			if(phone == "" ) {
				$("#phone").closest('.form-group').addClass('has-error');
				$("#phone").after('<p class="text-danger">This field is required</p>');
			}
			else {
				if(!phone.match(/^7[067][0-9]{7}$/)) {
				$("#phone").closest('.form-group').addClass('has-error');
				$("#phone").after('<p class="text-danger">invalid entry</p>');
				}
				else {
				$("#phone").closest('.form-group').removeClass('has-error');
				$("#phone").closest('.form-group').addClass('has-success');
			    }
			}
			////  address
			if(address == "" ) {
				$("#address").closest('.form-group').addClass('has-error');
				$("#address").after('<p class="text-danger">This field is required</p>');
			}
			else {
				$("#address").closest('.form-group').removeClass('has-error');
				$("#address").closest('.form-group').addClass('has-success');
			}
			////  cni
			if(cni == "" ) {
				$("#cni").closest('.form-group').addClass('has-error');
				$("#cni").after('<p class="text-danger">This field is required</p>');
			}
			else {
				if(!cni.match(/[0-9]{14}$/)) {
				$("#cni").closest('.form-group').addClass('has-error');
				$("#cni").after('<p class="text-danger">invalid entry</p>');
				}
				else {
				$("#cni").closest('.form-group').removeClass('has-error');
				$("#cni").closest('.form-group').addClass('has-success');
			    }
			}

			      // check if all is well

			if(firstname.match(/^[a-zA-Z ]+$/) && lastname.match(/^[a-zA-Z ]+$/) && phone.match(/^7[067][0-9]{7}$/) && cni.match(/[0-9]{14}$/) &&  address) {
				//submit the form to server
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

				$("#patientID").val(response.patientID);

				$("#editFirstname").val(response.patientFirst);

				$("#editLastname").val(response.patientLast);

				$("#editPhone").val(response.patientPhone);

				$("#editAddress").val(response.patientAddress);

				$("#editCni").val(response.patientCNI);

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.patientID+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editFirstname = $("#editFirstname").val();
					var editLastname = $("#editLastname").val();
					var editPhone = $("#editPhone").val();
					var editAddress = $("#editAddress").val();
					var editCni = $("#editCni").val();


                         /// firstname
					if(editFirstname == "" ) {
						$("#editFirstname").closest('.form-group').addClass('has-error');
						$("#editFirstname").after('<p class="text-danger">This field is required</p>');
					}
					else {
						if(!editFirstname.match(/^[a-zA-Z ]+$/)) {
						$("#editFirstname").closest('.form-group').addClass('has-error');
						$("#editFirstname").after('<p class="text-danger">invalid entry</p>');
						}
						else {
						$("#editFirstname").closest('.form-group').removeClass('has-error');
						$("#editFirstname").closest('.form-group').addClass('has-success');
						}
					}
						   /// lastname
					if(editLastname == "" ) {
						$("#editLastname").closest('.form-group').addClass('has-error');
						$("#editLastname").after('<p class="text-danger">This field is required</p>');
					}
					else {
						if(!editLastname.match(/^[a-zA-Z ]+$/)) {
						$("#editLastname").closest('.form-group').addClass('has-error');
						$("#editLastname").after('<p class="text-danger">invalid entry</p>');
						}
						else {
						$("#editLastname").closest('.form-group').removeClass('has-error');
						$("#editLastname").closest('.form-group').addClass('has-success');
						}
					}
					////  phone
					if(editPhone == "" ) {
						$("#editPhone").closest('.form-group').addClass('has-error');
						$("#editPhone").after('<p class="text-danger">This field is required</p>');
					}
					else {
						if(!editPhone.match(/^7[067][0-9]{7}$/)) {
						$("#editPhone").closest('.form-group').addClass('has-error');
						$("#editPhone").after('<p class="text-danger">invalid entry</p>');
						}
						else {
						$("#editPhone").closest('.form-group').removeClass('has-error');
						$("#editPhone").closest('.form-group').addClass('has-success');
						}
					}
					////  address
					if(editAddress == "" ) {
						$("#editAddress").closest('.form-group').addClass('has-error');
						$("#editAddress").after('<p class="text-danger">This field is required</p>');
					}
					else {
						$("#editAddress").closest('.form-group').removeClass('has-error');
						$("#editAddress").closest('.form-group').addClass('has-success');
					}
					////  cni
					if(editCni == "" ) {
						$("#editCni").closest('.form-group').addClass('has-error');
						$("#editCni").after('<p class="text-danger">This field is required</p>');
					}
					else {
						if(!editCni.match(/[0-9]{14}$/)) {
						$("#editCni").closest('.form-group').addClass('has-error');
						$("#editCni").after('<p class="text-danger">invalid entry</p>');
						}
						else {
						$("#editCni").closest('.form-group').removeClass('has-error');
						$("#editCni").closest('.form-group').addClass('has-success');
						}
					}

					if(editFirstname.match(/^[a-zA-Z ]+$/) && editLastname.match(/^[a-zA-Z ]+$/) && editPhone.match(/^7[067][0-9]{7}$/) && editCni.match(/[0-9]{14}$/) && editAddress) {
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