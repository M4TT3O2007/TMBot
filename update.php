<?php

class update {

  public function update() {

  $this->update = json_decode(file_get_contents('php://input'), TRUE);


//variabili

if(isset($this->update['message']['text'])) {
  $this->text = $this->update['message']['text'];
} else {
  $this->text = '';
}

if(isset($this->update['message']['from']['id'])) {
  $this->userID = $this->update['message']['from']['id'];
}

if(isset($this->update['message']['chat']['id'])) {
  $this->chatID = $this->update['message']['chat']['id'];
}

if(!empty($this->update['message']['from']['first_name'])) {
  $this->nome = htmlspecialchars($this->update['message']['from']['first_name']);
} else {
  $this->nome = "<b>Non disponibile.</b>";
}

if(!empty($this->update['message']['from']['last_name'])) {
  $this->cognome = htmlspecialchars($this->update['message']['from']['last_name']);
} else {
  $this->cognome = "<b>Non disponibile.</b>";
}

if(!empty($this->update['message']['from']['username'])) {
  $this->username = $this->update['message']['from']['username'];
} else {
  $this->username = "<b>Non disponibile.</b>";
}

if(isset($this->update['message']['from']['language_code'])) {
  $this->lingua = $this->update['message']['from']['language_code'];
}

if(isset($this->update['message']['message_id'])) {
  $this->messageID = $this->update['message']['message_id'];
}

if(isset($this->update['message']['chat']['title'])) {
  $this->titleGroup = htmlspecialchars($this->update['message']['chat']['title']);
}

if(!empty($this->update['message']['chat']['username'])) {
  $this->usernameGroup = $this->update['message']['chat']['username'];
} else {
  $this->usernameGroup = "<b>Non disponibile.</b>";
}

if(isset($this->update['message']['chat']['type'])) {
  $this->typeChat = $this->update['message']['chat']['type'];
}

if(isset($this->update['message']['new_chat_member'])) {
  $this->newChatMember = $this->update['message']['new_chat_member'];
} else {
  $this->newChatMember = '';
}

if(isset($this->update['message']['new_chat_member']['id'])) {
  $this->newChatMemberID = $this->update['message']['new_chat_member']['id'];
}

if(isset($this->update['message']['new_chat_member']['first_name'])) {
  $this->newChatMemberNome = $this->update['message']['new_chat_member']['first_name'];
} else {
  $this->newChatMemberNome = "<b>Non disponibile.</b>";
}

if(isset($this->update['message']['new_chat_member']['last_name'])) {
  $this->newChatMemberCognome = $this->update['message']['new_chat_member']['last_name'];
} else {
  $this->newChatMemberCognome = "<b>Non disponibile.</b>";
}

if(isset($this->update['message']['new_chat_member']['username'])) {
  $this->newChatMemberUsername = $this->update['message']['new_chat_member']['username'];
} else {
  $this->newChatMemberUsername = "<b>Non disponibile.</b>";
}

if(isset($this->update['message']['left_chat_member'])) {
  $this->leftChatMember = $this->update['message']['left_chat_member'];
} else {
  $this->leftChatMember = '';
}

if(isset($this->update['message']['left_chat_member']['id'])) {
  $this->leftChatMemberID = $this->update['message']['left_chat_member']['id'];
}

if(isset($this->update['message']['left_chat_member']['first_name'])) {
  $this->leftChatMemberNome = $this->update['message']['left_chat_member']['first_name'];
} else {
  $this->leftChatMemberNome = "<b>Non disponibile.</b>";
}

if(isset($this->update['message']['left_chat_member']['last_name'])) {
  $this->leftChatMemberCognome = $this->update['message']['left_chat_member']['last_name'];
} else {
  $this->leftChatMemberCognome = "<b>Non disponibile.</b>";
}

if(isset($this->update['message']['left_chat_member']['username'])) {
  $this->leftChatMemberUsername = $this->update['message']['left_chat_member']['username'];
} else {
  $this->leftChatMemberUsername = "<b>Non disponibile.</b>";
}


// variabili gif

if(isset($this->update['message']['animation'])) {
  $this->gif = $this->update['message']['animation'];
}

if(isset($this->update['message']['animation']['duration'])) {
  $this->gifDuration = $this->update['message']['animation']['duration'];
}

if(isset($this->update['message']['animation']['width'])) {
  $this->gifWidth = $this->update['message']['animation']['width'];
}

if(isset($this->update['message']['animation']['height'])) {
  $this->gifHeight = $this->update['message']['animation']['height'];
}


// variabili sticker

if(isset($this->update['message']['sticker'])){
  $this->sticker = $this->update['message']['sticker'];
}

if(isset($this->update['message']['sticker']['emoji'])){
  $this->stickerEmoji = $this->update['message']['sticker']['emoji'];
}

if(isset($this->update['message']['sticker']['set_name'])){
  $this->stickerSetName = $this->update['message']['sticker']['set_name'];
}

if(isset($this->update['message']['sticker']['width'])){
  $this->stickerWidth = $this->update['message']['sticker']['width'];
}

if(isset($this->update['message']['sticker']['height'])){
  $this->stickerHeight = $this->update['message']['sticker']['height'];
}

if(isset($this->update['message']['sticker']['is_animated'])){
  $this->stickerIsAnimated = $this->update['message']['sticker']['is_animated'];
}


//variabili callback

if(isset($this->update['callback_query']['data'])) {
  $this->queryData = $this->update['callback_query']['data'];
} else {
  $this->queryData = '';
}

if(isset($this->update['callback_query']['from'])) {
  $this->queryUserID = $this->update['callback_query']['from']['id'];
}

if(isset($this->update['callback_query']['message']['chat']['id'])) {
  $this->queryChatID = $this->update['callback_query']['message']['chat']['id'];
}

if(isset($this->update['callback_query'])) {
  $this->queryID = $this->update['callback_query']['id'];
}

if(!empty($this->update['callback_query']['from']['first_name'])) {
  $this->queryNome = htmlspecialchars($this->update['callback_query']['from']['first_name']);
} else {
  $this->queryNome = "<b>Non disponibile.</b>";
}

if(!empty($this->update['callback_query']['from']['last_name'])) {
  $this->queryCognome = htmlspecialchars($this->update['callback_query']['from']['last_name']);
} else {
  $this->queryCognome = "<b>Non disponibile.</b>";
}

if(!empty($this->update['callback_query']['from']['username'])) {
  $this->queryUsername = $this->update['callback_query']['from']['username'];
} else {
  $this->queryUsername = "<b>Non disponibile.</b>";
}

if(isset($this->update['callback_query']['message']['message_id'])) {
  $this->queryMsgID = $this->update['callback_query']['message']['message_id'];
}

if(isset($this->update['callback_query']['message']['chat']['title'])) {
  $this->queryChatTitle = $this->update['callback_query']['message']['chat']['title'];
}

if(!empty($this->update['callback_query']['message']['chat']['username'])) {
  $this->queryChatUsername = $this->update['callback_query']['message']['chat']['username'];
} else {
  $this->queryChatUsername = "<b>Non disponibile.</b>";
}

if(isset($this->update['callback_query']['message']['chat']['type'])) {
  $this->queryChatType = $this->update['callback_query']['message']['chat']['type'];
}


//variabili reply

if(!empty($this->update['message']['reply_to_message']['text'])) {
  $this->replyText = $this->update['message']['reply_to_message']['text'];
} else {
  $this->replyText = '';
}

if(isset($this->update['message']['reply_to_message']['from']['id'])) {
  $this->replyUserID = $this->update['message']['reply_to_message']['from']['id'];
}

if(isset($this->update['message']['reply_to_message']['chat']['id'])) {
  $this->replyChatID = $this->update['message']['reply_to_message']['chat']['id'];
}

if(isset($this->update['message']['reply_to_message']['from']['first_name'])) {
  $this->replyNome = htmlspecialchars($this->update['message']['reply_to_message']['from']['first_name']);
}

if(!empty($this->update['message']['reply_to_message']['from']['last_name'])) {
  $this->replyCognome = htmlspecialchars($this->update['message']['reply_to_message']['from']['last_name']);
} else {
  $this->replyCognome = "<b>Non disponibile.</b>";
}

if(!empty($this->update['message']['reply_to_message']['from']['username'])) {
  $this->replyUsername = $this->update['message']['reply_to_message']['from']['username'];
} else {
  $this->replyUsername = "<b>Non disponibile.</b>";
}

if(isset($this->update['message']['reply_to_message']['message_id'])) {
  $this->replyMessageID = $this->update['message']['reply_to_message']['message_id'];
}

  }

}
