<template>
  <div class="min-h-screen bg-[#F8F9FE]">
    <div class="container mx-auto px-4 py-6">
      <div class="flex flex-col space-y-6">
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">    
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-[#00B3AD]/10 rounded-lg p-4">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Total</p>
                  <p class="text-2xl font-bold text-gray-900">{{ paginationInfo.total || 0 }}</p>
                </div>
                <div class="h-10 w-10 rounded-full bg-[#00B3AD] flex items-center justify-center">
                  <i class="fas fa-hands-helping text-white"></i>
                </div>
              </div>
            </div>
            
            <div class="bg-green-100 rounded-lg p-4">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">Actives</p>
                  <p class="text-2xl font-bold text-gray-900">{{ opportunities.filter(opp => opp.status === 'actif').length }}</p>
                </div>
                <div class="h-10 w-10 rounded-full bg-green-500 flex items-center justify-center">
                  <i class="fas fa-check text-white"></i>
                </div>
              </div>
            </div>
            
            <div class="bg-amber-100 rounded-lg p-4">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm text-gray-600">En attente</p>
                  <p class="text-2xl font-bold text-gray-900">{{ opportunities.filter(opp => opp.status === 'en attente').length }}</p>
                </div>
                <div class="h-10 w-10 rounded-full bg-amber-500 flex items-center justify-center">
                  <i class="fas fa-clock text-white"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-100">
          <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
              <div class="relative">
                <input 
                  type="text" 
                  placeholder="Rechercher..." 
                  class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#00B3AD]"
                  v-model="searchQuery"
                  @input="filterOpportunities"
                />
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </div>
            </div>
            <div class="w-full md:w-48">
              <select 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#00B3AD]"
                v-model="statusFilter"
                @change="filterOpportunities"
              >
                <option value="">Tous les statuts</option>
                <option value="actif">Actif</option>
                <option value="en attente">En attente</option>
                <option value="fermé">Archivé</option>
              </select>
            </div>
            <div class="w-full md:w-48">
              <select 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#00B3AD]"
                v-model="categoryFilter"
                @change="filterOpportunities"
              >
                <option value="">Toutes les catégories</option>
                <option v-for="category in categories" :key="category.id" :value="category.nom">
                  {{ category.nom }}
                </option>
              </select>
            </div>
            <button 
              @click="openAddModal" 
              class="flex items-center px-4 py-2 bg-[#00B3AD] hover:bg-[#00B3AD]/90 text-white rounded-md shadow-sm"
            >
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
              Créer
            </button>
          </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
          <div class="p-5 border-b">
            <h2 class="text-lg font-semibold text-gray-900">Liste des opportunités</h2>
          </div>
          
          <div v-if="loading" class="p-10 text-center">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-[#00B3AD]"></div>
            <p class="mt-2 text-gray-600">Chargement...</p>
          </div>
          
          <div v-else-if="error" class="p-10 text-center text-red-500">
            <i class="fas fa-exclamation-circle text-3xl"></i>
            <p class="mt-2">{{ error }}</p>
            <button @click="fetchOpportunities" class="mt-4 px-4 py-2 bg-[#00B3AD] text-white rounded">
              Réessayer
            </button>
          </div>
          
          <div v-else class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Titre</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catégorie</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lieu</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Candidatures</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-if="filteredOpportunities.length === 0">
                  <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                    <i class="fas fa-search text-gray-300 text-4xl mb-3"></i>
                    <p>Aucune opportunité trouvée</p>
                  </td>
                </tr>
                
                <tr v-for="opp in filteredOpportunities" :key="opp.id" class="hover:bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10 bg-white rounded-md flex items-center justify-center overflow-hidden border border-gray-200">
                        <img :src="opp.image || 'https://via.placeholder.com/40'" class="w-full h-full object-cover">
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{ opp.titre }}</div>
                        <div class="text-xs text-gray-500">ID: {{ opp.id }}</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                      {{ opp.categorie?.nom || 'Non catégorisé' }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ opp.ville }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ formatDate(opp.date) }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" :class="getStatusClass(opp.status)">
                      {{ opp.status }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="flex items-center">
                      <span class="font-medium text-gray-900">{{ opp.postules_count || 0 }}</span>
                      <span class="text-gray-500 mx-1">/</span>
                      <span>{{ opp.nb_benevole }}</span>
                      <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
                        <div class="bg-[#00B3AD] h-2 rounded-full" :style="`width: ${calculateProgress(opp.postules_count, opp.nb_benevole)}%`"></div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <div class="flex space-x-2">
                        <button @click="viewDetails(opp)" class="text-indigo-600 hover:text-indigo-900">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                          </svg>
                        </button>
                      <button @click="openEditModal(opp)" class="text-blue-600 hover:text-blue-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                      </button>
                      <button @click="confirmDelete(opp)" class="text-red-600 hover:text-red-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
  
          <div v-if="!loading && !error && paginationInfo.last_page > 1" class="border-t border-gray-200 px-6 py-4 flex items-center justify-between">
            <p class="text-sm text-gray-700">
              Page <span class="font-medium">{{ paginationInfo.current_page }}</span> sur <span class="font-medium">{{ paginationInfo.last_page }}</span>
            </p>
            <div class="flex space-x-2">
              <button 
                @click="changePage(paginationInfo.current_page - 1)" 
                :disabled="!paginationInfo.prev_page_url"
                class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
                :class="{'opacity-50 cursor-not-allowed': !paginationInfo.prev_page_url}">
                Précédent
              </button>
              <button 
                @click="changePage(paginationInfo.current_page + 1)" 
                :disabled="!paginationInfo.next_page_url"
                class="px-4 py-2 border border-gray-300 rounded-md bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"
                :class="{'opacity-50 cursor-not-allowed': !paginationInfo.next_page_url}">
                Suivant
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <edit-opportunity-modal 
      :show="showEditModal" 
      :opportunity="selectedOpportunity"
      @close="showEditModal = false"
      @updated="handleUpdated"
    />
    
    <add-opportunity-modal
      :show="showAddModal"
      @close="showAddModal = false"
      @created="handleCreated"
    />

    <opportunity-details-modal
      :show="showDetailsModal"
      :opportunity-id="selectedOpportunityId"
      @close="closeDetailsModal"
    />
    
    <div v-if="showDeleteModal" class="fixed inset-0 z-50 overflow-y-auto">
      <div class="fixed inset-0 bg-black bg-opacity-50" @click="showDeleteModal = false"></div>
      <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="relative bg-white rounded-lg max-w-md w-full shadow-xl p-6">
          <h3 class="text-lg font-semibold text-gray-900">Confirmer la suppression</h3>
          <p class="mt-2 text-sm text-gray-600">
            Êtes-vous sûr de vouloir supprimer cette opportunité ?
          </p>
          <div class="mt-3 p-3 bg-red-50 border border-red-200 rounded-md">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-10 w-10 bg-white rounded-md flex items-center justify-center overflow-hidden border border-gray-200 mr-3">
                <img v-if="opportunityToDelete?.image" :src="opportunityToDelete.image" class="w-full h-full object-cover">
              </div>
              <div>
                <div class="font-medium">{{ opportunityToDelete?.titre }}</div>
                <div class="text-sm text-gray-500">{{ formatDate(opportunityToDelete?.date) }} - {{ opportunityToDelete?.ville }}</div>
              </div>
            </div>
          </div>
          <div class="flex justify-end space-x-3 mt-4">
            <button 
              @click="showDeleteModal = false" 
              class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
            >
              Annuler
            </button>
            <button 
              @click="deleteOpportunity"
              :disabled="isDeleting"
              class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 disabled:opacity-50"
            >
              {{ isDeleting ? 'Suppression...' : 'Supprimer' }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import associationDashboardApi from '@/api/associationDashboard';
import EditOpportunityModal from './updateOpportunite.vue';
import AddOpportunityModal from './addNewOpportunite.vue';
import OpportunityDetailsModal from './opportunitieDetailsModal.vue';

export default {
  components: {
    EditOpportunityModal,
    AddOpportunityModal,
    OpportunityDetailsModal
  },
  data() {
    return {
      opportunities: [],
      filteredOpportunities: [],
      categories: [],
      searchQuery: '',
      statusFilter: '',
      categoryFilter: '',
      paginationInfo: {
        current_page: 1,
        last_page: 1,
        total: 0,
        next_page_url: null,
        prev_page_url: null
      },
      loading: false,
      error: null,
      showEditModal: false,
      showAddModal: false, 
      showDetailsModal: false,
      showDeleteModal: false,
      isDeleting: false,
      selectedOpportunity: null,
      opportunityToDelete: null
    };
  },
  created() {
    this.fetchOpportunities();
    this.loadCategories();
  },
  methods: {
    async loadCategories() {
      try {
        const response = await associationDashboardApi.getAllCategorie();
        if (response.data?.categorie) this.categories = response.data.categorie;
      } catch (error) { 
        console.error("Erreur catégories:", error);
      }
    },
    async fetchOpportunities(page = 1) {
      this.loading = true;
      this.error = null;
      
      try {
        const token = sessionStorage.getItem('authToken') || localStorage.getItem('authToken');
        const response = await associationDashboardApi.getOpportunitesOfAssociation(token, page);
        const { current_page, data, last_page, total, next_page_url, prev_page_url } = response.data;
        
        this.paginationInfo = { current_page, last_page, total, next_page_url, prev_page_url };
        this.opportunities = data;
        this.filterOpportunities();
      } catch (error) {
        console.error('Erreur:', error);
        this.error = 'Impossible de récupérer les opportunités';
      } finally {
        this.loading = false;
      }
    },
    filterOpportunities() {
      let filtered = [...this.opportunities];
      
      if (this.searchQuery) {
        const query = this.searchQuery.toLowerCase();
        filtered = filtered.filter(opp => 
          (opp.titre && opp.titre.toLowerCase().includes(query)) ||
          (opp.description && opp.description.toLowerCase().includes(query)) ||
          (opp.ville && opp.ville.toLowerCase().includes(query))
        );
      }
      
      if (this.statusFilter) {
        filtered = filtered.filter(opp => opp.status === this.statusFilter);
      }
      
      if (this.categoryFilter) {
        filtered = filtered.filter(opp => 
          opp.categorie?.nom?.toLowerCase() === this.categoryFilter.toLowerCase()
        );
      }
      
      this.filteredOpportunities = filtered;
    },
    formatDate(dateString) {
      if (!dateString) return 'N/A';
      const date = new Date(dateString);
      return new Intl.DateTimeFormat('fr-FR', { day: '2-digit', month: '2-digit', year: 'numeric' }).format(date);
    },
    getStatusClass(status) {
      const classes = {
        'actif': 'bg-green-100 text-green-800',
        'en attente': 'bg-yellow-100 text-yellow-800',
        'fermé': 'bg-red-100 text-red-800'
      };
      return classes[status?.toLowerCase()] || 'bg-gray-100 text-gray-800';
    },
    calculateProgress(current, total) {
      if (!total || total === 0) return 0;
      current = current || 0;
      return Math.min(Math.round((current / total) * 100), 100);
    },
    openEditModal(opportunity) {
      this.selectedOpportunity = opportunity;
      this.showEditModal = true;
    },
    openAddModal() {
      this.showAddModal = true;
    },
    confirmDelete(opportunity) {
      this.opportunityToDelete = opportunity;
      this.showDeleteModal = true;
    },
    viewDetails(opportunity) {
      this.selectedOpportunityId = opportunity.id;
      this.showDetailsModal = true;
    },
    closeDetailsModal() {
      this.showDetailsModal = false;
      setTimeout(() => {
        this.selectedOpportunityId = null;
      }, 300);
    },
    async deleteOpportunity() {
      if (!this.opportunityToDelete) return;
      this.isDeleting = true;
      
      try {
        const token = sessionStorage.getItem('authToken') || localStorage.getItem('authToken');
        await associationDashboardApi.deleteOpportunite(token, this.opportunityToDelete.id);
        this.showDeleteModal = false;
        this.fetchOpportunities();
      } catch (error) {
        console.error("Erreur lors de la suppression:", error);
      } finally {
        this.isDeleting = false;
        this.opportunityToDelete = null;
      }
    },
    async changePage(page) {
      if (page < 1 || page > this.paginationInfo.last_page) return;
      await this.fetchOpportunities(page);
      window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    handleUpdated() {
      this.fetchOpportunities();
    },
    handleCreated() {
      this.fetchOpportunities();
    }
  }
};
</script>