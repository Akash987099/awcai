<div class="ws-modal" id="website-settings-modal" data-show-url="{{ route('panel.settings.show') }}" aria-hidden="true">
    <div class="ws-modal__backdrop" data-settings-close></div>
    <section class="ws-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="website-settings-title">
        <header class="ws-modal__header">
            <div><p>Client specific configuration</p><h2 id="website-settings-title">Website settings</h2></div>
            <button type="button" class="ws-modal__close" data-settings-close aria-label="Close settings">&times;</button>
        </header>
        <form class="ws-form" action="{{ route('panel.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="ws-tabs" role="tablist">
                <button type="button" class="is-active" data-tab="identity">Brand identity</button>
                <button type="button" data-tab="contact">Contact</button>
                <button type="button" data-tab="seo">SEO &amp; social</button>
            </div>

            <div class="ws-panel is-active" data-panel="identity">
                <div class="ws-grid">
                    <label>Website name<input name="website_name" data-setting="website_name" placeholder="e.g. AWC Care Clinic"></label>
                    <label>Tagline<input name="tagline" data-setting="tagline" placeholder="A short brand message"></label>
                    <label class="ws-span-2">Website URL<input type="url" name="website_url" data-setting="website_url" placeholder="https://yourwebsite.com"></label>
                </div>
                <h3>Brand files</h3>
                <p class="ws-help">Upload PNG, JPG, WEBP or SVG for logos. Favicon supports ICO, PNG or SVG.</p>
                <div class="ws-upload-grid">
                    <label class="ws-upload">Header logo<input type="file" name="header_logo" accept=".jpg,.jpeg,.png,.webp,.svg"><small data-file-label="header_logo">No file selected</small></label>
                    <label class="ws-upload">Footer logo<input type="file" name="footer_logo" accept=".jpg,.jpeg,.png,.webp,.svg"><small data-file-label="footer_logo">No file selected</small></label>
                    <label class="ws-upload">Favicon<input type="file" name="favicon" accept=".ico,.png,.svg"><small data-file-label="favicon">No file selected</small></label>
                </div>
            </div>

            <div class="ws-panel" data-panel="contact">
                <div class="ws-grid">
                    <label>Primary email<input type="email" name="primary_email" data-setting="primary_email" placeholder="hello@yourwebsite.com"></label>
                    <label>Support email<input type="email" name="support_email" data-setting="support_email" placeholder="support@yourwebsite.com"></label>
                    <label>Phone<input type="text" name="phone" data-setting="phone" placeholder="+91 00000 00000"></label>
                    <label>WhatsApp<input type="text" name="whatsapp" data-setting="whatsapp" placeholder="+91 00000 00000"></label>
                    <label class="ws-span-2">Business address<textarea name="address" data-setting="address" rows="3" placeholder="Full business address"></textarea></label>
                    <label>City<input name="city" data-setting="city"></label>
                    <label>State<input name="state" data-setting="state"></label>
                    <label>Pincode<input name="pincode" data-setting="pincode"></label>
                    <label>Footer copyright<input name="copyright_text" data-setting="copyright_text" placeholder="© 2026 Your clinic"></label>
                </div>
            </div>

            <div class="ws-panel" data-panel="seo">
                <div class="ws-grid">
                    <label class="ws-span-2">SEO title<input name="meta_title" data-setting="meta_title" placeholder="Page title used by search engines"></label>
                    <label class="ws-span-2">SEO description<textarea name="meta_description" data-setting="meta_description" rows="3" placeholder="Short description for search engines"></textarea></label>
                    <label>Facebook URL<input type="url" name="facebook_url" data-setting="facebook_url"></label>
                    <label>Instagram URL<input type="url" name="instagram_url" data-setting="instagram_url"></label>
                    <label>LinkedIn URL<input type="url" name="linkedin_url" data-setting="linkedin_url"></label>
                    <label>YouTube URL<input type="url" name="youtube_url" data-setting="youtube_url"></label>
                </div>
            </div>

            <footer class="ws-modal__footer"><span id="ws-status">Changes are saved only for your account.</span><button type="submit">Save website settings</button></footer>
        </form>
    </section>
</div>