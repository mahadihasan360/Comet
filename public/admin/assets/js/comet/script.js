(function($){

    $(document).ready(function(){
        // logout system
        $("#logout_btn").click(function(e){
            e.preventDefault();
            $("#logout_form").submit();
        });
    });

})(jQuery)