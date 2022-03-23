<!-- <div class="alert alert-primary d-flex align-items-center mt-3 mb-4" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
  <?php echo $lang['alertAccount'];?>
</div> -->

<button type="button" class="btn btn-sm btn-default mb-4" data-bs-toggle='modal' data-bs-target='#exampleModal' onclick="modal_add(true, true)"><?php echo $lang['add_accounts']?></button>
<table id="account" class="account table">
  <thead>
    <tr>
      <th>#</th>
      <th><?php echo $lang['name'];?></th>
      <th><?php echo $lang['password'];?></th>
      <th><?php echo $lang['email'];?></th>
      <th><?php echo $lang['regster'];?></th>
      <th><?php echo $lang['status'];?></th>
      <th><?php echo $lang['control'];?></th>
    </tr>
  </thead>
</table>
<button type="button" class="btn btn-sm btn-default mt-4 mb-5" data-bs-toggle='modal' data-bs-target='#exampleModal'><?php echo $lang['add_accounts']?></button>


<div class="modal fade" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="ajax" action="<?php echo url;?>accounts" method="POST" class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['editAccount'];?></h5>
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link btn-sm active" id="pills-edit-tab" data-bs-toggle="pill" data-bs-target="#pills-edit" type="button" role="tab" aria-controls="pills-edit" aria-selected="true" onclick="$(`[name='edit']`).val('account');"><?php echo $lang['account'];?></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link btn-sm" id="pills-gold-tab" data-bs-toggle="pill" data-bs-target="#pills-gold" type="button" role="tab" aria-controls="pills-gold" aria-selected="true" onclick="$(`[name='edit']`).val('gold');"><?php echo $lang['gold'];?></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link btn-sm" id="pills-strong-tab" data-bs-toggle="pill" data-bs-target="#pills-strong" type="button" role="tab" aria-controls="pills-strong" aria-selected="false" onclick="$(`[name='edit']`).val('strong');"><?php echo $lang['strong'];?></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link btn-sm" id="pills-toGm-tab" data-bs-toggle="pill" data-bs-target="#pills-toGm" type="button" role="tab" aria-controls="pills-toGm" aria-selected="false" onclick="$(`[name='edit']`).val('To_GM');"><?php echo $lang['To_GM'];?></button>
          </li>
        </ul>

      </div>
      <div class="modal-body border-0">

        <div class="tab-content" id="pills-tabContent">
          <div id="data" class="d-none alert alert-danger" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div></div>
          </div>

          <!-- edit account -->
          <div class="tab-pane fade show active" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">
            
            <div class="mb-3">
              <label for="login" class="form-label"><?php echo $lang['login'];?></label>
              <input type="text" id="login" class="form-control" require name="login" autofocus>
            </div>

            <div class="mb-3 position-relative">
              <label for="password" class="form-label"><?php echo $lang['password'];?></label>
              <input type="text" id="password" class="form-control" require name="password" maxlength="18">
              <button type="button" class="btn btn-sm btn-outline-default btn-max" onclick="return keyPass();"><i class="fa fa-key"></i></button>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label"><?php echo $lang['email'];?></label>
              <input type="email" id="email" class="form-control" require name="email">
            </div>

            <div class="mb-3">
              <label for="status" class="form-label"><?php echo $lang['status'];?></label>
              <select id="status" class="form-select" name="status">
                <option value="OK"><?php echo $lang['OK'];?></option>
                <option value="BLOCK"><?php echo $lang['BLOCK'];?></option>
              </select>
            </div>
          </div>

          <!-- GOLD -->
          <div class="tab-pane fade" id="pills-gold" role="tabpanel" aria-labelledby="pills-gold-tab">
            <div class="mb-3">
              <label for="players" class="form-label"><?php echo $lang['player'];?> <span class="badge bg-secondary"></span></label>
              <select id="players" class="form-select" name="gold[players]" onchange="
              $('#gold').val(this.options[this.selectedIndex].getAttribute('gold'));
              $('#exp').val(this.options[this.selectedIndex].getAttribute('exp'));
              $('#gaya').val(this.options[this.selectedIndex].getAttribute('gaya'));
              $('#won').val(this.options[this.selectedIndex].getAttribute('won'));
              ">
              </select>
            </div>

            <div class="mb-3 position-relative">
              <label for="gold" class="form-label"><?php echo $lang['gold'];?></label>
              <input type="text" id="gold" class="form-control" name="gold[gold]">
              <button type="button" class="btn btn-sm btn-outline-default btn-max" onclick="$('#gold').val(2147483647)" ><?php echo $lang['max'];?></button>
            </div>

            <div class="mb-3 position-relative">
              <label for="exp" class="form-label"><?php echo $lang['exp'];?></label>
              <input type="text" id="exp" class="form-control" name="gold[exp]">
              <button type="button" class="btn btn-sm btn-outline-default btn-max" onclick="$('#exp').val(2147483647)" ><?php echo $lang['max'];?></button>
            </div>

            <div class="mb-3 position-relative">
              <label for="gaya" class="form-label"><?php echo $lang['gaya'];?></label>
              <input type="text" id="gaya" class="form-control" name="gold[gaya]">
              <button type="button" class="btn btn-sm btn-outline-default btn-max" onclick="$('#gaya').val(9999)" ><?php echo $lang['max'];?></button>
            </div>

            <div class="mb-3 position-relative">
              <label for="won" class="form-label"><?php echo $lang['won'];?></label>
              <input type="text" id="won" class="form-control" name="gold[won]">
              <button type="button" class="btn btn-sm btn-outline-default btn-max" onclick="$('#won').val(99)" ><?php echo $lang['max'];?></button>
            </div>

          </div>

          <!-- STRONG -->
          <div class="tab-pane fade" id="pills-strong" role="tabpanel" aria-labelledby="pills-strong-tab">
            <div class="mb-3">
              <label for="players" class="form-label"><?php echo $lang['player'];?><span class="badge bg-secondary"></span></label>
              <select id="players" class="form-select" name="strong[players]" onchange="
              $('#job').val(this.options[this.selectedIndex].getAttribute('job'));
              $('#level').val(this.options[this.selectedIndex].getAttribute('level'));
              $('#iq').val(this.options[this.selectedIndex].getAttribute('iq'));
              $('#st').val(this.options[this.selectedIndex].getAttribute('st'));
              $('#ht').val(this.options[this.selectedIndex].getAttribute('ht'));
              $('#dx').val(this.options[this.selectedIndex].getAttribute('dx'));
              ">
              </select>
            </div>

            <div class="mb-3 position-relative">
              <label for="job" class="form-label"><?php echo $lang['job'];?></label>
              <select id="job" class="form-select" name="strong[job]">
                <?php 
                for ($i=0; $i < count($lang['characters']); $i++):
                  echo "<option value='{$i}'>{$lang['characters'][$i]}</option>";
                endfor;?>
              </select>
            </div>

            <div class="mb-3 position-relative">
              <label for="level" class="form-label"><?php echo $lang['level'];?></label>
              <input type="text" id="level" class="form-control" name="strong[level]">
              <button type="button" class="btn btn-sm btn-outline-default btn-max" onclick="$('#level').val(120)"><?php echo $lang['max'];?></button>
            </div>

            <div class="mb-3 position-relative">
              <label for="ht" class="form-label"><?php echo $lang['ht'];?></label>
              <input type="text" id="ht" class="form-control" name="strong[ht]">
              <button type="button" class="btn btn-sm btn-outline-default btn-max" onclick="$('#ht').val(9999)"><?php echo $lang['max'];?></button>
            </div>

            <div class="mb-3 position-relative">
              <label for="iq" class="form-label"><?php echo $lang['iq'];?></label>
              <input type="text" id="iq" class="form-control" name="strong[iq]">
              <button type="button" class="btn btn-sm btn-outline-default btn-max" onclick="$('#iq').val(9999)"><?php echo $lang['max'];?></button>
            </div>

            <div class="mb-3 position-relative">
              <label for="st" class="form-label"><?php echo $lang['st'];?></label>
              <input type="text" id="st" class="form-control" name="strong[st]">
              <button type="button" class="btn btn-sm btn-outline-default btn-max" onclick="$('#st').val(9999)"><?php echo $lang['max'];?></button>
            </div>

            <div class="mb-3 position-relative">
              <label for="dx" class="form-label"><?php echo $lang['dx'];?></label>
              <input type="text" id="dx" class="form-control" name="strong[dx]">
              <button type="button" class="btn btn-sm btn-outline-default btn-max" onclick="$('#dx').val(9999)"><?php echo $lang['max'];?></button>
            </div>

          </div>

          <!-- To GM -->
          <div class="tab-pane fade" id="pills-toGm" role="tabpanel" aria-labelledby="pills-toGm-tab">

            <div class="mb-3">
              <label for="players" class="form-label"><?php echo $lang['player'];?> <span class="badge bg-secondary"></span></label>
              <select id="players" class="form-select" name="To_GM[players]" onchange="
              $('#group').val(this.options[this.selectedIndex].getAttribute('mAuthority') ?? alert('<?php echo $lang['no_player_cn']?>'));
              ">
              </select>
            </div>

            <div class="mb-3 position-relative">
              <label for="group" class="form-label"><?php echo $lang['group'];?></label>
              <select id="group" class="form-select" name="To_GM[group]">
                <?php 
                for ($i=0; $i < count($common); $i++):
                  echo "<option value='{$common[$i]}'>{$common[$i]}</option>";
                endfor;?>
                <optgroup label="<?php echo $lang['option_post']?>">
                  <option value="delete" selected><?php echo $lang['delete'];?></option>
                </optgroup>
              </select>
            </div>

          </div>
        </div>

      </div>
      <div class="modal-footer justify-content-start border-0 pt-0 mt-0">
        <input type="hidden" name="id_account">
        <input type="hidden" name="edit" value="account">
        <button type="submit" class="submit btn btn-sm btn-default"><span><?php echo $lang['save'];?></span></button>
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal"><?php echo $lang['cansel'];?></button>
      </div>
    </form>
  </div>
</div>

<script>
    $(document).ready(function(){
        table = $('.account').DataTable({
          language: {
            "processing": ' <i class="fas fa-spinner fa-spin"></i>',
              url: '<?php echo $dataTable_language?>'
          },
          "processing": true,
          "serverSide": true,
          "ajax": {
              "url": "<?php echo url;?>accounts",
              "type": "POST"
            },
          "order": [[ 3, "desc" ]]
        });
    });

    $('#ajax').on('submit',function(event) {
        event.preventDefault();
        var that    = $(this),
            url     = that.attr('action'),
            type    = that.attr('method'),
            data    = new FormData(this),
            submit = document.querySelectorAll("[type='submit']");
            
            $.ajax({
                url:url,
                type:type,
                data:data,
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",

                beforeSend: function() {
                  msg_alert()
                  disabledTage('button',true);
                  loader('show', '.submit', '.submit>span');
                },

                success:function(data){
                  if(data.error){
                    msg_alert('d-none', 'd-flex', data.error)
                    console.log(data);
                    return false;
                  }
                  // modal.hide();
                  Notiflix.Notify.Success(data.su)
                  table.ajax.reload();
                },

                error: function(data){
                    alert('<?php echo $lang['error_ajax'];?>');
                },

                complete: function() {
                  disabledTage('button',false);
                  loader('remove', '.submit', '.submit>span');
                }

            });

        return false;
    });

    function getData(id){
      //chang nem edit to account
      new bootstrap.Tab(document.querySelector('#pills-tab button[data-bs-target="#pills-edit"]')).show();
      $('[name="edit"]').val('account');

      //get data by ajax
      let data = new FormData();
      data.append('id', id);
      data.append('getData', true);
      $.ajax({
          url:'<?php echo url;?>accounts',
          type:'post',
          data:data,
          contentType: false,
          cache: false,
          processData: false,
          dataType: "json",

          success:function(data){
            $('[name="id_account"]').val(data.getData.id);
            $('#login').val(data.getData.login);
            $('#password').val(data.getData.password);
            $('#status').val(data.getData.status);
            $('#email').val(data.getData.email);

            if(data.status == 0){
              msg_alert('d-none', 'd-flex', '<?php echo $lang['not_characters']?>');
              modal_add(true);
              return false;
            }else{
              modal_add(false);
            }

            document.querySelectorAll("#players").forEach((item,index) => {
              for (let index = 0; index < data.getPlayers.length; index++) {
                let option = document.createElement('option');
                option.innerHTML = data.getPlayers[index].name;
                option.setAttribute('value',data.getPlayers[index].id);
                option.setAttribute('gold', data.getPlayers[index].gold);
                option.setAttribute('exp',  data.getPlayers[index].exp);
                option.setAttribute('gaya', data.getPlayers[index].gaya);
                option.setAttribute('won',  data.getPlayers[index].cheque);
                option.setAttribute('level',data.getPlayers[index].level);
                option.setAttribute('st',   data.getPlayers[index].st);
                option.setAttribute('ht',   data.getPlayers[index].ht);
                option.setAttribute('dx',   data.getPlayers[index].dx);
                option.setAttribute('iq',   data.getPlayers[index].iq);
                option.setAttribute('job',  data.getPlayers[index].job);
                if(data.getPlayers[index].mAccount !== 0){
                  option.setAttribute('mAccount',     data.getPlayers[index].mAccount.mAccount);
                  option.setAttribute('mAuthority',   data.getPlayers[index].mAccount.mAuthority);
                  option.setAttribute('mContactIP',   data.getPlayers[index].mAccount.mContactIP);
                  option.setAttribute('mID',          data.getPlayers[index].mAccount.mID);
                  option.setAttribute('mName',        data.getPlayers[index].mAccount.mName);
                  option.setAttribute('mServerIP',    data.getPlayers[index].mAccount.mServerIP);
                }
                item.appendChild(option);
              }
              document.querySelectorAll('[for="players"]>span')[index].innerHTML = data.count;
            })
          },

          error: function(data){
            alert('<?php echo $lang['error_ajax'];?>');
          }

        });
    }

    //system key by php
    function keyPass(){
      let data = new FormData();
      data.append('password_key', document.querySelector('#password').value);
      msg_alert('d-flex', 'd-none');
      $.ajax({
          url:'<?php echo url;?>accounts',
          type:'POST',
          data:data,
          contentType: false,
          cache: false,
          processData: false,
          dataType: "json",
          success:function(data){
            if(data.s){
              document.querySelector('#password').value = data.s;
            }else{
              msg_alert('d-none', 'd-flex', data.e);
            }
          },

          error: function(data){
            alert('<?php echo $lang['error_ajax'];?>');
          }
      });

      return false;
    }

    function modal_add(status=false, clean=false){
      $('#pills-gold-tab').prop( "disabled", status );
      $('#pills-strong-tab').prop( "disabled", status );
      $('#pills-toGm-tab').prop( "disabled", status );
      if(clean == true){
        new bootstrap.Tab(document.querySelector('#pills-tab button[data-bs-target="#pills-edit"]')).show();
        $('#login').val(null);
        $('#password').val(null);
        $('#email').val(null);
        $(`[name='edit']`).val('add');
      }
    }
</script>