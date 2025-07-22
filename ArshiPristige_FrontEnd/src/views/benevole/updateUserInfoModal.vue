<template>
  <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50" @click="close"></div>

    <div class="relative min-h-screen flex items-center justify-center p-4">
      <div class="relative bg-white rounded-lg max-w-md w-full shadow-xl">
        <div class="flex items-center justify-between p-4 border-b">
          <h3 class="text-xl font-semibold text-gray-900">
            Modifier les informations personnelles
          </h3>
          <button 
            @click="close"
            class="text-gray-400 hover:text-gray-500"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>

        <div class="p-6">
          <!-- Message d'erreur -->
          <div v-if="hasErrors" class="mb-4 p-3 bg-red-50 text-red-600 border border-red-200 rounded-md text-sm">
            <p v-if="error">{{ error }}</p>
            <ul v-if="hasValidationErrors" class="list-disc pl-5 mt-1">
              <li v-if="validationErrors.date_naissance">{{ validationErrors.date_naissance }}</li>
              <li v-if="validationErrors.telephone_1">{{ validationErrors.telephone_1 }}</li>
              <li v-if="validationErrors.telephone_2">{{ validationErrors.telephone_2 }}</li>
            </ul>
          </div>
          
          <!-- Message de succès -->
          <div v-if="successMessage" class="mb-4 p-3 bg-green-50 text-green-600 border border-green-200 rounded-md text-sm">
            {{ successMessage }}
          </div>
          
          <form @submit.prevent="handleSubmit" class="space-y-4">
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700">Prénom</label>
                <input 
                  v-model="formData.prenom"
                  type="text"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700">Nom</label>
                <input 
                  v-model="formData.nom"
                  type="text"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
                />
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Date de naissance</label>
              <input 
                v-model="formData.date_naissance"
                type="date"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
                :class="{ 'border-red-300 ring-1 ring-red-300': validationErrors.date_naissance }"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Adresse</label>
              <input 
                v-model="formData.adresse"
                type="text"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
              />
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Ville</label>
              <input 
                v-model="formData.ville"
                type="text"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
              />
            </div>

            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700">Téléphone 1</label>
                <input 
                  v-model="formData.telephone_1"
                  type="text"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
                  :class="{ 'border-red-300 ring-1 ring-red-300': validationErrors.telephone_1 }"
                />
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700">Téléphone 2</label>
                <input 
                  v-model="formData.telephone_2"
                  type="text"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
                  :class="{ 'border-red-300 ring-1 ring-red-300': validationErrors.telephone_2 }"
                />
              </div>
            </div>
          </form>
        </div>

        <div class="px-6 py-4 bg-gray-50 flex justify-end space-x-3 rounded-b-lg">
          <button 
            type="button"
            @click="close"
            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
          >
            Annuler
          </button>
          <button 
            type="button"
            @click="handleSubmit"
            :disabled="loading"
            class="px-4 py-2 text-sm font-medium text-white bg-[#00B3AD] rounded-md hover:bg-[#00B3AD]/90 disabled:opacity-50"
          >
            {{ loading ? 'Mise à jour...' : 'Mettre à jour' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import profileApi from '@/api/profile';

export default {
  name: 'UpdateUserInfoModal',

  props: {
    show: {
      type: Boolean,
      default: false
    },
    userData: {
      type: Object,
      required: true
    }
  },

  data() {
    return {
      loading: false,
      error: null,
      successMessage: '',
      formData: {
        prenom: '',
        nom: '',
        date_naissance: '',
        adresse: '',
        ville: '',
        telephone_1: '',
        telephone_2: ''
      },
      validationErrors: {
        date_naissance: '',
        telephone_1: '',
        telephone_2: ''
      }
    };
  },

  computed: {
    hasValidationErrors() {
      return this.validationErrors.date_naissance || 
             this.validationErrors.telephone_1 || 
             this.validationErrors.telephone_2;
    },
    hasErrors() {
      return this.error || this.hasValidationErrors;
    }
  },

  watch: {
    userData: {
      handler(newData) {
        // Réinitialiser les messages
        this.error = null;
        this.successMessage = '';
        this.resetValidationErrors();
        
        this.formData = {
          prenom: newData.prenom || '',
          nom: newData.nom || '',
          date_naissance: newData.date_naissance || '',
          adresse: newData.adresse || '',
          ville: newData.ville || '',
          telephone_1: newData.telephone_1 || '',
          telephone_2: newData.telephone_2 || ''
        };
      },
      immediate: true
    },
    show(visible) {
      if (visible) {
        // Réinitialiser les messages lors de l'ouverture du modal
        this.error = null;
        this.successMessage = '';
        this.resetValidationErrors();
      }
    }
  },

  methods: {
    resetValidationErrors() {
      this.validationErrors = {
        date_naissance: '',
        telephone_1: '',
        telephone_2: ''
      };
    },
    
    close() {
      this.$emit('close');
      this.error = null;
      this.successMessage = '';
      this.resetValidationErrors();
    },

    validateAge(birthDateStr) {
      if (!birthDateStr) return true; 
    
      const birthDate = new Date(birthDateStr);
      const today = new Date();
      const age = Math.floor((today - birthDate) / (365.25 * 24 * 60 * 60 * 1000));
      
      return age >= 18;
    },

    validatePhoneNumber(phone) {
      const phonePattern = /^(?:\+212|0)[5-7][0-9]{8}$/;
      return phone ? phonePattern.test(phone) : true; 
    },

    validate() {
      let isValid = true;
      this.resetValidationErrors();

      if (this.formData.date_naissance) {
        if (!this.validateAge(this.formData.date_naissance)) {
          this.validationErrors.date_naissance = 'Vous devez avoir au moins 18 ans';
          isValid = false;
        }
      }

      if (this.formData.telephone_1 && !this.validatePhoneNumber(this.formData.telephone_1)) {
        this.validationErrors.telephone_1 = 'Format invalide. Exemple: 0612345678 ou +212612345678';
        isValid = false;
      }

      if (this.formData.telephone_2 && !this.validatePhoneNumber(this.formData.telephone_2)) {
        this.validationErrors.telephone_2 = 'Format invalide. Exemple: 0612345678 ou +212612345678';
        isValid = false;
      }

      return isValid;
    },

    async handleSubmit() {
      try {
        // Réinitialiser les messages
        this.error = null;
        this.successMessage = '';
        
        if (!this.validate()) {
          return;
        }

        this.loading = true;

        const token = sessionStorage.getItem('authToken');
        await profileApi.updateUserInfo(this.formData, token);

        this.successMessage = 'Informations mises à jour avec succès';
        this.$emit('updated');
        
        setTimeout(() => {
          this.close();
        }, 700);

      } catch (error) {
        console.error('Update error:', error.response?.data);
        if (error.response?.data?.errors) {
          const errorMessages = Object.values(error.response.data.errors).flat();
          this.error = errorMessages.join(', ');
        } else {
          this.error = error.response?.data?.message || 'Erreur lors de la mise à jour';
        }
      } finally {
        this.loading = false;
      }
    }
  }
};
</script>