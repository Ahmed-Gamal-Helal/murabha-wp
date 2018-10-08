
var $ = jQuery;

$.fn.serializeObject = function ()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};



jQuery(document).ready(function () {


    jQuery("#myform").on("submit", function (e) {
        e.preventDefault();

        var arr = {};
        var formData = jQuery(this).serializeObject();

        formdata2 = JSON.stringify(formData);


        jQuery.ajax({
            type: "POST",
            url: myAjax.ajaxurl,
            data: {
                action: "form_ajax_save",
                formdata: formdata2,
            },
            dataType: 'json',
            beforeSend: function () {
                jQuery(".done .saved").css("display", "none");
                jQuery(".done").fadeIn("slow");
                jQuery(".done .saving").css("display", "table");
            },
            complete:function(){
                 jQuery(".done .saving").css("display", "none");

                jQuery(".done .saved").css("display", "table");
                jQuery(".done").fadeOut("slow");

            },
            success: function (response) {
            }
        });
    });
});

