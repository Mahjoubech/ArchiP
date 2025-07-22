<template>
  <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="close"></div>
    
    <div class="flex min-h-screen items-center justify-center p-4">
      <div class="relative bg-white rounded-lg max-w-3xl w-full shadow-xl p-6">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
          <h3 class="text-xl font-semibold text-gray-900">Détails de l'association</h3>
          <button @click="close" class="text-gray-400 hover:text-gray-500">
            <i class="fas fa-times"></i>
          </button>
        </div>
        
        <div v-if="loading" class="p-10 text-center">
          <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-[#00B3AD]"></div>
          <p class="mt-2 text-gray-600">Chargement des informations...</p>
        </div>
        
        <div v-else-if="association" class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="md:col-span-1">
            <div class="bg-gray-50 rounded-lg p-5 flex flex-col items-center text-center">
              <div class="h-28 w-28 rounded-full overflow-hidden bg-gray-200 mb-4">
                <img :src="association.logo || 'https://via.placeholder.com/112'" alt="Logo" class="h-full w-full object-cover" />
              </div>
              
              <h4 class="text-lg font-medium text-gray-900">{{ association.nom_association }}</h4>
              <p class="text-sm text-gray-500 mb-2">{{ association.user?.email }}</p>
              <p v-if="association.user?.telephone_1" class="text-sm text-gray-500 mb-3">
                <i class="fas fa-phone mr-1 text-gray-400"></i> {{ association.user?.telephone_1 }}
              </p>
              
              <div class="mt-2 w-full">
                <div class="flex items-center justify-center p-2 rounded mb-4">
                  <span :class="getStatusClass(association.statut_dossier)" class="px-3 py-1.5">
                    {{ association.statut_dossier }}
                  </span>
                </div>
              </div>

              <div class="w-full">
                <div class="flex justify-between items-center p-2 rounded bg-gray-100 mb-2">
                  <span class="text-xs text-gray-500">Ville</span>
                  <span class="text-sm font-medium">{{ association.user?.ville || 'Non renseigné' }}</span>
                </div>
                <div class="flex justify-between items-center p-2 rounded bg-gray-100 mb-2">
                  <span class="text-xs text-gray-500">Date de création</span>
                  <span class="text-sm font-medium">{{ formatDate(association.date_creation) }}</span>
                </div>
                <div class="flex justify-between items-center p-2 rounded bg-gray-100">
                  <span class="text-xs text-gray-500">Numéro RNA</span>
                  <span class="text-sm font-medium">{{ association.numero_rna_association }}</span>
                </div>
              </div>

              <div class="mt-4 w-full flex justify-center space-x-4">
                <a v-if="association.site_web" :href="association.site_web" target="_blank" class="text-gray-600 hover:text-[#00B3AD]">
                  <i class="fas fa-globe text-xl"></i>
                </a>
                <a v-if="association.facebook" :href="association.facebook" target="_blank" class="text-gray-600 hover:text-[#00B3AD]">
                  <i class="fab fa-facebook text-xl"></i>
                </a>
                <a v-if="association.instagram" :href="association.instagram" target="_blank" class="text-gray-600 hover:text-[#00B3AD]">
                  <i class="fab fa-instagram text-xl"></i>
                </a>
              </div>
            </div>
          </div>
          
          <div class="md:col-span-2">
            <div class="mb-5">
              <h4 class="font-medium text-gray-900 mb-2">Représentant</h4>
              <div class="bg-gray-50 rounded-lg p-4 mb-5">
                <div class="flex items-start mb-3">
                  <div class="h-12 w-12 rounded-full overflow-hidden bg-gray-200 mr-3">
                    <img :src="association.user?.image || 'https://via.placeholder.com/48'" alt="Photo de profil" class="h-full w-full object-cover" />
                  </div>
                  <div>
                    <p class="font-medium text-gray-900">{{ association.user?.civilite }} {{ association.user?.prenom }} {{ association.user?.nom }}</p>
                    <p class="text-sm text-gray-600">{{ association.user?.email }}</p>
                    <p class="text-sm text-gray-600">{{ association.user?.telephone_1 }}</p>
                  </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 text-sm">
                  <div>
                    <span class="text-gray-500">CIN:</span>
                    <span class="ml-2 font-medium">{{ association.user?.cin }}</span>
                  </div>
                  <div>
                    <span class="text-gray-500">Date de naissance:</span>
                    <span class="ml-2 font-medium">{{ formatDate(association.user?.date_naissance) }}</span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="mb-5">
              <h4 class="font-medium text-gray-900 mb-2">Description de l'association</h4>
              <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-700 whitespace-pre-line">{{ association.objet_social }}</p>
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
              <div>
                <h4 class="font-medium text-gray-900 mb-2">Statut juridique</h4>
                <div class="bg-gray-50 rounded-lg overflow-hidden h-60">
                  <embed 
                    :src="association.status_association" 
                    type="application/pdf" 
                    class="w-full h-52" 
                  />
                  <div v-if="!association.status_association" class="w-full h-full flex items-center justify-center">
                    <div class="text-center">
                      <i class="fas fa-file-pdf text-red-500 text-3xl mb-2"></i>
                      <p class="text-gray-500 text-sm">PDF non disponible</p>
                    </div>
                  </div>
                  
                  <a 
                    v-if="association.status_association"
                    :href="association.status_association" 
                    target="_blank"
                    class="mt-2 text-sm bg-gray-100 text-[#00B3AD] flex items-center justify-center py-2 hover:bg-gray-200 transition-colors w-full rounded-b-lg"
                  >
                    <i class="fas fa-external-link-alt mr-2"></i>
                    Voir le document en plein écran
                  </a>
                </div>
              </div>
              
              <div>
                <h4 class="font-medium text-gray-900 mb-2">Carte nationale</h4>
                <div class="bg-gray-50 rounded-lg overflow-hidden h-60">
                  <div class="h-52 flex items-center justify-center p-2">
                    <img 
                      :src="association.carte_nationale" 
                      alt="Carte nationale" 
                      class="max-w-full max-h-full object-contain" 
                    />
                  </div>
                  
                  <a 
                    v-if="association.carte_nationale"
                    :href="association.carte_nationale" 
                    target="_blank"
                    class="mt-2 text-sm bg-gray-100 text-[#00B3AD] flex items-center justify-center py-2 hover:bg-gray-200 transition-colors w-full rounded-b-lg"
                  >
                    <i class="fas fa-external-link-alt mr-2"></i>
                    Voir l'image en plein écran
                  </a>
                </div>
              </div>
            </div>
            
            <div class="bg-gray-50 rounded-lg p-4">
              <h4 class="font-medium text-gray-900 mb-2">Adresse</h4>
              <p class="text-sm text-gray-700">{{ association.user?.adresse }}</p>
              <p class="text-sm text-gray-700">{{ association.user?.ville }}</p>
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
import adminApi from '@/api/adminDashbaord';

export default {
  props: {
    show: {
      type: Boolean,
      default: false
    },
    associationData: {
      type: Object,
      default: null
    }
  },
  data() {
    return {
      association: null,
      loading: false,
      error: null,
    };
  },
  watch: {
    show(newVal) {
      if (newVal && this.associationData) {
        this.loadAssociationDetails();
      }
    },
    associationData(newVal) {
      if (newVal && this.show) {
        this.loadAssociationDetails();
      }
    }
  },
  methods: {
    async loadAssociationDetails() {
      if (!this.associationData || !this.associationData.id) {
        this.error = "Impossible de charger les détails de l'association";
        return;
      }
      
      this.loading = true;
      
      try {
        const token = sessionStorage.getItem('authToken');
        if (this.associationData.user) {
          this.association = this.associationData;
          this.error = null;
        } else {
          const response = await adminApi.getAssociationDetails(token, this.associationData.id);
          this.association = response.data.association;
          this.error = null;
        }
      } catch (error) {
        console.error('Erreur lors du chargement des détails de l\'association:', error);
        this.error = "Impossible de charger les détails de l'association";
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
    getStatusClass(status) {
      const classes = {
        'actif': 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800',
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

<style scoped>
.h-52 {
  height: 13rem;
}

.h-60 {
  height: 15rem;
}
</style>