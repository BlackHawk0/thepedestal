;(function ($) {
    "use strict";
    $(document).ready(function () {
        $("body").off("click",".widgetuploader");
        $("body").on("click",".widgetuploader", function () {
            var that = this;

            var file_frame = wp.media.frames.file_frame = wp.media({
                'title'  : 'Upload Author Image',
                'button' : {
                    'text' : 'Insert Image'
                },
                'multiple': false,
                'library': {
                    'type': [ 'image' ]
                },
            });

            file_frame.on('select', function () {
                var data = file_frame.state().get('selection');
                var container = $(that).siblings("p.imgpreview");
                var imgvlu = $(that).siblings("input.imgph");
                $(that).prev('input').trigger('change');
                container.html("");

                data.map(function (attachment) {
                    if (attachment.attributes.subtype == "png" || attachment.attributes.subtype == "jpeg" || attachment.attributes.subtype == "jpg") {
                        try {
                            container.append("<img src='" + attachment.attributes.sizes.thumbnail.url + "'/>");
                            imgvlu.val(attachment.attributes.sizes.thumbnail.url);
                        } catch (e) {
                            container.append("<p>"+e+"</p>");
                        }
                    }
                });
            });

            file_frame.on('open', function () {
                var selection = file_frame.state().get('selection');
                var ats = $(that).prev("input").val().split(",");

                for (var i = 0; i < ats.length; i++) {
                    if (ats[i] > 0)
                        selection.add(wp.media.attachment(ats[i]));
                }
            });

            file_frame.open();
        });
    });
})(jQuery);