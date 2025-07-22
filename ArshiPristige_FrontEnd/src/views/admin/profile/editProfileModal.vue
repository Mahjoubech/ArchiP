<template>
  <div class="fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="close"></div>
    
    <div class="flex min-h-screen items-center justify-center p-4">
      <div class="relative bg-white rounded-lg max-w-3xl w-full shadow-xl p-6">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
          <h3 class="text-xl font-semibold text-gray-900">Modifier le profil</h3>
          <button @click="close" class="text-gray-400 hover:text-gray-500">
            <i class="fas fa-times"></i>
          </button>
        </div>
        
        <div v-if="loading" class="py-20 text-center">
          <div class="inline-block animate-spin rounded-full h-10 w-10 border-t-2 border-b-2 border-[#00B3AD]"></div>
          <p class="mt-3 text-gray-600">Chargement...</p>
        </div>
        
        <div v-else>
          <form @submit.prevent="saveChanges">
            <div class="mb-8 flex flex-col items-center">
              <div class="relative group mb-4">
                <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-100 border-4 border-white shadow-lg">
                  <img 
                    :src="preview || profileData.image || 'https://via.placeholder.com/150'" 
                    alt="Photo de profil"
                    class="w-full h-full object-cover"
                    @error="$event.target.src = 'https://via.placeholder.com/150'"
                  />
                </div>
                <div class="absolute bottom-0 right-0">
                  <label class="cursor-pointer bg-[#00B3AD] text-white p-2 rounded-full hover:bg-[#00B3AD]/90">
                    <i class="fas fa-camera"></i>
                    <input 
                      type="file" 
                      class="hidden" 
                      accept="image/*" 
                      @change="handleImageChange"
                    />
                  </label>
                </div>
              </div>
              <p class="text-sm text-gray-500">Cliquez pour changer votre photo de profil</p>
            </div>
            
            <div v-if="error" class="mb-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-md">
              {{ error }}
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="space-y-4">         
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                  <input 
                    type="text" 
                    v-model="formData.prenom"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD]"
                  />
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                  <input 
                    type="text" 
                    v-model="formData.nom"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD]"
                  />
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                  <input 
                    type="email" 
                    v-model="formData.email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD]"
                  />
                </div>
              </div>
              
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Date de naissance</label>
                  <input 
                    type="date" 
                    v-model="formData.date_naissance"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD]"
                    :class="{'border-red-300 focus:ring-red-500 focus:border-red-500': birthDateError}"
                    @change="validateBirthDate"
                  />
                  <p v-if="birthDateError" class="text-red-600 text-sm mt-1">
                    Vous devez avoir au moins 18 ans.
                  </p>
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                  <input 
                    type="text" 
                    v-model="formData.ville"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD]"
                  />
                </div>
                
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone principal</label>
                  <input 
                    type="tel" 
                    v-model="formData.telephone_1"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD]"
                  />
                </div>
              </div>
            </div>
            
            <div class="mt-6 space-y-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                <textarea 
                  v-model="formData.adresse"
                  rows="3"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD]"
                ></textarea>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Téléphone secondaire (optionnel)</label>
                <input 
                  type="tel" 
                  v-model="formData.telephone_2"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD]"
                />
              </div>
            </div>
            
            <div class="mt-8 flex justify-end space-x-4">
              <button 
                type="button"
                @click="close"
                class="px-5 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors"
              >
                Annuler
              </button>
              <button 
                type="submit"
                :disabled="saving || birthDateError"
                class="px-5 py-2 bg-[#00B3AD] text-white rounded-lg hover:bg-[#00B3AD]/90 transition-colors disabled:opacity-70 disabled:cursor-not-allowed flex items-center"
              >
                <i v-if="saving" class="fas fa-spinner fa-spin mr-2"></i>
                {{ saving ? 'Enregistrement...' : 'Enregistrer les modifications' }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import adminApi from '@/api/adminDashbaord';

export default {
  props: {
    profileData: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      loading: false,
      saving: false,
      error: null,
      formData: {},
      imageFile: null,
      preview: null,
      birthDateError: false
    };
  },
  created() {
    this.initializeForm();
  },
  methods: {
    initializeForm() {
      const { image, ...rest } = this.profileData;
      this.formData = { ...rest };
      
      this.validateBirthDate();
    },
    
    validateBirthDate() {
      if (!this.formData.date_naissance) {
        this.birthDateError = false;
        return;
      }
      
      const birthDate = new Date(this.formData.date_naissance);
      const today = new Date();
      
      let age = today.getFullYear() - birthDate.getFullYear();
      const monthDiff = today.getMonth() - birthDate.getMonth();
      
      if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
      }
      
      this.birthDateError = age < 18;
    },
    
    handleImageChange(event) {
      const file = event.target.files[0];
      if (!file) return;
      
      this.imageFile = file;
      this.preview = URL.createObjectURL(file);
    },
    
    close() {
      if (this.preview) {
        URL.revokeObjectURL(this.preview);
      }
      this.$emit('close');
    },
    
    async saveChanges() {
      try {
        this.validateBirthDate();
        if (this.birthDateError) {
          this.error = "Vous devez avoir au moins 18 ans.";
          return;
        }
        
        this.saving = true;
        this.error = null;
        
        const formData = new FormData();
        
        for (const key in this.formData) {
          if (this.formData[key] !== null && this.formData[key] !== undefined) {
            formData.append(key, this.formData[key]);
          }
        }
        
        if (this.imageFile) {
          formData.append('image', this.imageFile);
        }
        
        const token = sessionStorage.getItem('authToken');
        if (!token) {
          this.error = "Session expirée. Veuillez vous reconnecter.";
          return;
        }
        
        const response = await adminApi.updateAdminInfo(formData, token);
        
        if (response.data) {
          const updatedData = response.data.user || response.data.admin;
          this.$emit('updated', updatedData);
          this.close();
        }
        
      } catch (error) {
        console.error('Error saving profile changes:', error);
        this.error = error.response?.data?.message || 'Une erreur est survenue lors de l\'enregistrement des modifications.';
      } finally {
        this.saving = false;
      }
    }
  }
};
</script>