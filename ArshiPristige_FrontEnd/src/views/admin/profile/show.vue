<template>
  <div class="min-h-screen bg-[#F8F9FE]">
    <template v-if="loading">
      <div class="min-h-[calc(100vh-160px)] bg-[#F8F9FE] flex items-center justify-center">
        <div class="flex flex-col items-center">
          <LoadingSpinner />
        </div>
      </div>
    </template>
    <template v-else>
      <div class="bg-white border-b">
        <div class="container mx-auto">
          <div class="px-4 py-8">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-start gap-8">
              <div class="flex-shrink-0">
                <div class="relative group">
                  <div class="w-36 h-36 rounded-full overflow-hidden bg-gray-100 border-4 border-white shadow-lg">
                    <img 
                      :src="profileData.image || 'https://via.placeholder.com/150'" 
                      alt="Photo de profil"
                      class="w-full h-full object-cover"
                    />
                  </div>
                </div>
              </div>

              <div class="flex-1">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                  <div>
                    <div class="flex items-center gap-3">
                      <h1 class="text-2xl font-bold text-gray-900">
                        {{ profileData.civilite }} {{ profileData.prenom }} {{ profileData.nom }}
                      </h1>
                      <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded flex items-center">
                        <i class="fas fa-user-shield mr-1"></i> Admin
                      </span>
                    </div>
                    <div class="mt-2 text-gray-600 space-y-1">
                      <p class="flex items-center">
                        <i class="fas fa-envelope w-5 text-[#C9559B]"></i>
                        {{ profileData.email }}
                      </p>
                      <p class="flex items-center">
                        <i class="fas fa-phone w-5 text-[#C9559B]"></i>
                        {{ profileData.telephone_1 }}
                      </p>
                      <p class="flex items-center">
                        <i class="fas fa-map-marker-alt w-5 text-[#C9559B]"></i>
                        {{ profileData.ville }}, Maroc
                      </p>
                    </div>
                  </div>
                  <div class="flex gap-4">
                    <button @click="toggleEditModal" class="px-4 py-2 border-2 border-[#00B3AD] text-[#00B3AD] rounded-lg hover:bg-[#00B3AD] hover:text-white transition-colors duration-200 flex items-center font-medium text-sm">
                      <i class="fas fa-edit mr-2"></i>
                      Modifier le profil
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="space-y-8">
              <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                  <div class="flex items-center space-x-3">
                    <i class="fas fa-id-card text-[#C9559B] text-xl"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Informations Personnelles</h2>
                  </div>
                </div>

                <div class="space-y-4">
                  <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                    <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                      <i class="fas fa-user text-[#00B3AD]"></i>
                    </div>
                    <div>
                      <p class="text-sm text-gray-500">ID</p>
                      <p class="font-medium text-gray-900">{{ profileData.id }}</p>
                    </div>
                  </div>
                  
                  <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                    <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                      <i class="fas fa-user-tag text-[#00B3AD]"></i>
                    </div>
                    <div>
                      <p class="text-sm text-gray-500">Civilité</p>
                      <p class="font-medium text-gray-900">{{ profileData.civilite }}</p>
                    </div>
                  </div>

                  <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                    <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                      <i class="fas fa-id-card text-[#00B3AD]"></i>
                    </div>
                    <div>
                      <p class="text-sm text-gray-500">CIN</p>
                      <p class="font-medium text-gray-900">{{ profileData.cin }}</p>
                    </div>
                  </div>
                  
                  <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                    <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                      <i class="fas fa-birthday-cake text-[#00B3AD]"></i>
                    </div>
                    <div>
                      <p class="text-sm text-gray-500">Date de naissance</p>
                      <p class="font-medium text-gray-900">{{ formatDate(profileData.date_naissance) }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="lg:col-span-2 space-y-8">
              <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                  <div class="flex items-center space-x-3">
                    <i class="fas fa-map-marked-alt text-[#C9559B] text-xl"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Adresse et Contact</h2>
                  </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="p-4 rounded-lg bg-gray-50">
                    <div class="flex items-center mb-3">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10 mr-3">
                        <i class="fas fa-map-marker-alt text-[#00B3AD]"></i>
                      </div>
                      <p class="font-medium text-gray-900">Adresse</p>
                    </div>
                    <p class="ml-13 text-gray-700">{{ profileData.adresse }}</p>
                    <p class="ml-13 text-gray-700">{{ profileData.ville }}, Maroc</p>
                  </div>
                  
                  <div class="p-4 rounded-lg bg-gray-50">
                    <div class="flex items-center mb-3">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10 mr-3">
                        <i class="fas fa-envelope text-[#00B3AD]"></i>
                      </div>
                      <p class="font-medium text-gray-900">Email</p>
                    </div>
                    <p class="ml-13 text-gray-700">{{ profileData.email }}</p>
                  </div>
                  
                  <div class="p-4 rounded-lg bg-gray-50">
                    <div class="flex items-center mb-3">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10 mr-3">
                        <i class="fas fa-phone text-[#00B3AD]"></i>
                      </div>
                      <p class="font-medium text-gray-900">Téléphone principal</p>
                    </div>
                    <p class="ml-13 text-gray-700">{{ profileData.telephone_1 }}</p>
                  </div>
                  
                  <div v-if="profileData.telephone_2" class="p-4 rounded-lg bg-gray-50">
                    <div class="flex items-center mb-3">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10 mr-3">
                        <i class="fas fa-phone-alt text-[#00B3AD]"></i>
                      </div>
                      <p class="font-medium text-gray-900">Téléphone secondaire</p>
                    </div>
                    <p class="ml-13 text-gray-700">{{ profileData.telephone_2 }}</p>
                  </div>
                </div>
              </div>
              
              <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                  <div class="flex items-center space-x-3">
                    <i class="fas fa-lock text-[#C9559B] text-xl"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Sécurité du compte</h2>
                  </div>
                </div>
                
                <div class="grid grid-cols-1 gap-4">
                  <div class="p-6 rounded-lg bg-gray-50 flex flex-col items-center justify-center space-y-4">
                    <div class="h-16 w-16 rounded-full bg-[#00B3AD]/10 flex items-center justify-center">
                      <i class="fas fa-shield-alt text-[#00B3AD] text-2xl"></i>
                    </div>
                    <p class="text-gray-900 font-medium">Mot de passe</p>
                    <button 
                      @click="togglePasswordModal" 
                      class="px-4 py-2 bg-[#00B3AD] text-white rounded-lg text-sm hover:bg-[#00B3AD]/90 transition-colors"
                    >
                      Changer le mot de passe
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
    
    <EditProfileModal 
      v-if="showEditModal"
      :profile-data="profileData"
      @close="toggleEditModal"
      @updated="handleProfileUpdated"
    />
    
    <ChangePasswordModal 
      v-if="showPasswordModal"
      @close="togglePasswordModal"
      @updated="handlePasswordUpdated"
    />
    
  </div>
</template>
<script>
import adminApi from '@/api/adminDashbaord';
import LoadingSpinner from '@/components/LoadingSpinner.vue';
import EditProfileModal from './editProfileModal.vue';
import ChangePasswordModal from './changePasswordModal.vue';

export default {
  components: {
    LoadingSpinner,
    EditProfileModal,
    ChangePasswordModal
  },
  data() {
    return {
      loading: true,
      error: null,
      profileData: {
        id: '',
        civilite: '',
        prenom: '',
        nom: '',
        email: '',
        image: '',
        cin: '',
        adresse: '',
        date_naissance: '',
        ville: '',
        telephone_1: '',
        telephone_2: '',
      },
      showEditModal: false,
      showPasswordModal: false,
    };
  },
  methods: {
    async fetchProfileData() {
      try {
        const token = sessionStorage.getItem('authToken');
        const response = await adminApi.getProfile(token);
        
        if (response.data.admin) {
          this.profileData = {
            ...this.profileData, 
            ...response.data.admin,
          };
        } 
      } catch (error) {
        this.error = error.message || 'Erreur lors de la récupération des données de profil';
      }
    },
    
    toggleEditModal() {
      this.showEditModal = !this.showEditModal;
    },
    
    togglePasswordModal() {
      this.showPasswordModal = !this.showPasswordModal;
    },

    handleProfileUpdated(updatedData) {
      this.profileData = {
        ...this.profileData,
        ...updatedData
      };
    },
    
    formatDate(date) {
      if (!date) return 'N/A';
      const options = { year: "numeric", month: "long", day: "numeric" };
      return new Intl.DateTimeFormat("fr-FR", options).format(new Date(date));
    }
  },
  async created() {
    try {
      this.loading = true;
      await this.fetchProfileData();
    } catch (error) {
      console.error('Error during initialization:', error);
    } finally {
      setTimeout(() => {
        this.loading = false;
      }, 500);
    }
  }
};
</script>