
<div class="row pt-3">
   <div class="col-lg-2">
      <div class="list-menu nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
         <button class="nav-link text-start active" id="v-pills-about-tab" data-bs-toggle="pill" data-bs-target="#v-pills-about" type="button" role="tab" aria-controls="v-pills-about" aria-selected="true">1 - <?php echo $lang['about'];?></button>
         <button class="nav-link text-start" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">2 - <?php echo $lang['terms_use'];?></button>
         <!-- <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"></button> -->
         <!-- <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button> -->
      </div>
   </div>
   <div class="col-lg-10">
   <div class="tab-content" id="v-pills-tabContent">

    <div class="tab-pane fade show active" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-about-tab">
       <div class="subject p-3 ps-4 pe-4 rounded-3">
         <h5><strong><?php echo $lang['title'];?></strong></h5>
         <p><?php echo $lang['des_app'];?></p>
         <?php echo $lang['num1'];?>
         <blockquote class="p-2">
            <h6><strong><?php echo $lang['contactME'];?></strong></h6>
            Discord: <a href="https://discord.com/users/317119197433954315" target="_blank">aaj#6898</a> or <a href="https://discord.gg/Hv6fWtxh" target="_blank">Join Server</a>
         </blockquote>
       </div>
    </div>

    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      <div class="subject p-3 ps-4 pe-4 rounded-3">
         <h5><strong><?php echo $lang['terms_use'];?></strong></h5>
         <?php echo $lang['num2'];?>
      </div>
    </div>

    <!-- <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...3</div>

    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...4</div> -->
  </div>
   </div>
</div>