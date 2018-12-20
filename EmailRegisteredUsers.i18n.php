<?php
/**
 * Extension: EmailRegisteredUsers
 *
 * Intellectual Reserve, Inc.(c) 2008
 *
 * Started: 04-29-2008 (Based on EmailUsers by Andy Cook)
 *
 * @file
 * @author Don B. Stringham (stringhamdb@ldschurch.org)
 */

$messages = array(
	'de' =>
		array('emailregisteredusers' => 'E-Mail an registrierte Benutzer schicken',
			'ea_heading' => "=>=>=> Eine E-Mail an die Benutzer Ihres Wikis schicken. =>=>=>\nVerwenden Sie das unten stehende Formular, um an die ausgew�hlten Benutzer oder Gruppen gleichzeitig eine E-Mail zu schicken.",
			'ea_norecipients' => "<hr><h2>Keine g�ltigen E-Mail-Adressen gefunden!</h2>",
			'ea_noaddlrecipients' => "<hr><h2>Keine weiteren E-Mail-Adressen gefunden!</h2>",
			'ea_listrecipients' => "<hr><h2> Liste: $1 Empf�nger </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> Liste: $1 weitere Empf�nger </h2><ul>",
			'ea_error' => "'''Fehler bei E-Mail-Versand:''' ''$1''",
			'ea_sent' => "Ihre E-Mail wurde an $1 Empf�nger verschickt.",
			'ea_selectrecipients' => "<b>Empf�nger ausw�hlen</b>",
			'ea_compose' => "<b>Mitteilung verfassen</b>",
			'ea_selectlist' => "An weitere Empf�nger schicken (Adressen mit Semikolon [;] voneinander abtrennen) <b>Kein Leerschlag</b>:",
			'ea_show' => "Empf�nger anzeigen",
			'ea_send' => "Abschicken!",
			'ea_subject' => "Geben Sie f�r die E-Mail einen Betreff ein:",
			'ea_header' => "Nachrichtentext Ihrer E-Mail:",
		),
	'en' =>
		array('emailregisteredusers' => 'Email Registered Users',
			'ea_heading' => "=== Send an email to users of your Wiki. ===\nUse the form below to send a mass email to selected users or groups.",
			'ea_norecipients' => "<hr><h2>No valid email addresses found!</h2>",
			'ea_noaddlrecipients' => "<hr><h2>No additional email addresses found!</h2>",
			'ea_listrecipients' => "<hr><h2> List of $1 recipients </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> List of $1 additional recipients </h2><ul>",
			'ea_error' => "'''Error sending email:''' ''$1''",
			'ea_sent' => "Your email has successfully been sent to $1 recipient(s).",
			'ea_selectrecipients' => "<b>Select recipients</b>",
			'ea_compose' => "<b>Compose content</b>",
			'ea_selectlist' => "Send to additional recipients (separate addresses with a semicolon(;) <b>No Spaces</b>:",
			'ea_show' => "Show recipients",
			'ea_send' => "Send!",
			'ea_subject' => "Enter a subject line for the email:",
			'ea_header' => "Message body of your email:",
		),
	'es' =>
		array('emailregisteredusers' => 'Enviar correo electr�nico a los usuarios inscritos',
			'ea_heading' => "=== Enviar un correo electr�nico a los usuarios de su Wiki. ===\nUse el formulario de abajo para enviar un correo electr�nico masivo a determinados usuarious o grupos.",
			'ea_norecipients' => "<hr><h2>�Direcci�n de correo electr�nico no v�lida!</h2>",
			'ea_noaddlrecipients' => "<hr><h2>�No hay otras direcciones de correo electr�nico!</h2>",
			'ea_listrecipients' => "<hr><h2> Lista de destinatarios de $1 </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> Lista de destinatarios adicionales de $1 </h2><ul>",
			'ea_error' => "'''Error al enviar correo electr�nico:''' ''$1''",
			'ea_sent' => "Se ha enviado satisfactoriamente su correo electr�nico al/los destinatario(s) de $1.",
			'ea_selectrecipients' => "<b>Seleccionar destinatarios</b>",
			'ea_compose' => "<b>Redactar el contenido</b>",
			'ea_selectlist' => "Enviar a destinatarios adicionales (separe las direcciones de correo electr�nico con punto y coma(;) <b>Sin espacios</b>:",
			'ea_show' => "Mostrar destinatarios",
			'ea_send' => "Enviar!",
			'ea_subject' => "Ingrese un asunto para el correo electr�nico:",
			'ea_header' => "Cuerpo del mensaje del correo electr�nico:",
		),
	'fr' =>
		array('emailregisteredusers' => 'Utilisateurs dont l�adresse �lectronique est enregistr�e',
			'ea_heading' => "=== Envoyer un courriel aux utilisateurs de votre Wiki. =>=>=>\nUtiliser le formulaire ci-dessous pour envoyer un courriel circulaire aux utilisateurs ou groupes s�lectionn�s.",
			'ea_norecipients' => "<hr><h2>Aucune adresse �lectronique valide trouv�e !</h2>",
			'ea_noaddlrecipients' => "<hr><h2>Aucune adresse �lectronique suppl�mentaire trouv�e !</h2>",
			'ea_listrecipients' => "<hr><h2> Liste de $1 destinataires </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> Liste de $1 destinataires suppl�mentaires </h2><ul>",
			'ea_error' => "'''Erreur d�envoi de courriel :''' ''$1''",
			'ea_sent' => "Votre courriel a �t� envoy� � $1 destinataire(s).",
			'ea_selectrecipients' => "<b>S�lectionner des b�n�ficiaires</b>",
			'ea_compose' => "<b>R�diger le contenu</b>",
			'ea_selectlist' => "Envoyer � d�autres destinataires (s�parer les adresses par des points-virgules (;) <b>Sans espace</b>:",
			'ea_show' => "Montrer les destinataires",
			'ea_send' => "Envoyer !",
			'ea_subject' => "Saisir l�objet du courriel :",
			'ea_header' => "Texte de votre courriel :",
		),
	'it' =>
		array('emailregisteredusers' => 'Utenti registrati con e-mail',
			'ea_heading' => "=== Invia un�e-mail agli utenti del tuo Wiki. =>=>=>\nUtilizza il modulo sottostante per inviare un�e-mail di massa a utenti o gruppi selezionati.",
			'ea_norecipients' => "<hr><h2>Non si � trovato nessun indirizzo e-mail valido!</h2>",
			'ea_noaddlrecipients' => "<hr><h2>Non si � trovato nessun ulteriore indirizzo e-mail!</h2>",
			'ea_listrecipients' => "<hr><h2> Elenco di $1 destinatari </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> Elenco di ulteriori $1destinatari </h2><ul>",
			'ea_error' => "'''Errore nell�invio dell�e-mail:''' ''$1''",
			'ea_sent' => "La tua e-mail � stata spedita con successo a $1 destinatari.",
			'ea_selectrecipients' => "<b>Seleziona destinatari</b>",
			'ea_compose' => "<b>Componi contenuto</b>",
			'ea_selectlist' => "Invia a ulteriori destinatari (separa gli indirizzi col punto e virgola(;) <b>Nessuno spazio</b>:",
			'ea_show' => "Mostra destinatari",
			'ea_send' => "Invia!",
			'ea_subject' => "Inserisci l�oggetto dell�e-mail:",
			'ea_header' => "Testo dell�e-mail:",
		),
	'ja' =>
		array('emailregisteredusers' => '電子メール登録済みユーザー',
			'ea_heading' => "=>=>=> ウィキのユーザーに電子メールを送信してください。 =>=>=>\n選択したユーザーまたはグループに一括メールを送信するには，以下のフォームを使ってください。",
			'ea_norecipients' => "<hr><h2>無効な電子メールアドレスは見つかりませんでした。</h2>",
			'ea_noaddlrecipients' => "<hr><h2>追加の電子メールアドレスは見つかりませんでした。</h2>",
			'ea_listrecipients' => "<hr><h2> $1受信者のリスト </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> $1追加の受信者のリスト </h2><ul>",
			'ea_error' => "'''電子メール送信エラー：''' ''$1''",
			'ea_sent' => "電子メールは無事に$1受信者に送られました。",
			'ea_selectrecipients' => "<b>受信者の選択</b>",
			'ea_compose' => "<b>内容の作成</b>",
			'ea_selectlist' => "追加の受信者に送信（セミコロン〔；〕でアドレスを区切ってください。） <b>空白なし</b>:",
			'ea_show' => "受信者の表示",
			'ea_send' => "送信",
			'ea_subject' => "電子メールの件名を入力してください：",
			'ea_header' => "電子メールの本文：",
		),
	'ko' =>
		array('emailregisteredusers' => '이메일 등록 사용자',
			'ea_heading' => "=>=>=> 귀하의 위키 사용자에게 이메일을 보냅니다. =>=>=>\n선택한 사용자 또는 그룹에게 단체 이메일을 보내기 위해 다음 양식을 사용합니다.",
			'ea_norecipients' => "<hr><h2>유효한 이메일 주소를 찾지 못했습니다!</h2>",
			'ea_noaddlrecipients' => "<hr><h2>추가 이메일 주소를 찾지 못했습니다!</h2>",
			'ea_listrecipients' => "<hr><h2> $1 달러 수령인 목록 </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> $1 달러 추가 수령인 목록 </h2><ul>",
			'ea_error' => "'''이메일 전송 오류:''' ''$1''",
			'ea_sent' => "귀하의 이메일이 $1 달러 수령인들에게 성공적으로 전송되었습니다.",
			'ea_selectrecipients' => "<b>수령인 선택</b>",
			'ea_compose' => "<b>내용 작성</b>",
			'ea_selectlist' => "추가 수령인에게 전송(세미콜론(;)으로 주소 분리) <b>빈칸 없음</b>:",
			'ea_show' => "수령인 보이기",
			'ea_send' => "전송!",
			'ea_subject' => "이메일을 위한 제목줄 입력:",
			'ea_header' => "귀하 이메일의 메시지 본문:",
		),
	'pt' =>
		array('emailregisteredusers' => 'E-mail para Usuários Cadastrados',
			'ea_heading' => "=== Envie um e-mail para os usuários do seu Wiki. =>=>=>\nUse o formulário seguinte para enviar um e-mail para usuários selecionados ou para grupos.",
			'ea_norecipients' => "<hr><h2>Nenhum e-mail válido foi encontrado!</h2>",
			'ea_noaddlrecipients' => "<hr><h2>Nenhum e-mail adicional foi encontrado!</h2>",
			'ea_listrecipients' => "<hr><h2> Lista de $1 destinatários </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> Lista de $1 destinatários adicionados </h2><ul>",
			'ea_error' => "'''Erro ao enviar o e-mail:''' ''$1''",
			'ea_sent' => "Seu e-mail foi enviado com sucesso para $1 destinatário(s).",
			'ea_selectrecipients' => "<b>Selecione os destinatários</b>",
			'ea_compose' => "<b>Escreva o conteúdo</b>",
			'ea_selectlist' => "Envie para os destinatários adicionados (separe os endereços com ponto e vírgula(;) <b>Sem espaços</b>:",
			'ea_show' => "Mostrar os destinatários",
			'ea_send' => "Enviar!",
			'ea_subject' => "Digite em uma linha o assunto do e-mail:",
			'ea_header' => "Corpo da mensagem de seu e-mail:",
		),
	'ru' =>
		array('emailregisteredusers' => 'Отправить электронную почту зарегистрированным пользователям',
			'ea_heading' => "=== Отправить электронную почту пользователям вашей Wiki. =>=>=>\nВоспользуйтесь формой ниже для массовой рассылки электронной почты выбранным пользователям или группам.",
			'ea_norecipients' => "<hr><h2>Не найдено корректных адресов электронной почты.</h2>",
			'ea_noaddlrecipients' => "<hr><h2>Не найдено дополнительных адресов электронной почты</h2>",
			'ea_listrecipients' => "<hr><h2> Список из $1 адресатов </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> Список из $1 дополнительных адресатов </h2><ul>",
			'ea_error' => "'''Ошибка при отправке электронной почты:''' ''$1''",
			'ea_sent' => "Ваша электронная почта успешно отправлена $1 адресатам.",
			'ea_selectrecipients' => "<b>Выберите адресатов</b>",
			'ea_compose' => "<b>Скомбинировать контент</b>",
			'ea_selectlist' => "Отправить дополнительным адресатам (адреса разделяются точкой с запятой (;) <b>Без пробелов</b>:",
			'ea_show' => "Показать адресатов",
			'ea_send' => "Отправить!",
			'ea_subject' => "Укажите тему письма:",
			'ea_header' => "Текст вашего письма:",
		),
	'sv' =>
		array('emailregisteredusers' => 'Skicka e-postmeddelade till registrerade användare',
			'ea_heading' => "=>=>=> Skicka ett e-postmeddelande till dem som använder din Wiki. =>=>=>\nAnvänd blanketten nedan för att skicka ett massmeddelande till valda användare eller grupper.",
			'ea_norecipients' => "<hr><h2>Ingen giltig e-postadress hittades!</h2>",
			'ea_noaddlrecipients' => "<hr><h2>Inga ytterligare e-postadresser hittades!</h2>",
			'ea_listrecipients' => "<hr><h2> Lista med $1 mottagare </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> Lista med $1 ytterligare mottagare </h2><ul>",
			'ea_error' => "'''Det gick inte att skicka e-postmeddelandet:''' ''$1''",
			'ea_sent' => "Ditt e-postmeddelande har skickats till $1 mottagare.",
			'ea_selectrecipients' => "<b>Välj mottagare</b>",
			'ea_compose' => "<b>Skriv innehåll</b>",
			'ea_selectlist' => "Skicka till ytterligare mottagare (separera adresserna med semikolon [;], <b>inga mellanrum</b>:",
			'ea_show' => "Visa mottagare",
			'ea_send' => "Skicka!",
			'ea_subject' => "Ange ett ämne för e-postmeddelandet:",
			'ea_header' => "Meddelandetext:",
		),
	'zh' =>
		array('emailregisteredusers' => '以電子郵件寄給註冊的用戶',
			'ea_heading' => "=== 將電子郵件寄給你的維基用戶。 ===\n使用下表將群組郵件寄給選定的用戶或群組。",
			'ea_norecipients' => "<hr><h2>找不到有效的電子郵件地址！</h2>",
			'ea_noaddlrecipients' => "<hr><h2>找不到其他的電子郵件地址！</h2>",
			'ea_listrecipients' => "<hr><h2> $1位收件人名單 </h2><ul>",
			'ea_listaddlrecipients' => "<hr><h2> $1位其他收件人名單 </h2><ul>",
			'ea_error' => "'''電子郵件寄送錯誤：''' ''$1''",
			'ea_sent' => "你的電子郵件已成功寄給$1位收件人。",
			'ea_selectrecipients' => "<b>選取收件人</b>",
			'ea_compose' => "<b>撰寫內容</b>",
			'ea_selectlist' => "寄給其他收件人（以分號（；）將地址分開） <b>不留空格</b>:",
			'ea_show' => "顯示收件人",
			'ea_send' => "傳送！",
			'ea_subject' => "輸入電子郵件的主旨：",
			'ea_header' => "電子郵件的正文：",
		),
);