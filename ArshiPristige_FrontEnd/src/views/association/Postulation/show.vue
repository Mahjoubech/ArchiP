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
                    <i class="fas fa-users text-white"></i>
                  </div>
                </div>
              </div>
              
              <div class="bg-green-100 rounded-lg p-4">
                <div class="flex items-center justify-between">
                  <div>
                    <p class="text-sm text-gray-600">Acceptés</p>
                    <p class="text-2xl font-bold text-gray-900">{{ applications.filter(app => app.etat === 'accepté').length }}</p>
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
                    <p class="text-2xl font-bold text-gray-900">{{ applications.filter(app => app.etat === 'en attente').length }}</p>
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
                <input 
                  type="text" 
                  placeholder="Rechercher..." 
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#00B3AD]"
                  v-model="searchQuery"
                  @input="filterApplications"
                />
              </div>
              <div class="w-full md:w-48">
                <select 
                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-[#00B3AD]"
                  v-model="statusFilter"
                  @change="filterApplications"
                >
                  <option value="">Tous les statuts</option>
                  <option value="en attente">En attente</option>
                  <option value="accepté">Accepté</option>
                  <option value="refusé">Refusé</option>
                </select>
              </div>
            </div>
          </div>
          
          <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            
            <div v-if="loading" class="p-10 text-center">
              <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-[#00B3AD]"></div>
              <p class="mt-2">Chargement...</p>
            </div>
            
            <div v-else-if="error" class="p-10 text-center text-red-500">
              <i class="fas fa-exclamation-circle text-3xl"></i>
              <p class="mt-2">{{ error }}</p>
              <button @click="fetchApplications" class="mt-4 px-4 py-2 bg-[#00B3AD] text-white rounded">
                Réessayer
              </button>
            </div>
            
            <div v-else class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bénévole</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Opportunité</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr v-if="filteredApplications.length === 0">
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                      <i class="fas fa-search text-gray-300 text-4xl mb-3"></i>
                      <p>Aucune candidature trouvée</p>
                    </td>
                  </tr>
                  
                  <tr v-for="app in filteredApplications" :key="app.id" class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-gray-100 flex-shrink-0">
                          <img :src="app.image || 'https://via.placeholder.com/40'" alt="" class="h-full w-full object-cover" />
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium">{{ app.prenom }} {{ app.nom }}</div>
                          <div class="text-sm text-gray-500">{{ app.email }}</div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm font-medium">{{ app.titre }}</div>
                      <div class="text-xs text-gray-500">{{ app.ville }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm">{{ formatDate(app.date) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span :class="getStatusClass(app.etat)">{{ app.etat }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex space-x-2">
                        <button @click="viewBenevole(app)" class="p-2 text-blue-600 hover:bg-blue-50 rounded-md">
                          <i class="fas fa-user"></i>
                        </button>
                        <button @click="changeStatus(app)" class="p-2 text-[#00B3AD] hover:bg-[#00B3AD]/10 rounded-md">
                          <i class="fas fa-exchange-alt"></i>
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
      
      <status-change-modal
        :show="showStatusModal"
        :application="selectedApplication"
        @close="showStatusModal = false"
        @updated="handleStatusUpdated"
      />
      
      <benevole-details-modal
        :show="showBenevoleModal"
        :application="selectedApplication"
        @close="showBenevoleModal = false"
      />
    </div>
  </template>
    
  <script>
  import postuleApi from '@/api/postulation';
  import StatusChangeModal from './changeStatusModal.vue';
  import BenevoleDetailsModal from './benevoleDeatilsModal.vue';
    
  export default {
    components: {
      StatusChangeModal,
      BenevoleDetailsModal
    },
    data() {
      return {
        applications: [],
        filteredApplications: [],
        searchQuery: '',
        statusFilter: '',
        paginationInfo: {
          current_page: 1,
          last_page: 1,
          total: 0,
          next_page_url: null,
          prev_page_url: null
        },
        loading: false,
        error: null,
        
        showStatusModal: false,
        showBenevoleModal: false,
        selectedApplication: null,
      };
    },
    created() {
      this.fetchApplications();
    },
    methods: {
      async fetchApplications(page = 1) {
        this.loading = true;
        this.error = null;
        
        try {
          const token = sessionStorage.getItem('authToken');
          if (!token) {
            this.error = 'Vous devez être connecté pour accéder à cette page';
            return;
          }
          
          const response = await postuleApi.getPostulationsByAssociation(token, page);
          const { current_page, data, last_page, total, next_page_url, prev_page_url } = response.data.postulations;
          
          this.paginationInfo = { current_page, last_page, total, next_page_url, prev_page_url };
          this.applications = data;
          this.filterApplications();
        } catch (error) {
          console.error('Erreur:', error);
          this.error = 'Impossible de récupérer les candidatures';
        } finally {
          this.loading = false;
        }
      },
      filterApplications() {
        let filtered = [...this.applications];
        
        if (this.searchQuery) {
          const query = this.searchQuery.toLowerCase();
          filtered = filtered.filter(app => 
            (app.prenom && app.prenom.toLowerCase().includes(query)) ||
            (app.nom && app.nom.toLowerCase().includes(query)) ||
            (app.email && app.email.toLowerCase().includes(query)) ||
            (app.titre && app.titre.toLowerCase().includes(query))
          );
        }
        
        if (this.statusFilter) {
          filtered = filtered.filter(app => app.etat === this.statusFilter);
        }
        
        this.filteredApplications = filtered;
      },
      formatDate(dateString) {
        if (!dateString) return 'N/A';
        const date = new Date(dateString);
        return new Intl.DateTimeFormat('fr-FR', { 
          day: '2-digit', 
          month: '2-digit', 
          year: 'numeric' 
        }).format(date);
      },
      getStatusClass(status) {
        const classes = {
          'accepté': 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800',
          'refusé': 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800',
          'en attente': 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800'
        };
        return classes[status] || 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800';
      },
      viewBenevole(application) {
        this.selectedApplication = application;
        this.showBenevoleModal = true;
      },
      changeStatus(application) {
        this.selectedApplication = application;
        this.showStatusModal = true;
      },
      async handleStatusUpdated(updatedApplication) {
        
        this.loading = true;
        
        try {
          await this.fetchApplications(this.paginationInfo.current_page);
          
        } catch (error) {
          console.error('Error refreshing data after status update:', error);
        }
      },
      changePage(page) {
        if (page >= 1 && page <= this.paginationInfo.last_page) {
          this.fetchApplications(page);
          window.scrollTo({ top: 0, behavior: 'smooth' });
        }
      }
    }
  };
  </script>