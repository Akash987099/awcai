(function () {
    'use strict';

    var allowedTags = { A: ['href'], B: [], BLOCKQUOTE: [], BR: [], EM: [], H2: [], H3: [], I: [], LI: [], OL: [], P: [], STRONG: [], U: [], UL: [] };

    function cleanHtml(html) {
        var documentFragment = new DOMParser().parseFromString(html || '', 'text/html');
        Array.prototype.slice.call(documentFragment.body.querySelectorAll('*')).reverse().forEach(function (node) {
            if (!allowedTags[node.tagName]) {
                node.replaceWith.apply(node, Array.prototype.slice.call(node.childNodes));
                return;
            }
            Array.prototype.slice.call(node.attributes).forEach(function (attribute) {
                if (allowedTags[node.tagName].indexOf(attribute.name.toLowerCase()) === -1) node.removeAttribute(attribute.name);
            });
            if (node.tagName === 'A' && !/^(https?:|mailto:|\/)/i.test(node.getAttribute('href') || '')) node.removeAttribute('href');
        });
        return documentFragment.body.innerHTML;
    }

    function addEditor(textarea) {
        if (textarea.dataset.rteReady || textarea.closest('[data-no-rich-text]')) return;
        textarea.dataset.rteReady = 'true';
        var wrapper = document.createElement('div');
        wrapper.className = 'rte';
        var toolbar = document.createElement('div');
        toolbar.className = 'rte__toolbar';
        toolbar.setAttribute('aria-label', 'Text formatting tools');
        var editor = document.createElement('div');
        editor.className = 'rte__content';
        editor.contentEditable = 'true';
        editor.setAttribute('role', 'textbox');
        editor.setAttribute('aria-multiline', 'true');
        editor.dataset.placeholder = textarea.getAttribute('placeholder') || 'Write here...';
        editor.innerHTML = cleanHtml(textarea.value);

        [['bold', 'B'], ['italic', 'I'], ['underline', 'U'], ['insertUnorderedList', '• List'], ['insertOrderedList', '1. List'], ['createLink', 'Link'], ['removeFormat', 'Clear']].forEach(function (item) {
            var button = document.createElement('button');
            button.type = 'button';
            button.dataset.command = item[0];
            button.textContent = item[1];
            toolbar.appendChild(button);
        });

        toolbar.addEventListener('click', function (event) {
            var button = event.target.closest('button[data-command]');
            if (!button) return;
            event.preventDefault();
            editor.focus();
            var command = button.dataset.command;
            if (command === 'createLink') {
                var url = window.prompt('Enter link URL (https://...)');
                if (url && /^(https?:|mailto:)/i.test(url)) document.execCommand(command, false, url);
            } else {
                document.execCommand(command, false, null);
            }
            sync();
        });

        function sync() { textarea.value = cleanHtml(editor.innerHTML); }
        editor.addEventListener('input', sync);
        editor.addEventListener('paste', function (event) {
            event.preventDefault();
            document.execCommand('insertText', false, (event.clipboardData || window.clipboardData).getData('text'));
            sync();
        });
        textarea.form && textarea.form.addEventListener('submit', sync);
        textarea.classList.add('rte__source');
        textarea.parentNode.insertBefore(wrapper, textarea);
        wrapper.appendChild(toolbar);
        wrapper.appendChild(editor);
        wrapper.appendChild(textarea);
    }

    function initialise() { document.querySelectorAll('textarea').forEach(addEditor); }
    window.RichTextEditors = { initialise: initialise };
    document.addEventListener('DOMContentLoaded', initialise);
}());
