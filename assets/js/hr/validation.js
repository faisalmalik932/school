$.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg !== value;
}, "Value must not equal arg.");

$.validator.setDefaults( {

} );

function OpenInNewTab(url) {

  var win = window.open(url, '_blank');
  win.focus();
}

$( document ).ready( function () {
    $("#DATAFORM").validate({
        rules: {
            department:{
                valueNotEquals: "default"
            },
            designation:{
                valueNotEquals: "default"
            },
            branchID: {
                valueNotEquals: "default"
            },

            employee:{
                    valueNotEquals: "default"
                }
        },
        messages: {
            department:{
                valueNotEquals: "Please select your Department"
            },
            designation:{
                valueNotEquals: "Please select your Designation"
            },
            branchID:{
                valueNotEquals: "Please select your Branch"
            },
            employee:{
                valueNotEquals: "Please select your Branch"
            }

        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");

            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parents(".col-md-6").addClass("has-error").removeClass("has-success");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".col-md-6").addClass("has-success").removeClass("has-error");
        }
    });
});

