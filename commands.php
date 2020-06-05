<?php

include __DIR__ . '/functions.php';
include __DIR__ . '/update.php';

$bot = new bot;
$update = new update;
$tastiera_inline = '[{"text":"LorenzoTM88","url":"t.me/Stonarsi"},{"text":"Tastiera 2","callback_data":"answerQuery"}],[{"text":"Popup","callback_data":"popup"},{"text":"Tastiera 3","callback_data":"tast3"}],[{"text":"Chiudi","callback_data":"chiudi"}]';
$tastiera_fisica = '["Tastiera 1"],["Tastiera 2","Tastiera 3"],["Tastiera 4"]';
$cmd = '[{"text":"ℹ️ Comandi del Bot","callback_data":"cmd"}]';
$config = json_decode(file_get_contents(__DIR__ . '/config.json'),TRUE);
$admins = $config['admins'];
$dev_mode = $config['dev_mode'];
$spoiler = $config['spoiler'];
$rand = mt_rand(1,1000);



if($dev_mode === false) {

    if($update->text == "/start") {
        $bot->sendMessage($update->chatID, "👋<b>Ciao ".$update->nome."</b>!\nQuesto è il framework per bot ufficiale di <a href='t.me/Stonarsi'>LorenzoTM88</a>", $cmd, "inline", true, "HTML");
    } elseif($update->queryData == "/start") {
        $bot->editMessageText($update->queryChatID, $update->queryMsgID, "👋<b>Ciao ".$update->queryNome."</b>!\nQuesto è il framework per bot ufficiale di <a href='t.me/Stonarsi'>LorenzoTM88</a>", $cmd, "inline", true, "HTML");
    }   

    if($update->text == "/rand") {
        $bot->sendMessage($update->chatID, "<b>Numero random:</b> $rand", '[{"text":"Numero Random","callback_data":"/rand"}]', "inline", true, "HTML");
    } elseif($update->queryData == "/rand") {
        $bot->editMessageText($update->queryChatID, $update->queryMsgID, "<b>Numero random:</b> $rand", '[{"text":"Numero Random","callback_data":"/rand"}]', "inline", true, "HTML");
    }

    if($update->text == "/tfisica") {
        $bot->sendMessage($update->chatID, "Tastiera fisica", $tastiera_fisica, "fisica", true, "HTML");
    }

    if($update->text == "/tinline") {
        $bot->sendMessage($update->chatID, "Tastiera inline", $tastiera_inline, "inline", true, "HTML");
    }

    if($update->text == "/freccia") {
        $bot->sendEmoji($update->chatID, "freccia");
    }
    
    if($update->text == "/basket") {
        $bot->sendEmoji($update->chatID, "basket");
    }

    if($update->text == "/dado") {
        $dado = $bot->sendEmoji($update->chatID, "dado");
    if($spoiler === true) {
        $value = $dado['result']['dice']['value'];
        $bot->sendMessage($update->chatID,"Spoiler: $value", null, null, true, "HTML");
    }
    }

    if(stripos($update->text, "/info")=== 0) {
    if(!empty($update->replyText)) {
    if($update->typeChat == "private") {
        $msg = "<b>Info Utente</b>\n<b>Nome</b> = ".$update->replyNome."\n<b>Cognome</b> = ".$update->replyCognome."\n<b>Username</b> = ".$update->replyUsername."\n<b>ID</b> = <code>".$update->replyUserID."</code>";
        $bot->sendMessage($update->chatID, $msg, null, null, true, "HTML");
    } elseif($update->typeChat == "supergroup") {
        $msg = "<b>Info Utente</b>\n<b>Nome</b> = ".$update->replyNome."\n<b>Cognome</b> = ".$update->replyCognome."\n<b>Username</b> = ".$update->replyUsername."\n<b>ID</b> = <code>".$update->replyUserID."</code>\n\n<b>Info Chat</b>\n<b>Titolo</b> = ".$update->titleGroup."\n<b>ChatID</b> = <code>".$update->chatID."</code>\n<b>Tipo Chat</b> = Supergruppo";
        $bot->sendMessage($update->chatID, $msg, null, null, true, "HTML");
    } elseif($update->typeChat == "group") {
        $msg = "<b>Info Utente</b>\n<b>Nome</b> = ".$update->replyNome."\n<b>Cognome</b> = ".$update->replyCognome."\n<b>Username</b> = ".$update->replyUsername."\n<b>ID</b> = <code>".$update->replyUserID."</code>\n\n<b>Info Chat</b>\n<b>Titolo</b> = ".$update->titleGroup."\n<b>ChatID</b> = <code>".$update->chatID."</code>\n<b>Tipo Chat</b> = Gruppo";
        $bot->sendMessage($update->chatID, $msg, null, null, true, "HTML");
    }
    } else {
        $bot->sendMessage($update->chatID,"<b>Usa il comando in reply a un messaggio.</b>", null, null, true, "HTML");
    }
    }

    if($update->text == "/link") {
    if($update->typeChat == "supergroup"){
        $link = $bot->exportChatInviteLink($update->chatID)['result'];
        $bot->sendMessage($update->chatID, "🔗 <b>Link:</b> $link", null, null, true, "HTML");
    } elseif($update->typeChat == "private") {
        $bot->sendMessage($update->chatID, "<b>Questo comando funziona solo nei supergruppi.</b>", null, null, true, "HTML");
    }
    }

    if(stripos($update->text, "/admin")=== 0 and in_array($update->userID, $admins)) {
        $bot->sendMessage($update->chatID, "Hey, ".$update->nome." è un admin del bot! ❤️", null, null, true, "HTML");
    }

    if(stripos($update->text, "/say")=== 0) {
    if(!empty(explode(" ", $update->text, 2)[1])) {
        $msg = explode(" ", $update->text, 2)[1];
        $bot->deleteMessage($update->chatID, $update->messageID);
        $bot->sendMessage($update->chatID, $msg, null, null, true, "HTML");     
    } else {
        $bot->deleteMessage($update->chatID, $update->messageID);
    }
    }

    if($update->queryData == "answerQuery") {
        $bot->answerCallbackQuery($update->queryID, "Ciao ".$update->queryNome);
    }

    if($update->queryData == "tast3") {
        $bot->editMessageText($update->queryChatID, $update->queryMsgID, "Ciao ".$update->queryNome."!", '[{"text":"🔙 Torna Indietro","callback_data":"tornaindietro"}]', "inline", true, "HTML");
    }

    if($update->queryData == "tornaindietro") {
        $bot->editMessageText($update->queryChatID, $update->queryMsgID, "Tastiera inline", $tastiera_inline, "inline", true, "HTML");
    }

    if($update->queryData == "cmd") {
        $bot->editMessageText($update->queryChatID, $update->queryMsgID, "<b>Comandi del Bot</b>\n/tfisica = <b>Tastiera Fisica</b>\n/tinline = <b>Tastiera Inline</b>\n/rand = <b>Numero Random da 1 a 1000</b>\n/dado = <b>Manda un dado</b>\n/freccia = <b>Manda una freccia</b>\n/basket = <b>Lancia una palla da basket</b>\n/info = <b>Info Utente (solo in reply)</b>\n/admin = <b>Comando solo per admin del bot</b>\n/link = <b>Manda il link del gruppo (funzionante solo nei gruppi)</b>\n/say = <b>Per far inviare un messaggio al bot</b>", '[{"text":"🔙 Torna indietro","callback_data":"/start"}]', "inline", true, "HTML");
    }

    if($update->queryData == "chiudi") {
        $bot->deleteMessage($update->queryChatID, $update->queryMsgID);
    }

    if($update->queryData == "popup") {
        $bot->answerCallbackQuery($update->queryID,"Ciao!",true);
    }

} elseif($dev_mode === true) {

    if($update->text == "/start") {
        $bot->sendMessage($update->userID, "<b>Hey ".$update->nome."</b>, il bot è attualmente in manutenzione :(", null, null, true, "HTML");
    } 

}
