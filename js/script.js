const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    autoRaf: true,
    anchors: true,
});

/**
 __  __              _ _  __    _       _          
 \ \/ / _______  ___| | |/ /___| |_ ___| |__   ___ 
  \  / |_  / _ \/ _ \ | ' // _ \ __/ __| '_ \ / _ \
  /  \  / /  __/  __/ | . \  __/ || (__| | | |  __/
 /_/\_\/___\___|\___|_|_|\_\___|\__\___|_| |_|\___|
 * @INFO
 * Source code by | XzeelKetche
 * @INFO
 * Source code ID | BerkahGrosir-Website
 * @INFO
 * Perhatian      | Credit & watermark jangan pernah di hapus!
 * @INFO
*/