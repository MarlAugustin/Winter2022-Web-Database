jQuery(document).ready(function () {
    var update_texts = function () {
        $('body').i18n();
    };
    $.i18n().load({
        'fr': 'Contenu/i18n/fr.json',
        'en': 'Contenu/i18n/en.json',
        'cre': 'Contenu/i18n/cre.json'
    }).done(function () {
        update_texts();
        $('.lang-switch').click(function (e) {
            e.preventDefault();
            $.i18n().locale = $(this).data('locale');
            update_texts();
        });
    });
});
