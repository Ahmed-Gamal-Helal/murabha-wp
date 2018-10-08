// collapse divs

jQuery(document).ready(function(){
//         jQuery('.rm_options').slideUp();
         
//         jQuery('.rm_section h3').click(function(){      
//             if(jQuery(this).parent().next('.rm_options').css('display')==='none')
//                 {   jQuery(this).removeClass('inactive').addClass('active').children('img').removeClass('inactive').addClass('active');
                     
//                 }
//             else
//                 {   jQuery(this).removeClass('active').addClass('inactive').children('img').removeClass('active').addClass('inactive');
//                 }
                 
//             jQuery(this).parent().next('.rm_options').slideToggle('slow');  
//         });


// // tabs 

// jQuery(document).ready(function ($) {
           
//             /* jQuery activation and setting options for second tabs, enabling multiline*/
//             $("#tabbed-nav2").zozoTabs({
//                 position: "top-left",
//                 theme: "white",
//                 shadows: true,
//                 multiline: true,
//                 orientation: "vertical",
//                 size: "medium",
//                 animation: {
//                     easing: "easeInOutExpo",
//                     duration: 500,
//                     effects: "slideH"
//                 }
//             });
//         });

        

// add more for inputs
    
    jQuery('.form-group').each(function(){
        jQuery(this).find('.clone .Remove').first().hide();
    });

    jQuery('.addMore').live('click' , function(){

        var row = jQuery(this).prev('div.clone');
        var clone = jQuery(row).clone();

        jQuery(clone).find('input , textarea').val('');
        jQuery(clone).find('input , textarea').attr('value','');

        jQuery(clone).insertAfter(row);
        jQuery(clone).find('.Remove').show();


        jQuery(clone).find('input:first').focus();

        
// add the new value to input 

        var value = jQuery(clone).find('input , textarea');
        
            jQuery(value).keyup(function(){
            var val = jQuery(this).val();

            jQuery(value).attr('value' , val);
        });

    });

// remove for inputs
    jQuery('.Remove').live('click' , function(){

        var field = jQuery(this).closest('div.clone');
        jQuery(field).remove();

    });

// add more for div

    var C = 1;
    jQuery('.more_div').click(function(){
        var DIV = jQuery(this).prev('.multiple-div').clone();
        DIV.find('input').val('');
        DIV.find('textarea').html('');

        DIV.find('input').each(function(e){
            var name =  jQuery( this ).attr('name').split("[0]");
            jQuery( this ).attr('name', name[0]+'['+C+']'+name[1]);
        });
            
       DIV.find('textarea').each(function(e){
            var name =  jQuery( this ).attr('name').split("[0]");
            jQuery( this ).attr('name', name[0]+'['+C+']'+name[1]);
        });
    
       jQuery(DIV).insertBefore(this);
        C++;
       return false;
    });

// dont submit empty fields 

//     jQuery("form").submit(function(){
//        var x = jQuery(this).find(':input[value=""]');
//        jQuery(x).remove();
//
//        return true; // ensure form still submits
//    });


});


// image upload

 jQuery(document).ready(function() {
    

    jQuery('.image-upload').each(function(){
        jQuery('.upload-image-button' , this).click(function(){


            var e = jQuery(this);
            tb_show('', 'media-upload.php?type=file&amp;TB_iframe=true');

            window.send_to_editor = function(html) { // when insert into post is clicked                    
            var a =jQuery(html); // we get path to file                
            fileurl = a.attr('href'); // if you are using type=image then use 'src' instead of 'href'

            e.next('.image_url').val(fileurl);
            e.closest('.image-upload').find('img').attr('src' , fileurl);

            
            if (fileurl != 'http://www.acsu.buffalo.edu/~rslaine/imageNotFound.jpg') {
                var remove_span = jQuery('.img-remove:last').clone();
                e.closest('.image-upload').append(remove_span);
            };

            tb_remove();
            // do you other AJAX magic here
            
            } 
            return false;

        });
        jQuery('.img-remove').live('click',function(){
            jQuery(this).prev('img').attr('src' , 'http://www.acsu.buffalo.edu/~rslaine/imageNotFound.jpg');
            jQuery(this).closest('.image-upload').find('.image_url').attr('value' ,'http://www.acsu.buffalo.edu/~rslaine/imageNotFound.jpg');
            jQuery(this).remove();
        });

        var src = jQuery(this).find('img').attr('src');
        if (src == 'http://www.acsu.buffalo.edu/~rslaine/imageNotFound.jpg') {
            jQuery(this).find('.img-remove').remove();
        };


    });


    });


///


jQuery(function() {
    jQuery( ".sortable" ).sortable();
    jQuery( ".sortable" ).disableSelection();
  });
