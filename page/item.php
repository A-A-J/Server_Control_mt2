<div class="alert alert-danger" role="alert">
   <?php echo $lang['p_maintenance']?>
</div>

<div class="table-responsive">
<table id="account" class="account table">
  <thead>
    <tr>
        <th>#</th>
        <th>owner_id</th>
        <th>window</th>
        <th>pos</th>
        <th>count</th>
        <th>vnum</th>
        <th>transmutation</th>
        <th>socket0</th>
        <th>socket1</th>
        <th>socket2</th>
        <th>socket3</th>
        <th>socket4</th>
        <th>socket5</th>
        <th>attrtype0</th>
        <th>attrvalue0</th>
        <th>attrtype1</th>
        <th>attrvalue1</th>
        <th>attrtype2</th>
        <th>attrvalue2</th>
        <th>attrtype3</th>
        <th>attrvalue3</th>
        <th>attrtype4</th>
        <th>attrvalue4</th>
        <th>attrtype5</th>
        <th>attrvalue5</th>
        <th>attrtype6</th>
        <th>attrvalue6</th>
        <th>sealbind</th>
    </tr>
  </thead>
</table>
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
              "url": "<?php echo url;?>item",
              "type": "POST"
            }
        });
    });
</script>