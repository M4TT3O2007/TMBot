<?php

include __DIR__ . '/functions.php';
include __DIR__ . '/update.php';

$bot = new bot;
$tastierainline = '[{"text":"LorenzoTM88","url":"t.me/LorenzoTM88"},{"text":"Tastiera 2","callback_data":"answerQuery"}],[{"text":"Tastiera 3","callback_data":"tast3"}]';
$tastierafisica = '["Tastiera 1"],["Tastiera 2","Tastiera 3"],["Tastiera 4"]';
$cmd = '[{"text":"ℹ️ Comandi del Bot","callback_data":"cmd"}]';
$tornaindietro = '[{"text":"🔙 Torna Indietro","callback_data":"tornaindietro"}]';
$config = json_decode(file_get_contents(__DIR__ . '/config.json'),TRUE);
$admins = $config['admins'];
$rand = mt_rand(1,1000);


if($config['dev_mode'] === false) {

    if($text == "/start") {
        $bot->sendMessage($chatID, "👋<b>Ciao $nome</b>!\nQuesto è il framework per bot ufficiale di <a href='t.me/LorenzoTM88'>LorenzoTM88</a>!\nClicca il button qua sotto per vedere cosa faccio!",$cmd,"inline");
    }

    if($text == "/rand") {
        $bot->sendMessage($chatID, "<b>Numero random:</b> $rand");
    }

    if($text == "/tfisica") {
        $bot->sendMessage($chatID, "Tastiera fisica",$tastierafisica,"fisica");
    }

    if($text == "/tinline") {
        $bot->sendMessage($chatID, "Tastiera inline",$tastierainline,"inline");
    }

    if($text == "/freccia") {
        $bot->sendEmoji($chatID, "freccia");
    }

    if($text == "/dado") {
        $dado = $bot->sendEmoji($chatID, "dado");
    if($config['spoiler'] === true){
        $value = $dado['result']['dice']['value'];
        $bot->sendMessage($chatID,"Spoiler: $value");
    }
    }

    if(stripos($text,"/info")=== 0) {
    if(!empty($replyText)) {
    if($typeChat == "private") {
        $msg = "<b>Info Utente</b>\n<b>Nome</b> = $replyNome\n<b>Cognome</b> = $replyCognome\n<b>Username</b> = $replyUsername\n<b>ID</b> = <code>$replyUserID</code>";
        $bot->sendMessage($chatID, $msg);
    }
    if($typeChat == "supergroup") {
        $msg = "<b>Info Utente</b>\n<b>Nome</b> = $replyNome\n<b>Cognome</b> = $replyCognome\n<b>Username</b> = $replyUsername\n<b>ID</b> = <code>$replyUserID</code>\n\n<b>Info Chat</b>\n<b>Titolo</b> = $titleGroup\n<b>ChatID</b> = <code>$chatID</code>\n<b>Tipo Chat</b> = Supergruppo";
        $bot->sendMessage($chatID, $msg);
    }
    if($typeChat == "group") {
        $msg = "<b>Info Utente</b>\n<b>Nome</b> = $replyNome\n<b>Cognome</b> = $replyCognome\n<b>Username</b> = $replyUsername\n<b>ID</b> = <code>$replyUserID</code>\n\n<b>Info Chat</b>\n<b>Titolo</b> = $titleGroup\n<b>ChatID</b> = <code>$chatID</code>\n<b>Tipo Chat</b> = Gruppo";
        $bot->sendMessage($chatID, $msg);
    }
    } else {
        $bot->sendMessage($chatID,"<b>Usa il comando in reply a un messaggio.</b>");
    }
    }

    if($text == "/link" and $typeChat == "supergroup") {
        $link = $bot->exportChatInviteLink($chatID);
        $links = $link['result'];
        $bot->sendMessage($chatID, "<b>Link:</b> $links");
    }
    
    if(stripos($text,"/admin")=== 0 and in_array($userID,$admins)) {
        $bot->sendMessage($chatID, "Hey, $nome è un admin del bot! ❤️");
    }

    if(stripos($text,"/say")=== 0) {
    if(!empty(explode(" ",$text,2)[1])) {
        $mess = explode(" ",$text,2)[1];
        $bot->deleteMessage($chatID, $messageID);
        $bot->sendMessage($chatID, $mess);     
    } else {
        $bot->deleteMessage($chatID, $messageID);
    }
    }

    if($queryData == "answerQuery") {
        $bot->answerCallbackQuery($queryID, "Ciao $queryNome!");
    }

    if($queryData == "tast3") {
        $bot->editMessageText($queryChatID, $queryMsgID, "Ciao $queryNome!", $tornaindietro, "inline");
    }

    if($queryData == "tornaindietro") {
        $bot->editMessageText($queryChatID, $queryMsgID, "Tastiera inline", $tastierainline, "inline");
    }

    if($queryData == "cmd") {
        $bot->editMessageText($queryChatID, $queryMsgID, "<b>Comandi del Bot</b>\n/tfisica = <b>Tastiera Fisica</b>\n/tinline = <b>Tastiera Inline</b>\n/rand = <b>Numero Random da 1 a 1000</b>\n/dado = <b>Manda un dado</b>\n/freccia = <b>Manda una freccia</b>\n/info = <b>Info Utente (solo in reply)</b>\n/admin = <b>Comando solo per admin del bot</b>\n/link = <b>Manda il link del gruppo (funzionante solo nei gruppi)</b>\n/say = <b>Per far inviare un messaggio al bot</b>");
    }

}

if($config['dev_mode'] === true) {

    if($text == "/start") {
        $bot->sendMessage($userID, "<b>Hey $name</b>, il bot è attualmente in manutenzione :(");
    }

}
