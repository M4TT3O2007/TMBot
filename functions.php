<?php

class bot {

    public function cURL($method, $args) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot'.$_GET['api'].$method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, TRUE);
    }

    public function sendMessage($chat_id, $text, $key = false, $type = false) {
    if($key != false) {
        if($type == 'fisica') {
            $keyboard = '{"keyboard":['.$key.'],"resize_keyboard":true}';
        } elseif($type == 'inline') {
            $keyboard = '{"inline_keyboard":['.$key.'],"resize_keyboard":true}';
        }
        } else {
            $keyboard = '';
        }
            $args = [
                'chat_id' => $chat_id,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true,
                'text' => $text,
                'reply_markup' => $keyboard
            ];
        return $this->cURL('/sendMessage', $args);
    }

    public function editMessageText($chat_id, $message_id, $text, $key = false, $type = false) {
        if($key != false) {
            if($type == 'fisica') {
                $keyboard = '{"keyboard":['.$key.'],"resize_keyboard":true}';
            } elseif($type == 'inline') {
                $keyboard = '{"inline_keyboard":['.$key.'],"resize_keyboard":true}';
            }
            } else {
                $keyboard = '';
            }
                $args = [
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true,
                'text' => $text,
                'reply_markup' => $keyboard
            ];
        return $this->cURL('/editMessageText', $args);
    }

    public function sendEmoji($chatID, $emoji = false){
        if($emoji != false) {
            if($emoji == "freccia") {
            $send = "🎯";
        } elseif($emoji == "dado") {
            $send = '🎲';
        }
        $args = [
        'chat_id' => $chatID,
        'emoji' => $send
    ];
        return $this->cURL('/sendDice', $args);
    }
    }

    public function forwardMessage($chat_id, $from_chat_id, $message_id) {
      $args = [
      'chat_id' => $chat_id,
      'from_chat_id' => $from_chat_id,
      'message_id' => $message_id,
    ];
    return $this->cURL('/forwardMessage', $args);
    }

    public function answerCallbackQuery($callbackQueryID, $text) {
        $args = [
        'callback_query_id' => $callbackQueryID, 
        'text' => $text
    ];
        return $this->cURL('/answerCallbackQuery', $args);
    }

    public function deleteMessage($chat_id, $message_id) {
       $args = [
       'chat_id' => $chat_id, 
       'message_id' => $message_id
    ];
        return $this->cURL('/deleteMessage', $args);
    }

    public function leaveChat($chat_id){
        $args = [
        'chat_id' => $chat_id
    ];
        return $this->cURL('/leaveChat', $args);
    }

    public function promoteChatMember($chat_id, $user_id) {
       $args = [
       'chat_id' => $chat_id,
       'user_id' => $user_id
    ];
        return $this->cURL('/promoteChatMember', $args);
    }

    public function exportChatInviteLink($chat_id) {
        $args = [
        'chat_id' => $chat_id
    ];
        return $this->cURL('/exportChatInviteLink', $args);
    }
    
    public function kickChatMember($chat_id,$user_id){
        $args = [
        'chat_id' => $chat_id,
        'user_id' => $user_id
    ];
        return $this->cURL('/kickChatMember', $args);
    }

    public function unbanChatMember($chat_id,$user_id){
        $args = [
        'chat_id' => $chat_id,
        'user_id' => $user_id
    ];
        return $this->cURL('/unbanChatMember', $args);
    }
}
