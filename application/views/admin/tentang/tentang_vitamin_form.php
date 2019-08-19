<script>
  $(document).ready(function(){
    // SUMERNOTE
    $('#isi1').summernote({
      placeholder: 'Isi Berita...',
      tabsize: 2,
      height: 200,
      lang: 'id-ID',
      toolbar: [
        ['insert', ['picture','link','table','hr',]],
        ['font', ['fontname','fontsize','color','forecolor','backcolor','bold','italic','underline','strikethrough','superscript','subscript','clear']],
        ['para', ['style','ol','ul','paragraph','height']],
        ['misc', ['fullscreen','codeview','undo','redo','help']],
      ]
    });

    $('#isi2').summernote({
      placeholder: 'Isi Berita...',
      tabsize: 2,
      height: 200,
      lang: 'id-ID',
      toolbar: [
        ['insert', ['picture','link','table','hr',]],
        ['font', ['fontname','fontsize','color','forecolor','backcolor','bold','italic','underline','strikethrough','superscript','subscript','clear']],
        ['para', ['style','ol','ul','paragraph','height']],
        ['misc', ['fullscreen','codeview','undo','redo','help']],
      ]
    });
    // SUMERNOTE
    // 
    // GAMBAR ON CHANGE
    $('#gambar').on('change', function(){
      document.getElementById("image-preview").style.display = "block";
      var oFReader = new FileReader();
       oFReader.readAsDataURL(document.getElementById("gambar").files[0]);
   
      oFReader.onload = function(oFREvent) {
        document.getElementById("image-preview").src = oFREvent.target.result;
      };
    });
    // END GAMBAR ON CHANGE
    
    // FORM VALIDATE
    $('#form').validate({
      debug: true,
      errorClass: 'help-inline text-danger',
      rules:{
        judul:{ required:true },
        isi:{ required:true },
      },
      submitHandler: function( form ) {
        $.ajax({
          url         : '<?=site_url('admin/tentang/store');?>',
          method      : 'POST',
          data        : new FormData(form),
          processData  : false,
          contentType  : false,
          cache        : false,
          async        : false,
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
              window.location.replace('<?=site_url('admin/tentang/index');?>');
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