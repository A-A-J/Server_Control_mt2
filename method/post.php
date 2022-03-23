<?php
if( isset($_GET['page']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){

    //POST PAGE ACCOUNT
    if( $_GET['page'] == 'accounts' ){
        //password_key
            if(isset($_POST['password_key'])){
                if( strpos($_POST['password_key'], '*') !== false ){
                    $value['e'] = $lang['encrypt_pass'];
                }elseif(strpos($_POST['password_key'], ' ') !== false){
                    $value['e'] = $lang['encr_pas_space'];
                }elseif($_POST['password_key'] == null){
                    $value['e'] = $lang['encr_pass_null'];
                }else{
                    $value['s'] = '*'.strtoupper(sha1(sha1($_POST['password_key'], true)));
                }
                echo json_encode($value);
                exit;
            }
        
        // get data
            if(isset($_POST['getData'])){
                //get data
                $con->query("SELECT * FROM account.account WHERE account.account.id = {$_POST['id']} ");
                $value['getData'] = $con->resultSingle();
                
                //get players
                $con->query("SELECT * FROM player.player WHERE player.player.account_id = {$_POST['id']} ");
                $value['getPlayers'] = $con->resultSet();
                $value['count'] = $con->rowCount();
                if($value['count'] != 0){
                    for ($i=0; $i < count($value['getPlayers']); $i++) { 
                        $con->query(" SELECT * FROM common.gmlist  WHERE mName = '{$value['getPlayers'][$i]['name']}' AND mAccount = '{$value['getData']['login']}'");
                        $value['getPlayers'][$i]['mAccount'] = ($con->rowCount() != 0 ? $con->resultSingle() : 0);
                    }
                }else{
                    $value['status'] = 0;
                }

                echo json_encode($value);
                exit;
            }
        
        //updata edit
            if(isset($_POST['edit'])){
                sleep(2);
                
                //create account
                if( $_POST['edit'] == 'add' ){
                    $login      = $_POST['login'];
                    $password   = $_POST['password'];
                    $email      = $_POST['email'] ?? 'by.admin@gmail.com';
                    $status     = $_POST['status'];

                    if($login == null or $password == null){
                        $value['error'] = $lang['use_ps_blank'];
                        echo json_encode($value);
                        exit;
                    }
                    
                    if( preg_match("/\*/", $password) == 0 ){
                        $value['error'] = $lang['you_ps_encrypt'];
                        echo json_encode($value);
                        exit;
                    }

                    $con->query(" INSERT INTO account.account (login, password, email, social_id, create_time, status, jcoins ,coins, autoloot_expire, safebox_expire) 
                        VALUES(
                        :set_login,
                        :set_password,
                        :set_email,
                        :set_social_id,
                        :set_create_time,
                        :set_status,
                        :set_jcoins,
                        :set_coins,
                        :set_autoloot_expire,
                        :set_safebox_expire
                        ) 
                    ");
                    $con->bind(':set_login', $login );
                    $con->bind(':set_password', $password );
                    $con->bind(':set_email', $email );
                    $con->bind(':set_social_id', rand(1000001,9999999) );
                    $con->bind(':set_create_time', date("Y-m-d H:i:s") );
                    $con->bind(':set_status', $status );
                    $con->bind(':set_jcoins', 5 );
                    $con->bind(':set_coins', 0 );
                    $con->bind(':set_autoloot_expire', date("Y-m-d H:i:s",time()+(60*60*24)*1460) );
                    $con->bind(':set_safebox_expire', date("Y-m-d H:i:s",time()+(60*60*24)*1460) );
                    $con->execute();
                    $value['su'] = 'The new account has been successfully added';
                    echo json_encode($value);
                }

                $id = $_POST['id_account'];
                $con->query(" SELECT * FROM account.account WHERE account.id = {$id} ");
                $row = $con->resultSingle();
                if( $con->rowCount() == 0){
                    $value['error'] = 'لايوجد مثل هذا الحساب في سجلاتنا.';
                    exit(json_encode($value));
                }

                //edit account #account_id
                switch ($_POST['edit']) {
                    case 'account':
                        $con->query(" UPDATE account.account SET login = :login, password = :password, email = :email, status = :status WHERE account.id = {$row['id']} ");
                        $con->bind(':login', $_POST['login'] );
                        $con->bind(':password', $_POST['password'] );
                        $con->bind(':email', $_POST['email'] );
                        $con->bind(':status', $_POST['status'] );
                        $con->execute();
                        $value['su'] = 'تم  تحديث البيانات';
                        echo json_encode($value);
                        break;

                    case 'gold':
                        $con->query(" UPDATE player.player SET gold = :gold, exp = :exp, cheque = :cheque, gaya = :gaya WHERE player.account_id = {$row['id']} ");
                        $con->bind(':gold', $_POST['gold']['gold'] );
                        $con->bind(':exp', $_POST['gold']['exp'] );
                        $con->bind(':cheque', $_POST['gold']['won'] );
                        $con->bind(':gaya', $_POST['gold']['gaya'] );
                        $con->execute();
                        $value['su'] = 'تم  تحديث البيانات';
                        echo json_encode($value);
                        break;

                    case 'strong';
                        $con->query(" UPDATE player.player SET job = :job, level = :level, iq = :iq, st = :st, ht = :ht, dx = :dx WHERE player.id = {$_POST['strong']['players']} ");
                        $con->bind(':job', $_POST['strong']['job'] );
                        $con->bind(':level', $_POST['strong']['level'] );
                        $con->bind(':iq', $_POST['strong']['iq'] );
                        $con->bind(':st', $_POST['strong']['st'] );
                        $con->bind(':ht', $_POST['strong']['ht'] );
                        $con->bind(':dx', $_POST['strong']['dx'] );
                        $con->execute();
                        $value['su'] = 'تم  تحديث البيانات';
                        echo json_encode($value);
                        break;
                    case 'To_GM':
                        $name = $con->get_fetch("player.player", 'name', 'id', $_POST['To_GM']['players']);
                        $con->query(" SELECT * FROM common.gmlist WHERE mAccount = '{$row['login']}'");
                        $count = $con->rowCount();

                        if( $_POST['To_GM']['group'] == 'delete' ){
                            $con->query("DELETE FROM common.gmlist WHERE mAccount = '{$row['login']}'");
                            $con->execute();
                            $value['su'] = 'تم تنفيذ البيانات بالنجاح';
                            exit(json_encode($value));
                        }

                        if( $count == 0){
                            $con->query(" INSERT INTO common.gmlist (mAccount, mName, mAuthority) VALUES(:mAccount,:mName,:mAuthority)");
                            $con->bind(':mAccount', $row['login'] );
                        }else{
                            $con->query(" UPDATE common.gmlist SET mName = :mName, mAuthority = :mAuthority WHERE common.gmlist.mAccount = '{$row['login']}' ");
                        }
                        
                        $con->bind(':mName', $name );
                        $con->bind(':mAuthority', $_POST['To_GM']['group'] );
                        $con->execute();
                        $value['su'] = 'تم تنفيذ البيانات بالنجاح';
                        exit(json_encode($value));
                        break;
                }
                exit;
            }
        
        //get list
            function get_total_all_records(){
                global $con;
                $con->query('SELECT * FROM account.account');
                return $con->rowCount();
            }
        
            $query = '';
            $output = array();
            $query .= "SELECT * FROM account.account ";
    
            
            if($_POST['search']['value']){
            $query .= "WHERE account.account.login LIKE '%{$_POST['search']['value']}%'";
            }
    
            if($_POST["length"] != -1){
                $query .= ' LIMIT '.$_POST['start'].', '.$_POST['length'];
            }
            
            $con->query($query);
            $result  = $con->resultSet();
            $filtered_rows   = $con->rowCount();
            $data = array();
            
            $i = $_POST["start"]+1;
            $date = new ClassDateTime();
            foreach($result as $row){
                $sub_array = array();
                $sub_array[] = $i++;
                $sub_array[] = $row['login'];
                $sub_array[] = $row['password'];
                $sub_array[] = ($row['email'] != null ? $row['email'] : $lang['not_email']);
                $sub_array[] = $date->format($row['create_time']);
                $sub_array[] = ($row['status'] == 'OK' ? "<div class='btn btn-sm btn-success'>{$lang['OK']}</div>" : "<div class='btn btn-sm btn-danger'>{$lang['BLOCK']}</div>");
                $sub_array[] = "<button onclick='return getData({$row['id']})' class='btn btn-sm btn-outline-default' data-id='{$row['id']}' data-bs-toggle='modal' data-bs-target='#exampleModal'>{$lang['edit']}</button>";
                $data[] = $sub_array;
            }
        
            $output = array(
                "draw"              =>  intval($_POST["draw"]),
                "recordsTotal"      =>  $filtered_rows,
                "recordsFiltered"   =>  get_total_all_records(),
                "data"              =>  $data
            );
            
            
            echo json_encode($output);
        exit;
        
    }

    if( $_GET['page'] == 'item' ){
        function get_total_all_records(){
            global $con;
            $con->query('SELECT * FROM player.item');
            return $con->rowCount();
        }
    
        $query = '';
        $output = array();
        $query .= "SELECT * FROM player.item ";

        
        if($_POST['search']['value']){
        $query .= "WHERE player.item.vnum LIKE '%{$_POST['search']['value']}%'";
        }

        if($_POST["length"] != -1){
            $query .= ' LIMIT '.$_POST['start'].', '.$_POST['length'];
        }
        
        $con->query($query);
        $result  = $con->resultSet();
        
        $filtered_rows   = $con->rowCount();
        $data = array();
        
        $i = $_POST["start"]+1;
        $date = new ClassDateTime();
        foreach($result as $row){
            $sub_array = array();
            $sub_array[] = $i++;
            $sub_array[] = $row['owner_id'];
            $sub_array[] = $row['window'];
            $sub_array[] = $row['pos'];
            $sub_array[] = $row['count'];
            $sub_array[] = $row['vnum'];
            $sub_array[] = $row['transmutation'];
            $sub_array[] = $row['socket0'];
            $sub_array[] = $row['socket1'];
            $sub_array[] = $row['socket2'];
            $sub_array[] = $row['socket3'];
            $sub_array[] = $row['socket4'];
            $sub_array[] = $row['socket5'];
            $sub_array[] = $row['attrtype0'];
            $sub_array[] = $row['attrvalue0'];
            $sub_array[] = $row['attrtype1'];
            $sub_array[] = $row['attrvalue1'];
            $sub_array[] = $row['attrtype2'];
            $sub_array[] = $row['attrvalue2'];
            $sub_array[] = $row['attrtype3'];
            $sub_array[] = $row['attrvalue3'];
            $sub_array[] = $row['attrtype4'];
            $sub_array[] = $row['attrvalue4'];
            $sub_array[] = $row['attrtype5'];
            $sub_array[] = $row['attrvalue5'];
            $sub_array[] = $row['attrtype6'];
            $sub_array[] = $row['attrvalue6'];
            $sub_array[] = $row['sealbind'];
            $data[] = $sub_array;
        }
    
        $output = array(
            "draw"              =>  intval($_POST["draw"]),
            "recordsTotal"      =>  $filtered_rows,
            "recordsFiltered"   =>  get_total_all_records(),
            "data"              =>  $data
        );

        echo json_encode($output);
        exit;
    }

    if( $_GET['page'] == 'command' ){
        if(isset($_POST['send'])){
            if( $_POST['send'] == 'command' ){
                echo '<pre>';
                print_r($_POST);
            }
        }
        exit;
    }

}