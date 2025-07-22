<template>
  <div class="min-h-screen bg-[#F8F9FE]">
    <div class="container mx-auto px-4 py-6">
      <div class="flex flex-col space-y-6">
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-[#00B3AD]/10 rounded-lg p-4">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Total des catégories</p>
                  <p class="text-2xl font-bold text-gray-900">{{ pagination?.total || 0 }}</p>
                </div>
                <div class="h-10 w-10 rounded-full bg-[#00B3AD] flex items-center justify-center">
                  <i class="fas fa-tags text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-100">
          <div class="flex flex-col md:flex-row gap-4 justify-between">
            <div class="flex-1">
              <input 
                type="text" 
                placeholder="Rechercher une catégorie..." 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#00B3AD]"
                v-model="searchQuery"
                @input="filterCategories"
              />
            </div>
            <div>
              <button 
                @click="openAddModal"
                class="px-4 py-2 bg-[#00B3AD] text-white rounded-md hover:bg-[#00B3AD]/90 flex items-center"
              >
                <i class="fas fa-plus mr-2"></i> Nouvelle catégorie
              </button>
            </div>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
          
          <div v-if="loading" class="p-10 text-center">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-[#00B3AD]"></div>
            <p class="mt-2">Chargement des catégories...</p>
          </div>
          
          <div v-else-if="error" class="p-10 text-center text-red-500">
            <i class="fas fa-exclamation-circle text-3xl"></i>
            <p class="mt-2">{{ error }}</p>
            <button @click="fetchCategories" class="mt-4 px-4 py-2 bg-[#00B3AD] text-white rounded">
              Réessayer
            </button>
          </div>
          
          <div v-else class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-if="filteredCategories.length === 0">
                  <td colspan="3" class="px-6 py-12 text-center text-gray-500">
                    <i class="fas fa-folder-open text-gray-300 text-4xl mb-3"></i>
                    <p>Aucune catégorie trouvée</p>
                  </td>
                </tr>
                
                <tr v-for="category in filteredCategories" :key="category.id" class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-8 w-8 rounded-full bg-[#00B3AD]/20 flex items-center justify-center text-[#00B3AD] mr-2">
                        <i class="fas fa-tag"></i>
                      </div>
                      <div class="text-sm font-medium text-gray-900">{{ category.nom }}</div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="text-sm text-gray-700 max-w-md">
                      {{ truncateText(category.description, 100) }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex space-x-2">
                      <button 
                        @click="editCategory(category)" 
                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-md" 
                        title="Modifier la catégorie"
                      >
                        <i class="fas fa-edit"></i>
                      </button>
                      <button 
                        @click="confirmDelete(category)" 
                        class="p-2 text-red-600 hover:bg-red-50 rounded-md"
                        title="Supprimer la catégorie"
                      >
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          
          <div v-if="pagination && pagination.last_page > 1" class="border-t border-gray-200 px-6 py-4 flex items-center justify-between">
            <p class="text-sm text-gray-700">
              Page <span class="font-medium">{{ pagination.current_page }}</span> sur <span class="font-medium">{{ pagination.last_page }}</span>
            </p>
            <div class="flex space-x-2">
              <button 
                @click="changePage(pagination.current_page - 1)" 
                :disabled="pagination.current_page === 1"
                class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
                :class="{'opacity-50 cursor-not-allowed': pagination.current_page === 1}">
                Précédent
              </button>
              <button 
                @click="changePage(pagination.current_page + 1)" 
                :disabled="pagination.current_page === pagination.last_page"
                class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
                :class="{'opacity-50 cursor-not-allowed': pagination.current_page === pagination.last_page}">
                Suivant
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    
   <!-- Add this code inside your existing v-if="showModal" div -->
<div v-if="showModal" class="fixed inset-0 z-50 overflow-y-auto">
  <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="closeModal"></div>
  
  <div class="flex min-h-screen items-center justify-center p-4">
    <div class="relative bg-white rounded-lg max-w-md w-full shadow-xl p-6">
      <div class="flex justify-between items-center mb-6 border-b pb-3">
        <h3 class="text-lg font-semibold text-gray-900">
          {{ isEditing ? 'Modifier la catégorie' : 'Ajouter une catégorie' }}
        </h3>
        <button @click="closeModal" class="text-gray-400 hover:text-gray-500">
          <i class="fas fa-times"></i>
        </button>
      </div>
      
      <form @submit.prevent="submitForm">
        <div class="mb-4">
          <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom *</label>
          <input 
            id="nom"
            type="text" 
            v-model="form.nom"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#00B3AD]"
            placeholder="Nom de la catégorie"
            required
          />
        </div>
        
        <div class="mb-6">
          <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
          <textarea 
            id="description"
            v-model="form.description"
            rows="4"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#00B3AD]"
            placeholder="Description de la catégorie"
            required
          ></textarea>
        </div>
        
        <div v-if="formError" class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
          {{ formError }}
        </div>
        
        <div class="flex justify-end space-x-3 border-t pt-4">
          <button 
            type="button"
            @click="closeModal"
            class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50"
          >
            Annuler
          </button>
          <button 
            type="submit"
            class="px-4 py-2 bg-[#00B3AD] text-white rounded-md hover:bg-[#00B3AD]/90"
            :disabled="formProcessing"
          >
            <i v-if="formProcessing" class="fas fa-spinner fa-spin mr-2"></i>
            {{ isEditing ? 'Mettre à jour' : 'Ajouter' }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Add this code inside your existing v-if="showDeleteModal" div -->
<div v-if="showDeleteModal" class="fixed inset-0 z-50 overflow-y-auto">
  <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="closeDeleteModal"></div>
  
  <div class="flex min-h-screen items-center justify-center p-4">
    <div class="relative bg-white rounded-lg max-w-sm w-full shadow-xl p-6">
      <div class="flex flex-col items-center text-center mb-6">
        <div class="h-16 w-16 bg-red-100 rounded-full flex items-center justify-center text-red-500 mb-4">
          <i class="fas fa-exclamation-triangle text-2xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 mb-1">Confirmer la suppression</h3>
        <p class="text-sm text-gray-500">
          Êtes-vous sûr de vouloir supprimer la catégorie <strong>{{ categoryToDelete?.nom }}</strong> ?
          Cette action est irréversible.
        </p>
      </div>
      
      <div v-if="deleteError" class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
        {{ deleteError }}
      </div>
      
      <div class="flex justify-end space-x-3">
        <button 
          @click="closeDeleteModal"
          class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50"
        >
          Annuler
        </button>
        <button 
          @click="deleteCategory"
          class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700"
          :disabled="deleteProcessing"
        >
          <i v-if="deleteProcessing" class="fas fa-spinner fa-spin mr-2"></i>
          Supprimer
        </button>
      </div>
    </div>
  </div>
</div>
  </div>
</template>

<script>
import categoriesApi from '@/api/categories';

export default {
  data() {
    return {
      categories: [],
      filteredCategories: [],
      searchQuery: '',
      loading: false,
      error: null,
      
      pagination: null,
      currentPage: 1,
      perPage: 10,
      
      showModal: false,
      isEditing: false,
      form: {
        id: null,
        nom: '',
        description: ''
      },
      formError: null,
      formProcessing: false,
      
      showDeleteModal: false,
      categoryToDelete: null,
      deleteError: null,
      deleteProcessing: false
    };
  },
  created() {
    this.fetchCategories();
  },
  methods: {
  async fetchCategories(page = 1) {
      this.loading = true;
      this.error = null;
      
      try {
          const token = sessionStorage.getItem('authToken');
          if (!token) {
          this.error = 'Vous devez être connecté pour accéder à cette page';
          return;
          }
          
          const response = await categoriesApi.getAllCategories(token, page, this.perPage);
          
          const paginationData = response.data.categorie;
          
          this.pagination = {
          current_page: paginationData.current_page,
          last_page: paginationData.last_page,
          total: paginationData.total,
          per_page: paginationData.per_page
          };
          
          this.categories = paginationData.data || [];
          this.filterCategories();
      } catch (error) {
          console.error('Erreur:', error);
          this.error = 'Impossible de récupérer les catégories';
      } finally {
          this.loading = false;
      }
      },
    
    changePage(page) {
      if (page >= 1 && page <= this.pagination.last_page) {
        this.currentPage = page;
        this.fetchCategories(page);
      }
    },
    
    filterCategories() {
      if (!this.searchQuery) {
        this.filteredCategories = [...this.categories];
        return;
      }
      
      const query = this.searchQuery.toLowerCase();
      this.filteredCategories = this.categories.filter(cat => 
        cat.nom.toLowerCase().includes(query) ||
        cat.description.toLowerCase().includes(query)
      );
    },
    
    truncateText(text, length) {
      if (!text) return '';
      return text.length > length ? text.substring(0, length) + '...' : text;
    },
    
    openAddModal() {
      this.isEditing = false;
      this.form = { id: null, nom: '', description: '' };
      this.formError = null;
      this.showModal = true;
    },
    
    editCategory(category) {
      this.isEditing = true;
      this.form = { ...category };
      this.formError = null;
      this.showModal = true;
    },
    
    closeModal() {
      this.showModal = false;
    },
    
    async submitForm() {
      this.formProcessing = true;
      this.formError = null;
      
      try {
        const token = sessionStorage.getItem('authToken');
        const formData = {
          nom: this.form.nom,
          description: this.form.description
        };
        
        if (this.isEditing) {
          await categoriesApi.updateCategory(token, this.form.id, formData);
        } else {
          await categoriesApi.addCategory(token, formData);
        }
        
        await this.fetchCategories(this.currentPage);
        
        this.closeModal();
      } catch (error) {
        console.error('Erreur:', error);
        this.formError = error.response?.data?.message || 'Une erreur est survenue';
      } finally {
        this.formProcessing = false;
      }
    },
    
    confirmDelete(category) {
      this.categoryToDelete = category;
      this.deleteError = null;
      this.showDeleteModal = true;
    },
    
    closeDeleteModal() {
      this.showDeleteModal = false;
      setTimeout(() => {
        this.categoryToDelete = null;
      }, 300);
    },
    
    async deleteCategory() {
      if (!this.categoryToDelete) return;
      
      this.deleteProcessing = true;
      this.deleteError = null;
      
      try {
        const token = sessionStorage.getItem('authToken');
        await categoriesApi.deleteCategory(token, this.categoryToDelete.id);
        
        await this.fetchCategories(this.currentPage);
        
        this.closeDeleteModal();
      } catch (error) {
        console.error('Erreur:', error);
        this.deleteError = error.response?.data?.message || 'Erreur lors de la suppression';
      } finally {
        this.deleteProcessing = false;
      }
    }
  }
};
</script>