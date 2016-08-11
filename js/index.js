$('.form').find('input, textarea').on('keyup blur focus', function(e) {
    var $this = $(this),
        label = $this.prev('label');
    if (e.type === 'keyup') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
        if ($this.val() === '') {
            label.removeClass('active highlight');
        } else {
            label.removeClass('highlight');
        }
    } else if (e.type === 'focus') {
        if ($this.val() === '') {
            label.removeClass('highlight');
        } else if ($this.val() !== '') {
            label.addClass('highlight');
        }
    }
});
$('.tab a').on('click', function(e) {
    e.preventDefault();
    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');
    target = $(this).attr('href');
    $('.tab-content > div').not(target).hide();
    $(target).fadeIn(600);
});
$("#formSignUp").submit(function() {
    var str = $("#formSignUp").serialize();
    $.ajax({
        type: 'POST',
        url: '/new/actions/register.php',
        data: str,
        encode: true
    }).success(function(data) {
        var decodeData = jQuery.parseJSON(data);
        if (jQuery.parseJSON(data) != true) {
            $('.feedbackSignUp').html(decodeData);
        } else {
            $('.feedbackSignUp').html("Successful Login");
			$(location).attr('href', '/new/home.php');

           // $(location).attr('href', '/new/phone.php');
        }
    });
    event.preventDefault();
});
$("#formLogin").submit(function() {
    var str = $("#formLogin").serialize();
    $.ajax({
        type: 'POST',
        url: '/new/actions/login.php',
        data: str,
        encode: true
    }).success(function(data) {
        if (jQuery.parseJSON(data) != true) {
            $('.feedbackLogin').html(
                "Incorrect Login Credentials");
        } else {
            $('.feedbackLogin').html("Successful Login");
            $(location).attr('href', '/new/home.php');
        }
    });
    event.preventDefault();
});