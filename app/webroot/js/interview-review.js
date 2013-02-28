
(function ($, app, undefined) {
    'use strict';
    var init,
        updateSections;

    updateSections = function () {
        $('ul.questions').each(function () {
            var $this = $(this);
            if ($this.find('li.question').length) {
                $this.addClass('has_some');
            } else {
                $this.removeClass('has_some');
            }
        });
    };

    init = function () {
        updateSections();
    };

    $(init);
}(jQuery, App));

