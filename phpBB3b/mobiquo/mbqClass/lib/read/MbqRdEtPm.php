<?php

defined('MBQ_IN_IT') or exit;

MbqMain::$oClk->includeClass('MbqBaseRdEtPm');

/**
 * private message read class
 */
Class MbqRdEtPm extends MbqBaseRdEtPm {

    public function __construct() {
    }

    public function makeProperty(&$oMbqEtPm, $pName, $mbqOpt = array()) {
        switch ($pName) {
            default:
            MbqError::alert('', __METHOD__ . ',line:' . __LINE__ . '.' . MBQ_ERR_INFO_UNKNOWN_PNAME . ':' . $pName . '.');
            break;
        }
    }

    public function getObjsMbqEtPmBox() {
        global $db, $user, $config, $phpbb_root_path, $phpEx,$num_messages;
        $user->setup('ucp');

        if (!$user->data['is_registered']) trigger_error('LOGIN_EXPLAIN_UCP');
        if (!$config['allow_privmsg']) trigger_error('Module not accessible');

        $folder = array();
        $user_id = $user->data['user_id'];
        // Get folder information
        $sql = 'SELECT folder_id, COUNT(msg_id) as num_messages, SUM(pm_unread) as num_unread
            FROM ' . PRIVMSGS_TO_TABLE . "
            WHERE user_id = $user_id
            AND folder_id <> " . PRIVMSGS_NO_BOX . '
            GROUP BY folder_id';
        $result = $db->sql_query($sql);

        $num_messages = $num_unread = array();
        while ($row = $db->sql_fetchrow($result))
        {
            $num_messages[(int) $row['folder_id']] = $row['num_messages'];
            $num_unread[(int) $row['folder_id']] = $row['num_unread'];
        }
        $db->sql_freeresult($result);

        // Make sure the default boxes are defined
        $available_folder = array(PRIVMSGS_INBOX, PRIVMSGS_OUTBOX, PRIVMSGS_SENTBOX);

        foreach ($available_folder as $default_folder)
        {
            if (!isset($num_messages[$default_folder]))
            {
                $num_messages[$default_folder] = 0;
            }

            if (!isset($num_unread[$default_folder]))
            {
                $num_unread[$default_folder] = 0;
            }
        }

        // Adjust unread status for outbox
        $num_unread[PRIVMSGS_OUTBOX] = $num_messages[PRIVMSGS_OUTBOX];

        $folder[PRIVMSGS_INBOX] = array(
            'folder_id'         => 0,
            'folder_name'       => getSystemString('PM_INBOX'),
            'num_messages'      => $num_messages[PRIVMSGS_INBOX],
            'unread_messages'   => $num_unread[PRIVMSGS_INBOX],
            'folder_type'       => 'INBOX'
        );

        // Custom Folder
        $sql = 'SELECT folder_id, folder_name, pm_count
            FROM ' . PRIVMSGS_FOLDER_TABLE . "
            WHERE user_id = $user_id";
        $result = $db->sql_query($sql);

        while ($row = $db->sql_fetchrow($result))
        {
            $folder[$row['folder_id']] = array(
                'folder_id'         => $row['folder_id'],
                'folder_name'       => $row['folder_name'],
                'num_messages'      => $row['pm_count'],
                'unread_messages'   => ((isset($num_unread[$row['folder_id']])) ? $num_unread[$row['folder_id']] : 0)
            );
        }
        $db->sql_freeresult($result);

        $folder[PRIVMSGS_OUTBOX] = array(
            'folder_id'         => -2,
            'folder_name'       => getSystemString('PM_OUTBOX'),
            'num_messages'      => $num_messages[PRIVMSGS_OUTBOX],
            'unread_messages'   => $num_unread[PRIVMSGS_OUTBOX],
            'folder_type'       => 'OUTBOX'
        );

        $folder[PRIVMSGS_SENTBOX] = array(
            'folder_id'         => -1,
            'folder_name'       => getSystemString('PM_SENTBOX'),
            'num_messages'      => $num_messages[PRIVMSGS_SENTBOX],
            'unread_messages'   => $num_unread[PRIVMSGS_SENTBOX],
            'folder_type'       => 'SENT'
        );

        $box_list = array();
        foreach($folder as $box)
        {
            $oMbqEtPmBox = MbqMain::$oClk->newObj('MbqEtPmBox');
            $oMbqEtPmBox->boxId->setOriValue($box['folder_id']);
            $oMbqEtPmBox->boxName->setOriValue($box['folder_name']);
            $oMbqEtPmBox->boxType->setOriValue(isset($box['folder_type']) ? $box['folder_type'] : '');
            $oMbqEtPmBox->msgCount->setOriValue($box['num_messages']);
            $oMbqEtPmBox->unreadCount->setOriValue($box['unread_messages']);
            $boxs[] = $oMbqEtPmBox;
        }

        return $boxs;
    }
    public function initOMbqEtPmBox($var,  $mbqOpt) {
        if($mbqOpt['case'] =='byBoxId'){
            $boxes = $this->getObjsMbqEtPmBox($var, $mbqOpt);
            foreach($boxes as $box)
            {
                if($box->boxId->oriValue == $var)
                {
                    return $box;
                }
            }
            return null;
        }else if($mbqOpt['case'] == 'byMsgId'){
            $msg = $this->getObjsMbqEtQuotePm($var['msgId'],$var['boxId'] );
            return $this->initOMbqEtPmBox($msg, array('case'=>'onPmMsg' ));
        }
    }
    public function getObjsMbqEtPm($var,  $mbqOpt = array('case'=> 'byBox')){
        if($mbqOpt['case'] == 'byBox')
        {
            global $db, $auth, $user, $cache, $config, $phpbb_home, $phpbb_root_path, $phpEx,$global_privmsgs_rules;

            $oMbqEtPmBox = $var;
            $oMbqDataPage = $mbqOpt['oMbqDataPage'];

            $user->setup('ucp');

            // get folder id from parameters
            $folder_id = $oMbqEtPmBox->boxId->oriValue;
            //if (PRIVMSGS_INBOX !== $folder_id)
            //    $folder_id = PRIVMSGS_SENTBOX;

            list($start, $limit, $page) = process_page($oMbqDataPage->startNum, $oMbqDataPage->lastNum);

            // Grab icons
            //$icons = $cache->obtain_icons();
            $user_id = $user->data['user_id'];

            include_once($phpbb_root_path . 'includes/functions_privmsgs.' . $phpEx);
            if ($user->data['user_new_privmsg'])
            {
                place_pm_into_folder($global_privmsgs_rules);
            }
            $folder = get_folder($user_id, $folder_id);

            include_once($phpbb_root_path . 'includes/ucp/ucp_pm_viewfolder.' . $phpEx);
            $folder_info = get_pm_from($folder_id, $folder, $user_id);

            $address_list = array();

            // Build Recipient List if in outbox/sentbox - max two additional queries
            if ($folder_id == PRIVMSGS_OUTBOX || $folder_id == PRIVMSGS_SENTBOX)
            {
                $recipient_list = $address = array();

                foreach ($folder_info['rowset'] as $message_id => $row)
                {
                    $address[$message_id] = rebuild_header(array('to' => $row['to_address'], 'bcc' => $row['bcc_address']));
                    $_save = array('u', 'g');
                    foreach ($_save as $save)
                    {
                        if (isset($address[$message_id][$save]) && sizeof($address[$message_id][$save]))
                        {
                            foreach (array_keys($address[$message_id][$save]) as $ug_id)
                            {
                                $recipient_list[$save][$ug_id] = array('name' => getSystemString('NA'), 'colour' => '');
                            }
                        }
                    }
                }

                $_types = array('u', 'g');
                foreach ($_types as $ug_type)
                {
                    if (!empty($recipient_list[$ug_type]))
                    {
                        if ($ug_type == 'u')
                        {
                            $sql = 'SELECT user_id as id, username as name, user_colour as colour
                        FROM ' . USERS_TABLE . '
                        WHERE ';
                        }
                        else
                        {
                            $sql = 'SELECT group_id as id, group_name as name, group_colour as colour, group_type
                        FROM ' . GROUPS_TABLE . '
                        WHERE ';
                        }
                        $sql .= $db->sql_in_set(($ug_type == 'u') ? 'user_id' : 'group_id', array_map('intval', array_keys($recipient_list[$ug_type])));

                        $result = $db->sql_query($sql);

                        while ($row = $db->sql_fetchrow($result))
                        {
                            if ($ug_type == 'g')
                            {
                                $row['name'] = ($row['group_type'] == GROUP_SPECIAL) ? getSystemString('G_' . $row['name']) : $row['name'];
                            }

                            $recipient_list[$ug_type][$row['id']] = array('id' => $row['id'], 'name' => $row['name'], 'colour' => $row['colour']);
                        }
                        $db->sql_freeresult($result);
                    }
                }

                foreach ($address as $message_id => $adr_ary)
                {
                    foreach ($adr_ary as $type => $id_ary)
                    {
                        foreach ($id_ary as $ug_id => $_id)
                        {
                            $address_list[$message_id][] = $recipient_list[$type][$ug_id];
                        }
                    }
                }
                unset($recipient_list, $address);
            }

            // get unread count in inbox only
            if (PRIVMSGS_INBOX === $folder_id)
            {
                $sql = 'SELECT COUNT(msg_id) as num_messages
                FROM ' . PRIVMSGS_TO_TABLE . '
                WHERE pm_unread = 1
                    AND folder_id = ' . PRIVMSGS_INBOX . '
                    AND user_id = ' . $user->data['user_id'];
                $result = $db->sql_query($sql);
                $unread_num = (int) $db->sql_fetchfield('num_messages');
                $db->sql_freeresult($result);
            } else {
                $unread_num = 0;
            }

            $sql = 'SELECT COUNT(msg_id) as num_messages
            FROM ' . PRIVMSGS_TO_TABLE . '
            WHERE folder_id = ' . $folder_id . '
                AND user_id = ' . $user->data['user_id'];
            $result = $db->sql_query($sql);
            $total_num = (int) $db->sql_fetchfield('num_messages');
            $db->sql_freeresult($result);

            $sql = 'SELECT t.*, p.*, u.username, u.user_avatar, u.user_avatar_type, u.user_id
            FROM ' . PRIVMSGS_TO_TABLE . ' t, ' . PRIVMSGS_TABLE . ' p, ' . USERS_TABLE . " u
            WHERE t.user_id = $user_id
            AND p.author_id = u.user_id
            AND t.folder_id = $folder_id
            AND t.msg_id = p.msg_id
            ORDER BY p.message_time DESC";
            $result = $db->sql_query_limit($sql, $limit, $start);

            $total_message_count = $total_unread_count = 0;
            $online_cache = array();
            while ($row = $db->sql_fetchrow($result))
            {
                $oMbqEtPm = $this->initOMbqEtPm($row, array('case' => 'byRow'));
                $oMbqEtPm->boxId->setOriValue($oMbqEtPmBox->boxId->oriValue);
                $oMbqEtPm->oMbqEtPmBox = $oMbqEtPmBox;
                $pms[] = $oMbqEtPm;
            }

            $db->sql_freeresult($result);

            //$result = new xmlrpcval(array(
            //    'total_message_count' => new xmlrpcval($total_num, 'int'),
            //    'total_unread_count'  => new xmlrpcval($unread_num, 'int'),
            //    'list'                => new xmlrpcval($pm_list, 'array')
            //), 'struct');

            //return new xmlrpcresp($result);
            $oMbqDataPage->datas = $pms;
            return $oMbqDataPage;
        }
        else if($mbqOpt['case'] == 'byMsgId')
        {
            global $db, $auth, $user, $config, $template, $phpbb_root_path, $phpEx,$phpbb_home;
            if(file_exists($phpbb_root_path . 'includes/functions_profile_control.' . $phpEx))
            {
                require_once ($phpbb_root_path . 'includes/functions_profile_control.' . $phpEx);
            }
            $user->setup('ucp');

            // get msg id from parameters
            $msg_id = intval($var['msgId']);
         //   $box_id = intval($var['boxId']);
            if (!$msg_id) trigger_error('NO_MESSAGE');
          //  $GLOBALS['return_html'] = $var['returnHtml'];

            $message_row = array();

            // Get Message user want to see
            $sql = 'SELECT t.*, p.*, u.*
            FROM ' . PRIVMSGS_TO_TABLE . ' t, ' . PRIVMSGS_TABLE . ' p, ' . USERS_TABLE . " u
            WHERE t.msg_id = p.msg_id
            AND p.msg_id = $msg_id
            AND u.user_id = p.author_id";

            $result = $db->sql_query($sql);
            $message_row = $db->sql_fetchrow($result);
            $db->sql_freeresult($result);

            if (!$message_row) return false;

            /*$message_row['message_text'] = preg_replace('/\[b:'.$message_row['bbcode_uid'].'\](.*?)\[\/b:'.$message_row['bbcode_uid'].'\]/si', '[b]$1[/b]', $message_row['message_text']);
            $message_row['message_text'] = preg_replace('/\[i:'.$message_row['bbcode_uid'].'\](.*?)\[\/i:'.$message_row['bbcode_uid'].'\]/si', '[i]$1[/i]', $message_row['message_text']);
            $message_row['message_text'] = preg_replace('/\[u:'.$message_row['bbcode_uid'].'\](.*?)\[\/u:'.$message_row['bbcode_uid'].'\]/si', '[u]$1[/u]', $message_row['message_text']);
            $message_row['message_text'] = preg_replace('/\[color=#(\w{6}):'.$message_row['bbcode_uid'].'\](.*?)\[\/color:'.$message_row['bbcode_uid'].'\]/si', '[color=#$1]$2[/color]', $message_row['message_text']);*/
            tapatalk_process_bbcode($message_row['message_text'], $message_row['bbcode_uid']);
            // Update unread status
            $user->add_lang('posting');
            include_once($phpbb_root_path . 'includes/functions_privmsgs.' . $phpEx);
            update_unread_status(true, $message_row['msg_id'], $user->data['user_id'], $message_row['folder_id']);

            // Assign TO/BCC Addresses to template
             // Number of "to" recipients
            $num_recipients = (int) preg_match_all('/:?(u|g)_([0-9]+):?/', $message_row['to_address'], $match);
            $addresses = write_pm_addresses(array('to' => $message_row['to_address'], 'bcc' => $message_row['bcc_address']), $user->data['user_id']);

            $msg_to = array();
            foreach($addresses['to']['user'] as $uid=>$address){
                array_push($msg_to,array(
                        'user_id'=>$uid,
                        'username'=>$address['name'],
                    ));

            }
            $message_row['msgTo'] = $msg_to;
            $message_row = array_merge($message_row, $msg_to);


            // Pull attachment data
            $display_notice = false;
            $attachments = array();

            if ($message_row['message_attachment'] && $config['allow_pm_attach'])
            {
                if ($auth->acl_get('u_pm_download'))
                {
                    $sql = 'SELECT *
				FROM ' . ATTACHMENTS_TABLE . "
				WHERE post_msg_id = $msg_id
					AND in_message = 1
				ORDER BY filetime DESC, post_msg_id ASC";
                    $result = $db->sql_query($sql);

                    while ($row = $db->sql_fetchrow($result))
                    {
                        $attachments[] = $row;
                    }
                    $db->sql_freeresult($result);
                    // No attachments exist, but message table thinks they do so go ahead and reset attach flags
                    if (!sizeof($attachments))
                    {
                        $sql = 'UPDATE ' . PRIVMSGS_TABLE . "
					SET message_attachment = 0
					WHERE msg_id = $msg_id";
                        $db->sql_query($sql);
                    }
                }
                else
                {
                    $display_notice = true;
                }
            }

            $attachments_hash = array();
            foreach($attachments as $attachment){
                array_push($attachments_hash,array(
                    'content_type'  => strtolower(trim($attachment['mimetype'])),
                    'filename'      => trim($attachment['real_filename']),
                    'fileszie'      => intval($attachment['filesize']),
                    'url'           => $phpbb_root_path . $config['upload_path'] . '/' . utf8_basename($attachment['physical_filename']),
                    'thumbnail_url' => ($attachment['thumbnail'])? $phpbb_root_path . $config['upload_path'] . '/thumb_' . utf8_basename($attachment['physical_filename']):'',
                    'attach_id'     => intval($attachment['attach_id']),
                ));
            }


            // Parse the message and subject
            $parse_flags = ($message_row['bbcode_bitfield'] ? OPTION_FLAG_BBCODE : 0) | OPTION_FLAG_SMILIES;
            $message = generate_text_for_edit($message_row['message_text'], $message_row['bbcode_uid'], $parse_flags);

            $message_row['message_text'] = $message['text'];
            $message_row['attachments'] = $attachments_hash;
            //$sent_date  = mobiquo_iso8601_encode($message_row['message_time']);
            //$icon_url   = ($user->optionget('viewavatars')) ? get_user_avatar_url($message_row['user_avatar'], $message_row['user_avatar_type']) : '';
            //$msg_subject = html_entity_decode(strip_tags(censor_text($message_row['message_subject'])));
            //$msg_body = post_html_clean(parse_quote($template->_rootref['MESSAGE']));

            //if(!empty($template->_rootref['S_HAS_ATTACHMENTS']))
            //{
            //    foreach($template->_tpldata['attachment'] as $attachment)
            //    {
            //        if(preg_match('/<img src=\".*?\/(download\/file\.php\?id=(\d+).*?)\"/is', $attachment['DISPLAY_ATTACHMENT'], $matches))
            //        {
            //            $attach_id = $matches[2];
            //            $file_url = basic_clean($phpbb_home.$matches[1]);
            //            $thumbnail_url = '';

            //            if ($config['img_create_thumbnail'] && preg_match('/\&t=1/is', $file_url))
            //            {
            //                $thumbnail_url = $file_url;
            //                $file_url = preg_replace('/\&t=1/is', '', $thumbnail_url);
            //            }
            //            else
            //            {
            //                $thumbnail_url = preg_replace('/file\.php\?/is', 'file.php?t=1&', $file_url);
            //            }
            //            unset($matches);
            //            $sql = 'SELECT * FROM ' . ATTACHMENTS_TABLE . " WHERE attach_id = $attach_id	";
            //            $result = $db->sql_query($sql);
            //            $attachment_by_id = $db->sql_fetchrow($result);
            //            if (strpos($attachment_by_id['mimetype'], 'image') === 0)
            //                $content_type = 'image';
            //            else
            //                $content_type = $attachment_by_id['extension'];

            //            $xmlrpc_attachment = new xmlrpcval(array(
            //                'filename'      => new xmlrpcval($attachment_by_id['real_filename'], 'base64'),
            //                'filesize'      => new xmlrpcval($attachment_by_id['filesize'], 'int'),
            //                'content_type'  => new xmlrpcval($content_type),
            //                'thumbnail_url' => new xmlrpcval($thumbnail_url),
            //                'url'           => new xmlrpcval($file_url)
            //            ), 'struct');
            //            $attachments[] = $xmlrpc_attachment;
            //        }
            //    }
            //}
            //if ($config['load_onlinetrack']) {
            //    $sql = 'SELECT session_user_id, MAX(session_time) as online_time, MIN(session_viewonline) AS viewonline
            //    FROM ' . SESSIONS_TABLE . '
            //    WHERE session_user_id=' . $message_row['user_id'] . '
            //    GROUP BY session_user_id';
            //    $result = $db->sql_query($sql);
            //    $online_info = $db->sql_fetchrow($result);

            //    $update_time = $config['load_online_time'] * 60;
            //    $is_online = (time() - $update_time < $online_info['online_time'] && (($online_info['viewonline']) || $auth->acl_get('u_viewonline'))) ? true : false;
            //} else {
            //    $is_online = false;
            //}
            return $message_row;
        }
    }
    public function initOMbqEtPm($var, $mbqOpt) {
        global $auth;
        if ($mbqOpt['case'] == 'byMsgId') {
            if(!is_array($var))
            {
                $var = array('msgId'=>$var, 'boxId'=>-3);
            }
            if($row = $this->getObjsMbqEtPm($var, $mbqOpt))
            {
                $mbqOpt['case'] = 'byRow';
                return $this->initOMbqEtPm($row, $mbqOpt);
            }
            return false;
        }
        else if ($mbqOpt['case'] == 'byRow') {
            global $user, $config,$db;
            $row = $var;
            $folder_id = $row['folder_id'];
            if ($folder_id == PRIVMSGS_OUTBOX || $folder_id == PRIVMSGS_SENTBOX)
            {
                $msg_to_list = array();
                $address = explode(',',$row['to_address']);
                foreach($address as $addr)
                {
                    $msg_to_list[] = str_replace('u_','',$addr);
                }
            }
            else
            {
                $msg_to_list = array($user->data['user_id']);
            }
            //$icon_url   = (!empty($icons[$row['icon_id']])) ? $phpbb_home . $config['icons_path'] . '/' . $icons[$row['icon_id']]['img'] : '';
            $icon_url   = ($user->optionget('viewavatars')) ? get_user_avatar_url($row['user_avatar'], $row['user_avatar_type']) : '';
            $msg_subject = html_entity_decode(strip_tags(censor_text($row['message_subject'])));

            //$short_content = censor_text($row['message_text']);
            //$short_content = preg_replace('/\[url.*?\].*?\[\/url.*?\]/', '[url]', $short_content);
            //$short_content = preg_replace('/\[img.*?\].*?\[\/img.*?\]/', '[img]', $short_content);
            //$short_content = preg_replace('/[\n\r\t]+/', ' ', $short_content);
            //strip_bbcode($short_content);
            //$short_content = html_entity_decode($short_content);
            //$short_content = substr($short_content, 0, 200);
            $short_content = process_short_content($row['message_text'],200);
            if ($config['load_onlinetrack'] && !isset($online_cache[$row['user_id']])) {
                $sql = 'SELECT session_user_id, MAX(session_time) as online_time, MIN(session_viewonline) AS viewonline
                    FROM ' . SESSIONS_TABLE . '
                    WHERE session_user_id=' . $row['user_id'] . '
                    GROUP BY session_user_id';
                $online_result = $db->sql_query($sql);
                $online_info = $db->sql_fetchrow($online_result);
                $db->sql_freeresult($online_result);

                $update_time = $config['load_online_time'] * 60;
                $online_cache[$row['user_id']] = (time() - $update_time < $online_info['online_time'] && (($online_info['viewonline']) || $auth->acl_get('u_viewonline'))) ? true : false;
            }

            $is_online = isset($online_cache[$row['user_id']]) ? $online_cache[$row['user_id']] : false;

            //$pm_list[] = new xmlrpcval(array(
            //    'msg_id'        => new xmlrpcval($row['msg_id']),
            //    'msg_state'     => new xmlrpcval($msg_state, 'int'),
            //    'sent_date'     => new xmlrpcval($sent_date, 'dateTime.iso8601'),
            //    'timestamp'     => new xmlrpcval($row['message_time'], 'string'),
            //    'msg_from'      => new xmlrpcval(basic_clean($row['username']), 'base64'),
            //    'msg_from_id'   => new xmlrpcval($row['user_id']),
            //    'icon_url'      => new xmlrpcval($icon_url),
            //    'msg_to'        => new xmlrpcval($msg_to, 'array'),
            //    'msg_subject'   => new xmlrpcval($msg_subject, 'base64'),
            //    'short_content' => new xmlrpcval($short_content, 'base64'),
            //    'is_online'     => new xmlrpcval($is_online, 'boolean'),
            //), 'struct');

            $oMbqEtPm = MbqMain::$oClk->newObj('MbqEtPm');
            $oMbqEtPm->msgId->setOriValue($row['msg_id']);
            $oMbqEtPm->boxId->setOriValue($row['folder_id']);
            $oMbqEtPm->msgTitle->setOriValue($msg_subject);
            $oMbqEtPm->sentDate->setOriValue($row['message_time']);
            $oMbqEtPm->isRead->setOriValue(!$row['pm_unread']);
            $oMbqEtPm->isReply->setOriValue($row['pm_replied']);
            $oMbqEtPm->isForward->setOriValue($row['pm_forwarded']);
            $oMbqEtPm->msgFromId->setOriValue($row['user_id']);
            $oMbqEtPm->msgFrom->setOriValue($row['username']);
            $oMbqEtPm->isOnline->setOriValue($is_online);
            $oMbqEtPm->iconUrl->setOriValue($icon_url);
            $oMbqEtPm->shortContent->setOriValue($short_content);
            $oMbqEtPm->msgContent->setOriValue(censor_text($row['message_text']));
            $oMbqEtPm->msgContent->setTmlDisplayValue(tapatalk_process_bbcode($row['message_text'], $row['bbcode_uid']));
            $oMbqEtPm->msgContent->setTmlDisplayValueNoHtml(post_html_clean(censor_text($row['message_text'])));
            $oMbqEtPm->allowSmilies->setOriValue($row['enable_smilies'] ? true : false);
            $oMbqEtPm->canReport->setOriValue($config['allow_pm_report'] == "1" && $row['message_reported'] == "0");
            $oMbqRdEtUser = MbqMain::$oClk->newObj('MbqRdEtUser');
            foreach ($msg_to_list as $toUserId)
            {
                //$msg_to[] = new xmlrpcval(array(
                //    'user_id'   => new xmlrpcval($address['id'], 'string'),
                //    'username'  => new xmlrpcval(basic_clean($address['name']), 'base64'),
                //    'user_type' => check_return_user_type($address['id']),
                //    //'tapatalk'  => new xmlrpcval(is_tapatalk_user($address['id']), 'string'),
                //), 'struct');
                if(stripos($toUserId,"g_") == 0)
                {
                    $sql = 'SELECT group_id as id, group_name as name, group_colour as colour, group_type
                        FROM ' . GROUPS_TABLE . '
                        WHERE group_id = \'' .  str_replace('g_','',$toUserId) . '\'';
                    $userGroupResult = $db->sql_query($sql);
                    $userGroup = $db->sql_fetchrow($userGroupResult);
                    $db->sql_freeresult($userGroupResult);
                    $oMbqEtUser = MbqMain::$oClk->newObj('MbqEtUser');
                    $oMbqEtUser->userId->setOriValue($userGroup['id']);
                    $oMbqEtUser->userName->setOriValue($userGroup['name']);
                }
                else
                {
                    $oMbqEtUser = $oMbqRdEtUser->initOMbqEtUser($toUserId, array('case'=>'byUserId'));
                }
                array_push($oMbqEtPm->objsRecipientMbqEtUser,$oMbqEtUser);
            }

            $oMbqRdEtUser = MbqMain::$oClk->newObj('MbqRdEtUser');
            $oMbqEtPm->oFirstRecipientMbqEtUser = $oMbqRdEtUser->initOMbqEtUSer($oMbqEtPm->objsRecipientMbqEtUser[0]->userId->oriValue, array('case' => 'byUserIds'));
            $oMbqEtPm->oAuthorMbqEtUser = $oMbqRdEtUser->initOMbqEtUSer($oMbqEtPm->msgFromId->oriValue, array('case' => 'byUserId'));

            if(isset($row['attachments']))
            {
                foreach ($row['attachments'] as $attachment)
                {
                    $oMbqEtAtt = MbqMain::$oClk->newObj('MbqEtAtt');
                    $oMbqEtAtt->attId->setOriValue($attachment['attach_id']);
                    $oMbqEtAtt->uploadFileName->setOriValue($attachment['filename']);
                    $oMbqEtAtt->filtersSize->setOriValue($attachment['filesize']);
                    $oMbqEtAtt->url->setOriValue($attachment['url']);
                    $oMbqEtAtt->thumbnailUrl->setOriValue($attachment['thumbnail_url']);
                    $oMbqEtAtt->contentType->setOriValue($attachment['content_type']);
                    array_push($oMbqEtPm->objsAttachmentsMbqEtAtt,$oMbqEtAtt);
                }
            }
            $oMbqEtPm->mbqBind = $row;
            return $oMbqEtPm;
        }else if($mbqOpt['case'] =='message'){
            $oMbqEtPm = MbqMain::$oClk->newObj('MbqEtPm');
            $oMbqEtPm->msgContent->setOriValue($this->processToDisplay($var->message));
            return $oMbqEtPm;
        }

        //MbqError::alert('', __METHOD__ . ',line:' . __LINE__ . '.' . MBQ_ERR_INFO_NEED_ACHIEVE_IN_INHERITED_CLASSE);
    }
    function getQuotePm($oMbqEtPm)
    {
        $post =  $oMbqEtPm->mbqBind;
        $message_subject = ((!preg_match('/^Re:/',  $post['message_subject'])) ? 'Re: ' : '') . censor_text($post['message_subject']);
        decode_message($post['message_text'], $post['bbcode_uid']);
        $message = '[quote="' . $post['username'] . '"]' . censor_text(trim($post['message_text'])) . "[/quote]\n";
        $oMbqEtPm->msgTitle->setOriValue($message_subject);
        $oMbqEtPm->msgContent->setOriValue($message);
        $oMbqEtPm->msgContent->setTmlDisplayValue($message);
        $oMbqEtPm->msgContent->setTmlDisplayValueNoHtml($message);

    }
    function getPmRoomCount()
    {
        global $user, $num_messages;
        $this->mobi_set_user_message_limit();
        return ($user->data['message_limit']) ? $user->data['message_limit'] - $num_messages[PRIVMSGS_INBOX] : 0;
    }
    function mobi_set_user_message_limit()
    {
        global $user, $db, $config;

        // Get maximum about from user memberships - if it is 0, there is no limit set and we use the maximum value within the config.
        $sql = 'SELECT MAX(g.group_message_limit) as max_message_limit
		FROM ' . GROUPS_TABLE . ' g, ' . USER_GROUP_TABLE . ' ug
		WHERE ug.user_id = ' . $user->data['user_id'] . '
			AND ug.user_pending = 0
			AND ug.group_id = g.group_id';
        $result = $db->sql_query($sql);
        $message_limit = (int) $db->sql_fetchfield('max_message_limit');
        $db->sql_freeresult($result);

        $user->data['message_limit'] = (!$message_limit) ? $config['pm_max_msgs'] : $message_limit;
    }
    public function getTotalMessageInbox($oMbqEtPmBox, $type=''){
        if($type=='unread')
        {
            return $oMbqEtPmBox->unreadCount->oriValue;
        }
        else
        {
            return $oMbqEtPmBox->msgCount->oriValue;
        }
    }
    public function getUrl($oMbqEtPm){
        global $phpbb_home,$phpEx;
        $boxId = $oMbqEtPm->boxId->oriValue;
        $msgId = $oMbqEtPm->msgId->oriValue;
        return append_sid("{$phpbb_home}ucp.$phpEx", "i=pm&mode=view&f=$boxId&p=$msgId");
    }
}
