<?php if(!empty($vendorslist)){
    foreach($vendorslist as $v):
    $idpenerima = $this->session->id_users;
    $idpengirim =$v['pengirim'];
    ?>
    <?php
        $obj1=&get_instance();
        $obj1->load->model('UserModel');
        $detail=$obj1->UserModel->caripesan($idpenerima,$idpengirim);
        if(is_null($detail)){
            $pesanakhir='';
            $tglpesan='';
            $jmlpesan='0';
            $gaya='class="contact ripple flex-wrap flex-sm-nowrap row p-4 no-gutters align-items-center selectVendor"';
            $uread ='class=""';
            $tpesan = 'class=""';
        }
        else
        {
            $pesanakhir=$detail['pesanakhir'];
            $tglpesan=$detail['tglpesan'];
            $jmlpesan=$detail['jmlpesan'];
            $gaya ='class="contact ripple flex-wrap flex-sm-nowrap row p-4 no-gutters align-items-center unread selectVendor"';
            $uread ='class="bg-secondary text-auto unread-message-count mt-2"';
            $tpesan= 'class="last-message-time"';
        }
    ?>
    <div <?php echo $gaya ?> id="<?=$v['id_users'];?>" title="<?=$v['name'];?>" src="<?=$v['photo'];?>">

        <div class="col-auto avatar-wrapper">
            <img src="<?=$v['photo'];?>" class="avatar" alt="<?=$v['name'];?>" />
            <?php if (($v['is_online']==1) && ($v['last_login'] == date("jmY"))){ ?>
                <i class="icon- status online s-4"></i>
            <?php } else { ?>
                <i class="icon- status do-not-disturb s-4"></i>
            <?php } ?>
            
        </div>

        <div class="col px-4">
            <span class="name h6"><?=$v['name'];?></span>
            <p id="lastmsg" class="last-message text-truncate text-muted"><?=$pesanakhir;?></p>
        </div>

        <div class="col-12 col-sm-auto d-flex flex-column align-items-end">

            <div id="lastmsgtime" <?php echo $tpesan ?>><?php if ($jmlpesan > 0) { echo $tglpesan; }; ?></div>

            <div id="msgcount" <?php echo $uread ?>><?php if ($jmlpesan > 0) { echo $jmlpesan; }; ?></div>

        </div>
    </div>
    <div class="divider"></div>
    <?php endforeach;?>
    
    <?php }
    else
    {?>
    <div class="contact ripple flex-wrap flex-sm-nowrap row p-4 no-gutters align-items-center">

        <div class="col-auto avatar-wrapper">
            <img src="" class="avatar" alt="" />
            <i class="icon- status do-not-disturb s-4"></i>
            
            
        </div>

        <div class="col px-4">
            <span class="name h6">Tidak Ada yang Online</span>
            <p class="last-message text-truncate text-muted"></p>
        </div>

        <div class="col-12 col-sm-auto d-flex flex-column align-items-end">
            <div class="last-message-time"></div>

            <div class="bg-secondary text-auto unread-message-count mt-2"></div>

        </div>
    </div>
    <div class="divider"></div>
<?php } ?>