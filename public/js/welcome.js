(function() {
    /* ── State ── */
    var _rect   = null;
    var _srcEl  = null;
    var _slide  = 0;

    /* ── Nav button styles ── */
    var NAV_BTN = 'position:absolute;top:50%;transform:translateY(-50%);z-index:5;'
               + 'width:40px;height:40px;border-radius:50%;'
               + 'background:rgba(244,236,216,0.9);border:1px solid rgba(90,60,30,0.2);'
               + 'box-shadow:0 2px 8px rgba(40,25,10,0.18);'
               + 'display:flex;align-items:center;justify-content:center;'
               + 'cursor:pointer;transition:background 0.2s ease;';

    /* ── Project data (from JSON tag) ── */
    var projectsData = {};
    try {
        projectsData = JSON.parse(document.getElementById('projects-json').textContent);
    } catch(e) {}

    /* ── OPEN ── */
    window.openFlipModal = function(event, projectId) {
        var srcEl   = event.currentTarget;
        var rect    = srcEl.getBoundingClientRect();
        var project = projectsData[projectId];
        if (!project) return;

        _srcEl = srcEl;
        _rect  = rect;
        _slide = 0;

        var modal    = document.getElementById('pm-modal');
        var backdrop = document.getElementById('pm-backdrop');
        var content  = document.getElementById('pm-content');
        var closeBtn = document.getElementById('pm-close');

        _slide = 0;
        content.style.opacity = '0';
        content.innerHTML = '';

        /* 1. Start at card position (FLIP) */
        modal.style.transition  = 'none';
        modal.style.top         = rect.top    + 'px';
        modal.style.left        = rect.left   + 'px';
        modal.style.width       = rect.width  + 'px';
        modal.style.height      = rect.height + 'px';
        modal.style.borderRadius = '20px';
        modal.style.opacity     = '1';
        modal.style.pointerEvents = 'auto';

        /* 2. Build image array */
        var imgs = [];
        if (project.cover_image) imgs.push(project.cover_image);
        var raw   = project.images;
        var extra = Array.isArray(raw) ? raw
                  : (typeof raw === 'string'
                      ? (function() { try { return JSON.parse(raw); } catch(e) { return []; } })()
                      : []);
        extra.forEach(function(i) { if (i !== project.cover_image) imgs.push(i); });

        /* 3. Build gallery HTML */
        var galleryHtml = '';
        if (imgs.length > 0) {
            var slideHeight = Math.round(window.innerHeight * 0.52);
            var slides = imgs.map(function(img, i) {
                return '<div class="pm-slide" data-i="' + i + '" style="height:' + slideHeight + 'px;flex-shrink:0;width:85%;padding:0 8px;box-sizing:border-box;scroll-snap-align:center;">'
                     + '<div style="width:100%;height:100%;overflow:hidden;border-radius:14px;'
                     + 'box-shadow:0 10px 32px rgba(40,25,10,0.22);'
                     + 'border:1px solid rgba(60,40,20,0.08);'
                     + 'background:rgba(90,74,48,0.05);display:flex;align-items:center;justify-content:center;">'
                     + '<img src="/storage/' + img + '" alt="Gambar ' + (i+1) + '" loading="' + (i===0?'eager':'lazy') + '" style="width:100%;height:100%;object-fit:cover;display:block;" />'
                     + '</div></div>';
            }).join('');

            var navHtml = imgs.length > 1
                ? '<button type="button" id="pm-gal-prev" style="' + NAV_BTN + 'left:24px;" onclick="pmGalNav(-1)" aria-label="Sebelumnya">'
                + '<span class="material-symbols-outlined" style="font-size:24px;pointer-events:none;">arrow_back_ios_new</span></button>'
                + '<button type="button" id="pm-gal-next" style="' + NAV_BTN + 'right:24px;" onclick="pmGalNav(1)" aria-label="Berikutnya">'
                + '<span class="material-symbols-outlined" style="font-size:24px;pointer-events:none;">arrow_forward_ios</span></button>'
                + '<div id="pm-gal-counter" style="position:absolute;bottom:10px;left:50%;transform:translateX(-50%);'
                + 'background:rgba(47,33,21,0.78);color:#f4ecd8;font-size:11px;font-weight:700;'
                + 'padding:3px 14px;border-radius:20px;letter-spacing:0.08em;pointer-events:none;z-index:5;">'
                + '1 / ' + imgs.length + '</div>'
                : '';

            var trackStyle = imgs.length > 1
                ? 'padding:0 7.5%;justify-content:flex-start;'
                : 'padding:0;justify-content:center;';

            galleryHtml = '<div style="position:relative;width:100%;height:' + slideHeight + 'px;border-bottom:1px solid rgba(90,60,30,0.12);overflow:hidden;padding:16px 0;box-sizing:border-box;">'
                        + '<div id="pm-gal-track" style="display:flex;width:100%;height:100%;overflow-x:auto;scroll-snap-type:x mandatory;'
                        + 'scroll-behavior:smooth;-ms-overflow-style:none;scrollbar-width:none;box-sizing:border-box;gap:0;' + trackStyle + '">'
                        + slides
                        + '</div>' + navHtml + '</div>';
        }

        /* 4. Build skills tags */
        var skillsHtml = '';
        if (project.skills && project.skills.length > 0) {
            skillsHtml = '<div style="display:flex;flex-wrap:wrap;gap:6px;margin-top:6px;">' +
                project.skills.map(function(s) {
                    return '<span style="font-size:11px;font-weight:600;padding:4px 10px;background:rgba(90,74,48,0.10);color:#4a3524;border-radius:20px;border:1px solid rgba(90,74,48,0.15)">' + s + '</span>';
                }).join('') + '</div>';
        }

        /* 5. Assemble full content */
        content.innerHTML = galleryHtml +
            '<div style="padding:28px 32px 36px;">' +
            '<p style="font-family:monospace;font-size:11px;color:#8b7355;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:8px;">' + (project.category || '') + '</p>' +
            '<h2 style="font-size:clamp(22px,3vw,32px);font-weight:900;color:#2f2115;margin:0 0 12px;line-height:1.1;letter-spacing:-0.02em;">' + project.title + '</h2>' +
            (project.description ? '<p style="font-size:15px;line-height:1.7;color:#5a4a38;margin:0 0 20px;">' + project.description + '</p>' : '') +
            skillsHtml +
            '<div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:24px;">' +
            (project.demo_link ? '<a href="' + project.demo_link + '" target="_blank" rel="noopener" class="pm-btn-primary">View Live <span class="material-symbols-outlined" style="font-size:17px;">open_in_new</span></a>' : '') +
            (project.github_link ? '<a href="' + project.github_link + '" target="_blank" rel="noopener" class="pm-btn-secondary">Source Code <span class="material-symbols-outlined" style="font-size:17px;">code</span></a>' : '') +
            '</div></div>';

        /* 6. Force reflow then FLIP to center */
        void modal.offsetWidth;

        var fw = Math.min(window.innerWidth  * 0.96, 1200);
        var fh = window.innerHeight * 0.94;
        var ft = (window.innerHeight - fh) / 2;
        var fl = (window.innerWidth  - fw) / 2;

        modal.style.transition   = 'top 0.65s cubic-bezier(0.22,1,0.36,1),left 0.65s cubic-bezier(0.22,1,0.36,1),width 0.65s cubic-bezier(0.22,1,0.36,1),height 0.65s cubic-bezier(0.22,1,0.36,1),border-radius 0.65s cubic-bezier(0.22,1,0.36,1)';
        modal.style.top          = ft + 'px';
        modal.style.left         = fl + 'px';
        modal.style.width        = fw + 'px';
        modal.style.height       = fh + 'px';
        modal.style.borderRadius = '24px';

        backdrop.style.opacity      = '1';
        backdrop.style.pointerEvents = 'auto';
        document.body.style.overflow = 'hidden';

        /* Hide navbar */
        var navbar = document.getElementById('global-navbar');
        if (navbar) {
            navbar.style.setProperty('transition', 'opacity 0.3s ease,transform 0.3s ease', 'important');
            navbar.style.setProperty('opacity', '0', 'important');
            navbar.style.setProperty('transform', 'translateY(-100%)', 'important');
            navbar.style.setProperty('pointer-events', 'none', 'important');
            navbar.style.setProperty('visibility', 'hidden', 'important');
        }

        setTimeout(function() {
            content.style.opacity       = '1';
            closeBtn.style.opacity      = '1';
            closeBtn.style.pointerEvents = 'auto';
            var prev = document.getElementById('pm-gal-prev');
            if (prev) prev.style.opacity = '0.4';
        }, 380);
    };

    /* ── GALLERY NAV ── */
    window.pmGalNav = function(dir) {
        var track = document.getElementById('pm-gal-track');
        if (!track) return;
        var items = track.querySelectorAll('.pm-slide');
        if (!items.length) return;

        _slide = Math.max(0, Math.min(_slide + dir, items.length - 1));
        items[_slide].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });

        var counter = document.getElementById('pm-gal-counter');
        if (counter) counter.textContent = (_slide + 1) + ' / ' + items.length;

        var prev = document.getElementById('pm-gal-prev');
        var next = document.getElementById('pm-gal-next');
        if (prev) prev.style.opacity = _slide === 0 ? '0.4' : '1';
        if (next) next.style.opacity = _slide === items.length - 1 ? '0.4' : '1';
    };

    /* ── CLOSE ── */
    window.pmClose = function() {
        var modal    = document.getElementById('pm-modal');
        var backdrop = document.getElementById('pm-backdrop');
        var content  = document.getElementById('pm-content');
        var closeBtn = document.getElementById('pm-close');

        closeBtn.style.opacity       = '0';
        closeBtn.style.pointerEvents = 'none';
        content.style.opacity        = '0';

        setTimeout(function() {
            if (_srcEl) _rect = _srcEl.getBoundingClientRect();

            if (_rect) {
                modal.style.transition   = 'top 0.5s cubic-bezier(0.22,1,0.36,1),left 0.5s cubic-bezier(0.22,1,0.36,1),width 0.5s cubic-bezier(0.22,1,0.36,1),height 0.5s cubic-bezier(0.22,1,0.36,1),border-radius 0.5s cubic-bezier(0.22,1,0.36,1),opacity 0.5s ease';
                modal.style.top          = _rect.top    + 'px';
                modal.style.left         = _rect.left   + 'px';
                modal.style.width        = _rect.width  + 'px';
                modal.style.height       = _rect.height + 'px';
                modal.style.borderRadius = '16px';
            }

            backdrop.style.opacity      = '0';
            backdrop.style.pointerEvents = 'none';

            /* Restore navbar */
            var navbar = document.getElementById('global-navbar');
            if (navbar) {
                navbar.style.setProperty('opacity', '1', 'important');
                navbar.style.setProperty('transform', 'translateY(0)', 'important');
                navbar.style.setProperty('pointer-events', 'auto', 'important');
                navbar.style.setProperty('visibility', 'visible', 'important');
            }

            setTimeout(function() {
                modal.style.opacity      = '0';
                modal.style.pointerEvents = 'none';
                document.body.style.overflow = '';
                setTimeout(function() { content.innerHTML = ''; }, 100);
            }, 520);
        }, 100);
    };

    window.closeFlipModal = window.pmClose;
    document.addEventListener('keydown', function(e) { if (e.key === 'Escape') window.pmClose(); });
})();