$(document).ready(function(event){
    $("#libanpost").select2({

        placeholder: "select a code",
        theme:"bootstrap"
    });

    $("#userId").select2({

        placeholder: "select a user",
        theme:"bootstrap"
    });

    $(document).on("click", "#submitcode", function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var user=$("#userId").val();
        var libanpost=$("#libanpost").val();
        var libanpostId=$("#libanpostId").val();

        $.ajax({
            type: "post",
            url: "updatelibanpost",
            data: {userId:user,libanpost:libanpost,libanpostId:libanpostId}, // serializes the form's elements.
            success: function(response)
            {
                var htmldata='';
                htmldata=htmldata+"<div class='col-sm-12 ' style='font-size:12px'>";
                for (let index = 0;index<response.users.length; ++index) {
                    htmldata=htmldata+"<div class='col-sm-4'>"+response.users[index].first_name+" "+response.users[index].last_name+"</div>" +
                        "<div class='col-sm-2'>"+response.users[index].code+"</div>" +
                        "<div class='col-sm-2' >" +
                        "<a onclick='editlibanpost("+response.users[index].id+")' style='cursor:pointer'>&nbsp;&nbsp;"+

                        "<img src='../img/edit.png' width='16px'></a></div><div class=\"clearfix\"></div>";
                }
                var htmldata=htmldata+"</div>";

                $("#libanpost").val("").trigger("change");
                $("#userId").val("").trigger("change");

                $("#message").html(response.message);
                $("#libanpostdiv").html(htmldata);
            },
            error: function(data){

            }
        });
        $("#traininginstitution").val("");
        $("#trainingcourse").val("").trigger("change");
        $("#trainingyear").val("").trigger("change");
        $("#trainingId").val("").trigger("change");
    });

});


function editlibanpost(id){
    $.ajax({
        type: "GET",
        url: '/edituser/'+id,

        success: function( response ) {
            $("#userId").val(response.user.id).trigger("change");
            $("#libanpost").val(response.user.libanpostId).trigger("change");
        }

    });
}