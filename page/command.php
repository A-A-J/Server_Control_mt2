<link rel="stylesheet" href="https://codemirror.net/theme/darcula.css">
<link rel="stylesheet" href="assets/css/codemirror.css">
<script src="assets/js/codemirror/codemirror.js"></script>
<script src="assets/js/codemirror/sql.js"></script>
<div class="alert alert-danger" role="alert">
   <?php echo $lang['p_maintenance']?>
</div>

<form id="ajax" action="<?php echo url;?>command" method="POST">
   <div class="mb-3">
      <textarea id="code" class="form-control" name="sql" cols="30" rows="10"></textarea>
   </div>
   <!-- <input type="hidden" id="sql"> -->
   <!-- <input type="hidden" name="send" value="command"> -->
   <!-- <button type="submit" class="btn btn-sm btn-outline-default">Send</button> -->
</form>
<script>
$(document).ready(function() {
      var mime = 'text/x-mariadb';
      // get mime type
      if (window.location.href.indexOf('mime=') > -1) {
         mime = window.location.href.substr(window.location.href.indexOf('mime=') + 5);
      }
      window.editor = CodeMirror.fromTextArea(document.getElementById('code'), {
         mode: mime,
         theme: 'darcula',
         lineNumbers: true,
         autofocus: true,
      });

      var content = $("#sql").val();
    	editor.setValue(content)
   });

   //send post
// $('#ajax').on('submit',function(event) {
//       event.preventDefault();
//       var that    = $(this),
//          url     = that.attr('action'),
//          type    = that.attr('method'),
//          data    = new FormData(this),
//          submit = document.querySelectorAll("[type='submit']");

//          $.ajax({
//                url:url,
//                type:type,
//                data:data,
//                contentType: false,
//                cache: false,
//                processData: false,
//                dataType: "json",

//                // beforeSend: function() {
//                // msg_alert()
//                // disabledTage('button',true);
//                // loader('show', '.submit', '.submit>span');
//                // },

//                success:function(data){
//                // if(data.error){
//                //    msg_alert('d-none', 'd-flex', data.error)
//                //    console.log(data);
//                //    return false;
//                // }
//                // // modal.hide();
//                // Notiflix.Notify.Success(data.su)
//                // table.ajax.reload();
//                console.log(data)
//                },

//                // error: function(data){
//                //    alert('<?php echo $lang['error_ajax'];?>');
//                // },

//                // complete: function() {
//                // disabledTage('button',false);
//                // loader('remove', '.submit', '.submit>span');
//                // }

//          });

//       return false;
// });
</script>