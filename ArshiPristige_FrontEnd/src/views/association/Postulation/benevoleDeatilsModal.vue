<template>
    <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
      <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="close"></div>
      
      <div class="flex min-h-screen items-center justify-center p-4">
        <div class="relative bg-white rounded-lg max-w-3xl w-full shadow-xl p-6">
          <div class="flex justify-between items-center mb-6 border-b pb-4">
            <h3 class="text-xl font-semibold text-gray-900">Profil du bénévole</h3>
            <button @click="close" class="text-gray-400 hover:text-gray-500">
              <i class="fas fa-times"></i>
            </button>
          </div>
          
          <div v-if="loading" class="p-10 text-center">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-[#00B3AD]"></div>
            <p class="mt-2 text-gray-600">Chargement du profil...</p>
          </div>
          
          <div v-else-if="benevole" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
              <div class="bg-gray-50 rounded-lg p-5 flex flex-col items-center text-center">
                <div class="h-28 w-28 rounded-full overflow-hidden bg-gray-200 mb-4">
                  <img :src="benevole.image || application?.image || 'https://via.placeholder.com/112'" alt="Photo de profil" class="h-full w-full object-cover" />
                </div>
                <h4 class="text-lg font-medium text-gray-900">{{ benevole.prenom }} {{ benevole.nom }}</h4>
                <p class="text-sm text-gray-500 mb-2">{{ benevole.email }}</p>
                <p v-if="benevole.telephone_1" class="text-sm text-gray-500 mb-3">
                  <i class="fas fa-phone mr-1 text-gray-400"></i> {{ benevole.telephone_1 }}
                </p>
                
                <div class="mt-2 w-full">
                  <div class="flex justify-between items-center p-2 rounded bg-gray-100 mb-2">
                    <span class="text-xs text-gray-500">Ville</span>
                    <span class="text-sm font-medium">{{ benevole.ville || 'Non renseigné' }}</span>
                  </div>
                  <div class="flex justify-between items-center p-2 rounded bg-gray-100 mb-2">
                    <span class="text-xs text-gray-500">Métier</span>
                    <span class="text-sm font-medium">{{ benevole.metier || 'Non renseigné' }}</span>
                  </div>
                  <div class="flex justify-between items-center p-2 rounded bg-gray-100">
                    <span class="text-xs text-gray-500">Niveau d'études</span>
                    <span class="text-sm font-medium">{{ benevole.niveau_etudes || 'Non renseigné' }}</span>
                  </div>
                </div>
                
                <div v-if="benevole.cv" class="mt-4 w-full">
                  <a 
                    :href="benevole.cv" 
                    target="_blank" 
                    class="block w-full py-2 px-4 bg-[#00B3AD] text-white rounded-md hover:bg-[#00B3AD]/90 text-center"
                  >
                    <i class="fas fa-file-pdf mr-2"></i> Voir le CV
                  </a>
                </div>
              </div>
            </div>
            
            <div class="md:col-span-2">
              <div>
                <h4 class="font-medium text-gray-900 mb-2">Candidature actuelle</h4>
                <div class="bg-gray-50 rounded-lg p-4 mb-5">
                  <div class="flex items-center justify-between mb-3">
                    <div>
                      <p class="font-medium text-gray-900">{{ application?.titre }}</p>
                      <p class="text-sm text-gray-500">{{ application?.ville }} &bull; {{ formatDate(application?.date) }}</p>
                    </div>
                    <span :class="getStatusClass(application?.etat)">{{ application?.etat }}</span>
                  </div>
                  <div class="text-sm text-gray-600">
                    <p class="mb-2"><span class="font-medium">Date de candidature:</span> {{ formatDateTime(application?.created_at) }}</p>
                    <p><span class="font-medium">Dernier changement de statut:</span> {{ formatDateTime(application?.updated_at) }}</p>
                  </div>
                </div>
              </div>
              
              <div class="mb-5">
                <h4 class="font-medium text-gray-900 mb-2">Domaines d'action</h4>
                <div class="bg-gray-50 rounded-lg p-4">
                  <div v-if="formattedDomaines.length" class="flex flex-wrap gap-2">
                    <span 
                      v-for="domaine in formattedDomaines" 
                      :key="domaine"
                      class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full"
                    >
                      {{ domaine }}
                    </span>
                  </div>
                  <p v-else class="text-sm text-gray-500">Aucun domaine d'action renseigné</p>
                </div>
              </div>
              
              <div class="mb-5">
                <h4 class="font-medium text-gray-900 mb-2">Talents</h4>
                <div class="bg-gray-50 rounded-lg p-4">
                  <div v-if="formattedTalents.length" class="flex flex-wrap gap-2">
                    <span 
                      v-for="talent in formattedTalents" 
                      :key="talent"
                      class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full"
                    >
                      {{ talent }}
                    </span>
                  </div>
                  <p v-else class="text-sm text-gray-500">Aucun talent renseigné</p>
                </div>
              </div>
              
              <div>
                <h4 class="font-medium text-gray-900 mb-2">Missions préférées</h4>
                <div class="bg-gray-50 rounded-lg p-4">
                  <div v-if="formattedMissions.length" class="flex flex-wrap gap-2">
                    <span 
                      v-for="mission in formattedMissions" 
                      :key="mission"
                      class="bg-amber-100 text-amber-800 text-xs px-2 py-1 rounded-full"
                    >
                      {{ mission }}
                    </span>
                  </div>
                  <p v-else class="text-sm text-gray-600">
                    Aucune mission préférée renseignée
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          <div v-else-if="error" class="p-6 text-center text-red-500">
            <i class="fas fa-exclamation-circle text-3xl mb-2"></i>
            <p>{{ error }}</p>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import benevoleApi from '@/api/postulation';
  
  export default {
    props: {
      show: {
        type: Boolean,
        default: false
      },
      application: {
        type: Object,
        default: null
      }
    },
    data() {
      return {
        benevole: null,
        loading: false,
        error: null,
      };
    },
    computed: {
      formattedDomaines() {
        if (!this.benevole || !this.benevole.domaines_action) return [];
        
        try {
          if (typeof this.benevole.domaines_action === 'string') {
            return JSON.parse(this.benevole.domaines_action);
          }
          if (Array.isArray(this.benevole.domaines_action)) {
            return this.benevole.domaines_action;
          }
          return [];
        } catch {
          return [this.benevole.domaines_action];
        }
      },
      formattedTalents() {
        if (!this.benevole || !this.benevole.talents) return [];
        
        try {
          if (typeof this.benevole.talents === 'string') {
            return JSON.parse(this.benevole.talents);
          }
          if (Array.isArray(this.benevole.talents)) {
            return this.benevole.talents;
          }
          return [];
        } catch {
          return [this.benevole.talents];
        }
      },
      formattedMissions() {
        if (!this.benevole || !this.benevole.missions_preferrees) return [];
        
        try {
          if (typeof this.benevole.missions_preferrees === 'string') {
            return JSON.parse(this.benevole.missions_preferrees);
          }
          if (Array.isArray(this.benevole.missions_preferrees)) {
            return this.benevole.missions_preferrees;
          }
          return [];
        } catch {
          return [this.benevole.missions_preferrees];
        }
      }
    },
    watch: {
      show(newVal) {
        if (newVal && this.application) {
          this.loadBenevoleDetails();
        }
      }
    },
    methods: {
      async loadBenevoleDetails() {
        if (!this.application || !this.application.benevole_id) {
          this.error = "Impossible de charger les détails du bénévole";
          return;
        }
        
        this.loading = true;
        
        try {
          const token = sessionStorage.getItem('authToken');
          const response = await benevoleApi.getBenevoleDetails(token, this.application.user_id);
          this.benevole = response.data.benevole;
          this.error = null;
        } catch (error) {
          console.error('Erreur lors du chargement des détails du bénévole:', error);
          this.error = "Impossible de charger les détails du bénévole";
        } finally {
          this.loading = false;
        }
      },
      formatDate(dateString) {
        if (!dateString) return 'N/A';
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', { 
          day: '2-digit', 
          month: '2-digit', 
          year: 'numeric' 
        }).format(date);
      },
      formatDateTime(dateString) {
        if (!dateString) return 'N/A';
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', { 
          day: '2-digit', 
          month: '2-digit', 
          year: 'numeric',
          hour: '2-digit',
          minute: '2-digit'
        }).format(date);
      },
      getStatusClass(status) {
        const classes = {
          'accepté': 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800',
          'refusé': 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800',
          'en attente': 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800'
        };
        return classes[status] || 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800';
      },
      close() {
        this.$emit('close');
      }
    }
  };
  </script>