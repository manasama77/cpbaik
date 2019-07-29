<script>
  $(document).ready(function(){
    $('#x').attr('disabled', true);
    $('#username').on('change', function(){
      $.ajax({
        url         : '<?=site_url('admin/user/cek_username');?>',
        method      : 'GET',
        data        : { username:$('#username').val() },
        beforeSend  : function(){
          $.blockUI({ message: '<i class="fas fa-spinner fa-spin"></i> Silahkan Tunggu...' });
          $('#x').attr('disabled', true);
        },
        statusCode  : {
          200: function() {
            $.unblockUI();
          },
          400: function() {
            $.unblockUI();
            generateToast('Warning', 'Error 400', 'warning');
          },
          404: function() {
            $.unblockUI();
            generateToast('Warning', 'Page Not Found.', 'error');
          },
          500: function() {
            $.unblockUI();
            generateToast('Danger', 'Not connect with databasae.', 'error');
          }
        }
      })
      .done(function(result){
        console.log(result);
        result = $.parseJSON(result);

        if(result.code == '200')
        {
          generateToast('Success', result.description, 'success');
          $('#x').attr('disabled', false);
          $.unblockUI();
        }else{
          $.unblockUI();
          generateToast('Warning', result.description, 'warning');
        }
      });
    });

    // FORM VALIDATE
    $('#form').validate({
      debug: true,
      errorClass: 'help-inline text-danger',
      rules:{
        username:{ required:true },
        keypass:{ required:true },
        keypass2:{ required:true, equalTo:'#keypass' },
      },
      submitHandler: function( form ) {
        $.ajax({
          url         : '<?=site_url('admin/user/store');?>',
          method      : 'POST',
          data        : $('#form').serialize(),
          beforeSend  : function(){
            $.blockUI({ message: '<i class="fas fa-spinner fa-spin"></i> Silahkan Tunggu...' });
          },
          statusCode  : {
            200: function() {
              $.unblockUI();
            },
            400: function() {
              $.unblockUI();
              generateToast('Warning', 'Error 400', 'warning');
            },
            404: function() {
              $.unblockUI();
              generateToast('Warning', 'Page Not Found.', 'error');
            },
            500: function() {
              $.unblockUI();
              generateToast('Danger', 'Not connect with databasae.', 'error');
            }
          }
        })
        .done(function(result){
          console.log(result);
          result = $.parseJSON(result);

          if(result.code == '200')
          {
            sweet('success', 'Sukses', result.flash);
            setTimeout(function(){
              window.location.replace('<?=site_url('admin/user/index');?>');
              $.unblockUI();
            }, 2000);
          }else{
            $.unblockUI();
            sweet('error', 'Oops...', result.flash);
          }
        });

      }
    });
  });

  function sweet(type, title, text)
  {
    swal.fire({
      type: type,
      title: title,
      text: text
    });
  }

  function generateToast(heading, message, color){
    $.toast({
      text: message,
      heading: heading,
      icon: color,
      showHideTransition: 'slide',
      allowToastClose: true,
      hideAfter: 5000,
      stack: 5,
      position: 'bottom-right',
      textAlign: 'left',
      loader: true,
      loaderBg: '#9EC600',    
    });
  }
</script>