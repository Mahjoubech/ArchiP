<template>
  <div class="flex overflow-hidden">
    <div :class="`bg-white w-64 shadow-lg fixed inset-y-0 left-0 transform transition-transform duration-300 z-20 ${sidebarOpen ? 'translate-x-0' : '-translate-x-full'} lg:translate-x-0`">
      <div class="flex items-center justify-between p-4 border-b">
        <div class="flex items-center">
          <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
            <img src="/images/logo.png" alt="Archi-Prestige Logo" class="w-10 h-10" />
          </div>
          <h1 class="text-2xl font-bold text-gray-800 ml-2" style="font-family: 'ProfessionalFont', sans-serif;">
            <span style="color:rgb(99, 99, 99);">Arshi</span><span>Pristige</span>
          </h1>
        </div>
        <button @click="toggleSidebar" 
                :class="`p-1 text-gray-500 hover:text-gray-800 lg:hidden ${sidebarOpen ? 'block' : 'hidden'}`">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <nav class="p-4 overflow-y-auto" style="max-height: calc(100vh - 140px);">
        <div class="space-y-1">
          <router-link to="/dashboard" 
                     :class="[$route.path === '/dashboard' ? 'bg-gray-100 text-gray-800' : 'text-gray-600 hover:bg-gray-50', 
                             'group flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer']">
            <svg class="mr-3 flex-shrink-0 h-6 w-6" :class="{'text-gray-800': $route.path === '/dashboard', 'text-gray-500': $route.path !== '/dashboard'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Tableau de Bord
          </router-link>

          <div v-if="authStore.isLoggedIn && authStore.role === 'admin'">
          <router-link to="/dashboard/associations" 
             :class="[$route.path === '/dashboard/associations' ? 'bg-gray-100 text-gray-800' : 'text-gray-600 hover:bg-gray-50', 
                     'group flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer']">
           <svg class="mr-3 flex-shrink-0 h-6 w-6" :class="{'text-gray-800': $route.path === '/dashboard/associations', 'text-gray-500': $route.path !== '/dashboard/associations'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
          </svg>
            Associations
          </router-link>
         </div>

         <div v-if="authStore.isLoggedIn && authStore.role === 'admin'">
          <router-link to="/dashboard/categories" 
             :class="[$route.path === '/dashboard/categories' ? 'bg-gray-100 text-gray-800' : 'text-gray-600 hover:bg-gray-50', 
                     'group flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer']">
            <svg class="mr-3 flex-shrink-0 h-6 w-6" :class="{'text-gray-800': $route.path === '/dashboard/categories', 'text-gray-500': $route.path !== '/dashboard/categories'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16M4 8h16M4 12h16M4 16h16M4 20h16" />
            </svg>
            categories
          </router-link>
         </div>
         <div v-if="authStore.isLoggedIn && authStore.role === 'association'">
          <router-link to="/dashboard/benevoles" 
                     :class="[$route.path === '/dashboard/benevoles' ? 'bg-gray-100 text-gray-800' : 'text-gray-600 hover:bg-gray-50', 
                             'group flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer']">
            <svg class="mr-3 flex-shrink-0 h-6 w-6" :class="{'text-gray-800': $route.path === '/dashboard/benevoles', 'text-gray-500': $route.path !== '/dashboard/benevoles'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            Bénévoles
          </router-link>
        </div>
          
          <router-link to="/dashboard/opportunites" 
                     :class="[$route.path === '/dashboard/opportunites' ? 'bg-gray-100 text-gray-800' : 'text-gray-600 hover:bg-gray-50', 
                             'group flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer']">
            <svg class="mr-3 flex-shrink-0 h-6 w-6" :class="{'text-gray-800': $route.path === '/dashboard/opportunites', 'text-gray-500': $route.path !== '/dashboard/opportunites'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Opportunités
          </router-link>
          
          <div v-if="authStore.isLoggedIn && authStore.role === 'admin'">
            <router-link to="/dashboard/formations"  
                       :class="[$route.path === '/dashboard/formations' ? 'bg-gray-100 text-gray-800' : 'text-gray-600 hover:bg-gray-50', 
                             'group flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer']">
              <svg class="mr-3 flex-shrink-0 h-6 w-6" :class="{'text-gray-800': $route.path === '/dashboard/formations', 'text-gray-500': $route.path !== '/dashboard/formations'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998a12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
              </svg>
              Formations
            </router-link>
          </div>
          <div v-if="authStore.isLoggedIn && authStore.role === 'association'">
          <router-link to="/dashboard/certifications" 
                     :class="[$route.path === '/dashboard/certifications' ? 'bg-gray-100 text-gray-800' : 'text-gray-600 hover:bg-gray-50', 
                             'group flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer']">
            <svg class="mr-3 flex-shrink-0 h-6 w-6" :class="{'text-gray-800': $route.path === '/dashboard/certifications', 'text-gray-500': $route.path !== '/dashboard/certifications'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
            </svg>
            Certifications
          </router-link>
        </div>

            <div v-if="authStore.isLoggedIn && authStore.role === 'admin'">
            <router-link to="/dashboard/contacts"  
                      :class="[$route.path === '/dashboard/contacts' ? 'bg-gray-100 text-gray-800' : 'text-gray-600 hover:bg-gray-50', 
                            'group flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer']">
              <svg class="mr-3 flex-shrink-0 h-6 w-6" :class="{'text-gray-800': $route.path === '/dashboard/contacts', 'text-gray-500': $route.path !== '/dashboard/contacts'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              Contact
            </router-link>
          </div>
          <router-link to="/dashboard/profile" 
                     :class="[$route.path === '/dashboard/profile' ? 'bg-gray-100 text-gray-800' : 'text-gray-600 hover:bg-gray-50', 
                             'group flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer']">
            <svg class="mr-3 flex-shrink-0 h-6 w-6" :class="{'text-gray-800': $route.path === '/dashboard/profile', 'text-gray-500': $route.path !== '/dashboard/profile'}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Profile
          </router-link>
        </div>
      </nav>

      <div class="absolute bottom-0 w-full p-4 border-t">
        <button @click="logout" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-50 text-red-600 rounded-md hover:bg-red-100 transition-colors text-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
          </svg>
          <span>Déconnexion</span>
        </button>
      </div>
    </div>

    <div class="flex-1 flex flex-col lg:ml-64">
      <div class="bg-white shadow-sm sticky top-0 z-10 w-full">
        <div class="px-4 py-3 flex justify-between items-center">
          <div class="flex items-center space-x-3">
            <button @click="toggleSidebar" class="p-1 text-gray-500 hover:text-gray-800 lg:hidden">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
            <div>
              <h1 class="text-2xl font-bold text-gray-800">{{ getPageTitle }}</h1>
              <p v-if="getPageSubtitle" class="text-gray-500">{{ getPageSubtitle }}</p>
            </div>
          </div>

          <div class="flex items-center space-x-4">
            <div class="relative">
              <button class="p-2 bg-gray-100 rounded-full text-gray-600 hover:bg-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="absolute -top-1 -right-1 h-5 w-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">{{ notificationCount }}</span>
              </button>
            </div>
            <div class="relative" ref="profileMenu">
              <RouterLink to="/dashboard/profile">
                <div v-if="authStore.isLoggedIn && authStore.role === 'association'">
              <button @click="profileMenuOpen = !profileMenuOpen" class="flex items-center space-x-2 focus:outline-none">
                <img :src="profileData.logo" alt="Profile" class="w-8 h-8 rounded-full border-2 border-gray-600">
                <div class="hidden md:flex flex-col">
                <span class="text-sm font-bold text-gray-800 truncate max-w-[150px] group-hover:text-gray-600 transition-colors">
                  {{ profileData.nom_association}}
                </span>
                <span class="text-xs text-gray-500">
                  <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>Connecté
                </span>
              </div>         
              </button>
            </div>
            <div v-if="authStore.isLoggedIn && authStore.role === 'admin'">
              <button @click="profileMenuOpen = !profileMenuOpen" class="flex items-center space-x-2 focus:outline-none">
                <img :src="authStore.user.image" alt="Profile" class="w-8 h-8 rounded-full border-2 border-gray-600">
                <div class="hidden md:flex flex-col">
                <span class="text-sm font-bold text-gray-800 truncate max-w-[150px] group-hover:text-gray-600 transition-colors">
                  {{ authStore.user.prenom }} {{ authStore.user.nom }}
                </span>
                <span class="text-xs text-gray-500">
                  <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>Connecté
                </span>
              </div>         
              </button>
            </div>

            </RouterLink>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</template>

<script>
import { authStore } from "@/stores/auth";
import associationDashboardApi from '@/api/associationDashboard';
import { RouterLink } from "vue-router";

export default {
  name: 'DashboardNavbar',
  data() {
    return {
      sidebarOpen: false,
      profileMenuOpen: false,
      authStore,
      profileData: {
        nom_association: '',
        logo: '',
      },
      error: null,
      notificationCount: 3, 
    };
  },
  computed: {
    getPageTitle() {
      const path = this.$route.path;
      const titles = {
        '/dashboard': 'Tableau de Bord',
        '/dashboard/benevoles': 'Gestion des Bénévoles',
        '/dashboard/opportunites': 'Gestion des Opportunités',
        '/dashboard/formations': 'Formations',
        '/dashboard/certifications': 'Certifications',
        '/dashboard/profile': 'Profile',
        '/dashboard/associations': 'Associations',
        '/dashboard/categories': 'Catégories',
        '/dashboard/contacts': 'Messages de Contact'
      };
      return titles[path] || 'Tableau de Bord';
    },
    getPageSubtitle() {
      const path = this.$route.path;
      const subtitles = {
        '/dashboard': 'Bienvenue sur votre espace de gestion',
        '/dashboard/benevoles': 'Gérez vos annonces de bénévolat et suivez les candidatures',
        '/dashboard/opportunites': 'Créez et gérez vos offres de bénévolat',
        '/dashboard/formations': 'Proposez et suivez des programmes de formation',
        '/dashboard/certifications': 'Attribuez et suivez les certifications',
        '/dashboard/profile': 'Personnalisez votre profil et vos paramètres.',
        '/dashboard/associations': 'Gérez les associations partenaires et leurs informations',
        '/dashboard/categories': 'Créez et modifiez les catégories d\'opportunités',
        '/dashboard/contacts': 'Consultez les messages envoyés via le formulaire de contact'
      };
      return subtitles[path] || '';
    }
  },
  methods: {
    toggleSidebar() {
      this.sidebarOpen = !this.sidebarOpen;
    },
    async logout() {
      await authStore.logout();
      this.$router.push('/login');
    },
    closeProfileMenu(event) {
      if (this.$refs.profileMenu && !this.$refs.profileMenu.contains(event.target)) {
        this.profileMenuOpen = false;
      }
    }, 
    async fetchProfileData() {
      try {
        const token = sessionStorage.getItem('authToken');
        const response = await associationDashboardApi.getProfileAssociation(token);
        
        if (response.data.association) {
          this.profileData = {
            ...this.profileData, 
            ...response.data.association,
          };
        } 
      } catch (error) {
        this.error = error.message || 'Erreur lors de la récupération des données de profil';
        console.error('Erreur lors du chargement du profil:', error);
      }
    },
  },
  created() {
    this.fetchProfileData(); 
  },
  mounted() {
    document.addEventListener('click', this.closeProfileMenu);
    this.$router.afterEach(() => {
      if (this.sidebarOpen) {
        this.sidebarOpen = false;
      }
    });
  },
  beforeUnmount() {
    document.removeEventListener('click', this.closeProfileMenu);
  }
};
</script>

<style scoped>
.no-scrollbar::-webkit-scrollbar {
  display: none;
}
.no-scrollbar {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
</style>