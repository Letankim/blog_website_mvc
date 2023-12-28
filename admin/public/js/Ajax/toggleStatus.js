function handleToggleStatus(id, status, url) {
    switch (url) {
        case 1: 
            url = 'updateStatusNav';
            break;
        case 2: 
            url = 'updateStatusBanner';
            break;
        case 3: 
            url = 'updateStatusPost';
            break;
        case 4: 
            url = 'updateStatusAccount';
            break;
        case 5: 
            url = 'updateStatusIntro';
            break;
        case 6: 
            url = 'updateStatusSlogan';
            break;
        case 7: 
            url = 'updateStatusAdvertise';
            break;
        case 8: 
            url = 'updateStatusProduct';
        break;
    }
    $.ajax({
        url: `./view/updateStatus/${url}.php`,
        type: 'POST',
        dataType: 'html',
        data: {
            id,
            status
        }
    }).done(function (response) {
        $('table').html(response);
    });
}