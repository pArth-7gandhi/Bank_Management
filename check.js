 $('.register__form').hide();

 $('.sign-in__button').click(function(e) {
   e.preventDefault();
   $(this).addClass('active');
   $('.register__button').removeClass('active');
   $('.login__form').show();
   $('.register__form').hide();
   $('#edit-email').focus(); //Should appear after $('.login__form').show(); because if it's before that, the register form doesn't exist in the DOM
 });

 $('.register__button').click(function(e) {
   e.preventDefault();
   $(this).addClass('active');
   $('.sign-in__button').removeClass('active');
   $('.register__form').show();
   $('.login__form').hide();
   $('#edit-firstname').focus(); //Should appear after $('.register__form').show(); because if it's before that, the register form doesn't exist in the DOM
 });