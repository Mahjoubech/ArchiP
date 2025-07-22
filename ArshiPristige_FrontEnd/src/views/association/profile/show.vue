<!-- Association Profile Page -->
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
                    <div class="w-36 h-36 rounded-lg overflow-hidden bg-gray-100 border-4 border-white shadow-lg">
                      <img 
                        :src="profileData.logo" 
                        alt="Logo Association"
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
                          {{ profileData.nom_association }}
                        </h1>
                        <span v-if="profileData.verified" class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded flex items-center">
                          <i class="fas fa-check-circle mr-1"></i> Vérifiée
                        </span>
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
                        <p class="flex items-center">
                          <i class="fas fa-id-card w-5 text-[#C9559B]"></i>
                          RNA: {{ profileData.numero_rna_association }}
                        </p>
                      </div>
                    </div>
                    <div class="flex gap-4">
                      <button @click="toggleAssociationDetailsModal" class="px-4 py-2 border-2 border-[#00B3AD] text-[#00B3AD] rounded-lg hover:bg-[#00B3AD] hover:text-white transition-colors duration-200 flex items-center font-medium text-sm">
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
                      <i class="fas fa-user-tie text-[#C9559B] text-xl"></i>
                      <h2 class="text-xl font-semibold text-gray-900">Président de l'Association</h2>
                    </div>
                    <button 
                      @click="toggleUserInfoModal"
                      class="p-2 text-gray-500 hover:text-[#00B3AD] transition-colors rounded-lg hover:bg-[#00B3AD]/10"
                      title="Modifier les informations"
                    >
                      <i class="fas fa-edit text-lg"></i>
                    </button>
                  </div>
  
                  <div class="space-y-4">
                    <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fas fa-user text-[#00B3AD]"></i>
                      </div>
                      <div>
                        <p class="text-sm text-gray-500">Nom complet</p>
                        <p class="font-medium text-gray-900">{{ profileData.nom }} {{ profileData.prenom }}</p>
                      </div>
                    </div>
  
                    <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fas fa-envelope text-[#00B3AD]"></i>
                      </div>
                      <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-medium text-gray-900">{{ profileData.email }}</p>
                      </div>
                    </div>
  
                    <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fas fa-id-card text-[#00B3AD]"></i>
                      </div>
                      <div>
                        <p class="text-sm text-gray-500">N° Carte Nationale</p>
                        <p class="font-medium text-gray-900">{{ profileData.cin }}</p>
                      </div>
                    </div>
  
                    <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fas fa-phone text-[#00B3AD]"></i>
                      </div>
                      <div>
                        <p class="text-sm text-gray-500">Téléphone</p>
                        <p class="font-medium text-gray-900">{{ profileData.telephone_1 }}</p>
                        <p v-if="profileData.telephone_2" class="font-medium text-gray-900">{{ profileData.telephone_2 }}</p>
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                  <div class="flex items-center space-x-3 mb-6">
                    <i class="fas fa-balance-scale text-[#C9559B] text-xl"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Informations Légales</h2>
                  </div>
                  
                  <div class="space-y-4">
                    <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fas fa-id-card text-[#00B3AD]"></i>
                      </div>
                      <div>
                        <p class="text-sm text-gray-500">N° RNA</p>
                        <p class="font-medium text-gray-900">{{ profileData.numero_rna_association }}</p>
                      </div>
                    </div>
  
                    <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fas fa-calendar-alt text-[#00B3AD]"></i>
                      </div>
                      <div>
                        <p class="text-sm text-gray-500">Date de création</p>
                        <p class="font-medium text-gray-900">{{ formatDate(profileData.date_creation) }}</p>
                      </div>
                    </div>
  
                    <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fas fa-map-marker-alt text-[#00B3AD]"></i>
                      </div>
                      <div>
                        <p class="text-sm text-gray-500">Siège social</p>
                        <p class="font-medium text-gray-900">{{ profileData.siege_social }}</p>
                        <p class="font-medium text-gray-900">{{ profileData.ville }}, Maroc</p>
                      </div>
                    </div>
  
                    <div class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fas fa-file-contract text-[#00B3AD]"></i>
                      </div>
                      <div>
                        <p class="text-sm text-gray-500">Statut juridique</p>
                        <p class="font-medium text-gray-900">{{ profileData.statut_juridique }}</p>
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                  <div class="flex items-center space-x-3 mb-6">
                    <i class="fas fa-link text-[#C9559B] text-xl"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Liens & Médias Sociaux</h2>
                  </div>
                  
                  <div class="space-y-4">
                    <div v-if="profileData.site_web" class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fas fa-globe text-[#00B3AD]"></i>
                      </div>
                      <div class="flex-1 overflow-hidden">
                        <p class="text-sm text-gray-500">Site web</p>
                        <a :href="profileData.site_web" target="_blank" class="font-medium text-blue-600 hover:underline truncate block">
                          {{ profileData.site_web }}
                        </a>
                      </div>
                    </div>
                    
                    <div v-if="profileData.facebook" class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fab fa-facebook-f text-[#00B3AD]"></i>
                      </div>
                      <div class="flex-1 overflow-hidden">
                        <p class="text-sm text-gray-500">Facebook</p>
                        <a :href="profileData.facebook" target="_blank" class="font-medium text-blue-600 hover:underline truncate block">
                          {{ profileData.facebook }}
                        </a>
                      </div>
                    </div>
                    
                    <div v-if="profileData.instagram" class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fab fa-instagram text-[#00B3AD]"></i>
                      </div>
                      <div class="flex-1 overflow-hidden">
                        <p class="text-sm text-gray-500">Instagram</p>
                        <a :href="profileData.instagram" target="_blank" class="font-medium text-blue-600 hover:underline truncate block">
                          {{ profileData.instagram }}
                        </a>
                      </div>
                    </div>
                    
                    <div v-if="profileData.linkedin" class="p-4 rounded-lg bg-gray-50 flex items-center space-x-4">
                      <div class="h-10 w-10 rounded-lg flex items-center justify-center bg-[#00B3AD]/10">
                        <i class="fab fa-linkedin-in text-[#00B3AD]"></i>
                      </div>
                      <div class="flex-1 overflow-hidden">
                        <p class="text-sm text-gray-500">LinkedIn</p>
                        <a :href="profileData.linkedin" target="_blank" class="font-medium text-blue-600 hover:underline truncate block">
                          {{ profileData.linkedin }}
                        </a>
                      </div>
                    </div>
                    
                    <div v-if="!profileData.site_web && !profileData.facebook && !profileData.instagram && !profileData.linkedin" class="text-center py-4 text-gray-500 italic">
                      Aucun lien social ajouté
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                  <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                      <i class="fas fa-align-left text-[#C9559B] text-xl"></i>
                      <h2 class="text-xl font-semibold text-gray-900">Présentation</h2>
                    </div>
                    <button 
                      @click="toggleAssociationDetailsModal"
                      class="p-2 text-gray-500 hover:text-[#00B3AD] transition-colors rounded-lg hover:bg-[#00B3AD]/10"
                    >
                      <i class="fas fa-edit text-lg"></i>
                    </button>
                  </div>
                  
                  <div class="bg-gray-50 rounded-lg p-5">
                    <div class="prose prose-sm max-w-none text-gray-700">
                      <p v-if="profileData.objet_social">{{ profileData.objet_social }}</p>
                      <p v-else class="text-gray-500 italic text-center">Aucune description disponible</p>
                    </div>
                  </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                  <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                      <i class="fas fa-bullhorn text-[#C9559B] text-xl"></i>
                      <h2 class="text-xl font-semibold text-gray-900">Dernières 4 opportunités</h2>
                    </div>
                    <RouterLink to="/dashboard/opportunites" class="p-2 text-gray-500 hover:text-[#00B3AD] transition-colors rounded-lg hover:bg-[#00B3AD]/10">
                      <i class="fas fa-external-link-alt text-lg"></i>
                    </RouterLink>
                  </div>
                  
                  <div v-if="opportunities.length === 0" class="flex flex-col items-center justify-center py-8 bg-gray-50 rounded-lg">
                    <i class="fas fa-calendar-times text-[#C9559B] text-3xl mb-3"></i>
                    <p class="text-gray-500">Aucune opportunité publiée pour le moment</p>
                    <RouterLink 
                      to="/dashboard/opportunites" 
                      class="mt-3 px-4 py-2 bg-[#00B3AD] text-white rounded-lg text-sm font-medium hover:bg-[#00B3AD]/90 transition-colors"
                    >
                      Créer une opportunité
                    </RouterLink>
                  </div>
                  
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div 
                      v-for="opportunity in opportunities" 
                      :key="opportunity.id" 
                      class="group relative bg-white rounded-xl shadow-md overflow-hidden transform transition-all duration-300 hover:-translate-y-1 hover:shadow-xl border border-gray-100"
                    >
                      <div class="relative h-40 overflow-hidden">
                        <img 
                          :src="opportunity.image || 'https://via.placeholder.com/400x200?text=Opportunité'" 
                          :alt="opportunity.titre"
                          class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        
                        <div class="absolute top-3 right-3">
                          <span 
                            class="bg-gray-100 text-gray-800 px-3 py-1 text-xs font-semibold rounded-full shadow-sm">
                            {{ opportunity.status }}
                          </span>
                        </div>
                        
                        <h3 class="absolute bottom-3 left-3 right-3 text-white font-semibold line-clamp-2 text-shadow">
                          {{ opportunity.titre }}
                        </h3>
                      </div>
                      
                      <div class="p-4 bg-white">
                        <div class="flex items-center justify-between text-sm mb-3">
                          <div class="flex items-center text-gray-600">
                            <i class="fas fa-calendar-alt text-[#C9559B] mr-2"></i>
                            <span>{{ formatDate(opportunity.date) }}</span>
                          </div>
                          
                          <div class="flex items-center text-gray-600">
                            <i class="fas fa-map-marker-alt text-[#C9559B] mr-2"></i>
                            <span>{{ opportunity.ville }}</span>
                          </div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                          <div class="flex items-center text-sm">
                            <span class="bg-[#00B3AD]/10 text-[#00B3AD] px-2 py-1 rounded-md font-medium">
                              <i class="fas fa-users mr-1"></i> {{ opportunity.postules_count }}/{{ opportunity.nb_benevole }}
                            </span>
                          </div>
                          
                          <RouterLink 
                            :to="`/dashboard/opportunites`" 
                            class="text-[#00B3AD] hover:text-[#009b96] font-medium text-sm"
                          >
                            Gérer
                            <i class="fas fa-chevron-right ml-1 text-xs"></i>
                          </RouterLink>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                  <div class="flex items-center space-x-3 mb-6">
                    <i class="fas fa-file-alt text-[#C9559B] text-xl"></i>
                    <h2 class="text-xl font-semibold text-gray-900">Documents Officiels</h2>
                  </div>
                  
                  <div class="space-y-6">
                    <div v-if="profileData.status_association" class="p-4 rounded-lg bg-gray-50">
                      <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                          <div class="h-12 w-12 rounded-lg flex items-center justify-center bg-red-100">
                            <i class="fas fa-file-pdf text-red-600 text-2xl"></i>
                          </div>
                          <div>
                            <p class="text-sm text-gray-500">Statuts de l'association</p>
                            <p class="text-sm font-medium text-gray-900">Document juridique officiel</p>
                          </div>
                        </div>
                        <div class="flex space-x-2">
                          <a :href="profileData.status_association" target="_blank" 
                             class="p-2 rounded-md bg-gray-200 hover:bg-gray-300 transition-colors" 
                             title="Visualiser">
                            <i class="fas fa-eye text-gray-700"></i>
                          </a>
                          <a :href="profileData.status_association" download 
                             class="p-2 rounded-md bg-[#00B3AD]/10 hover:bg-[#00B3AD]/20 transition-colors" 
                             title="Télécharger">
                            <i class="fas fa-download text-[#00B3AD]"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    
                    <div v-if="profileData.carte_nationale" class="p-4 rounded-lg bg-gray-50">
                      <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                          <div class="h-12 w-12 rounded-lg flex items-center justify-center bg-blue-100">
                            <i class="fas fa-id-card text-blue-600 text-2xl"></i>
                          </div>
                          <div>
                            <p class="text-sm text-gray-500">Carte Nationale d'Identité</p>
                            <p class="text-sm font-medium text-gray-900">Document d'identité du président</p>
                          </div>
                        </div>
                        <div class="flex space-x-2">
                          <a :href="profileData.carte_nationale" target="_blank" 
                             class="p-2 rounded-md bg-gray-200 hover:bg-gray-300 transition-colors" 
                             title="Visualiser">
                            <i class="fas fa-eye text-gray-700"></i>
                          </a>
                          <a :href="profileData.carte_nationale" download 
                             class="p-2 rounded-md bg-[#00B3AD]/10 hover:bg-[#00B3AD]/20 transition-colors" 
                             title="Télécharger">
                            <i class="fas fa-download text-[#00B3AD]"></i>
                          </a>
                        </div>
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
            </div>
          </div>
        </div>
      </template>
      
      <UpdateUserInfoModal 
        :show="showUserInfoModal"
        :user-data="profileData"
        @close="toggleUserInfoModal"
        @updated="handleUserInfoUpdated"
      />
      
      <UpdateAssociationDetailsModal 
        :show="showAssociationDetailsModal"
        :user-data="profileData"
        @close="toggleAssociationDetailsModal"
        @updated="handleAssociationUpdated"
      />

      <ChangePasswordModal 
      v-if="showPasswordModal"
      @close="togglePasswordModal"
      @updated="handlePasswordUpdated"
    />
      
    </div>
  </template>
  
  <script>
  import associationDashboardApi from '@/api/associationDashboard';
  import LoadingSpinner from "@/components/LoadingSpinner.vue";
  import UpdateUserInfoModal from './updatePrisidnetModal.vue';
  import UpdateAssociationDetailsModal from './updateAssociationDetails.vue';
  import { RouterLink } from 'vue-router';
  import ChangePasswordModal from '../../admin/profile/changePasswordModal.vue';

  export default {
    components: {
      LoadingSpinner,
      UpdateUserInfoModal,
      UpdateAssociationDetailsModal,
      RouterLink,
      ChangePasswordModal
    },
    data() {
      return {
        loading: true,
        error: null,
        profileData: {
          nom_association: '',
          numero_rna_association: '',
          email: '',
          logo: '',
          siege_social: '',
          ville: '',
          description: '',
          objet_social: '',
          telephone_1: '',
          telephone_2: '',
          date_creation: '',
          domaines_intervention: '[]',
          site_web: '',
          facebook: '',
          instagram: '',
          linkedin: '',
          documents_juridiques: null,
          verified: false,
          statut_juridique: 'Association',
          status_association: null,
          carte_nationale: null,
          nom: '',
          prenom: '',
          cin: '',
          adresse: '',
          date_naissance: '',
        },
        showUserInfoModal: false,
        showAssociationDetailsModal: false,
        opportunities: [],
        showPasswordModal: false,
      };
    },
  
    computed: {
      parsedDomaines() {
        try {
          return JSON.parse(this.profileData.domaines_intervention);
        } catch {
          return [];
        }
      }
    },
  
    methods: {
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
        }
      },
      
      async fetchOpportunities() {
        try {
          const token = sessionStorage.getItem('authToken');
          const response = await associationDashboardApi.getLastThreeOpportunites(token);
          
          return response.data || []; 
        } catch (error) {
          console.error('Error fetching opportunities:', error);
          return [];
        }
      },
      
      toggleUserInfoModal() {
        this.showUserInfoModal = !this.showUserInfoModal;
      },
      
      toggleAssociationDetailsModal() {
        this.showAssociationDetailsModal = !this.showAssociationDetailsModal;
      },
  
      handleUserInfoUpdated() {
        this.fetchProfileData();
      },
      
      handleAssociationUpdated() {
        this.fetchProfileData();
      },
      
      formatDate(date) {
        if (!date) return 'N/A';
        const options = { year: "numeric", month: "long", day: "numeric" };
        return new Intl.DateTimeFormat("fr-FR", options).format(new Date(date));
      },

      togglePasswordModal() {
      this.showPasswordModal = !this.showPasswordModal;
      }
    },
  
    async created() {
      try {
        this.loading = true;
        await this.fetchProfileData();
        this.opportunities = await this.fetchOpportunities();
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
  
  <style scoped>
  .text-shadow {
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
  }
  </style>