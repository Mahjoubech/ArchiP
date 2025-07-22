<template>
    <div v-if="show" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
      <div class="bg-white rounded-lg shadow-xl max-w-lg w-full mx-4">
        <div class="p-5 border-b flex justify-between items-center">
          <h3 class="text-lg font-medium">Ajouter un certificat</h3>
          <button @click="$emit('close')" class="text-gray-400 hover:text-gray-500">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="p-6">
          <div v-if="benevole" class="space-y-4">
            <div>
              <p class="text-sm text-gray-600 mb-1">Bénévole</p>
              <p class="font-medium">{{ benevole.prenom }} {{ benevole.nom }}</p>
            </div>
            <div>
              <p class="text-sm text-gray-600 mb-1">Opportunité</p>
              <p class="font-medium">{{ benevole.titre }}</p>
            </div>
            <div>
              <p class="text-sm text-gray-600 mb-1">Période</p>
              <p class="font-medium">{{ formatDate(benevole.date) }} </p>
            </div>
            
            <div class="mt-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Fichier du certificat (PNG/JPG)</label>
              <div class="flex items-center justify-center w-full">
                <label class="flex flex-col rounded-lg border-2 border-dashed w-full h-32 p-10 group text-center border-gray-300 hover:border-[#00B3AD] cursor-pointer">
                  <div class="h-full w-full text-center flex flex-col items-center justify-center">
                    <div v-if="!certificatFile" class="flex flex-col items-center">
                      <i class="fas fa-cloud-upload-alt fa-3x text-gray-300 group-hover:text-[#00B3AD]"></i>
                      <p class="text-sm text-gray-500 mt-2">
                        Cliquez ou glissez-déposez pour télécharger
                      </p>
                    </div>
                    <div v-else class="flex flex-col items-center">
                      <i class="fas fa-file-image fa-3x text-[#00B3AD]" ></i>
                      <p class="text-sm text-gray-700 mt-2">{{ certificatFile.name }}</p>
                    </div>
                  </div>
                  <input type="file" class="hidden" accept=".png,.jpg,.jpeg" @change="handleFileUpload" />
                </label>
              </div>
              <p v-if="fileError" class="mt-2 text-sm text-red-600">
                <i class="fas fa-exclamation-circle mr-1"></i>
                {{ fileError }}
              </p>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3 rounded-b-lg">
          <button @click="$emit('close')" class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
            Annuler
          </button>
          <button 
            @click="saveCertificate" 
            class="px-4 py-2 bg-[#00B3AD] text-white rounded-md hover:bg-[#00A19C]"
            :disabled="!certificatFile || submitting || fileError"
            :class="{'opacity-50 cursor-not-allowed': !certificatFile || submitting || fileError}"
          >
            <i v-if="submitting" class="fas fa-spinner fa-spin mr-2"></i>
            <i v-else class="fas fa-save mr-2"></i> 
            {{ submitting ? 'Enregistrement...' : 'Enregistrer le certificat' }}
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import certificatsApi from '@/api/certification';
  
  export default {
    name: 'UploadCertificatModal',
    props: {
      show: {
        type: Boolean,
        default: false
      },
      benevole: {
        type: Object,
        default: null
      }
    },
    data() {
      return {
        certificatFile: null,
        submitting: false,
        fileError: null 
      };
    },
    methods: {
      formatDate(dateString) {
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', { day: '2-digit', month: '2-digit', year: 'numeric' }).format(date);
      },
      
      handleFileUpload(event) {
        const file = event.target.files[0];
        this.fileError = null;
        
        if (file) {
          const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];
          
          if (!validImageTypes.includes(file.type)) {
            this.fileError = "Format de fichier non supporté. Veuillez sélectionner une image (JPG ou PNG)";
            this.certificatFile = null;
            return;
          }
          
          const maxSize = 5 * 1024 * 1024; 
          if (file.size > maxSize) {
            this.fileError = "L'image est trop volumineuse. Taille maximale: 5 Mo";
            this.certificatFile = null;
            return;
          }
          
          this.certificatFile = file;
        }
      },
      
      async saveCertificate() {
        if (!this.benevole || !this.certificatFile || this.fileError) return;
        
        this.submitting = true;
        
        try {
          const token = sessionStorage.getItem('authToken');
          
          const formData = new FormData();
          formData.append('certificat', this.certificatFile);
          
          const response = await certificatsApi.addCertificationToBenevole(
            token, 
            this.benevole.opportunite_id, 
            this.benevole.id, 
            formData
          );
          
          this.certificatFile = null;
          
          this.$emit('success', {
            benevoleId: this.benevole.id,
            opportuniteId: this.benevole.opportunite_id,
            certificat: response.data.certificat
          });
          
        } catch (error) {
            this.fileError = "Erreur lors de l\'enregistrement du certificat:";
        } finally {
          this.submitting = false;
        }
      }
    }
  };
  </script>