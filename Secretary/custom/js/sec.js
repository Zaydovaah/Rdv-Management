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
			var service = $("#service").val();
			var phone = $("#phone").val();
			var address = $("#address").val();
			var email = $("#email").val();
			var username = $("#username").val();
			var password = $("#password").val();
			var password_check = $("#password_check").val();

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
                   ////  service
			if(service == "" ) {
				$("#service").closest('.form-group').addClass('has-error');
				$("#service").after('<p class="text-danger">This field is required</p>');
			}
			else {
				$("#service").closest('.form-group').removeClass('has-error');
				$("#service").closest('.form-group').addClass('has-success');  
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
			////  email
			if(email == "" ) {
				$("#email").closest('.form-group').addClass('has-error');
				$("#email").after('<p class="text-danger">This field is required</p>');
			}
			else {
				if(!email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
				$("#email").closest('.form-group').addClass('has-error');
				$("#email").after('<p class="text-danger">invalid entry</p>');
				}
				else {
				$("#email").closest('.form-group').removeClass('has-error');
				$("#email").closest('.form-group').addClass('has-success');
			    }
			}
			////  username
			if(username == "" ) {
				$("#username").closest('.form-group').addClass('has-error');
				$("#username").after('<p class="text-danger">This field is required</p>');
			}
			else {
				$("#firstname").closest('.form-group').removeClass('has-error');
				$("#firstname").closest('.form-group').addClass('has-success');
			}
			////  password
			if(password == "" ) {
				$("#password").closest('.form-group').addClass('has-error');
				$("#password").after('<p class="text-danger">This field is required</p>');
			}
			else {
				if(!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/)) {
				$("#password").closest('.form-group').addClass('has-error');
				$("#password").after('<p class="text-danger">must contain 1 uppercase, 1 number, 8 chars at least</p>');
				}
				else {
				$("#password").closest('.form-group').removeClass('has-error');
				$("#password").closest('.form-group').addClass('has-success');
			    }
			}
			////  password_check
			if(password_check == "" ) {
				$("#password_check").closest('.form-group').addClass('has-error');
				$("#password_check").after('<p class="text-danger">This field is required</p>');
			}
			else {
				if(password != password_check) {
				$("#password_check").closest('.form-group').addClass('has-error');
				$("#password_check").after('<p class="text-danger">passwords do not match</p>');
				}
				if(!password_check.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/)) {
				$("#password_check").closest('.form-group').addClass('has-error');
				$("#password_check").after('<p class="text-danger">must contain 1 uppercase, 1 number, 8 chars at least</p>');
				}
				else {
				$("#password_check").closest('.form-group').removeClass('has-error');
				$("#password_check").closest('.form-group').addClass('has-success');
			    }
			}

			      // check if all is well

			if(firstname.match(/^[a-zA-Z ]+$/) && lastname.match(/^[a-zA-Z ]+$/) && phone.match(/^7[067][0-9]{7}$/) && email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) && password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/) && password === password_check && service && username && address) {
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

				$("#secID").val(response.secID);

				$("#editFirstname").val(response.secFirst);

				$("#editLastname").val(response.secLast);

				$("#editPhone").val(response.secPhone);

				$("#editAddress").val(response.secAddress);

				$("#editEmail").val(response.secMail);

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.secID+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editFirstname = $("#editFirstname").val();
					var editLastname = $("#editLastname").val();
					var editService = $("#editService").val();
					var editPhone = $("#editPhone").val();
					var editAddress = $("#editAddress").val();
					var editEmail = $("#editEmail").val();

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
						   ////  Service
					if(editService == "" ) {
						$("#editService").closest('.form-group').addClass('has-error');
						$("#editService").after('<p class="text-danger">This field is required</p>');
					}
					else {
						$("#editService").closest('.form-group').removeClass('has-error');
						$("#editService").closest('.form-group').addClass('has-success');  
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
					////  email
					if(editEmail == "" ) {
						$("#editEmail").closest('.form-group').addClass('has-error');
						$("#editEmail").after('<p class="text-danger">This field is required</p>');
					}
					else {
						if(!editEmail.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
						$("#editEmail").closest('.form-group').addClass('has-error');
						$("#editEmail").after('<p class="text-danger">invalid entry</p>');
						}
						else {
						$("#editEmail").closest('.form-group').removeClass('has-error');
						$("#editEmail").closest('.form-group').addClass('has-success');
						}
					}

					if(editFirstname.match(/^[a-zA-Z ]+$/) && editLastname.match(/^[a-zA-Z ]+$/) && editPhone.match(/^7[067][0-9]{7}$/) && editEmail.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) && editService && editAddress) {
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