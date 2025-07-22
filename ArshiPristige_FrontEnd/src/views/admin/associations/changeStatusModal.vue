<template>
  <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="close"></div>
    
    <div class="flex min-h-screen items-center justify-center p-4">
      <div class="relative bg-white rounded-lg max-w-md w-full shadow-xl p-6">
        <div class="mb-6">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Modifier le statut</h3>
            <button @click="close" class="text-gray-400 hover:text-gray-500">
              <i class="fas fa-times"></i>
            </button>
          </div>
          
          <div class="bg-gray-50 p-4 rounded-lg mb-5">
            <div class="flex items-center">
              <div class="h-12 w-12 rounded-full overflow-hidden bg-gray-200 flex-shrink-0">
                <img :src="association?.logo || 'https://via.placeholder.com/48'" alt="" class="h-full w-full object-cover" />
              </div>
              <div class="ml-4">
                <div class="font-medium text-gray-900">{{ association?.nom_association }}</div>
                <div class="text-xs text-gray-400 mt-1">
                  RNA: {{ association?.numero_rna_association }}
                </div>
              </div>
            </div>
          </div>
          
          <div v-if="error" class="mb-4 p-3 rounded-md bg-red-50 border border-red-200 text-sm text-red-700">
            {{ error }}
          </div>
          
          <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-2">Statut de l'association</label>
            <div class="space-y-3">
              <div 
                v-for="status in statuses" 
                :key="status.value" 
                @click="selectedStatus = status.value"
                class="flex items-center p-3 border rounded-lg cursor-pointer transition-colors"
                :class="selectedStatus === status.value ? 'border-[#00B3AD] bg-[#00B3AD]/5' : 'border-gray-200 hover:bg-gray-50'"
              >
                <div :class="`h-5 w-5 rounded-full mr-3 ${status.bgColor}`">
                  <i v-if="selectedStatus === status.value" class="fas fa-check text-white text-xs flex items-center justify-center h-full"></i>
                </div>
                <div>
                  <div class="font-medium text-gray-900">{{ status.label }}</div>
                  <div class="text-xs text-gray-500">{{ status.description }}</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="flex justify-end space-x-3">
          <button 
            @click="close" 
            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
          >
            Annuler
          </button>
          <button 
            @click="updateStatus" 
            :disabled="!selectedStatus || loading"
            class="px-4 py-2 text-sm font-medium text-white bg-[#00B3AD] rounded-md hover:bg-[#00B3AD]/90 disabled:opacity-50 disabled:cursor-not-allowed"
          >
            <i v-if="loading" class="fas fa-spinner fa-spin mr-2"></i>
            {{ loading ? 'Mise à jour...' : 'Confirmer' }}
          </button>
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
    association: {
      type: Object,
      default: null
    }
  },
  data() {
    return {
      selectedStatus: '',
      loading: false,
      error: '',
      statuses: [
        {
          value: 'en attente',
          label: 'En attente',
          description: 'Le dossier de l\'association est en cours d\'examen',
          bgColor: 'bg-amber-500'
        },
        {
          value: 'approuvé',
          label: 'Approuvé',
          description: 'L\'association est validée et peut utiliser la plateforme',
          bgColor: 'bg-green-500'
        },
        {
          value: 'refusé',
          label: 'Refusé',
          description: 'Le dossier de l\'association a été refusé',
          bgColor: 'bg-red-500'
        }
      ],
    };
  },
  watch: {
    association(newVal) {
      if (newVal) {
        this.selectedStatus = newVal.statut_dossier || 'en attente';
        this.error = '';
      }
    },
    show(newVal) {
      if (newVal) {
        this.error = '';
      }
    }
  },
  methods: {
    close() {
      this.$emit('close');
    },
    async updateStatus() {
      if (!this.selectedStatus || !this.association) return;
      
      this.loading = true;
      this.error = '';
      
      try {
        const token = sessionStorage.getItem('authToken');
        
        await adminApi.updateAssociationStatus(token, this.association.id,this.selectedStatus);
        
        this.$emit('updated', {
          ...this.association,
          statut_dossier: this.selectedStatus,
        });
        
        this.close();
      } catch (error) {
        console.error('Erreur lors de la mise à jour du statut:', error);
        
        if (error.response && error.response.data && error.response.data.message) {
          this.error = error.response.data.message;
        } else {
          this.error = 'Une erreur est survenue. Veuillez réessayer.';
        }
      } finally {
        this.loading = false;
      }
    }
  }
};
</script>