
(function () {
    'use strict';

    var editors = new Map();

    function initialise() {
        if (!window.ClassicEditor) {
            console.error('CKEditor could not be loaded.');
            return;
        }

        document.querySelectorAll('textarea').forEach(function (textarea) {
            if (
                editors.has(textarea) ||
                textarea.closest('[data-no-rich-text]')
            ) {
                return;
            }

            ClassicEditor.create(textarea, {
                toolbar: [
                    'sourceEditing',
                    '|',
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    '|',
                    'undo',
                    'redo'
                ]
            }).then(function (editor) {
                editors.set(textarea, editor);

                editor.model.document.on('change:data', function () {
                    editor.updateSourceElement();
                });
            }).catch(function (error) {
                console.error(
                    'CKEditor initialisation failed.',
                    error
                );
            });
        });
    }

    window.RichTextEditors = {
        initialise: initialise,

        refresh: function () {
            editors.forEach(function (editor) {
                editor.updateSourceElement();
            });
        }
    };

    document.addEventListener('DOMContentLoaded', initialise);
}());
