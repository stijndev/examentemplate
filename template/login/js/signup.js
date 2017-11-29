$(document).ready(function(){

  $("#submit").click(function(){

    var username = $("#newuser").val();
    var password = $("#password1").val();
    var password2 = $("#password2").val();
    var email = $("#email").val();
    var firstname = $("#newfirstname").val();
    var lastname = $("#newlastname").val();
    var phone = $("#newphone").val();
    var specialty = $("#newspecialty").val();


    if((username == "") || (password == "") || (email == "") || (firstname == "") || (lastname == "") || (phone == "") || (specialty = "")) {
      $("#message").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Vul een gebruikersnaam en wachtwoord inS</div>");
    }
    else {
      $.ajax({
        type: "POST",
        url: "createuser.php",
        data: "newuser="+username+"&password1="+password+"&password2="+password2+"&email="+email+"&newfirstname="+firstname+"&newlastname="+lastname+"&newphone="+phone+"&newspecialty="+specialty,
        success: function(html){

			var text = $(html).text();
			//Pulls hidden div that includes "true" in the success response
			var response = text.substr(text.length - 4);

          if(response == "true"){

			$("#message").html(html);

					$('#submit').hide();
			}
		else {
			$("#message").html(html);
			$('#submit').show();
			}
        },
        beforeSend: function()
        {
          $("#message").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>")
        }
      });
    }
    return false;
  });
});
