<template>
  <div>
    <div class="bg-[#C9559B] text-white py-2">
      <div class="container mx-auto px-4 flex justify-between items-center text-xs sm:text-sm">
        <div class="flex items-center space-x-2 sm:space-x-4">
          <span><i class="fas fa-envelope mr-1 sm:mr-2"></i>contact@benevolat.org</span>
          <span><i class="fas fa-phone mr-1 sm:mr-2"></i>+212 5 37 57 19 87</span>
        </div>
        <div class="flex space-x-2 sm:space-x-4">
          <a href="#" class="hover:text-gray-200"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="hover:text-gray-200"><i class="fab fa-twitter"></i></a>
          <a href="#" class="hover:text-gray-200"><i class="fab fa-instagram"></i></a>
          <a href="#" class="hover:text-gray-200"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>

    <header class="bg-white navbar-shadow">
      <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-16 items-center px-4">
          <div class="flex items-center">
            <div class="flex items-center">
              <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
                <img src="/images/logo.png" alt="BénévoMaroc Logo" class="w-10 h-10" />
              </div>
              <h1 class="text-2xl font-bold text-gray-800" style="font-family: 'ProfessionalFont', sans-serif;">
                <span style="color: #00B3AD;">BÉNÉVO</span><span>MAROC</span>
              </h1>
            </div>
          </div>

          <nav class="hidden md:flex space-x-6">
            <router-link :to="'/'" :class="{'text-[#C93EA1] hover:text-[#C93EA1] border-b-2 border-[#C93EA1]' : $route.path === '/', 'text-gray-600 hover:text-gray-900': $route.path !== '/'}" class="py-2 text-sm">Accueil</router-link>
            <router-link :to="'/opportunites'" :class="{'text-[#C93EA1] hover:text-[#C93EA1] border-b-2 border-[#C93EA1]' : $route.path === '/opportunites', 'text-gray-600 hover:text-gray-900': $route.path !== '/opportunites'}" class="py-2 text-sm">Opportunités</router-link>
            <router-link :to="'/faq'" :class="{'text-[#C93EA1] hover:text-[#C93EA1] border-b-2 border-[#C93EA1]': $route.path === '/faq', 'text-gray-600 hover:text-gray-900': $route.path !== '/faq'}" class="py-2 text-sm">FAQ</router-link>
            <router-link :to="'/propos'" :class="{'text-[#C93EA1] hover:text-[#C93EA1] border-b-2 border-[#C93EA1]': $route.path === '/propos', 'text-gray-600 hover:text-gray-900': $route.path !== '/propos'}" class="py-2 text-sm">A propos</router-link>
            <router-link :to="'/contact'" :class="{'text-[#C93EA1] hover:text-[#C93EA1] border-b-2 border-[#C93EA1]': $route.path === '/contact', 'text-gray-600 hover:text-gray-900': $route.path !== '/contact'}" class="py-2 text-sm">Contact</router-link>
          </nav>

          <div class="hidden md:block">
            <div class="flex items-center space-x-4">
              <router-link v-if="authStore.isLoggedIn && authStore.role === 'benevole'"   to="/profile">
                <button class="signup-button text-white rounded-md focus:outline-none bg-[#00B3AD] hover:bg-[#3BAFA8] transition-colors flex items-center space-x-2 px-3 py-2">
                  <i class="fas fa-user"></i>
                  <span>Profile</span>
                </button>
              </router-link>
              
              <router-link v-if="authStore.isLoggedIn && (authStore.role === 'association' || authStore.role === 'admin' )"   to="/dashboard">
                <button class="signup-button text-white rounded-md focus:outline-none bg-[#00B3AD] hover:bg-[#3BAFA8] transition-colors flex items-center space-x-2 px-3 py-2">
                  <i class="fas fa-user"></i>
                  <span>Dashboard</span>
                </button>
              </router-link> 

              <button v-if="authStore.isLoggedIn && authStore.role === 'benevole'" class="p-2 text-gray-700 hover:text-[#00B3AD] transition-colors relative">
                <i class="fas fa-bell text-xl"></i>
                <span class="absolute -top-1 -right-1 h-5 w-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">
                  3
                </span>
              </button>
              <button v-if="authStore.isLoggedIn && authStore.role === 'benevole'" @click="goToFormation" class="p-2 text-gray-700 hover:text-[#00B3AD] transition-colors">
                <i class="fas fa-graduation-cap text-xl"></i>
              </button>
              <button v-if="authStore.isLoggedIn" @click="logout" class="p-2 text-gray-700 hover:text-red-600 transition-colors">
                <i class="fas fa-sign-out-alt text-xl"></i>
              </button>

              <router-link v-else to="/register">
                <button class="signup-button text-white rounded-md focus:outline-none bg-[#00B3AD] hover:bg-[#3BAFA8] transition-colors px-3 py-2">
                  S'inscrire
                </button>
              </router-link>
            </div>
          </div>

          <div class="md:hidden flex items-center space-x-2">
            <button v-if="authStore.isLoggedIn" class="p-2 text-gray-700 hover:text-[#00B3AD] transition-colors relative">
              <i class="fas fa-bell text-xl"></i>
              <span class="absolute -top-1 -right-1 h-5 w-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">
                3
              </span>
            </button>
            <button @click="toggleMobileMenu" class="p-1 text-gray-500 focus:outline-none">
              <svg v-if="!isMobileMenuOpen" id="menu-open-icon" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <svg v-else id="menu-close-icon" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>

        <div v-if="isMobileMenuOpen" id="mobile-menu" class="mobile-menu md:hidden border-t border-gray-200">
          <div class="px-4 py-2 space-y-1">
            <router-link to="/" class="block text-gray-600 hover:bg-gray-50 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium" @click="closeMobileMenu">Accueil</router-link>
            <router-link to="/opportunites" class="block text-gray-600 hover:bg-gray-50 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium" @click="closeMobileMenu">Opportunités</router-link>
            <router-link to="/faq" class="block text-gray-600 hover:bg-gray-50 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium" @click="closeMobileMenu">FAQ</router-link>
            <router-link to="/propos" class="block text-gray-600 hover:bg-gray-50 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium" @click="closeMobileMenu">A propos</router-link>
            <router-link to="/contact" class="block text-gray-600 hover:bg-gray-50 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium" @click="closeMobileMenu">Contact</router-link>
          </div>
          
          <div class="px-4 py-2 space-y-1 border-t border-gray-200">
            <router-link to="/Benevoles" class="block text-gray-600 hover:bg-gray-50 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium" @click="closeMobileMenu">Bénévoles</router-link>
            <router-link to="/associations" class="block text-gray-600 hover:bg-gray-50 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium" @click="closeMobileMenu">Associations</router-link>
            <router-link to="/formations" class="block text-gray-600 hover:bg-gray-50 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium" @click="closeMobileMenu">Formation</router-link>
            <router-link to="/guide-Juridique" class="block text-gray-600 hover:bg-gray-50 hover:text-gray-900 px-3 py-2 rounded-md text-base font-medium" @click="closeMobileMenu">Guide Juridique</router-link>
          </div>

          <div class="px-4 py-4 border-t border-gray-200 bg-gray-50">
            <div v-if="authStore.isLoggedIn  && authStore.role === 'benevole'" class="space-y-3">
              <div class="grid grid-cols-2 gap-3">
                <router-link to="/profile" @click="closeMobileMenu">
                  <button class="w-full flex items-center justify-center px-4 py-2 bg-[#00B3AD] text-white rounded-md hover:bg-[#00B3AD]/90 transition-colors text-sm">
                    <i class="fas fa-user-circle mr-2"></i>
                    <span>Mon Profil</span>
                  </button>
                </router-link>
                
                <router-link to="/formations" @click="closeMobileMenu">
                  <button class="w-full flex items-center justify-center px-4 py-2 bg-[#00B3AD]/10 text-[#00B3AD] rounded-md hover:bg-[#00B3AD]/20 transition-colors text-sm">
                    <i class="fas fa-graduation-cap mr-2"></i>
                    <span>Formations</span>
                  </button>
                </router-link>
              </div>
              <button @click="logout" class="w-full flex items-center justify-center px-4 py-2 mt-3 bg-red-50 text-red-600 rounded-md hover:bg-red-100 transition-colors text-sm border border-red-200">
              <i class="fas fa-sign-out-alt mr-2"></i>
              <span>Déconnexion</span>
            </button>
            </div>

            <div v-if="authStore.isLoggedIn && (authStore.role === 'association' || authStore.role === 'admin' )" class="space-y-3">
              <div class="grid grid-cols-2 gap-3">
                <router-link to="/profile" @click="closeMobileMenu">
                  <button class="w-full flex items-center justify-center px-4 py-2 bg-[#00B3AD] text-white rounded-md hover:bg-[#00B3AD]/90 transition-colors text-sm">
                    <i class="fas fa-user-circle mr-2"></i>
                    <span>Mon dashboard</span>
                  </button>
                </router-link>
                
                  <button @click="logout" class="w-full flex items-center justify-center px-4 py-2 bg-red-50 text-red-600 rounded-md hover:bg-[#00B3AD]/20 transition-colors text-sm">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span>Formations</span>
                  </button>
              </div>
          
            </div>

            <router-link v-else to="/register">
              <button class="w-full signup-button text-white rounded-md focus:outline-none bg-[#00B3AD] hover:bg-[#00B3AD]/90 transition-colors py-2 px-4" @click="closeMobileMenu">
                <i class="fas fa-user-plus mr-2"></i>
                S'inscrire
              </button>
            </router-link>
          </div>
        </div>
      </div>
    </header>

    <div class="bg-white border-t border-gray-200 hidden sm:block">
      <div class="max-w-7xl mx-auto">
        <div class="px-4 py-3">
          <div class="flex items-center justify-between space-x-4 overflow-x-auto no-scrollbar">
            <div class="flex items-center space-x-4">
              <div class="flex items-center bg-gray-50 rounded-lg px-3 py-1.5">
                <svg class="w-5 h-5 text-[#00B3AD] mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="current-date text-sm font-medium text-gray-600">2025-04-25</span>
              </div>

              <div class="flex items-center bg-gray-50 rounded-lg px-3 py-1.5">
                <svg class="w-5 h-5 text-[#00B3AD] mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="current-time text-sm font-medium text-gray-600">14:29:38</span>
                <span class="ml-2 text-xs text-gray-400">UTC</span>
              </div>

              <div class="flex items-center bg-gray-50 rounded-lg px-3 py-1.5">
                <svg class="w-5 h-5 text-[#00B3AD] mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                </svg>
                <span class="text-sm font-medium text-gray-600 whitespace-nowrap">Casablanca</span>
                <span class="ml-2 text-xs text-gray-400">Maroc</span>
              </div>
            </div>

            <div class="flex items-center space-x-6">
              <router-link
                :to="'/Benevoles'"
                :class="{
                  'border-[#00B3AD] text-[#00B3AD]': $route.path === '/Benevoles',
                  'border-transparent text-gray-600': $route.path !== '/Benevoles'
                }"
                class="flex items-center py-2 border-b-2 transition-colors duration-200 group"
              >
                <svg class="w-5 h-5 mr-2" :class="{'text-[#00B3AD]': $route.path === '/Benevoles', 'text-gray-400': $route.path !== '/Benevoles'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <span class="text-sm font-medium whitespace-nowrap">Bénévoles</span>
              </router-link>

              <router-link
                :to="'/associations'"
                :class="{
                  'border-[#00B3AD] text-[#00B3AD]': $route.path === '/associations',
                  'border-transparent text-gray-600': $route.path !== '/associations'
                }"
                class="flex items-center py-2 border-b-2 transition-colors duration-200 group"
              >
                <svg class="w-5 h-5 mr-2" :class="{'text-[#00B3AD]': $route.path === '/associations', 'text-gray-400': $route.path !== '/associations'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <span class="text-sm font-medium whitespace-nowrap">Associations</span>
              </router-link>

              <router-link
                :to="'/formations'"
                :class="{
                  'border-[#00B3AD] text-[#00B3AD]': $route.path === '/formations',
                  'border-transparent text-gray-600': $route.path !== '/formations'
                }"
                class="flex items-center py-2 border-b-2 transition-colors duration-200 group"
              >
                <svg class="w-5 h-5 mr-2" :class="{'text-[#00B3AD]': $route.path === '/formations', 'text-gray-400': $route.path !== '/formations'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="text-sm font-medium whitespace-nowrap">Formation</span>
              </router-link>

              <router-link
                :to="'/guide-Juridique'"
                :class="{
                  'border-[#00B3AD] text-[#00B3AD]': $route.path === '/guide-Juridique',
                  'border-transparent text-gray-600': $route.path !== '/guide-Juridique'
                }"
                class="flex items-center py-2 border-b-2 transition-colors duration-200 group"
              >
                <svg class="w-5 h-5 mr-2" :class="{'text-[#00B3AD]': $route.path === '/guide-Juridique', 'text-gray-400': $route.path !== '/guide-Juridique'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <span class="text-sm font-medium whitespace-nowrap">Guide Juridique</span>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { authStore } from "@/stores/auth";

export default {
  data() {
    return {
      isMobileMenuOpen: false,
      currentDate: new Date().toLocaleDateString(),
      currentTime: new Date().toLocaleTimeString(),
      authStore, 
    };
  },
  methods: {
    toggleMobileMenu() {
      this.isMobileMenuOpen = !this.isMobileMenuOpen;
    },
    closeMobileMenu() {
      this.isMobileMenuOpen = false;
    },
    updateDateTime() {
      const now = new Date();
      this.currentDate = now.toISOString().split('T')[0];
      this.currentTime = now.toTimeString().split(' ')[0];
    },
    async logout() {
    this.closeMobileMenu();
    await authStore.logout();
    this.$router.push('/login');

    },
    goToFormation() {
      this.$router.push('/formations');
    }
  },
  mounted() { 
    this.updateDateTime();
    setInterval(this.updateDateTime, 1000);
  }
};
</script>

<style scoped>
.navbar-shadow {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.no-scrollbar::-webkit-scrollbar {
  display: none;
}

.no-scrollbar {
  -ms-overflow-style: none;  
  scrollbar-width: none; 
}

@media (max-width: 640px) {
  .mobile-menu {
    max-height: calc(100vh - 4rem);
    overflow-y: auto;
  }
}
</style>