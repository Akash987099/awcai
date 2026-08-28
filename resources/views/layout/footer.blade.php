
<section class="relative overflow-hidden py-8 md:py-10 text-white"
    style="background:
        linear-gradient(135deg, rgba(15, 23, 42, 0.94), rgba(8, 145, 178, 0.88)),
        url('{{ asset('assets/img/service1.png') }}');
        background-size: cover;
        background-position: center;">
    <div class="container relative z-10 mx-auto px-4">
        <div class="mx-auto max-w-6xl rounded-[1.75rem] border border-white/10 bg-white/10 p-6 shadow-2xl backdrop-blur md:p-8">
            <div class="grid items-center gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                <div>
                    <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-xs font-semibold uppercase tracking-[0.26em] text-sky-100">
                        Let's Build Together
                    </span>
                    <h2 class="mt-4 text-2xl font-bold font-heading leading-tight md:text-3xl">
                        Start your next website, app, or marketing project with a stronger digital partner
                    </h2>
                    <p class="mt-3 max-w-2xl text-sm leading-7 text-slate-100/90 md:text-base">
                        Turn your business idea into a polished digital experience with design, development, and growth support from Arya Web Coding.
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
                    <a href="tel:+919870992118"
                        class="rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-white hover:text-slate-900">
                        <i class="fas fa-phone-alt mr-2 text-amber-300"></i> +91 98709 92118
                    </a>
                    <a href="tel:+917906948573"
                        class="rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-white hover:text-slate-900">
                        <i class="fas fa-phone-alt mr-2 text-amber-300"></i> +91 79069 48573
                    </a>
                    <a href="tel:+918533074414"
                        class="rounded-2xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition duration-300 hover:bg-white hover:text-slate-900">
                        <i class="fas fa-phone-alt mr-2 text-amber-300"></i> +91 85330 74414
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="relative overflow-hidden bg-slate-950 text-white">
    <div class="absolute inset-0 opacity-90"
        style="background:
            radial-gradient(circle at top left, rgba(14, 165, 233, 0.16), transparent 25%),
            radial-gradient(circle at bottom right, rgba(20, 184, 166, 0.12), transparent 28%),
            linear-gradient(180deg, #020617 0%, #0f172a 100%);"></div>

    <div class="container relative z-10 mx-auto px-4 py-10 md:py-12">
        <div class="mb-8 rounded-[1.5rem] border border-white/10 bg-white/5 p-5 shadow-xl backdrop-blur md:p-6">
            <div class="grid items-center gap-6 lg:grid-cols-[1fr_0.9fr]">
                <div>
                    <h3 class="text-xl font-bold font-heading md:text-2xl">Stay Updated</h3>
                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-300">
                        Subscribe to get fresh updates, offers, and practical tech insights from Arya Web Coding.
                    </p>
                </div>

                <form action="" method="POST" id="subscrivepage"
                    class="flex w-full flex-col gap-4 sm:flex-row sm:items-center">
                    @csrf
                    <input type="email" name="email" required placeholder="Enter your email"
                        class="w-full rounded-2xl border border-white/10 bg-white px-5 py-3 text-slate-900 focus:outline-none focus:ring-2 focus:ring-sky-400">
                    <button type="submit"
                        class="rounded-2xl bg-emerald-500 px-6 py-3 font-semibold text-white transition duration-300 hover:bg-emerald-400">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <div class="grid gap-8 border-t border-white/10 pt-8 lg:grid-cols-[1.2fr_0.8fr_1fr]">
            <div class="pr-0 lg:pr-8">
                <h3 class="text-2xl font-heading font-bold text-white">Arya Web Coding</h3>
                <div class="mt-4 h-1 w-20 rounded-full bg-gradient-to-r from-sky-400 via-teal-300 to-amber-300"></div>
                <p class="mt-4 max-w-xl text-sm leading-7 text-slate-300">
                    A trusted IT company delivering modern <strong>website development</strong>,
                    <strong>mobile app solutions</strong>, <strong>UI/UX design</strong>, and
                    <strong>digital marketing</strong> services with a focus on clean execution and long-term growth.
                </p>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-white">Quick Links</h4>
                <div class="mt-3 h-px w-16 bg-white/15"></div>
                <ul class="mt-5 space-y-3">
                    @foreach (cms() as $key => $page)
                        <li>
                            <a href="{{ route('cms', $page->id) }}" class="text-sm text-slate-300 transition hover:pl-1 hover:text-white">
                                {{ $page->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-white">Contact Info</h4>
                <div class="mt-3 h-px w-16 bg-white/15"></div>
                <ul class="mt-5 space-y-4">
                    <li class="flex items-start gap-4">
                        <span class="mt-1 text-sky-300">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <span class="text-sm leading-7 text-slate-300">Pavitra Marriage Home, NH-2 Road, Agra Tundla, Firozabad.</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="mt-1 text-amber-300">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <span class="text-sm leading-7 text-slate-300">+91 9870992118, +91 7906948573, +91 8533074414</span>
                    </li>
                    <li class="flex items-start gap-4">
                        <span class="mt-1 text-emerald-300">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="text-sm leading-7 text-slate-300">aryawebcoding@gmail.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="mt-8 flex flex-col gap-4 border-t border-white/10 pt-5 text-sm text-slate-400 md:flex-row md:items-center md:justify-between">
            <div class="flex flex-wrap items-center gap-3">
                <span class="text-slate-300">Follow Us</span>
                <a href="https://www.facebook.com/profile.php?id=100094938452827" target="_blank"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/10 text-base text-slate-300 transition hover:border-white hover:bg-white hover:text-slate-900">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/aryawebcoding" target="_blank"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/10 text-base text-slate-300 transition hover:border-white hover:bg-white hover:text-slate-900">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.linkedin.com/in/aryaweb-coding-281a182a6/" target="_blank"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/10 text-base text-slate-300 transition hover:border-white hover:bg-white hover:text-slate-900">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://www.instagram.com/aryawebcoding/" target="_blank"
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/10 text-base text-slate-300 transition hover:border-white hover:bg-white hover:text-slate-900">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <p>&copy; <span id="footer-year"></span> Arya Web Coding. All rights reserved.</p>
        </div>
    </div>
</footer>

<div class="social-widget">
    <div class="social-icons">
        <a id="whatsapp-link" class="social-icon" href="#" target="_blank">
            <span class="icon-label">WhatsApp</span>
            <div class="icon-box whatsapp">
                <i class="fab fa-whatsapp"></i>
            </div>
        </a>

        <div class="social-icon">
            <a href="https://www.facebook.com/profile.php?id=100094938452827" target="_blank">
                <span class="icon-label">Facebook</span>
            </a>
            <div class="icon-box facebook">
                <i class="fab fa-facebook-f"></i>
            </div>
        </div>

        <div class="social-icon">
            <a href="https://www.instagram.com/aryawebcoding/" target="_blank">
                <span class="icon-label">Instagram</span>
            </a>
            <div class="icon-box instagram">
                <i class="fab fa-instagram"></i>
            </div>
        </div>

        <div class="social-icon">
            <a href="https://twitter.com/aryawebcoding" target="_blank">
                <span class="icon-label">Twitter</span>
            </a>
            <div class="icon-box twitter">
                <i class="fab fa-twitter"></i>
            </div>
        </div>

        <div class="social-icon">
            <a href="https://www.linkedin.com/in/aryaweb-coding-281a182a6/" target="_blank">
                <span class="icon-label">LinkedIn</span>
            </a>
            <div class="icon-box linkedin">
                <i class="fab fa-linkedin-in"></i>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        var phone = "919870992118";
        var message = "Hi, I saw your website and want to ask something.";
        var link = "https://wa.me/" + phone + "?text=" + encodeURIComponent(message);

        document.getElementById("whatsapp-link").href = link;
        var footerYear = document.getElementById("footer-year");
        if (footerYear) {
            footerYear.textContent = new Date().getFullYear();
        }
    })();
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('[data-count]');
        counters.forEach((counter, index) => {
            const target = parseInt(counter.getAttribute('data-count'));
            let count = 0;
            const increment = target / 100;
            const updateCount = () => {
                count += increment;
                if (count < target) {
                    counter.innerText = Math.ceil(count);
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target;
                }
            };
            setTimeout(updateCount, index * 500);
        });
    });
</script>


<script>
    window.addEventListener('scroll', function() {
        const topNav = document.querySelector('.top-nav');
        const mainNav = document.querySelector('.main-nav');

        if (window.scrollY > 0) {
            if (topNav) {
                topNav.style.display = 'none';
            }

            if (mainNav) {
                mainNav.removeAttribute('style');
                mainNav.classList.add('fixed-top');
            }
        } else {
            if (topNav) {
                topNav.style.display = '';
            }

            if (mainNav && !mainNav.hasAttribute('style')) {
                mainNav.setAttribute('style', 'top: 72px;');
                mainNav.classList.remove('fixed-top');
            }
        }
    });
</script>

<script>
    const mobileButton = document.getElementById('navbar-toggle');
    const mobileNavbar = document.getElementById('navbar-menu');
    if (mobileButton && mobileNavbar) {
        mobileButton.addEventListener('click', () => {
            mobileNavbar.classList.toggle('hidden');
        });
    }

    const dropdownButton = document.getElementById('dropdown-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');
    if (dropdownButton && dropdownMenu) {
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    }
</script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 32,
        loop: true,
        centeredSlides: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 32,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 32,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 32,
            },
        },
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#subscrivepage').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('subsribe') }}",
                type: "POST",
                data: $(this).serialize(),

                success: function(response) {
                    console.log(response);

                    if (response.status === "success") {
                        alert(response.message);
                        $('#subscrivepage')[0].reset();
                    }
                },

                error: function(xhr) {
                    if (xhr.status === 422) {
                        alert(xhr.responseJSON.message);
                    } else if (xhr.status === 409) {
                        alert("Already subscribed!");
                    } else {
                        alert("Something went wrong!");
                    }
                }
            });
        });
    });
</script>

<script>
$(document).ready(function() {
    $('#quickEnquiryForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('quick.enquiry.submit') }}",
            type: "POST",
            data: $(this).serialize(),

            success: function(response) {
                if (response.status === "success") {
                    alert(response.message);
                }
            },

            error: function(xhr) {
                if (xhr.status === 422) {
                    let msg = xhr.responseJSON.message;
                    alert(msg);
                } else {
                    alert('something went wrong');
                }
            }
        });
    });

});
</script>

</body>

</html>
