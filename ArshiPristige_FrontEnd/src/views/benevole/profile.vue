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
                    :src="profileData.image" 
                    alt="Profile"
                    class="w-full h-full object-cover"
                  />
                  <div v-if="imageUploading" class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <i class="fas fa-spinner fa-spin text-white text-2xl"></i>
                  </div>
                </div>
                
                <button 
                  @click="changeimagebenevole" 
                  class="absolute bottom-2 right-2 bg-white rounded-full p-2 shadow-lg hover:bg-gray-50 transition-colors"
                  :disabled="imageUploading"
                >
                  <i class="fas fa-camera text-[#00B3AD]" v-if="!imageUploading"></i>
                  <i class="fas fa-spinner fa-spin text-[#00B3AD]" v-else></i>
                </button>
                
                <div v-if="imageError" class="absolute -bottom-10 left-0 right-0 text-xs text-red-600 bg-red-100 p-2 rounded">
                  {{ imageError }}
                </div>
              </div>
              </div>

              <div class="flex-1">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                  <div>
                    <div class="flex items-center gap-3">
                      <h1 class="text-2xl font-bold text-gray-900">
                        M. {{ profileData.prenom }} {{ profileData.nom }}
                      </h1>
                    </div>
                    <div class="mt-2 text-gray-600 space-y-1">
                      <p class="flex items-center">
                        <i class="fas fa-map-marker-alt w-5 text-[#C9559B]"></i>
                        {{ profileData.ville }}, Maroc
                      </p>
                      <p class="flex items-center">
                        <i class="fas fa-envelope w-5 text-[#C9559B]"></i>
                        {{ profileData.email }}
                      </p>
                    </div>
                  </div>
                  <div class="flex gap-4">
                    <button @click="toggleBenevoleDetailsModal" class="px-4 py-2 border-2 border-[#00B3AD] text-[#00B3AD] rounded-lg hover:bg-[#00B3AD] hover:text-white transition-colors duration-200 flex items-center font-medium text-sm">
                      <i class="fas fa-edit mr-2"></i>
                      Modifier le profil
                    </button>
                    <a 
                  :href="profileData.cv"
                  download
                  class="px-4 py-2 bg-[#00B3AD] text-white rounded-lg hover:bg-[#00B3AD]/90 transition-colors duration-200 flex items-center font-medium text-sm"
                  :class="{'opacity-50 cursor-not-allowed': !profileData.cv}">
                  <i class="fas fa-download mr-2"></i>
                  CV
                </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
              <div class="flex items-center">
                <div class="h-12 w-12 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                  <i class="fas fa-hands-helping text-[#00B3AD] text-xl"></i>
                </div>
                <div class="ml-4">
                  <p class="text-sm text-gray-500">Missions Complétées</p>
                  <p class="text-2xl font-bold text-gray-900">{{ statistics.participatedOpportunities }}</p>
                </div>
              </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
              <div class="flex items-center">
                <div class="h-12 w-12 rounded-lg flex items-center justify-center bg-[#C9559B]/10">
                  <i class="fas fa-clock text-[#C9559B] text-xl"></i>
                </div>
                <div class="ml-4">
                  <p class="text-sm text-gray-500">Missions en attent</p>
                  <p class="text-2xl font-bold text-gray-900">{{ statistics.pendingOpportunities }}</p>
                </div>
              </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
              <div class="flex items-center">
                <div class="h-12 w-12 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                  <i class="fas fa-star text-[#00B3AD] text-xl"></i>
                </div>
                <div class="ml-4">
                  <p class="text-sm text-gray-500">Missions réfusé</p>
                  <p class="text-2xl font-bold text-gray-900">{{ statistics.refusedOpportunities }}</p>
                </div>
              </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
              <div class="flex items-center">
                <div class="h-12 w-12 rounded-lg flex items-center justify-center bg-[#C9559B]/10">
                  <i class="fas fa-award text-[#C9559B] text-xl"></i>
                </div>
                <div class="ml-4">
                  <p class="text-sm text-gray-500">Certifications</p>
                  <p class="text-2xl font-bold text-gray-900">{{ statistics.certificationsCount }}</p>
                </div>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="space-y-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-3">
                        <i class="fas fa-user-circle text-[#C9559B] text-xl"></i>
                        <h2 class="text-xl font-semibold text-gray-900">Informations Personnelles</h2>
                        </div>
                        <button 
                        @click="toggleUserInfoModal"
                        class="p-2 text-gray-500 hover:text-[#00B3AD] transition-colors rounded-lg hover:bg-[#00B3AD]/10"
                        title="Modifier les informations personnelles"
                        >
                        <i class="fas fa-edit text-lg"></i>
                        </button>
                    </div>

                    <div class="space-y-4">
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

                        <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                            <i class="fas fa-phone text-[#00B3AD]"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Téléphones</p>
                            <p class="font-medium text-gray-900">{{ profileData.telephone_1 }}</p>
                            <p class="font-medium text-gray-900">{{ profileData.telephone_2 }}</p>
                        </div>
                        </div>

                        <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                        <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                            <i class="fas fa-map-marker-alt text-[#00B3AD]"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Adresse</p>
                            <p class="font-medium text-gray-900">{{ profileData.adresse }}</p>
                            <p class="font-medium text-gray-900">{{ profileData.ville }}, Maroc</p>
                        </div>
                        </div>
                    </div>
                </div>

              <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center space-x-3 mb-6">
                  <i class="fas fa-briefcase text-[#C9559B] text-xl"></i>
                  <h2 class="text-xl font-semibold text-gray-900">Formation & Profession</h2>
                </div>
                
                <div class="space-y-4">
                  <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                    <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                      <i class="fas fa-graduation-cap text-[#00B3AD]"></i>
                    </div>
                    <div>
                      <p class="text-sm text-gray-500">Niveau d'études</p>
                      <p class="font-medium text-gray-900">{{ profileData.niveau_etudes }}</p>
                    </div>
                  </div>
                  
                  <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                    <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                      <i class="fas fa-briefcase text-[#00B3AD]"></i>
                    </div>
                    <div>
                      <p class="text-sm text-gray-500">Métier actuel</p>
                      <p class="font-medium text-gray-900">{{ profileData.metier }}</p>
                    </div>
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

            <div class="lg:col-span-2 space-y-8">
              <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                  <div class="flex items-center space-x-3">
                    <i class="fas fa-star text-[#C9559B] text-xl"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Dernières participations</h2>
                  </div>
                </div>
                
                <div v-if="topOpportunites.length === 0" class="flex flex-col items-center justify-center py-8 bg-gray-50 rounded-lg">
                  <i class="fas fa-calendar-times text-[#C9559B] text-3xl mb-3"></i>
                  <p class="text-gray-500">Aucune opportunité pour le moment</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                  <div 
                    v-for="opportunite in topOpportunites" 
                    :key="opportunite.id" 
                    class="group relative bg-white rounded-xl shadow-md overflow-hidden transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl border border-gray-100"
                  >
                    <div class="relative h-40 overflow-hidden">
                      <img 
                        :src="opportunite.image" 
                        :alt="opportunite.titre"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"/>
                      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                      
                      <div class="absolute top-3 right-3">
                        <span 
                        class="bg-gray-100 text-gray-800 px-3 py-1 text-xs font-semibold rounded-full shadow-sm">
                          {{ opportunite.categorie.nom }}
                        </span>
                      </div>
                      
                      <h3 class="absolute bottom-3 left-3 right-3 text-white font-semibold line-clamp-2 text-shadow">
                        {{ opportunite.titre }}
                      </h3>
                    </div>
                    
                    <div class="p-4 bg-white">
                      <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center text-gray-600">
                          <i class="fas fa-calendar-alt text-[#C9559B] mr-2"></i>
                          <span>{{ formatDate(opportunite.date) }}</span>
                        </div>
                        
                        <div class="flex items-center text-gray-600">
                          <i class="fas fa-map-marker-alt text-[#C9559B] mr-2"></i>
                          <span>{{ opportunite.ville }}</span>
                        </div>
                      </div>
                      
                      <div class="mt-3 text-center">
                        <button class="w-full py-2 px-4 bg-[#00B3AD]/10 hover:bg-[#00B3AD]/20 text-[#00B3AD] font-medium rounded-lg transition-all duration-200 text-sm">
                          Voir les détails
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                  <div class="flex items-center space-x-3">
                    <i class="fas fa-award text-[#C9559B] text-xl"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Mes Certifications</h2>
                </div>
              <router-link 
                to="/certifications" class="text-sm text-[#00B3AD] hover:underline flex items-center gap-1">
                  <span>Voir tout</span>
                  <i class="fas fa-chevron-right"></i>
              </router-link>
                </div>
                
                <div v-if="certifications.length === 0" class="flex flex-col items-center justify-center py-8 bg-gray-50 rounded-lg">
                  <i class="fas fa-calendar-times text-[#C9559B] text-3xl mb-3"></i>
                  <p class="text-gray-500">Aucune Certifications pour le moment</p>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                  <div 
                    v-for="cert in certifications" 
                    :key="cert.id" 
                    class="group relative bg-white rounded-xl shadow-md overflow-hidden transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl border border-gray-100"
                  >
                    <div class="relative h-40 overflow-hidden">
                      <div 
                          class="relative h-36 w-full overflow-hidden cursor-pointer bg-gray-50"
                          @click="openCertificationImage(cert.image_path)"
                        >
                          <img 
                            :src="cert.image_path" 
                            :alt="'Certification '"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"/>
                          
                          <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white text-xs px-2 py-1 bg-black/50 rounded">Cliquer pour agrandir</span>
                          </div>
                        </div>
                    </div>
                    
                    <div class="p-4 bg-white">
                      <h4 class="font-medium text-gray-900 line-clamp-1 mb-1">
                        <i class="fas fa-certificate text-[#C9559B] mr-2"></i>
                            {{ cert.opportunite.titre }}
                          </h4>
                      <div class="flex items-center justify-between text-sm">
                       
                        <div class="flex items-center text-gray-600">
                          <i class="fas fa-calendar-alt text-[#C9559B] mr-2"></i>
                          <span>{{ formatDate(cert.created_at)  }}</span>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                  <div class="flex items-center space-x-3">
                    <i class="fas fa-user-check text-[#C9559B] text-xl"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Profil de compétences</h2>
                  </div>
                  <button @click="toggleBenevoleDetailsModal" class="p-2 text-gray-500 hover:text-[#00B3AD] transition-colors rounded-lg hover:bg-[#00B3AD]/10">
                    <i class="fas fa-edit text-lg"></i>
                  </button>
                </div>
                
                <div class="grid grid-cols-1 gap-6">
                  <div class="space-y-3">
                    <div class="flex items-center space-x-3 mb-2">
                      <i class="fas fa-bullseye text-[#00B3AD] text-lg"></i>
                      <h3 class="font-medium text-gray-900">Domaines d'action</h3>
                    </div>
                    <div class="flex flex-wrap gap-2">
                      <span 
                        v-for="domaine in parsedDomainesAction" 
                        class="px-3 py-1.5 bg-[#00B3AD]/10 text-[#00B3AD] rounded-full text-sm font-medium hover:bg-[#00B3AD]/15 transition-colors">
                        {{ domaine }}
                      </span>
                      <span v-if="parsedDomainesAction.length === 0" class="text-gray-500 italic">Aucun domaine d'action spécifié</span>
                    </div>
                  </div>
                  
                  <div class="border-t border-gray-100"></div>
                  
                  <div class="space-y-3">
                    <div class="flex items-center space-x-3 mb-2">
                      <i class="fas fa-calendar-alt text-[#00B3AD] text-lg"></i>
                      <h3 class="font-medium text-gray-900">Disponibilités</h3>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                      <div class="prose prose-sm max-w-none text-gray-700">
                        {{ profileData.disponibilites || 'Aucune disponibilité spécifiée' }}
                      </div>
                    </div>
                  </div>
                  
                  <div class="border-t border-gray-100"></div>
                  <div class="space-y-3">
                    <div class="flex items-center space-x-3 mb-2">
                      <i class="fas fa-calendar-alt text-[#00B3AD] text-lg"></i>
                      <h3 class="font-medium text-gray-900">Talents et compétences</h3>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                      <div class="prose prose-sm max-w-none text-gray-700">
                        {{ profileData.talents || 'Aucune disponibilité spécifiée' }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </template>
    
    <div
      v-if="showCertificationImageModal"
      class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-75"
      @click="showCertificationImageModal = false"
    >
      <div class="relative max-w-4xl max-h-[90vh] bg-white rounded-lg overflow-hidden" @click.stop>
        <button 
          @click="showCertificationImageModal = false"
          class="absolute top-3 right-3 bg-white rounded-full p-2 shadow-lg z-10"
        >
          <i class="fas fa-times text-gray-700"></i>
        </button>
        <div class="p-2">
          <img 
            :src="selectedCertificationImage" 
            alt="Certification" 
            class="w-full h-auto max-h-[80vh] object-contain"
          />
        </div>
      </div>
    </div>
    
    <UpdateUserInfoModal 
      :show="showUserInfoModal"
      :user-data="profileData"
      @close="toggleUserInfoModal"
      @updated="handleUserInfoUpdated"
    />
    <UpdateBenevoleDetailsModal 
      :show="showBenevoleDetailsModal"
      :user-data="profileData"
      @close="toggleBenevoleDetailsModal"
      @updated="handleBenevoleDetailsUpdated"
    />
    <ChangePasswordModal 
      v-if="showPasswordModal"
      @close="togglePasswordModal"
      @updated="handlePasswordUpdated"
    />
  </div>
</template>

<script>
import profileApi from '@/api/profile';
import certifApi from '@/api/certification';
import statistiquesApi from '@/api/statistiques';
import LoadingSpinner from "@/components/LoadingSpinner.vue";
import UpdateUserInfoModal from './updateUserInfoModal.vue';
import UpdateBenevoleDetailsModal from './updateBenevoleDetailsModal.vue';
import ChangePasswordModal from '../admin/profile/changePasswordModal.vue';


export default {
  components: {
    LoadingSpinner,
    UpdateUserInfoModal,
    UpdateBenevoleDetailsModal,
    ChangePasswordModal
  },
  
  data() {
    return {
      loading: true,
      error: null,
      profileData: {
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
        domaines_action: '[]',
        types_mission: '',
        disponibilites: '',
        missions_preferrees: '[]',
        talents: '',
        niveau_etudes: '',
        metier: '',
        cv: null,
      },
      statistics: {
        participatedOpportunities: 0,
        certificationsCount: 0,
        refusedOpportunities: 0,
        pendingOpportunities: 0
      },
      showUserInfoModal: false,
      showBenevoleDetailsModal: false,
      showPasswordModal: false,
      imageUploading: false,
      imageError: null,
      showCertificationImageModal: false,
      selectedCertificationImage: '',
      // Data loaded from API
      topOpportunites: [],
      certifications: [],
    };
  },

  computed: {
    parsedDomainesAction() {
      return this.parseJsonField(this.profileData.domaines_action);
    },

    parsedMissionsPreferees() {
      return this.parseJsonField(this.profileData.missions_preferrees);
    }
  },

  methods: {
    parseJsonField(field) {
      try {
        return JSON.parse(field);
      } catch {
        return [];
      }
    },
    
    formatDate(date) {
      if (!date) return 'N/A';
      const options = { year: "numeric", month: "long", day: "numeric" };
      return new Intl.DateTimeFormat("fr-FR", options).format(new Date(date));
    },

    async loadAllData() {
      try {
        this.loading = true;
        const token = sessionStorage.getItem('authToken');
        
        const [profileResponse, statsResponse, certResponse, oppResponse] = await Promise.all([
          profileApi.getProfile(token),
          statistiquesApi.getBenevoleStatistics(token),
          certifApi.getCertificationBenevole(token),
          profileApi.getTop3Opportunites(token)
        ]);
        
        if (profileResponse.data.benevole) {
          this.profileData = { ...profileResponse.data.benevole };
        }
        
        if (statsResponse.data) {
          this.statistics = { ...statsResponse.data };
        }
        
        this.certifications = certResponse.data.last_certifications || [];
        
        this.topOpportunites = oppResponse.data.opportunites || [];
        
      } catch (error) {
        this.error = error.message || "Une erreur s'est produite lors du chargement des données";
        console.error('Error loading data:', error);
      } finally {
        setTimeout(() => {
          this.loading = false;
        }, 500);
      }
    },
    
    openCertificationImage(imageUrl) {
      if (!imageUrl) return;
      this.selectedCertificationImage = imageUrl;
      this.showCertificationImageModal = true;
    },
    
    changeimagebenevole() {
      this.imageError = null;
      const fileInput = document.createElement('input');
      fileInput.type = 'file';
      fileInput.accept = 'image/jpeg,image/png,image/jpg';
      fileInput.onchange = this.changeimage;
      fileInput.click();
    },
    
    async changeimage(event) {
      const file = event.target.files[0];
      if (!file) return;
      
      const validTypes = ['image/jpeg', 'image/jpg', 'image/png'];
      if (!validTypes.includes(file.type)) {
        this.imageError = 'Format de fichier non valide. Utilisez JPG, JPEG ou PNG.';
        return;
      }
      
      if (file.size > 2 * 1024 * 1024) {
        this.imageError = 'L\'image ne doit pas dépasser 2MB.';
        return;
      }
      
      try {
        this.imageUploading = true;
        
        const formData = new FormData();
        formData.append('image', file); 
        
        const token = sessionStorage.getItem('authToken');
        await profileApi.updateUserInfo(formData, token);
        
        const profileResponse = await profileApi.getProfile(token);
        if (profileResponse.data.benevole) {
          this.profileData = { ...profileResponse.data.benevole };
        }
        
      } catch (error) {    
        this.imageError = "Erreur lors du téléchargement de l'image. Veuillez réessayer.";
      } finally {
        this.imageUploading = false;
      }
    },
    
    toggleUserInfoModal() {
      this.showUserInfoModal = !this.showUserInfoModal;
    },
    
    toggleBenevoleDetailsModal() {
      this.showBenevoleDetailsModal = !this.showBenevoleDetailsModal;
    },
    
    handleUserInfoUpdated() {
      const token = sessionStorage.getItem('authToken');
      profileApi.getProfile(token).then(response => {
        if (response.data.benevole) {
          this.profileData = { ...response.data.benevole };
        }
      });
    },
    
    handleBenevoleDetailsUpdated() {
      this.handleUserInfoUpdated();
    },

    togglePasswordModal() {
      this.showPasswordModal = !this.showPasswordModal;
    },
  },

  created() {
    this.loadAllData();
  }
};
</script>