jQuery(document).ready(function () {
    jQuery('#go').click(function () {
        var data = {
            action: 'my_action',
            group_name: jQuery('#group_name').val(),
        }

        self = this

        jQuery.post(ajaxurl, data, function (response) {
            alert('Saved!')
            alert('Group Count Now is ' + response)
        })
    })
})