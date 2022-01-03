<!Doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Index MCE</title>
        <script src="https://cdn.tiny.cloud/1/wmvp5vagut9oqlarxd3c5adghob7vcjhi2zkm0h3fsmsvpyy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <?php /*
        <script src="application/layout/lite/js/tinymce/js/tinymce/tinymce-new.js" referrerpolicy="origin"></script> */
        ?>
        <style type="text/css">

            html, body {
                margin: 0px;
                padding: 0px;
            }
            textarea#mentions {
                height: 350px;
            }

            div.card,
            .tox div.card {
                width: 240px;
                background: white;
                border: 1px solid #ccc;
                border-radius: 3px;
                box-shadow: 0 4px 8px 0 rgba(34, 47, 62, .1);
                padding: 8px;
                font-size: 14px;
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
            }

            div.card::after,
            .tox div.card::after {
                content: "";
                clear: both;
                display: table;
            }

            div.card h1,
            .tox div.card h1 {
                font-size: 14px;
                font-weight: bold;
                margin: 0 0 8px;
                padding: 0;
                line-height: normal;
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
            }

            div.card p,
            .tox div.card p {
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
            }

            div.card img.avatar,
            .tox div.card img.avatar {
                width: 48px;
                height: 48px;
                margin-right: 8px;
                float: left;
            }

        </style>
    </head>
    <body>
        <textarea id="full-featured" style="visibility: hidden;">
            <p><img style="display: block; margin-left: auto; margin-right: auto;" title="Tiny Logo" src="https://www.tiny.cloud/docs/images/logos/android-chrome-256x256.png" alt="TinyMCE Logo" width="128" height="128" /></p>
            <h2 style="text-align: center;">Welcome to the TinyMCE Cloud demo!</h2>
            <h5 style="text-align: center;">Note, this includes some "enterprise/premium" features.<br>Visit the <a href="https://www.tiny.cloud/pricing">pricing page</a> to learn more about our premium plugins.</h5>
            <p>Please try out the features provided in this full featured example.</p>

            <h2>Got questions or need help?</h2>
            <ul>
                <li>Our <a class="mceNonEditable" href="//www.tiny.cloud/docs/">documentation</a> is a great resource for learning how to configure TinyMCE.</li>
                <li>Have a specific question? Try the <a href="https://stackoverflow.com/questions/tagged/tinymce" target="_blank" rel="noopener"><code>tinymce</code> tag at Stack Overflow</a>.</li>
                <li>We also offer enterprise grade support as part of <a href="https://www.tiny.cloud/pricing">TinyMCE premium subscriptions</a>.</li>
            </ul>

            <h2>A simple table to play with</h2>
            <table style="border-collapse: collapse; width: 100%;" border="1">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Cost</th>
                        <th>Really?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>TinyMCE Cloud</td>
                        <td>Get started for free</td>
                        <td>YES!</td>
                    </tr>
                    <tr>
                        <td>Plupload</td>
                        <td>Free</td>
                        <td>YES!</td>
                    </tr>
                </tbody>
            </table>

            <h2>Found a bug?</h2>
            <p>If you think you have found a bug please create an issue on the <a href="https://github.com/tinymce/tinymce/issues">GitHub repo</a> to report it to the developers.</p>

            <h2>Finally ...</h2>
            <p>Don't forget to check out our other product <a href="http://www.plupload.com" target="_blank">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.</p>
            <p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br>All the best from the TinyMCE team.</p>
        </textarea>
        <script type="text/javascript">

            var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

            tinymce.init({
                selector: 'textarea#full-featured',
                plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
                tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
                tinydrive_dropbox_app_key: 'YOUR_DROPBOX_APP_KEY',
                tinydrive_google_drive_key: 'YOUR_GOOGLE_DRIVE_KEY',
                tinydrive_google_drive_client_id: 'YOUR_GOOGLE_DRIVE_CLIENT_ID',
                mobile: {
                    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable'
                },
                menu: {
                    tc: {
                        title: 'Comments',
                        items: 'addcomment showcomments deleteallconversations'
                    }
                },
                menubar: 'file edit view insert format tools table tc help',
                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
                autosave_ask_before_unload: true,
                autosave_interval: '30s',
                autosave_prefix: '{path}{query}-{id}-',
                autosave_restore_when_empty: false,
                autosave_retention: '2m',
                image_advtab: true,
                link_list: [
                    {title: 'My page 1', value: 'https://www.tiny.cloud'},
                    {title: 'My page 2', value: 'http://www.moxiecode.com'}
                ],
                image_list: [
                    {title: 'My page 1', value: 'https://www.tiny.cloud'},
                    {title: 'My page 2', value: 'http://www.moxiecode.com'}
                ],
                image_class_list: [
                    {title: 'None', value: ''},
                    {title: 'Some class', value: 'class-name'}
                ],
                importcss_append: true,
                templates: [
                    {title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'},
                    {title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...'},
                    {title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'}
                ],
                template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
                template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
                height: 600,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                noneditable_noneditable_class: 'mceNonEditable',
                toolbar_mode: 'sliding',
                spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
                tinycomments_mode: 'embedded',
                content_style: '.mymention{ color: gray; }',
                contextmenu: 'link image imagetools table configurepermanentpen',
                a11y_advanced_options: true,
                skin: useDarkMode ? 'oxide-dark' : 'oxide',
                content_css: useDarkMode ? 'dark' : 'default',
                /*
                 The following settings require more configuration than shown here.
                 For information on configuring the mentions plugin, see:
                 https://www.tiny.cloud/docs/plugins/premium/mentions/.
                 */
                mentions_selector: '.mymention',
                // mentions_fetch: mentions_fetch,
                // mentions_menu_hover: mentions_menu_hover,
                // mentions_menu_complete: mentions_menu_complete,
                // mentions_select: mentions_select,
                mentions_item_type: 'profile'
            });



        </script>
    </body>
</html>