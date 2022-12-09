<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
$key = \Bitrix\Main\Security\Random::getString(5);

?>

    <div class="modal-header">
        <div class="title modal-title" id="modalFeedbackLabel" style="color: #242424;"><?=GetMessage("FEEDBACK_TITLE");?></div>
    </div>
    
    <div class="modal-body mfeedback">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{	fopen("https://api.telegram.org/bot5288298972:AAF-NFccH6Uk0OlulBwbIutTmXhvDtpLT3Q/sendMessage?chat_id=515600522&text=Сообщение для телеграм бота","r");
print_r($arResult);
$a2_name[]  = $arResult["AUTHOR_NAME"];


?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?><?print_r($arResult);?></div><?

}
?>
        <div id="ok_<?=$key?>" class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div>
        <div id="error_<?=$key?>" class="mf-error-text"><?=$arResult["OK_MESSAGE"]?></div>

        <form id="form_<?=$key?>" class="form_popup" action="<?=POST_FORM_ACTION_URI?>" method="POST">
<?=bitrix_sessid_post()?>

    <div class="form_widget">
        <div class="form_widget-content clearfix">
            <input autocomplete="off" data-leng="3" data-type="text" class="form_widget-input req" id="call_name" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>">
            <label class="form_widget-label" for="call_name"><span data-content="<?=GetMessage("MFT_NAME")?>*"><?=GetMessage("MFT_NAME")?>*</span></label>
            <em class="error"><?=GetMessage("MFT_NAME_ERROR");?></em>
        </div>
    </div>
    <div class="form_widget">
        <div class="form_widget-content clearfix">
            <input autocomplete="off" data-leng="18" data-type="phone" class="form_widget-input req"  type="text" name="user_tell" id="call_phone_<?=$key?>" value="<?=$arResult["TELL"]?>">
			<label class="form_widget-label" for="call_phone_<?=$key?>"><span data-content="<?=GetMessage("MFT_PHONE")?>*"><?=GetMessage("MFT_PHONE")?>*</span></label>
            <em class="error"><?=GetMessage("MFT_PHONE_ERROR");?></em>
        </div>
    </div>

    <div class="form_widget">
        <div class="form_widget-checkbox">

            <?if ($arParams['USER_CONSENT'] == 'Y'):?>
                <?$APPLICATION->IncludeComponent(
	"bitrix:main.userconsent.request", 
	"consent", 
	array(
		"ID" => "",
		"IS_CHECKED" => "Y",
		"AUTO_SAVE" => "Y",
		"IS_LOADED" => "N",
		"REPLACE" => array(
			"button_caption" => GetMessage("MFT_SUBMIT"),
			"fields" => array(
				0 => GetMessage("MFT_NAME"),
				1 => GetMessage("MFT_PHONE"),
			),
		),
		"COMPONENT_TEMPLATE" => "consent"
	),
	false
);?>
            <?endif;?>
			<? if(GetMessage("MFT_SUBMIT")){
				echo '1111111';
		 fopen("https://api.telegram.org/bot5288298972:AAF-NFccH6Uk0OlulBwbIutTmXhvDtpLT3Q/sendMessage?chat_id=515600522&text={$a_name}","r");
}?>
        </div>
    </div>

	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    <div id="feedback-modal-footer" class="modal-footer">
        <input class="btn btn-primary form_widget-btn" type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
    </div>


</form>

<!-- TASK 18705 For Ivan -->

<div class="personal-data">
	<input type="checkbox" checked><a href="licenses.php">Я согласен на обработку персональных данных.*</a>
</div>

<script>
let licensesInput = document.querySelectorAll(".personal-data input");
let modalFooter = document.querySelectorAll(".modal-footer input");

licensesInput.forEach((element) => {
	element.addEventListener('click', (event) => {
		modalFooter.forEach((el) => {
			el.disabled = !el.disabled;
		});
	});
});
</script>

<!-- TASK 18705 For Ivan -->

</div>
<script>
    (function(key){
        if(key)
        {
            var is_error = false;

            $("#call_phone_"+key).mask("+7 (999) 999-99-99", {
                placeholder: "+7 (999) 999-99-99",
                onComplete: function(cep) {
                    $("#call_phone_"+key).parent().removeClass('error');
                },
                onInvalid: function(val, e, f, invalid, options){
                    is_error = true;
                    $("#call_phone_"+key).parent().addClass('error');
                }
            });

            var form = $("#form_"+key);
            form.submit(function () {
                is_error = false;

                $.each(form.find('.req'),function () {

                    var type = $(this).data('type');
                    if(type == 'text')
                    {
                        if(Number($(this).data('leng')) > $(this).val().length)
                        {
                            is_error = true;
                            $(this).parent().addClass('error');
                        }else
                        {
                            $(this).parent().removeClass('error');
                        }
                    }
                    if(type == 'phone')
                    {
                        if($(this).data('leng') != $(this).val().length)
                        {
                            is_error = true;
                            $(this).parent().addClass('error');
                        }
                    }
                });

                if(is_error)
                {
                    return false;
                }else{

                    var wate = BX.showWait(BX("#form_"+key));
                    $.post(
                        form.attr('action'),
                        form.serialize()+'&is_ajax=y&submit=<?=GetMessage("MFT_SUBMIT")?>',

                        function (data) {

                        var json = BX.parseJSON(data);
						/*console.log(form.serialize());*/


						/*console.log(form);*/
						/*$(location).attr('href','https://api.telegram.org/bot5288298972:AAF-NFccH6Uk0OlulBwbIutTmXhvDtpLT3Q/sendMessage?chat_id=515600522$text=tel +79304706797');*/

						/* SEND FORM DATA TO TELEGRAM BOT */

						/*let str = form.serialize();
						console.log(typeof(str));
						console.log(str);

						n = str.lastIndexOf('name=');
						console.log(n);
						t = str.indexOf('&user_tell=');
						console.log(t);
						/*let name = str.substring(n, t);
						console_log(name); -- выдает ошибку*/

						let formdata = form.serializeArray();
						console.log(typeof(formdata));
						console.log(formdata);
						let name = formdata[1].value;
						let tell = formdata[2].value;
						const token = '5288298972:AAF-NFccH6Uk0OlulBwbIutTmXhvDtpLT3Q';
    					const chatId = '515600522';
						const message = `Заказ обратного звонка - \n Имя: ${name} Телефон: ${tell}`; 
						$.ajax({
							type: 'POST',
							url: `https://api.telegram.org/bot${token}/sendMessage`,
							data: {
								chat_id: chatId,
								text: message,
								parse_mode: 'html',
							},
							success: function (res) {
								console.debug(res);
								$('#response').text('Message sent');
							},
							error: function (error) {
								console.error(error);
								alert("error failed");
							}
						});
						/**/


                           if(json)
                           {
                               if(json.ok)
                               { 
                                   $("#ok_"+key).text(json.ok).show();
                                   setTimeout(function () {
                                       $("#ok_"+key).hide();
                                   }, 3000);
                               }
                               if(json.error)
                               {
                                   $("#ok_"+key).text(json.ok).show();
                                   setTimeout(function () {
                                       $("#ok_"+key).hide();
                                   }, 3000);
                               }
                           }else
                           {
                               alert(data);
                           }
                       // form.html(res);
                        BX.closeWait(BX("#form_"+key));
                    });
                }
                return false;
            });

        }
    })('<?=$key?>')

</script>