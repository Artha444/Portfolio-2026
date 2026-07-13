//
import Lenis from "@studio-freight/lenis";
import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import barba from "@barba/core";

gsap.registerPlugin(ScrollTrigger);

// --- SMOOTH SCROLL (LENIS) ---
let lenis;
const initSmoothScroll = () => {
    lenis = new Lenis({
        lerp: 0.1,
        wheelMultiplier: 0.9,
        infinite: false,
        gestureOrientation: "vertical",
        normalizeWheel: false,
        smoothTouch: false,
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    // --- GSAP & LENIS INTEGRATION ---
    // Make sure ScrollTrigger uses Lenis's scroll position
    lenis.on("scroll", ScrollTrigger.update);

    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });

    gsap.ticker.lagSmoothing(0);
};

/**
 * Initializes animations on a container.
 * It finds elements that need animation and have not been initialized yet.
 * This prevents re-creating animations on elements that are already animated.
 * @param {HTMLElement} container The container to search for elements in.
 */
const initPageAnimations = (container) => {
    // --- Text Split Animation for any element with [data-split] ---
    const splitTargets = container.querySelectorAll("[data-split]:not([data-anim-initialized])");
    splitTargets.forEach((target) => {
        target.setAttribute("data-anim-initialized", "true");
        const chars = target.innerText
            .split("")
            .map((char) => `<span class="char" style="display:inline-block; opacity:0; transform:translateY(20px);">${char === " " ? "&nbsp;" : char}</span>`)
            .join("");
        target.innerHTML = chars;

        gsap.to(target.querySelectorAll(".char"), {
            opacity: 1,
            y: 0,
            stagger: 0.03,
            ease: "power3.out",
            duration: 0.6,
            scrollTrigger: {
                trigger: target,
                start: "top 85%",
                toggleActions: "play none none none",
            },
        });
    });


    // --- Capability Items Animation ---
    const capabilitiesContainer = container.querySelector("#capabilities:not([data-anim-initialized])");
    if (capabilitiesContainer) {
        capabilitiesContainer.setAttribute("data-anim-initialized", "true");
        const capabilityItems = capabilitiesContainer.querySelectorAll(".capability-item");
        gsap.from(capabilityItems, {
            opacity: 0,
            x: 20,
            duration: 0.5,
            stagger: 0.1,
            ease: "power3.out",
            scrollTrigger: { trigger: capabilitiesContainer, start: "top 80%", toggleActions: "play none none reverse" },
        });
    }
};

// --- BARBA.JS ---
const initBarba = () => {
    barba.init({
        sync: true,
        debug: false, // Set to true to see Barba logs in the console
        transitions: [
            {
                name: "default-transition",

                once({ next }) {
                    // Initialize animations on the initial page load.
                    initPageAnimations(next.container);
                },

                leave(data) {
                    // --- THE CRITICAL FIX: Kill all ScrollTriggers from the outgoing page ---
                    // This prevents "zombie" triggers from causing conflicts on the next page.
                    // We get all triggers associated with the leaving container and kill them.
                    ScrollTrigger.getAll().forEach(trigger => trigger.kill());

                    // Animate leaving page
                    return gsap.to(data.current.container, { opacity: 0, duration: 0.3 });
                },

                beforeEnter({ next }) {
                    // Scroll to top instantly and reset Lenis's internal state
                    lenis.scrollTo(0, { immediate: true });
                    // Make sure the new container is invisible before the transition starts
                    next.container.style.opacity = 0;
                },

                enter({ next }) {
                    // Animate the new page container into view.
                    return gsap.from(next.container, { opacity: 0, duration: 0.3 });
                },

                afterEnter({ next }) {
                    // --- THE DEFINITIVE FIX ---
                    // 1. Initialize animations for any new content on the new page.
                    initPageAnimations(next.container);

                    // 2. After a very short delay, force ScrollTrigger to recalculate all trigger positions.
                    // This ensures that all calculations happen AFTER Barba has finished its DOM transition
                    // and Lenis has had a moment to recognize the new page's height.
                    setTimeout(() => {
                        ScrollTrigger.refresh();
                    }, 100);
                },
            },
        ],
    });
};

// --- INITIALIZATION ---
document.addEventListener("DOMContentLoaded", () => {
    initSmoothScroll();
    initBarba();
});
