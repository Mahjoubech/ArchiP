<template>
  <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50" @click="close"></div>

    <div class="relative min-h-screen flex items-center justify-center p-4">
      <div class="relative bg-white rounded-lg max-w-4xl w-full shadow-xl">
        <div class="flex items-center justify-between p-4 border-b">
          <div class="flex items-center space-x-2">
            <i class="fas fa-user-circle text-[#00B3AD] text-lg"></i>
            <h3 class="text-lg font-semibold text-gray-900">
              Modifier les détails du profil
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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
              <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-900">Profil Bénévole</h3>

                <div class="space-y-1">
                  <label class="block text-sm font-medium text-gray-700">
                    Domaines d'action 
                  </label>
                  <div class="grid grid-cols-2 gap-2">
                    <label v-for="domaine in domainesList" :key="domaine.value" class="flex items-center space-x-2 text-sm">
                      <input 
                        type="checkbox" 
                        :value="domaine.value" 
                        v-model="formData.domaines_action"
                        class="text-[#00B3AD] focus:ring-[#00B3AD]"
                      />
                      <span>{{ domaine.label }}</span>
                    </label>
                  </div>
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Disponibilités 
                  </label>
                  <select 
                    v-model="formData.disponibilites"
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                  >
                    <option value="" disabled>Sélectionnez disponibilités</option>
                    <option value="semaine">En semaine</option>
                    <option value="weekend">Weekend</option>
                    <option value="matin">Matin</option>
                    <option value="apres-midi">Après-midi</option>
                    <option value="soir">Soir</option>
                  </select>
                </div>
                <div class="border border-dashed border-gray-300 rounded-lg p-1 text-center">
                  <div class="space-y-1">
                    <div class="mx-auto w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center">
                      <i v-if="!formData.cv" class="fas fa-file-pdf text-xl text-gray-400"></i>
                      <i v-else class="fas fa-check-circle text-xl text-green-500"></i>
                    </div>
                    <div>
                      <label class="inline-flex items-center px-3 py-1.5 text-sm bg-[#00B3AD] text-white rounded-lg cursor-pointer hover:bg-[#009B96] transition-colors">
                        <i class="fas fa-upload mr-2"></i>
                        <span>{{ formData.cvName ? 'Changer CV' : 'Ajouter CV' }}</span>
                        <input type="file" @change="handleCVUpload" class="hidden" accept=".pdf">
                      </label>
                      <p class="text-xs text-gray-500 mt-1">PDF, max 2MB</p>
                    </div>
                    <div v-if="formData.cvName" class="text-sm text-gray-700">
                      {{ formData.cvName }}
                    </div>
                  </div>
                </div>
              </div>

              <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-900">Expérience</h3>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Niveau d'études 
                  </label>
                  <select 
                    v-model="formData.niveau_etudes"
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                  >
                    <option value="" disabled>Sélectionnez un niveau</option>
                    <option value="bac">Baccalauréat</option>
                    <option value="bac+2">Bac+2</option>
                    <option value="bac+3">Bac+3</option>
                    <option value="bac+5">Bac+5</option>
                    <option value="doctorat">Doctorat</option>
                  </select>
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Métier actuel 
                  </label>
                  <input 
                    v-model="formData.metier"
                    type="text"
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                    placeholder="Votre profession actuelle"
                  />
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Talents et compétences 
                  </label>
                  <textarea 
                    v-model="formData.talents"
                    rows="2"
                    class="w-full px-3 py-2 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD] focus:border-transparent"
                    placeholder="Décrivez vos talents et compétences"
                  ></textarea>
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
            :disabled="loading"
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
import profileApi from '@/api/profile';

export default {
  name: 'UpdateBenevoleDetailsModal',

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
        domaines_action: [],
        types_mission: '',
        disponibilites: '',
        missions_preferrees: [],
        talents: '',
        niveau_etudes: '',
        metier: '',
        cv: null,
        cvName: ''
      },
      domainesList: [
        { value: 'education', label: 'Éducation' },
        { value: 'environnement', label: 'Environnement' },
        { value: 'sante', label: 'Santé' },
        { value: 'culture', label: 'Culture' },
        { value: 'sport', label: 'Sport' }
      ],
    };
  },

  watch: {
    userData: {
      handler(newData) {
        // Réinitialiser les messages
        this.error = null;
        this.successMessage = '';
        
        this.formData = {
          ...this.formData,
          domaines_action: Array.isArray(newData.domaines_action) 
            ? newData.domaines_action 
            : JSON.parse(newData.domaines_action || '[]'),
          types_mission: newData.types_mission || '',
          disponibilites: newData.disponibilites || '',
          talents: newData.talents || '',
          niveau_etudes: newData.niveau_etudes || '',
          metier: newData.metier || ''
        };
      },
      immediate: true
    },
    show(visible) {
      if (visible) {
        // Réinitialiser les messages lors de l'ouverture du modal
        this.error = null;
        this.successMessage = '';
      }
    }
  },

  methods: {
    handleCVUpload(event) {
      const file = event.target.files[0];
      if (!file) return;
      
      // Réinitialiser l'erreur avant de vérifier le fichier
      this.error = null;
      
      if (file.type !== 'application/pdf') {
        this.error = 'Le fichier doit être au format PDF';
        event.target.value = '';
        return;
      }
      if (file.size > 2 * 1024 * 1024) {
        this.error = 'La taille du fichier ne doit pas dépasser 2MB';
        event.target.value = '';
        return;
      }
      this.formData.cv = file;
      this.formData.cvName = file.name;
    },

    async handleSubmit() {
      try {
        this.loading = true;
        this.error = null;
        this.successMessage = '';

        const formData = new FormData();
        
        formData.append('domaines_action', JSON.stringify(this.formData.domaines_action));
        formData.append('types_mission', this.formData.types_mission);
        formData.append('disponibilites', this.formData.disponibilites);
        formData.append('talents', this.formData.talents);
        formData.append('niveau_etudes', this.formData.niveau_etudes);
        formData.append('metier', this.formData.metier);

        if (this.formData.cv instanceof File) {
          formData.append('cv', this.formData.cv);
        }

        const token = sessionStorage.getItem('authToken');
        const response = await profileApi.updateBenevoleDetails(formData, token);

        this.handleUpdateSuccess(response);

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
    },

    handleUpdateSuccess(response) {
      this.successMessage = 'Informations mises à jour avec succès';
      this.$emit('updated', response.data.benevole);
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