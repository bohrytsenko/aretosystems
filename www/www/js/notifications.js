function NotificationWarning(title, html)
{
    new PNotify({
        title: title,
        text: html,
        icon: 'icon-warning2',
        type: 'warning',
        delay: 8000,
        width: "350px"
    });
}
function NotificationsRemove() {
    $("div.alert").remove();
}
function NotificationErrorFixed(divToAttach, html) {
    $("div.alert").remove();
    $(divToAttach).append('<div class="alert alert-danger alert-styled-left alert-bordered"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">Alert! </span>' + html + '</div>');
}
function NotificationWarningFixed(divToAttach, html) {
    $("div.alert").remove();
    $(divToAttach).append('<div class="alert alert-warning alert-styled-left"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">Warning! </span>' + html + '</div>');
}
function NotificationSuccessFixed(divToAttach) {
    NotificationSuccessFixed2(divToAttach, "Operation completed");
}
function NotificationSuccessFixed2(divToAttach, message) {
    $("div.alert").remove();
    $(divToAttach).append('<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">Success! </span>'+ message +'</div>');
}
function NotificationSessionTimeout(divToAttach) {
    $("div.alert").remove();
    $(divToAttach).append('<div class="alert alert-primary alert-styled-left"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button><span class="text-semibold">Timeout! </span>For security reasons kindly sign in <a href="/signin">here</a></div>');
}

/*
									<div class="alert alert-info alert-styled-left alert-bordered">
										<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
										<span class="text-semibold">Heads up!</span> This alert needs your attention, but it's not <a href="#" class="alert-link">super important</a>.
								    </div>
*/
function NotificationError(title, html) {
    new PNotify({
        title: title,
        text: html,
        icon: 'icon-cross3',
        type: 'error',
        delay: 8000,
    });
}


function NotificationSuccess(title, html) {
    new PNotify({
        title: title,
        text: html,
        icon: 'icon-checkmark3',
        type: 'success',
        delay: 8000
    });
}

function ShowMessage(title, html) {
    swal({
        title: title,
        text: html,
        html: true,
        confirmButtonColor: "#2196F3"
    });
}
