<template>
  <div class="fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="close"></div>
    
    <div class="flex min-h-screen items-center justify-center p-4">
      <div class="relative bg-white rounded-lg max-w-md w-full shadow-xl p-6">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
          <h3 class="text-xl font-semibold text-gray-900">Changer le mot de passe</h3>
          <button @click="close" class="text-gray-400 hover:text-gray-500">
            <i class="fas fa-times"></i>
          </button>
        </div>
        
        <div v-if="success" class="mb-6 bg-green-50 border border-green-200 text-green-700 p-4 rounded-md">
          <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <span>{{ successMessage }}</span>
          </div>
        </div>
        
        <div v-if="error" class="mb-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-md">
          <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span>{{ error }}</span>
          </div>
        </div>
        
        <form @submit.prevent="changePassword">
          <div class="space-y-4 mb-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe actuel</label>
              <div class="relative">
                <input 
                  :type="showCurrentPassword ? 'text' : 'password'"
                  v-model="formData.current_password"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD] pr-10"
                  required
                />
              </div>
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Nouveau mot de passe</label>
              <div class="relative">
                <input 
                  :type="showNewPassword ? 'text' : 'password'"
                  v-model="formData.password"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD] pr-10"
                  required
                />
              </div>
              
              <div class="mt-2">
                <p class="text-sm font-medium text-gray-700">Exigences du mot de passe:</p>
                <ul class="text-xs mt-1 space-y-1">
                  <li :class="passwordChecks.length ? 'text-green-600' : 'text-gray-500'">
                    <i :class="passwordChecks.length ? 'fas fa-check' : 'fas fa-times'"></i>
                    Au moins 8 caractères
                  </li>
                  <li :class="passwordChecks.uppercase ? 'text-green-600' : 'text-gray-500'">
                    <i :class="passwordChecks.uppercase ? 'fas fa-check' : 'fas fa-times'"></i>
                    Au moins une lettre majuscule
                  </li>
                  <li :class="passwordChecks.lowercase ? 'text-green-600' : 'text-gray-500'">
                    <i :class="passwordChecks.lowercase ? 'fas fa-check' : 'fas fa-times'"></i>
                    Au moins une lettre minuscule
                  </li>
                  <li :class="passwordChecks.number ? 'text-green-600' : 'text-gray-500'">
                    <i :class="passwordChecks.number ? 'fas fa-check' : 'fas fa-times'"></i>
                    Au moins un chiffre
                  </li>
                  <li :class="passwordChecks.symbol ? 'text-green-600' : 'text-gray-500'">
                    <i :class="passwordChecks.symbol ? 'fas fa-check' : 'fas fa-times'"></i>
                    Au moins un caractère spécial (!@#$%^&*, etc.)
                  </li>
                </ul>
              </div>
            </div>
            
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Confirmer le nouveau mot de passe</label>
              <div class="relative">
                <input 
                  :type="showConfirmPassword ? 'text' : 'password'"
                  v-model="formData.password_confirmation"
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#00B3AD] focus:border-[#00B3AD] pr-10"
                  :class="{'border-red-300': formData.password && formData.password_confirmation && formData.password !== formData.password_confirmation}"
                  required
                />
              </div>
              <p v-if="formData.password && formData.password_confirmation && formData.password !== formData.password_confirmation" 
                 class="text-xs text-red-600 mt-1">
                Les mots de passe ne correspondent pas.
              </p>
            </div>
          </div>
          
          <div class="flex justify-between items-center">
            <button
              type="button"
              @click="resetPasswordViaEmail"
              :disabled="resetting"
              class="text-sm text-[#00B3AD] hover:text-[#008C87] flex items-center"
            >
              <i v-if="resetting" class="fas fa-spinner fa-spin mr-1"></i>
              <i v-else class="fas fa-envelope mr-1"></i>
              {{ resetting ? 'Envoi en cours...' : 'Mot de passe oublié?' }}
            </button>
            
            <div class="flex space-x-4">
              <button 
                type="button"
                @click="close"
                class="px-5 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors"
              >
                Annuler
              </button>
              <button 
                type="submit"
                :disabled="loading || !isPasswordValid || !passwordsMatch"
                class="px-5 py-2 bg-[#00B3AD] text-white rounded-lg hover:bg-[#00B3AD]/90 transition-colors disabled:opacity-70 disabled:cursor-not-allowed flex items-center"
              >
                <i v-if="loading" class="fas fa-spinner fa-spin mr-2"></i>
                {{ loading ? 'Modification...' : 'Modifier' }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import profileApi from '@/api/profile.js';

export default {
  data() {
    return {
      loading: false,
      resetting: false,
      success: false,
      successMessage: 'Le mot de passe a été modifié avec succès.',
      error: null,
      showNewPassword: false,
      formData: {
        current_password: '',
        password: '',
        password_confirmation: ''
      },
      passwordChecks: {
        length: false,
        uppercase: false,
        lowercase: false,
        number: false,
        symbol: false
      }
    };
  },
  computed: {
    isPasswordValid() {
      return this.passwordChecks.length && 
             this.passwordChecks.uppercase && 
             this.passwordChecks.lowercase && 
             this.passwordChecks.number && 
             this.passwordChecks.symbol;
    },
    passwordsMatch() {
      return !this.formData.password || !this.formData.password_confirmation || 
             this.formData.password === this.formData.password_confirmation;
    }
  },
  watch: {
    'formData.password': {
      handler(newValue) {
        if (!newValue) {
          Object.keys(this.passwordChecks).forEach(key => {
            this.passwordChecks[key] = false;
          });
          return;
        }
        
        this.passwordChecks.length = newValue.length >= 8;
        
        this.passwordChecks.uppercase = /[A-Z]/.test(newValue);
        
        this.passwordChecks.lowercase = /[a-z]/.test(newValue);
      
        this.passwordChecks.number = /[0-9]/.test(newValue);
        
        this.passwordChecks.symbol = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(newValue);
      },
      immediate: true
    }
  },
  methods: {
    close() {
      if (this.success) {
        this.$emit('updated');
      }
      this.$emit('close');
    },
    
    async changePassword() {
      if (!this.isPasswordValid) {
        this.error = 'Le mot de passe ne répond pas aux exigences de sécurité.';
        return;
      }
      
      if (this.formData.password !== this.formData.password_confirmation) {
        this.error = 'Les mots de passe ne correspondent pas.';
        return;
      }
      
      this.error = null;
      this.success = false;
      
      try {
        this.loading = true;
        const token = sessionStorage.getItem('authToken');
        
        if (!token) {
          this.error = "Session expirée. Veuillez vous reconnecter.";
          return;
        }
        
        await profileApi.updatePassword(token, {
          current_password: this.formData.current_password,
          password: this.formData.password,
          password_confirmation: this.formData.password_confirmation
        });
        
        this.success = true;
        this.successMessage = 'Le mot de passe a été modifié avec succès.';
        this.formData = {
          current_password: '',
          password: '',
          password_confirmation: ''
        };
        
        setTimeout(() => {
          this.$emit('updated');
          this.$emit('close');
        }, 2000);
        
      } catch (error) {
        console.error('Error changing password:', error);
        this.error = error.response?.data?.message || 'Une erreur est survenue lors de la modification du mot de passe.';
        
        if (error.response?.data?.errors) {
          const errorMessages = Object.values(error.response.data.errors)
            .flat()
            .join('\n');
          this.error = errorMessages;
        }
      } finally {
        this.loading = false;
      }
    },
    
    async resetPasswordViaEmail() {
      this.error = null;
      this.success = false;
      
      try {
        this.resetting = true;
        const token = sessionStorage.getItem('authToken');
        
        if (!token) {
          this.error = "Session expirée. Veuillez vous reconnecter.";
          return;
        }
        
        const response = await profileApi.resetPassword(token);
        
        this.success = true;
        this.successMessage = response.data.message || 'Un nouveau mot de passe a été envoyé à votre adresse e-mail.';
        
        this.formData = {
          current_password: '',
          password: '',
          password_confirmation: ''
        };
        
      } catch (error) {
        console.error('Error resetting password:', error);
        this.error = error.response?.data?.message || 'Une erreur est survenue lors de la réinitialisation du mot de passe.';
      } finally {
        this.resetting = false;
      }
    }
  }
};
</script>
