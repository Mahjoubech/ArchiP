<template>
    <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
      <div class="fixed inset-0 bg-black bg-opacity-50" @click="$emit('close')"></div>
      <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white rounded-lg max-w-4xl w-full shadow-xl">
          <div class="flex items-center justify-between p-4 border-b">
            <div class="flex items-center space-x-2">
              <i class="fas fa-plus-circle text-[#00B3AD] text-lg"></i>
              <h3 class="text-lg font-semibold text-gray-900">Ajouter une opportunité</h3>
            </div>
            <button @click="$emit('close')" class="text-gray-400 hover:text-gray-500">
              <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
          </div>
  
          <div class="p-4">
            <div v-if="errorMessage" class="mb-4 p-3 bg-red-50 text-red-600 border border-red-200 rounded-md text-sm">
              {{ errorMessage }}
            </div>
            
            <form @submit.prevent="submitForm">
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="space-y-3">
                  <h3 class="text-md font-semibold text-gray-900">Informations principales</h3>
                  
                  <div class="border border-dashed border-gray-300 rounded-lg p-2">
                    <div class="flex items-center space-x-2">
                      <img v-if="imagePreview" :src="imagePreview" alt="Aperçu" class="h-10 w-10 object-cover rounded-md">
                      <div v-else class="h-10 w-10 bg-gray-100 rounded-md flex items-center justify-center">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                      </div>
                      <label class="inline-flex items-center px-2 py-1 text-xs bg-[#00B3AD] text-white rounded-md cursor-pointer hover:bg-[#009B96]">
                        <span>{{ imagePreview ? 'Modifier' : 'Ajouter' }} l'image <span class="text-red-200">*</span></span>
                        <input type="file" @change="handleImageChange" class="hidden" accept="image/jpeg,image/png,image/jpg">
                      </label>
                    </div>
                  </div>
  
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Titre <span class="text-red-500">*</span></label>
                    <input v-model="form.titre" type="text" required class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
                    <textarea v-model="form.description" rows="3" required class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]"></textarea>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Catégorie <span class="text-red-500">*</span></label>
                    <select v-model="form.categorie_id" required class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                      <option value="" disabled selected>Sélectionnez une catégorie</option>
                      <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.nom }}</option>
                    </select>
                  </div>
                
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Compétences requises <span class="text-red-500">*</span></label>
                    <textarea v-model="form.competences" rows="3" required class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]"></textarea>
                  </div>
                </div>
  
                <div class="space-y-3">
                  <h3 class="text-md font-semibold text-gray-900">Détails et localisation</h3>
                  
                  <div class="grid grid-cols-2 gap-2">
                    <div>
                      <label class="block text-sm font-medium text-gray-700">Date <span class="text-red-500">*</span></label>
                      <input type="date" v-model="form.date" required class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700">Date limite <span class="text-red-500">*</span></label>
                      <input type="date" v-model="form.derniere_date_postule" required class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-2">
                    <div>
                      <label class="block text-sm font-medium text-gray-700">Nb bénévoles <span class="text-red-500">*</span></label>
                      <input type="number" v-model="form.nb_benevole" min="1" required class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700">Durée <span class="text-red-500">*</span></label>
                      <input type="text" v-model="form.duree" placeholder="Ex: 2 heures" required class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                    </div>
                  </div>
  
                  <div class="grid grid-cols-2 gap-2">
                    <div>
                      <label class="block text-sm font-medium text-gray-700">Pays <span class="text-red-500">*</span></label>
                      <input type="text" v-model="form.pays" required class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                    </div>
                    <div>
                      <label class="block text-sm font-medium text-gray-700">Ville <span class="text-red-500">*</span></label>
                      <input type="text" v-model="form.ville" required class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                    </div>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Adresse <span class="text-red-500">*</span></label>
                    <input type="text" v-model="form.adresse" required class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                  </div>
  
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Engagement requis <span class="text-red-500">*</span></label>
                    <textarea v-model="form.engagement_requis" rows="1" required class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]"></textarea>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Missions principales <span class="text-red-500">*</span></label>
                    <textarea v-model="form.missions_principales" rows="2" required class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]"></textarea>
                  </div>
           
                </div>
              </div>
            </form>
          </div>
          <div class="px-4 py-3 bg-gray-50 flex justify-end space-x-2 rounded-b-lg border-t">
            <button type="button" @click="$emit('close')" class="px-3 py-1.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Annuler</button>
            <button type="button" @click="submitForm" :disabled="loading" class="px-4 py-1.5 text-sm text-white bg-[#00B3AD] rounded-md hover:bg-[#00B3AD]/90 disabled:opacity-50">
              {{ loading ? 'Création...' : 'Créer' }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
    
  <script>
  import associationDashboardApi from "@/api/associationDashboard";
  
  export default {
    name: "AddOpportunityModal",
    props: { 
      show: Boolean
    },
    data() {
      return {
        form: {
          titre: '',
          description: '',
          categorie_id: '',
          ville: '',
          date: '',
          derniere_date_postule: '',
          adresse: '',
          nb_benevole: 1,
          duree: '',
          engagement_requis: '',
          missions_principales: '',
          competences: '',
          pays: '',
        },
        imageFile: null, 
        imagePreview: null, 
        loading: false, 
        categories: [],
        errorMessage: ''
      };
    },
    watch: {
      show(visible) { 
        if(visible) {
          this.resetForm();
          if(!this.categories.length) this.loadCategories();
        }
      }
    },
    created() { 
      this.loadCategories();
    },
    beforeDestroy() { 
      if(this.imagePreview) URL.revokeObjectURL(this.imagePreview);
    },
    methods: {
      resetForm() {
        this.form = {
          titre: '',
          description: '',
          categorie_id: '',
          ville: '',
          date: '',
          derniere_date_postule: '',
          adresse: '', 
          nb_benevole: 1,
          duree: '',
          engagement_requis: '',
          missions_principales: '',
          competences: '',
          pays: '',
        };
        this.errorMessage = '';
        if(this.imagePreview) {
          URL.revokeObjectURL(this.imagePreview);
          this.imagePreview = null;
        }
        this.imageFile = null;
      },
      
      async loadCategories() {
        try {
          const response = await associationDashboardApi.getAllCategorie();
          if (response.data?.categorie) this.categories = response.data.categorie;
        } catch (error) { 
          console.error("Erreur catégories:", error);
          this.errorMessage = "Impossible de charger les catégories. Veuillez réessayer.";
        }
      },
      
      handleImageChange(event) {
        const file = event.target.files[0];
        if (!file) return;
        
        this.errorMessage = '';
        
        if (file.size > 2*1024*1024) {
          this.errorMessage = "Image trop volumineuse (max 2MB)";
          return;
        }
        
        if (!['image/jpeg','image/png','image/jpg'].includes(file.type)) {
          this.errorMessage = "Format non supporté (JPG/PNG uniquement)";
          return;
        }
        
        this.imageFile = file;
        if (this.imagePreview) URL.revokeObjectURL(this.imagePreview);
        this.imagePreview = URL.createObjectURL(file);
      },
      
      validateForm() {
        if (!this.imageFile) {
          this.errorMessage = "L'image est obligatoire";
          return false;
        }
        
        const requiredFields = [
          { field: 'titre', name: 'Le titre' },
          { field: 'description', name: 'La description' },
          { field: 'categorie_id', name: 'La catégorie' },
          { field: 'ville', name: 'La ville' },
          { field: 'date', name: 'La date' },
          { field: 'derniere_date_postule', name: 'La date limite' },
          { field: 'adresse', name: 'L\'adresse' },
          { field: 'nb_benevole', name: 'Le nombre de bénévoles' },
          { field: 'duree', name: 'La durée' },
          { field: 'engagement_requis', name: 'L\'engagement requis' },
          { field: 'missions_principales', name: 'Les missions principales' },
          { field: 'competences', name: 'Les compétences requises' },
          { field: 'pays', name: 'Le pays' },
        ];
        
        for (const {field, name} of requiredFields) {
          if (!this.form[field]) {
            this.errorMessage = `${name} est obligatoire`;
            return false;
          }
        }
        
        return true;
      },
      
      async submitForm() {
        this.errorMessage = '';
        
        if (!this.validateForm()) {
          return; 
        }
        
        this.loading = true;
        
        try {
          const token = sessionStorage.getItem('authToken') || localStorage.getItem('authToken');
          const formData = new FormData();
          
          for (const key in this.form) {
            formData.append(key, this.form[key]);
          }
          
          formData.append('image', this.imageFile);
          
          const response = await associationDashboardApi.createOpportunite(formData,token);
          
          if (this.imagePreview) {
            URL.revokeObjectURL(this.imagePreview);
            this.imagePreview = null;
          }
          
          this.$emit('created', response.data.opportunite);
          this.$emit('close');
          
        } catch (error) {
          console.error(error);
          if (error.response?.data?.message) {
            this.errorMessage = error.response.data.message;
          } else if (error.response?.data?.errors) {
            const errorMessages = Object.values(error.response.data.errors).flat();
            this.errorMessage = errorMessages.join(', ');
          } else {
            this.errorMessage = "Erreur lors de la création. Veuillez réessayer.";
          }
        } finally {
          this.loading = false;
        }
      }
    }
  };
  </script>