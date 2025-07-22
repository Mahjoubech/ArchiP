<template>
    <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
      <div class="fixed inset-0 bg-black bg-opacity-50" @click="close"></div>
  
      <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white rounded-lg max-w-4xl w-full shadow-xl">
          <div class="flex items-center justify-between p-4 border-b">
            <div class="flex items-center space-x-2">
              <i class="fas fa-building text-[#00B3AD] text-lg"></i>
              <h3 class="text-lg font-semibold text-gray-900">
                Modifier les détails de l'association
              </h3>
            </div>
            <button @click="close" class="text-gray-400 hover:text-gray-500">
              <i class="fas fa-times"></i>
            </button>
          </div>
  
          <div class="p-4">
            <!-- Message d'erreur -->
            <div v-if="error" class="mb-4 p-3 bg-red-50 text-red-600 border border-red-200 rounded-md text-sm">
              {{ error }}
            </div>
            
            <!-- Message de succès -->
            <div v-if="successMessage" class="mb-4 p-3 bg-green-50 text-green-600 border border-green-200 rounded-md text-sm">
              {{ successMessage }}
            </div>
            
            <form @submit.prevent="handleSubmit">
              <div class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Objet social / Mission de l'association <span class="text-red-500">*</span>
                  </label>
                  <textarea 
                    v-model="formData.objet_social"
                    rows="4"
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                    placeholder="Décrivez la mission et les objectifs de votre association"
                    required
                  ></textarea>
                  <p v-if="!formData.objet_social" class="text-xs text-red-500 mt-1">Ce champ est obligatoire</p>
                </div>
  
                <div>
                  <h3 class="text-lg font-semibold text-gray-900 mb-3">Réseaux sociaux</h3>
                  
                  <div class="space-y-4">
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-1">
                        Site web
                      </label>
                      <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                          <i class="fas fa-globe text-gray-400"></i>
                        </div>
                        <input 
                          v-model="formData.site_web"
                          type="text"
                          class="w-full pl-10 px-3 py-2 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                          placeholder="www.votresite.com"
                        />
                      </div>
                      <p v-if="urlErrors.site_web" class="text-xs text-red-500 mt-1">
                        Veuillez saisir une URL valide (ex: www.exemple.com)
                      </p>
                    </div>
  
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-1">
                        Facebook
                      </label>
                      <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                          <i class="fab fa-facebook-f text-gray-400"></i>
                        </div>
                        <input 
                          v-model="formData.facebook"
                          type="text"
                          class="w-full pl-10 px-3 py-2 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                          placeholder="www.facebook.com/votreassociation"
                        />
                      </div>
                      <p v-if="urlErrors.facebook" class="text-xs text-red-500 mt-1">
                        Veuillez saisir une URL Facebook valide (ex: www.facebook.com/page)
                      </p>
                    </div>
  
                    <div>
                      <label class="block text-sm font-medium text-gray-700 mb-1">
                        Instagram
                      </label>
                      <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                          <i class="fab fa-instagram text-gray-400"></i>
                        </div>
                        <input 
                          v-model="formData.instagram"
                          type="text"
                          class="w-full pl-10 px-3 py-2 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                          placeholder="www.instagram.com/votreassociation"
                        />
                      </div>
                      <p v-if="urlErrors.instagram" class="text-xs text-red-500 mt-1">
                        Veuillez saisir une URL Instagram valide (ex: www.instagram.com/compte)
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
  
          <div class="px-4 py-3 bg-gray-50 flex justify-end space-x-2 rounded-b-lg border-t">
            <button 
              type="button"
              @click="close"
              class="px-3 py-1.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
            >
              Annuler
            </button>
            <button 
              type="button"
              @click="handleSubmit"
              :disabled="loading || !formData.objet_social || hasUrlErrors"
              class="px-4 py-1.5 text-sm font-medium text-white bg-[#00B3AD] rounded-md hover:bg-[#00B3AD]/90 disabled:opacity-50"
            >
              {{ loading ? 'Mise à jour...' : 'Mettre à jour' }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import associationDashboardApi from '@/api/associationDashboard';
  
  export default {
    name: 'UpdateAssociationDetailsModal',
  
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
          objet_social: '',
          site_web: '',
          facebook: '',
          instagram: ''
        },
        urlErrors: {
          site_web: false,
          facebook: false,
          instagram: false
        }
      };
    },
  
    computed: {
      hasUrlErrors() {
        return this.urlErrors.site_web || this.urlErrors.facebook || this.urlErrors.instagram;
      }
    },
  
    watch: {
      userData: {
        handler(newData) {
          this.error = null;
          this.successMessage = '';
          
          this.formData = {
            objet_social: newData.objet_social || '',
            site_web: newData.site_web || '',
            facebook: newData.facebook || '',
            instagram: newData.instagram || ''
          };
          this.validateAllUrls();
        },
        immediate: true
      },
      show(visible) {
        if (visible) {
          this.error = null;
          this.successMessage = '';
        }
      },
      'formData.site_web'() {
        this.validateUrl('site_web');
      },
      'formData.facebook'() {
        this.validateUrl('facebook');
      },
      'formData.instagram'() {
        this.validateUrl('instagram');
      }
    },
  
    methods: {
      validateUrl(field) {
        const value = this.formData[field];
        
        // Si le champ est vide, pas d'erreur
        if (!value || value.trim() === '') {
          this.urlErrors[field] = false;
          return true;
        }
        
        // Regex pour valider une URL avec ou sans protocole
        const urlRegex = /^(https?:\/\/)?(www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)+(\/[a-zA-Z0-9-._~:/?#[\]@!$&'()*+,;=]*)?$/;
        const isValid = urlRegex.test(value);
        this.urlErrors[field] = !isValid;
        return isValid;
      },
      
      validateAllUrls() {
        this.validateUrl('site_web');
        this.validateUrl('facebook');
        this.validateUrl('instagram');
      },
      
      normalizeUrl(url) {
        if (!url || url.trim() === '') return '';
        
        return url;
      },
  
      async handleSubmit() {
        try {
          if (!this.formData.objet_social) {
            this.error = "Presentation  est obligatoire";
            return;
          }
          
          this.validateAllUrls();
          if (this.hasUrlErrors) {
            this.error = "Veuillez corriger les URLs invalides avant de soumettre";
            return;
          }
  
          this.loading = true;
          this.error = null;
          this.successMessage = '';
          
          const dataToSubmit = {
            ...this.formData,
            site_web: this.normalizeUrl(this.formData.site_web),
            facebook: this.normalizeUrl(this.formData.facebook),
            instagram: this.normalizeUrl(this.formData.instagram)
          };
  
          const token = sessionStorage.getItem('authToken');
          const response = await associationDashboardApi.updateAssociationDetails(dataToSubmit, token);
  
          this.handleUpdateSuccess(response);
  
        } catch (error) {
          console.error('Update error:', error.response?.data);
          if (error.response?.data?.errors) {
            const errorMessages = Object.values(error.response.data.errors).flat();
            this.error = errorMessages.join(', ');
          } else {
            this.error = error.response?.data?.error || 'Erreur lors de la mise à jour';
          }
        } finally {
          this.loading = false;
        }
      },
  
      handleUpdateSuccess(response) {
        this.successMessage = 'Informations mises à jour avec succès';
        this.$emit('updated', response.data);
        setTimeout(() => {
          this.close();
        }, 1500);
      },
  
      close() {
        this.error = null;
        this.successMessage = '';
        this.$emit('close');
      }
    }
  };
  </script>