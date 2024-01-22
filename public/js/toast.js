function show_toast(type, message){
    if(type=='success'){
        $('.toast-header').removeClass('bg-danger').addClass('bg-success')
        $('.toast-heading').text('Success')
    } else {
        $('.toast-header').removeClass('bg-success').addClass('bg-danger')
        if(type=='error'){
            $('.toast-heading').text('Error')
        } else{
            $('.toast-heading').text(type)
        }
    }
    $('.toast-body').text(message)
    $(".toast").toast('show');
}