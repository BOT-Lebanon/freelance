
$('input[type="radio"],input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue',
    increaseArea: '20%' // optional
});

function formatState (state) {
    if (!state.id) { return state.text; }
    var $state = $(
        '<span><img src="img/countries_flags/' + state.element.value.toLowerCase() + '.png" class="img-flag" width="20px" height="20px" /> ' + state.text + '</span>'
    );
    return $state;
}

$(document).ready(function(event){
$("#countries").select2({
    templateResult: formatState,
    templateSelection: formatState,
    placeholder: "select a country",
    theme:"bootstrap"
});

$("#datepicker").daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
        format: 'DD-MM-YYYY'
    }
});

$("#select22,#specialneeds").select2({
    theme: "bootstrap",
    placeholder: "select a ",
    width: "500px",
    searchable:true
});

$("#provinces,#gender,#kadaa,#city,#country,#highesteducation,#major").select2({
    theme: "bootstrap",
    placeholder: "",
    width: "200px"
});

$("#educationyear,#worktime").select2({
    theme: "bootstrap",
    placeholder: "",
    width: "110px"
});

});