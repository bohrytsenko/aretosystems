
$(function () {
	$('#txtEmail2').bind("cut copy paste",function(e) {
     e.preventDefault();
	});
	$('#txtEmail').bind("cut copy paste",function(e) {
     e.preventDefault();
	});
    $(".selectpicker").selectpicker();
    if ($(window).scrollTop() > 50) {
        $('.one-page-menu').addClass("stiky_menu");
        $("header.header-2").find(".navbar.navbar-default").find(".container-fluid").addClass("container");
        $("header.header-2").find(".navbar.navbar-default").find(".container-fluid").removeClass("container-fluid");
    } else {
        $('.one-page-menu').removeClass("stiky_menu");
        $("header.header-2").find(".navbar.navbar-default").find(".container").addClass("container-fluid");
        $("header.header-2").find(".navbar.navbar-default").find(".container").removeClass("container");
    }

    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 50) {
            $('.one-page-menu').addClass("stiky_menu");
            $("header.header-2").find(".navbar.navbar-default").find(".container-fluid").addClass("container");
            $("header.header-2").find(".navbar.navbar-default").find(".container-fluid").removeClass("container-fluid");
        } else {
            $('.one-page-menu').removeClass("stiky_menu");
            $("header.header-2").find(".navbar.navbar-default").find(".container").addClass("container-fluid");
            $("header.header-2").find(".navbar.navbar-default").find(".container").removeClass("container");
        }
    });

});

function Signup() {
    if ($('#txtEmail').val() != $('#txtEmail2').val()){
		NotificationErrorFixed($('#divMessage'), 'Emails do not match, please check');
		return false;
	}
	else
	{
		return true;
	}
}

