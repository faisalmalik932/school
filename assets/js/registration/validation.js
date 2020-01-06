$.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg !== value;
}, "Value must not equal arg.");

$.validator.setDefaults( {

} );

$( document ).ready( function () {
    $("#DATAFORM").validate({
        rules: {
            states:{
                valueNotEquals: "default"
            },
            city:{
                valueNotEquals: "default"
            },
            branchId:{
                valueNotEquals: "default"
            }
        },
        messages: {
            states: {valueNotEquals: "Please select your State"},
            city:{
                valueNotEquals: "Please select your City"
            },
            branchId:{
                valueNotEquals: "Please select your City"
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

