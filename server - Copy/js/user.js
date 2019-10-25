
$(document).ready(function() {
        
        $("#tabs").tabs();
        
        // login user as student
        $("#login_btn").click(function() {
                $("#login-modal").css("display", "block");
        });

        // login user as teacher
        $(".teacher-login").click(function() {
                $("#teacherlogin-modal").css("display", "block");
        });        

        // register user as student
        $(".register_btn").click(function() {
                $("#register-modal").css("display", "block");                
        });

        // dimiss modal dailog
        function dissmiss() {
                $("#login-modal").css("display", "none");
                $("#register-modal").css("display", "none");
                $("#teacherlogin-modal").css("display", "none");
        }
        
        $(".dismiss_click").click(function() {
                dissmiss();
        })

        $("#already_account").click(function() {
                dissmiss();
                $("#login-modal").css("display", "block");     
        })

        // signup user
        $('#myForm').submit(function() {
                // get all the inputs into an array.
                var $inputs = $('#myForm :input');

                // not sure if you wanted this, but I thought I'd add it.
                // get an associative array of just the values.
                var values = {};
                $inputs.each(function() {
                        values[this.name] = $(this).val();
                });

        });

});