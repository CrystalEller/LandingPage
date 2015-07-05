(function ($) {
    $(document).ready(function () {
        var maxWorkChapterId = 0;
        var maxStudChapterId = 0;

        $('.work .chapter').each(function () {
            var id = parseInt($(this).data('id'), 10);
            maxWorkChapterId = id > maxWorkChapterId ? id : maxWorkChapterId;
        });

        $('.stud .chapter').each(function () {
            var id = parseInt($(this).data('id'), 10);
            maxStudChapterId = id > maxStudChapterId ? id : maxStudChapterId;
        });

        $(".sub-section").on("click", ".add-new-chapter a", function (e) {
            var wrapper = $(this).parents('.actions');
            var newSection = wrapper.parent().clone();

            wrapper.parent().after(newSection);

            if (newSection.hasClass('work')) {
                newSection.data('id', ++maxWorkChapterId);
            } else {
                newSection.data('id', ++maxStudChapterId);
            }

            newSection.find('input, textarea').each(function () {
                var id = parseInt(newSection.data('id'), 10);
                var inputElem = $(this);

                var newName = '';
                var name = inputElem.attr('name');
                var parts = $.grep(name.split(/[\[\]]/), function (elem) {
                    return elem !== '';
                });

                parts[2] = id;

                $.each(parts, function (index, value) {
                    if (index == 0) {
                        newName += value
                    } else {
                        newName += '[' + value + ']';
                    }
                });

                inputElem.attr('name', newName);
                inputElem.val('');
            });

            newSection.parent().find('.remove-chapter a').show();

            e.preventDefault();
        }).on("click", ".remove-chapter a", function (e) {
            var chapter = $(this).parents('.chapter');
            var chapterParent = chapter.parent();
            var numberOfChapters = chapterParent.find('.chapter').length;

            if (numberOfChapters > 1) {
                chapter.remove();
                if (--numberOfChapters < 2) {
                    chapterParent.find('.chapter .remove-chapter a').hide();
                }
            } else {
                chapterParent.find('.chapter .remove-chapter a').hide();
            }

            e.preventDefault();
        }).each(function () {
            if ($(this).find('.remove-chapter a').length > 1) {
                $(this).find('.remove-chapter a').show();
            } else {
                $(this).find('.remove-chapter a').hide();
            }
        });
    });
})(jQuery);