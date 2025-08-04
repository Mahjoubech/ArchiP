<template>
    <footer class="bg-white pt-16 pb-12 border-t border-gray-100">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-16">
          <div class="space-y-4 lg:col-span-2 text-center md:text-left">
            <div class="flex items-center space-x-2 justify-center md:justify-start">
              <img src="/images/logo.png" alt="Archi-Prestige Logo" class="w-10 h-10" />
              <h3 class="text-xl font-bold">
                                <span style="color:rgb(99, 99, 99);">Arshi</span><span>Pristige</span>

              </h3>
            </div>
            <p class="text-gray-500 text-sm">
              Plateforme de présentation de projets architecturaux et de gestion des clients/projets. Découvrez notre portfolio d'excellence en architecture d'intérieur.
            </p>
            <div class="text-xs text-gray-400 pt-2">
              <p>Accès sécurisé à votre compte.</p>
              <p><span class="current-date">{{ currentDate }}</span> <span class="current-time">{{ currentTime }}</span></p>
            </div>
          </div>
  
          <div class="text-center md:text-left">
            <button class="md:hidden w-full flex items-center justify-between mb-2 px-4 py-2 bg-gray-50 rounded-md" @click="toggleSection('nav-menu')">
              <h3 class="text-gray-800 font-semibold">Navigation</h3>
              <i class="fas fa-chevron-down text-gray-400 transition-transform duration-200" id="nav-menu-icon"></i>
            </button>
            <h3 class="hidden md:block text-gray-800 font-semibold mb-4">Navigation</h3>
            <ul id="nav-menu" class="space-y-3 hidden md:block">
              <li><router-link to="/" class="text-gray-500 hover:text-gray-800 text-sm">Accueil</router-link></li>
              <li><router-link to="/projets" class="text-gray-500 hover:text-gray-800 text-sm">Nos Projets</router-link></li>
              <li><router-link to="/services" class="text-gray-500 hover:text-gray-800 text-sm">Services</router-link></li>
              <li><router-link to="/propos" class="text-gray-500 hover:text-gray-800 text-sm">À Propos</router-link></li>
              <li><router-link to="/contact" class="text-gray-500 hover:text-gray-800 text-sm">Contact</router-link></li>
            </ul>
          </div>
  
          <div class="text-center md:text-left">
            <button class="md:hidden w-full flex items-center justify-between mb-2 px-4 py-2 bg-gray-50 rounded-md" @click="toggleSection('cat-menu')">
              <h3 class="text-gray-800 font-semibold">Catégories</h3>
              <i class="fas fa-chevron-down text-gray-400 transition-transform duration-200" id="cat-menu-icon"></i>
            </button>
            <h3 class="hidden md:block text-gray-800 font-semibold mb-4">Catégories</h3>
            <ul id="cat-menu" class="space-y-3 hidden md:block">
              <li><router-link to="/residentiel" class="text-gray-500 hover:text-gray-800 text-sm">Résidentiel</router-link></li>
              <li><router-link to="/commercial" class="text-gray-500 hover:text-gray-800 text-sm">Commercial</router-link></li>
              <li><router-link to="/renovation" class="text-gray-500 hover:text-gray-800 text-sm">Rénovation</router-link></li>
              <li><router-link to="/devis" class="text-gray-500 hover:text-gray-800 text-sm">Devis Gratuit</router-link></li>
            </ul>
          </div>
  
          <div class="text-center md:text-left">
            <div class="mb-8">
              <button class="md:hidden w-full flex items-center justify-between mb-2 px-4 py-2 bg-gray-50 rounded-md" @click="toggleSection('contact-menu')">
                <h3 class="text-gray-800 font-semibold">Contact</h3>
                <i class="fas fa-chevron-down text-gray-400 transition-transform duration-200" id="contact-menu-icon"></i>
              </button>
              <h3 class="hidden md:block text-gray-800 font-semibold mb-4">Contact</h3>
              <ul id="contact-menu" class="space-y-3 hidden md:block">
                <li class="flex items-center space-x-3 text-gray-500 text-sm justify-center md:justify-start">
                  <i class="fas fa-map-marker-alt text-gray-600"></i>
                  <span>10 Rue de la Liberté, Étage 3, Appartement 6, Casablanca</span>
                </li>
                <li class="flex items-center space-x-3 text-gray-500 text-sm justify-center md:justify-start">
                  <i class="fas fa-phone text-gray-600"></i>
                  <span>06 69 01 21 46</span>
                </li>
                <li class="flex items-center space-x-3 text-gray-500 text-sm justify-center md:justify-start">
                  <i class="fas fa-envelope text-gray-600"></i>
                  <span>contact@archi-prestige.com</span>
                </li>
              </ul>
            </div>
  
            <div>
              <h3 class="text-gray-800 font-semibold mb-4">Newsletter</h3>
              <form class="space-y-3">
                <div class="flex items-center justify-center md:justify-start">
                  <input
                    type="email"
                    placeholder="Votre email"
                    class="w-full max-w-[200px] md:max-w-none px-4 py-2 rounded-l-md border border-gray-300 focus:outline-none focus:border-gray-600"
                  />
                  <button
                    type="submit"
                    class="bg-gray-800 text-white px-4 py-2 rounded-r-md hover:bg-gray-700 transition-colors"
                  >
                    <i class="fas fa-paper-plane"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
  
        <div class="border-t border-gray-100 pt-8">
          <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="text-gray-500 text-sm text-center md:text-left">
              © 2025 Archi-Prestige Concept. Tous droits réservés.
            </div>
          </div>
        </div>
      </div>
    </footer>
  </template>
  
  <script>
  export default {
    methods: {
      toggleSection(sectionId) {
        const section = document.getElementById(sectionId);
        const icon = document.getElementById(sectionId + '-icon');
        
        section.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
      },
    },
  };
  </script>
  
 