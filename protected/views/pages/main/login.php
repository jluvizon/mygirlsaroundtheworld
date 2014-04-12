<script>
var fbBtnLoginClicked = false;
window.fbAsyncInit = function () {
    FB.init({
        appId: '652264771511339',
        status: true, // check login status
        cookie: true, // enable cookies to allow the server to access the session
        xfbml: true  // parse XFBML
    });

    FB.Event.subscribe('auth.authResponseChange', function (response) {
        if (response.status === 'connected') {                    
            CheckFBLoginStatus();
        } else if (response.status === 'not_authorized') {
            FB.login();
        } else {
            FB.login();
        }
    });
};

(function (d) {
    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if (d.getElementById(id)) { return; }
    js = d.createElement('script'); js.id = id; js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    ref.parentNode.insertBefore(js, ref);
}(document));

function fbLoginClick() {
    fbBtnLoginClicked = true;
    CheckFBLoginStatus();
}

function CheckFBLoginStatus() {
    FB.getLoginStatus(function (response) {
        debugger;
        if (response.status === 'connected') {
            debugger;
            onFbloginSuccess();
        } else {
            FB.login();
        }
    });
}

function onFbloginSuccess() {
    FB.api('/me', function (response) {
        if (response.error != null) {
            FB.login();
        }
        else {                    
            if (fbBtnLoginClicked) {                        
                alert("login success, and user have approvedour app");
                fbBtnLoginClicked = false;
            }
        }
    });
}
</script>

<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
    <?php
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>
    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>
    <div class="row">
        ESQUECI A SENHA
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Login'); ?>
        <BR /><BR /><BR /><BR />
    </div>
    
    <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="true" data-auto-logout-link="true"></div>
    
    <!--<div class="fb-login-button" onclick="fbLoginClick();" perms="email">TESTE</div>-->

    <?php $this->endWidget(); ?>
</div>