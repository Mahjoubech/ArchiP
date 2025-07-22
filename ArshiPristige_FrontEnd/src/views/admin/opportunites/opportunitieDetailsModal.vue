<template>
  <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="close"></div>
    
    <div class="flex min-h-screen items-center justify-center p-4">
      <div class="relative bg-white rounded-lg max-w-3xl w-full shadow-xl p-6">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
          <h3 class="text-xl font-semibold text-gray-900">Détails de l'opportunité</h3>
          <button @click="close" class="text-gray-400 hover:text-gray-500">
            <i class="fas fa-times"></i>
          </button>
        </div>
        
        <div v-if="loading" class="p-10 text-center">
          <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-[#00B3AD]"></div>
          <p class="mt-2 text-gray-600">Chargement des informations...</p>
        </div>
        
        <div v-else-if="opportunity" class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="md:col-span-1">
            <div class="bg-gray-50 rounded-lg p-5 flex flex-col items-center text-center">
              <div class="h-28 w-28 rounded-lg overflow-hidden bg-gray-200 mb-4">
                <img :src="opportunity.image" alt="Image" class="h-full w-full object-cover" />
              </div>
              
              <h4 class="text-lg font-medium text-gray-900">{{ opportunity.titre }}</h4>
              <p class="text-sm text-gray-500 mb-3">{{ opportunity.type }}</p>
              
              <div class="mt-2 w-full">
                <div class="flex items-center justify-center p-2 rounded mb-4">
                  <span :class="getStatusClass(opportunity.status)" class="px-3 py-1.5">
                    {{ opportunity.status }}
                  </span>
                </div>
              </div>

              <div class="w-full">
                <div class="flex justify-between items-center p-2 rounded bg-gray-100 mb-2">
                  <span class="text-xs text-gray-500">Date de pub</span>
                  <span class="text-sm font-medium">{{ formatDate(opportunity.created_at) }}</span>
                </div>
                <div class="flex justify-between items-center p-2 rounded bg-gray-100 mb-2">
                  <span class="text-xs text-gray-500">Date de début</span>
                  <span class="text-sm font-medium">{{ formatDate(opportunity.date) }}</span>
                </div>
                <div class="flex justify-between items-center p-2 rounded bg-gray-100">
                  <span class="text-xs text-gray-500">Date de fin</span>
                  <span class="text-sm font-medium">{{ formatDate(opportunity.derniere_date_postule) }}</span>
                </div>
              </div>

              <div class="mt-4 w-full">
                <div class="p-2 rounded bg-gray-100">
                  <span class="text-xs text-gray-500">Lieu</span>
                  <p class="text-sm font-medium">{{ opportunity.adresse }}</p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="md:col-span-2">
            <div class="mb-5">
              <h4 class="font-medium text-gray-900 mb-2">Association</h4>
              <div class="bg-gray-50 rounded-lg p-4 mb-5">
                <div class="flex items-start mb-3">
                  <div class="h-12 w-12 rounded-full overflow-hidden bg-gray-200 mr-3">
                    <img :src="opportunity.association?.logo" alt="Logo association" class="h-full w-full object-cover" />
                  </div>
                  <div>
                    <p class="font-medium text-gray-900">{{ opportunity.association?.nom_association }}</p>
                    <p class="text-sm text-gray-600">{{ opportunity.association?.user?.email }}</p>
                    <p class="text-sm text-gray-600">{{ opportunity.association?.user?.telephone_1 }}</p>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="mb-5">
              <h4 class="font-medium text-gray-900 mb-2">Description de l'opportunité</h4>
              <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-700 whitespace-pre-line">{{ opportunity.description }}</p>
              </div>
            </div>

            <div class="mb-5">
              <h4 class="font-medium text-gray-900 mb-2">Compétences requises</h4>
              <div class="bg-gray-50 rounded-lg p-4">
                <div class="flex flex-wrap gap-2">
                  <span 
                    class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-[#00B3AD]/10 text-[#00B3AD]"
                  >
                  {{opportunity.competences}}
                  </span>
    
                </div>
              </div>
            </div>
            
            <div class="mb-5">
              <h4 class="font-medium text-gray-900 mb-2">Informations supplémentaires</h4>
              <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4">
                  <span class="text-xs text-gray-500">Nombre de places</span>
                  <p class="text-sm font-medium">{{ opportunity.nb_benevole || 'Non spécifié' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                  <span class="text-xs text-gray-500">Durée</span>
                  <p class="text-sm font-medium">{{ opportunity.duree || 'Non spécifiée' }}</p>
                </div>
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
import opportuniteApi from '@/api/adminDashbaord';

export default {
  props: {
    show: {
      type: Boolean,
      default: false
    },
    opportunityId: {
      type: [Number, String],
      default: null
    }
  },
  data() {
    return {
      opportunity: null,
      loading: false,
      error: null,
    };
  },
  watch: {
    show(newVal) {
      if (newVal && this.opportunityId) {
        this.loadOpportunityDetails();
      }
    },
    opportunityId(newVal) {
      if (newVal && this.show) {
        this.loadOpportunityDetails();
      }
    }
  },
  methods: {
    async loadOpportunityDetails() {
      if (!this.opportunityId) {
        this.error = "Impossible de charger les détails de l'opportunité";
        return;
      }
      
      this.loading = true;
      
      try {
        const token = sessionStorage.getItem('authToken');
        const response = await opportuniteApi.getByIdDash(this.opportunityId,token);
        this.opportunity = response.data.opportunite;
        console.log('API Response:', response);
        this.error = null;
      } catch (error) {
        console.error('Erreur lors du chargement des détails de l\'opportunité:', error);
        this.error = "Impossible de charger les détails de l'opportunité";
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
        'rejeté': 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800',
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