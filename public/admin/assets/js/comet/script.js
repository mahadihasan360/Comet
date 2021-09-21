(function($){

    $(document).ready(function(){
        // logout system
        $("#logout_btn").click(function(e){
            e.preventDefault();
            $("#logout_form").submit();
        });

        // post tags select2
        $(".post_tags").select2();

        // post editor
        CKEDITOR.replace( 'post_editor' );

        // Post Type Manage
        $("#post_type").change(function(){
            let type = $(this).val();

            if(type == "Standard"){
                $(".post_type_area").html(`<div class="form-group">
                <label">Featured Image</label>
                <input name="image" type="file" class="form-control">
            </div>`);
            }else if(type == "Gallery"){
                $(".post_type_area").html(`<div class="form-group">
                <label>Gallery Images</label>
                <input name="gallery[]" type="file" class="form-control" multiple>
            </div>`);
            }else if(type == "Video"){
                $(".post_type_area").html(`<div class="form-group">
                <label>Video URL</label>
                <input name="video" type="text" class="form-control" placeholder="Link">
            </div>`);
            }else if(type == "Audio"){
                $(".post_type_area").html(`<div class="form-group">
                <label>Audio URL</label>
                <input name="audio" type="text" class="form-control" placeholder="Link">
            </div>`);
            }else if(type == "Quote"){
                $(".post_type_area").html(`<div class="form-group">
                <label>Quote</label>
                <textarea name="quote" id="" class="form-control" placeholder="Quote"></textarea>
            </div>`);
            }else{
                $(".post_type_area").html("");
            }
        });
    });

})(jQuery)