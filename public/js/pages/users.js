$(document).ready(function(event){

    // TinyMCE Basic
    tinymce.init({
        selector: "#emailcontent",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });

    /*$('#emailcontent').ckeditor({
        height: '150px',
        toolbar: [{
            name: 'document',
            items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']
        }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
            ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'], // Defines toolbar group without name.
            {
                name: 'basicstyles',
                items: ['Bold', 'Italic']
            }
        ]
    });*/

    $("#birthday").ionRangeSlider({
        min: 18,
        max: 30,
        type: 'double',
        postfix: " years",
        maxPostfix: "+",
        prettify: true,
        hasGrid: true
    });

    $("#provinces,#gender,#kadaaId,#city,#country,#major").select2({
        theme: "bootstrap",
        width: "250px"
    });

    $("#workavailable,#worktype,#equipments,#highesteducation").select2({
        theme: "bootstrap",
        width: "250px"
    });

    $("#specialneeds").select2({
        theme: "bootstrap",
        placeholder: "Select special needs "
    });

    $("#provinces").change(function(e){
        $("#city").val("");
        $("#city").empty();

        $.ajax({
            type: "get",
            url: "/admin/getcazamultiple/"+$('#provinces').val(),

            success: function(data)
            {
                var html='';
                var $el = $("#kadaaId");

                $el.empty(); // remove old options
               // alert(data.length);
                //$el.append($("<option selected></option>").attr("value", "").text("Select your caza"));
                for (let index = 0; index < data.length; ++index) {

                    $el.append($("<option></option>").attr("value", data[index].Id).text(data[index].Name));
                }

                html=html+"<";
                var $el = $("#city");

                $el.empty(); // remove old options
                $el.append($("<option selected></option>").attr("value", "").text("Select your city"));
            },
            error: function(data){
                return false;
            }
        });
    });

    $("#kadaaId").change(function(e){

        $.ajax({
            type: "get",
            url: "/admin/getcitymultiple/"+$('#kadaaId').val(),

            success: function(data)
            {
                var html='';
                var $el = $("#city");

                $el.empty(); // remove old options
                //$el.append($("<option selected></option>").attr("value", "").text("Select your city"));
                for (let index = 0; index < data.length; ++index) {
                    $el.append($("<option></option>").attr("value", data[index].Id).text(data[index].Name));
                }

                html=html+"<";
            },
            error: function(data){
                return false;
            }
        });
    });

});
