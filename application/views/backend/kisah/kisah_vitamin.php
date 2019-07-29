<script>
  $(document).ready(function(){
    
  });

  function hapus(id, judul)
  {
    swal.fire({
      type: "question",
      title: "Hapus Kisah?",
      html: "Kamu akan menghapus kisah "+judul+"?<br><b><div class=\"text-danger\">Kisah yang sudah di hapus tidak dapat dikembalikan kembali!</div></b>",
      focusConfirm: false,
      showConfirmButton: true,
      showCancelButton: true,
      allowOutsideClick: false,
      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ya Hapus',
      customClass: {
        confirmButton: 'btn blue-madison'
      },
      cancelButtonText: '<i class="fa fa-times"></i> Tidak'
    })
    .then((result) => {
      if (result.value) {
        $.ajax({
          url         : '<?=site_url('backend/kisah/destroy');?>',
          method      : 'POST',
          data        : { 
            id:id, 
            judul:judul, 
          },
          beforeSend  : function(){
            $.blockUI({ message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...' });
          },
          statusCode  : {
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
          console.log(result);

          var result = $.parseJSON(result);
          if(result.code == 400){
            generateToast('Something Wrong', result.description, 'info');
            $.unblockUI();
          }else if(result.code == 200){
            swal.fire('Hapus Data', 'Berhasil...', 'success');
            setTimeout(function(){
              console.log("PROCESS HAPUS BERHASIL");
              $.unblockUI();
              window.location.replace('<?=site_url('backend/kisah/index');?>');
            }, 2000);

          }else if(result.code == 500){
            generateToast('Warning', result.description, 'warning');
            $.unblockUI();
          }

          $.unblockUI();
        }); 

      } 
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