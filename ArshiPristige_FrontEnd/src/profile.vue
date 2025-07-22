<template>
    <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
      <!-- Modal Backdrop -->
      <div class="fixed inset-0 bg-black bg-opacity-50" @click="close"></div>
  
      <!-- Modal Content -->
      <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white rounded-lg max-w-md w-full shadow-xl">
          <!-- Modal Header -->
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
  
          <!-- Modal Body -->
          <div class="p-6">
            <form @submit.prevent="handleSubmit" class="space-y-4">
              <!-- Prénom et Nom -->
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
  
              <!-- Date de naissance -->
              <div>
                <label class="block text-sm font-medium text-gray-700">Date de naissance</label>
                <input 
                  v-model="formData.date_naissance"
                  type="date"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
                />
              </div>
  
              <!-- Adresse -->
              <div>
                <label class="block text-sm font-medium text-gray-700">Adresse</label>
                <input 
                  v-model="formData.adresse"
                  type="text"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
                />
              </div>
  
              <!-- Ville -->
              <div>
                <label class="block text-sm font-medium text-gray-700">Ville</label>
                <input 
                  v-model="formData.ville"
                  type="text"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
                />
              </div>
  
              <!-- Téléphones -->
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700">Téléphone 1</label>
                  <input 
                    v-model="formData.telephone_1"
                    type="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
                  />
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Téléphone 2</label>
                  <input 
                    v-model="formData.telephone_2"
                    type="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#00B3AD] focus:ring-[#00B3AD]"
                  />
                </div>
              </div>
  
              <!-- Error message -->
              <p v-if="error" class="text-sm text-red-600">{{ error }}</p>
              <!-- Success message -->
              <p v-if="successMessage" class="text-sm text-green-600">{{ successMessage }}</p>
            </form>
          </div>
  
          <!-- Modal Footer -->
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
        }
      };
    },
  
    watch: {
      userData: {
        handler(newData) {
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
      }
    },
  
    methods: {
      close() {
        this.$emit('close');
        this.error = null;
        this.successMessage = '';
      },
  
      async handleSubmit() {
        try {
          this.loading = true;
          this.error = null;
          this.successMessage = '';
  
          const token = sessionStorage.getItem('authToken');
          await profileApi.updateUserInfo(this.formData, token);
  
          this.successMessage = 'Informations mises à jour avec succès';
          this.$emit('updated');
          
          setTimeout(() => {
            this.close();
          }, 1500);
  
        } catch (error) {
          this.error = error.response?.data?.message || 'Erreur lors de la mise à jour';
        } finally {
          this.loading = false;
        }
      }
    }
  };
  </script>