;(function ($) {
    $(document).ready(function () {

        $("#post-formats-select .post-format").on("click", function () {
        	
            if ($(this).attr("id") == "post-format-gallery") {
                $("#_themecore_gallery_images").show();
            } else {
                $("#_themecore_gallery_images").hide();
            }        	

            if ($(this).attr("id") == "post-format-audio") {
                $("#_themecore_audio").show();
            } else {
                $("#_themecore_audio").hide();
            }

            if ($(this).attr("id") == "post-format-video") {
                $("#_themecore_video").show();
            } else {
                $("#_themecore_video").hide();
            }

        });
        //alert(post_format.format);
        if (post_format.format != "gallery") {
            $("#_themecore_gallery_images").hide();
        }else{
        	$("#_themecore_gallery_images").show();
        }
        if (post_format.format != "audio") {
            $("#_themecore_audio").hide();
        }else{
        	$("#_themecore_audio").show();
        }
        if (post_format.format != "video") {
            $("#_themecore_video").hide();
        }else{
        	$("#_themecore_video").show();
        }

    });
})(jQuery);