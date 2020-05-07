<?php

  $update = json_decode(file_get_contents('php://input'), TRUE);


//variabili

if(!empty($update['message']['text'])) {
  $text = $update['message']['text'];
} else {
  $text = '';
}

if(isset($update['message']['from']['id'])) {
  $userID = $update['message']['from']['id'];
}

if(isset($update['message']['chat']['id'])) {
  $chatID = $update['message']['chat']['id'];
}

if(isset($update['message']['from']['first_name'])) {
  $nome = htmlspecialchars($update['message']['from']['first_name']);
} 

if(!empty($update['message']['from']['last_name'])) {
  $cognome = htmlspecialchars($update['message']['from']['last_name']);
} else {
  $cognome = "<b>Non disponibile.</b>";
}

if(empty($update['message']['from']['username'])) {
  $username = "<b>Non disponibile.</b>";
} else {
  $username = $update['message']['from']['username'];
}

if(isset($update['message']['message_id'])) {
  $messageID = $update['message']['message_id'];
}

if(isset($update['message']['chat']['title'])) {
  $titleGroup = htmlspecialchars($update['message']['chat']['title']);
}

if(!empty($update['message']['chat']['username'])) {
  $usernameGroup = $update['message']['chat']['username'];
} else {
  $usernameGroup = "<b>Non disponibile.</b>";
}

if(isset($update['message']['chat']['type'])) {
  $typeChat = $update['message']['chat']['type'];
}

if(!empty($update['message']['new_chat_member'])) {
  $newChatMember = $update['message']['new_chat_member'];
} else {
  $newChatMember = '';
}

if(!empty($update['message']['left_chat_member'])) {
  $leftChatMember = $update['message']['left_chat_member'];
} else {
  $leftChatMember = '';
}


//variabili callback

if(!empty($update['callback_query']['data'])) {
  $queryData = $update['callback_query']['data'];
} else {
  $queryData = '';
}

if(isset($update['callback_query']['from'])) {
  $queryUserID = $update['callback_query']['from']['id'];
}

if(isset($update['callback_query']['message']['chat']['id'])) {
  $queryChatID = $update['callback_query']['message']['chat']['id'];
}

if(isset($update['callback_query'])) {
  $queryID = $update['callback_query']['id'];
}

if(isset($update['callback_query']['from']['first_name'])) {
  $queryNome = htmlspecialchars($update['callback_query']['from']['first_name']);
}

if(!empty($update['callback_query']['from']['last_name'])) {
  $queryCognome = htmlspecialchars($update['callback_query']['from']['last_name']);
} else {
  $queryCognome = "<b>Non disponibile.</b>";
}

if(!empty($update['callback_query']['from']['username'])) {
  $queryUsername = $update['callback_query']['from']['username'];
} else {
  $queryUsername = "<b>Non disponibile.</b>";
}

if(isset($update['callback_query']['message']['message_id'])) {
  $queryMsgID = $update['callback_query']['message']['message_id'];
}

if(isset($update['callback_query']['chat']['title'])) {
  $queryChatTitle = $update['callback_query']['chat']['title'];
}

if(!empty($update['callback_query']['chat']['username'])) {
  $queryChatUsername = $update['callback_query']['chat']['username'];
} else {
  $queryChatUsername = "<b>Non disponibile.</b>";
}

if(isset($update['callback_query']['chat']['type'])) {
  $queryChatType = $update['callback_query']['chat']['type'];
}


//variabili reply

if(empty($update['message']['reply_to_message']['text'])) {
  $replyText = $update['message']['reply_to_message']['text'];
} else {
  $replyText = '';
}

if(isset($update['message']['reply_to_message']['from']['id'])) {
  $replyUserID = $update['message']['reply_to_message']['from']['id'];
}

if(isset($update['message']['reply_to_message']['chat']['id'])) {
  $replyChatID = $update['message']['reply_to_message']['chat']['id'];
}

if(isset($update['message']['reply_to_message']['from']['first_name'])) {
  $replyNome = htmlspecialchars($update['message']['reply_to_message']['from']['first_name']);
}

if(!empty($update['message']['reply_to_message']['from']['last_name'])) {
  $replyCognome = htmlspecialchars($update['message']['reply_to_message']['from']['last_name']);
} else {
  $replyCognome = "<b>Non disponibile.</b>";
}

if(!empty($update['message']['reply_to_message']['from']['username'])) {
  $replyUsername = $update['message']['reply_to_message']['from']['username'];
} else {
  $replyUsername = "<b>Non disponibile.</b>";
}

if(isset($update['message']['reply_to_message']['message_id'])) {
  $replyMessageID = $update['message']['reply_to_message']['message_id'];
}
