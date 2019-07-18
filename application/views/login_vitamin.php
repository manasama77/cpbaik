<script>
  $(document).ready(function(){
    // FORM VALIDATE
    $('#karyawan').validate({
      debug: true,
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