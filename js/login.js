$(document).ready(function(e){
    $('#register').submit(function(event){
        let $password = $('#password');
        let $passwordConfirm = $('#passwordConf');
        let $error = $('#error');

      if ($password.val() === $passwordConfirm.val()) {
        return true;
      } else {
        $error.text("Passwords do not Match");
        event.preventDefault();
      }
    });
});
