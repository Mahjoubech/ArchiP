<template>
  <div v-if="show" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black bg-opacity-50" @click="$emit('close')"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
      <div class="relative bg-white rounded-lg max-w-4xl w-full shadow-xl">
        <div class="flex items-center justify-between p-4 border-b">
          <div class="flex items-center space-x-2">
            <i class="fas fa-clipboard-list text-[#00B3AD] text-lg"></i>
            <h3 class="text-lg font-semibold text-gray-900">Modifier l'opportunité</h3>
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
                    <img v-else-if="form.image" :src="`${form.image}`" alt="Image" class="h-10 w-10 object-cover rounded-md">
                    <div v-else class="h-10 w-10 bg-gray-100 rounded-md flex items-center justify-center">
                      <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
                    </div>
                    <label class="inline-flex items-center px-2 py-1 text-xs bg-[#00B3AD] text-white rounded-md cursor-pointer hover:bg-[#009B96]">
                      <span>{{ form.image || imagePreview ? 'Modifier' : 'Ajouter' }}</span>
                      <input type="file" @change="handleImageChange" class="hidden" accept="image/jpeg,image/png,image/jpg">
                    </label>
                  </div>
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700">Titre <span class="text-red-500">*</span></label>
                  <input v-model="form.titre" type="text" required class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Description</label>
                  <textarea v-model="form.description" rows="3" class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]"></textarea>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Catégorie <span class="text-red-500">*</span></label>
                  <select v-model="form.categorie_id" required class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                    <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.nom }}</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Compétences requises</label>
                  <textarea v-model="form.competences" rows="3" class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]"></textarea>
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
                    <label class="block text-sm font-medium text-gray-700">Date limite</label>
                    <input type="date" v-model="form.derniere_date_postule" class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                  </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Nb bénévoles <span class="text-red-500">*</span></label>
                    <input type="number" v-model="form.nb_benevole" min="1" required class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Durée</label>
                    <input type="text" v-model="form.duree" placeholder="Ex: 2 heures" class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                  </div>
                </div>

                <div class="grid grid-cols-2 gap-2">
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Pays</label>
                    <input type="text" v-model="form.pays" class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700">Ville <span class="text-red-500">*</span></label>
                    <input type="text" v-model="form.ville" required class="w-full px-2 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                  </div>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Adresse</label>
                  <input type="text" v-model="form.adress" class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]">
                </div>

                <div>
                  <label class="block text-sm font-medium text-gray-700">Engagement requis</label>
                  <textarea v-model="form.engagement_requis" rows="1" class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]"></textarea>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700">Missions principales</label>
                  <textarea v-model="form.missions_principales" rows="2" class="w-full px-3 py-1.5 text-sm rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#00B3AD]"></textarea>
                </div>
         
              </div>
            </div>
          </form>
        </div>
          <div class="px-4 py-3 bg-gray-50 flex justify-end space-x-2 rounded-b-lg border-t">
          <button type="button" @click="$emit('close')" class="px-3 py-1.5 text-sm text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Annuler</button>
          <button type="button" @click="submitForm" :disabled="loading" class="px-4 py-1.5 text-sm text-white bg-[#00B3AD] rounded-md hover:bg-[#00B3AD]/90 disabled:opacity-50">
            {{ loading ? 'Enregistrement...' : 'Enregistrer' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script>
import associationDashboardApi from "@/api/associationDashboard";

export default {
  name: "EditOpportunityModal",
  props: { show: Boolean, opportunity: Object },
  data() {
    return {
      form: {
        titre: '', description: '', categorie_id: null, ville: '', date: '',
        derniere_date_postule: '', adress: '', nb_benevole: 1, status: 'actif',
        image: '', duree: '', engagement_requis: '', missions_principales: '',
        competences: '', pays: '', type: ''
      },
      imageFile: null, 
      imagePreview: null, 
      loading: false, 
      categories: [],
      errorMessage: ''
    };
  },
  watch: {
    opportunity: {
      immediate: true,
      handler(opp) {
        if (!opp) return;
        this.imagePreview = null;
        this.errorMessage = ''; 
        this.form = {
          titre: opp.titre || '', description: opp.description || '',
          categorie_id: opp.categorie?.id || null, ville: opp.ville || '',
          date: this.formatDate(opp.date),
          derniere_date_postule: this.formatDate(opp.derniere_date_postule),
          adress: opp.adress || '', nb_benevole: opp.nb_benevole || 1,
          status: opp.status || 'actif', image: opp.image || '',
          duree: opp.duree || '', engagement_requis: opp.engagement_requis || '',
          missions_principales: opp.missions_principales || '',
          competences: opp.competences || '', pays: opp.pays || '', type: opp.type || ''
        };
        this.imageFile = null;
      }
    },
    show(visible) { 
      if(visible) {
        this.errorMessage = '';
        if(!this.categories.length) this.loadCategories(); 
      }
    }
  },
  created() { this.loadCategories(); },
  beforeDestroy() { if(this.imagePreview) URL.revokeObjectURL(this.imagePreview); },
  methods: {
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
    formatDate(dateString) {
      if (!dateString) return '';
      return new Date(dateString).toISOString().split('T')[0];
    },
      async submitForm() {
    this.errorMessage = ''; 
    this.loading = true;
    try {
      const token = sessionStorage.getItem('authToken') || localStorage.getItem('authToken');
      const formData = new FormData();
      
      for (const key in this.form) {
        if (key !== 'image' && this.form[key] !== null && this.form[key] !== undefined) {
          formData.append(key, this.form[key]);
        }
      }
      
      if (this.imageFile) {
        formData.append('image', this.imageFile);
      }
      
      const response = await associationDashboardApi.updateOpportunite(token, this.opportunity.id, formData);
      if (this.imagePreview) URL.revokeObjectURL(this.imagePreview);
      
      this.$emit('updated', response.data.opportunite);
      this.$emit('close');
    } catch (error) {
    } finally {
      this.loading = false;
    }
  }
  }
};
</script>