<x-site-layout>
  <x-global.header :store="$store" />
  <x-global.navigation-mobile />
  <x-global.slider :store="$store"/>
  <x-global.the-store :galleryImages="$galleryImages" :store="$store"/>
  <x-global.social  :instagramPosts="$instagramPosts" :testimonials="$testimonials" :store="$store"/>
  <x-global.contact :store="$store"/>
  <x-global.footer :store="$store"/>
</x-site-layout>
