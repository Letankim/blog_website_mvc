function handleTogglePriority(id, priority, url) {
    switch (url) {
        case 1: 
            url = 'updatePriorityNav';
            break;
        case 2: 
            url = 'updatePriorityBanner';
            break;
        case 3: 
            url = 'updatePriorityPost';
            break;
        case 4: 
            url = 'updatePriorityAccount';
            break;
        case 5: 
            url = 'updatePriorityIntro';
            break;
        case 6: 
            url = 'updatePrioritySlogan';
            break;
        case 7: 
            url = 'updatePriorityAdvertise';
        break;
    }
    $.ajax({
        url: `./view/updateStatus/${url}.php`,
        type: 'POST',
        dataType: 'html',
        data: {
            id,
            priority
        }
    }).done(function (response) {
        $('table').html(response);
    });
}