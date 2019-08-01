<script>
  $(document).ready(function(){
    // FORM VALIDATE
    $('#karyawan').validate({
      debug: false,
      errorClass: 'help-inline text-danger',
      rules:{
        nik:{
          required:true
        }
      },
      submitHandler: function( form ) {
        var nik = $('#nik').val();
        if(nik == '')
        {
          sweet('warning', 'Warning', 'NIK Karyawan tidak boleh kosong', '#no_karyawan');
        }else{
          $.ajax({
            url         : 'http://simpres.baytulikhtiar.com/api/nik',
            method      : 'GET',
            data        : { no_karyawan:nik },
            beforeSend  : function(){
              $.blockUI({ message: '<i class="fas fa-spinner fa-spin"></i> Silahkan Tunggu...' });
            },
            statusCode  : {
              200: function(result) {
                console.log(result.info.nik);
                var nik = result.info.nik;
                generateToast('Success', 'Data Match...', 'success');
                $.unblockUI();
                setTimeout(function(){
                  window.location.replace('<?=site_url('login/auth/karyawan/');?>'+ result.info.nik + '/' + result.info.nama);
                  $.unblockUI();
                }, 2000);
              },
              400: function() {
                $.unblockUI();
                generateToast('Warning', 'NIK Tidak ditemukan...', 'warning');
                $('#nik').focus();
              },
              404: function() {
                $.unblockUI();
                generateToast('Warning', 'Page Not Found.', 'error');
              },
              500: function() {
                $.unblockUI();
                generateToast('Warning', 'Not connect with databasae.', 'error');
              }
            }
          });
        }

      }
    });

    // FORM VALIDATE
    $('#adminform').validate({
      debug: true,
      errorClass: 'help-inline text-danger',
      rules:{
        username:{
          required:true
        },
        keypass:{
          required:true
        },
      },
      submitHandler: function( form ) {
        var username = $('#username').val();
        if(username == '')
        {
          sweet('warning', 'Warning', 'Username tidak boleh kosong', '#username');
        }else{
          $.ajax({
            url         : '<?=site_url('login/auth_admin');?>',
            method      : 'POST',
            data        : $('#adminform').serialize(),
            beforeSend  : function(){
              $.blockUI({ message: '<i class="fas fa-spinner fa-spin"></i> Silahkan Tunggu...' });
            },
            statusCode  : {
              400: function() {
                $.unblockUI();
                generateToast('Warning', 'Username / Password salah...', 'warning');
                $('#nik').focus();
              },
              404: function() {
                $.unblockUI();
                generateToast('Warning', 'Page Not Found.', 'error');
              },
              500: function() {
                $.unblockUI();
                generateToast('Warning', 'Not connect with databasae.', 'error');
              }
            }
          })
          .done(function(result){
            result = $.parseJSON(result);
            console.log(result);
            if(result.code == 200){
              generateToast('Success', 'Data Match...', 'success');
              setTimeout(function(){
              window.location.replace('<?=site_url('admin/dashboard');?>');
                $.unblockUI();
              }, 2000);  
            }else{
              generateToast('Oops', 'Username / Password Salah', 'warning');
              $.unblockUI();
            }
            
          });
        }

      }
    });
  });

  function sweet(type, title, text, focus)
  {
    swal.fire({
      type: type,
      title: title,
      text: text,
      onAfterClose: () => {
        $(focus).focus();
      }
    });
  }

  function checkNoKaryawan()
  {


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