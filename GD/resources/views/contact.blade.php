<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="css/normalize.css" />
    <link href="css/style.css" />
    <title>form</title>
</head>
<body>
<div class="container">
    <div class="widget__validation_form">
        <form action="/submit" method="POST" class="form">
            <label class="label__valid" for="name">Как вас зовут?</label>
            <input
                required
                type="text"
                name="name"
                placeholder="Имя*"
                class="input"
                data-validate-field="name"
            />
            <label class="label__valid" for="mobile_number">Укажите ваш телефон</label>
            <input
                required
                type="text"
                name="mobile_number"
                placeholder="Телефон*"
                class="input"
                data-validate-field="mobile_number"
            />
            <label class="label__valid" for="email">Укажите ваш e-mail</label>
            <input
                required
                type="email"
                name="email"
                placeholder="E-mail*"
                class="input"
                data-validate-field="mail"
            />

            <div class="footer-btn">
                <button class="orange-btn" type="submit">Заказать</button>
            </div>
        </form>
    </div>
</div>
<script>
    function submitForm() {
        let name = $("input[name=name]").val();
        let email = $("input[name=email]").val();
        let subject = $("input[name=subject]").val();
        let mobile_number = $("input[name=mobile_number]").val();
        let message = $("textarea[name=message]").val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/contact",
            type:"POST",
            data:{
                name:name,
                email:email,
                subject:subject,
                mobile_number:mobile_number,
                message:message,
                _token: _token
            },
            success:function(response) {
                console.log(response);
                if(response) {
                    $('.success').text(response.success);
                    $("#contactform")[0].reset();
                }
            },
            error:function (response) {
                console.log(response.responseJSON.errors);
                $('#nameError').text(response.responseJSON.errors.name);
                $('#emailError').text(response.responseJSON.errors.email);
                $('#subjectError').text(response.responseJSON.errors.subject);
                $('#mobileNumberError').text(response.responseJSON.errors.mobile_number);
                $('#messageError').text(response.responseJSON.errors.message);
            }
        });

    }
</script>
</body>
</html>
